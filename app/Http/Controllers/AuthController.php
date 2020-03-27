<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthController extends Controller
{
    private $data = [];

    /**
     * @param LoginRequest $request
     *
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $userModel = new User();
        $email = $request->input('email');
        $pass = $request->input('password');
        $user = $userModel->getUserByEmail($email);

        if ($user !== null) {
            if (!Hash::check($pass, $user->password)) {
                return redirect()->back()->with("error", "Šifra nije validna.");
            }

            $request->session()->put('user', $user);

            $activityLog = new ActivityLog();
            $activityLog->logActivity(session('user')->id_u, 'Korisnik ' . session('user')->name . ' se uspešno ulogovao.');

            return $user->role === $userModel::ADMINISTRATOR
                ? redirect(route('dashboard'))
                : redirect(route('index'));
        } else {
            return redirect()->back()->with("error", "Parametri nisu validni.");
        }
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $userModel = new User();
        $userModel->name = $request->input('name');
        $userModel->email = $request->input('email');
        $userModel->password = $request->input("password");

        try {
            $inserted = $userModel->register();
            if ($inserted) {
                $idRegistered = $userModel->getUserByEmail($userModel->email);
                $activityLog = new ActivityLog();
                $activityLog->logActivity($idRegistered->id_u, 'Korisnik ' . $userModel->name . ' se uspešno registrovao.');
                return redirect(route('login'))->with("message", "Registracija uspešna, sada se možete ulogovati.");
            } else {
                return redirect()->back()->with("error", "Nije uspela registracija.");
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("error", "Serverska greška.");
        }
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        $activityLog = new ActivityLog();
        $activityLog->logActivity(session('user')->id_u, 'Korisnik ' . session('user')->name . ' se uspešno izlogovao.');
        $request->session()->forget('user');

        session()->flash('message', 'Uspešno ste se izlogovali.');

        return redirect(route('login'));
    }

    public function allActivity()
    {
        $activity = new ActivityLog();
        $this->data['activities'] = $activity->getActivity();

        return view('admin.activity', $this->data);
    }

    /**
     * @param Request $request
     * @return Factory|RedirectResponse|View
     */
    public function filter(Request $request)
    {
        $activity = new ActivityLog();

        $from = $request->input("from");
        $to = $request->input("to");

        try {
            $this->data['activities'] = $activity->activityDate($from, $to);
            if( $this->data['activities'] ){
                return view('admin.activityFilter', $this->data);
            }else{
                return redirect()->back()->with("error", "Nema rezultata za određene datume.");
            }

        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect(route('activity.filter'))->back()->with("error", "Nema rezultata za određene datume.");
        }

    }

}
