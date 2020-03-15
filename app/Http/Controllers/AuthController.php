<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\UserModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        $userModel->email = $request->get("email");
        $userModel->password = $request->get("password");
        $user = $userModel->login();

        if ($user) {
            $request->session()->put('user', $user);
            return $user->role == "Admin" ? redirect(route('/about')) : redirect(route('/index'));
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
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request) : RedirectResponse
    {

        session()->forget('user');
        return redirect(route('/login'));

    }
}
