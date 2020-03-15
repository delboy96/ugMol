<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\UserModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $userModel = new UserModel();
        $email = $request->input('email');
        $pass = $request->input('pass');
        $user = $userModel->getUserByEmail($email);

        if ($user !== null) {
            if(!Hash::check($pass, $user->pass)){
                return redirect()->back()->with("message", "Šifra nije validna.");
            }
            $request->session()->put('user', $user);
            return $user->role === $userModel::ADMINISTRATOR ? redirect(route('/about')) : redirect(route('/index'));
        } else {
            return redirect()->back()->with("message", "Parametri nisu validni.");
        }

    }


    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request) : RedirectResponse
    {
        $userModel = new UserModel();
        $userModel->name = $request->get('name');
        $userModel->email = $request->get('email');
        $userModel->password = $request->get("password");

        try {
            $userModel->register();
            return redirect()->back()->with("message", "Registracija uspešna.");
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("message", "Serverska greška.");
        }

    }

    /**
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function logout(Request $request) : RedirectResponse
    {

        session()->forget('user');
        return redirect(route('/login'));

    }
}
