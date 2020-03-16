<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
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
                return redirect()->back()->with("message", "Šifra nije validna.");
            }
            $request->session()->put('user', $user);
            return $user->role === $userModel::ADMINISTRATOR
                ? redirect(route('about'))
                : redirect(route('index'));
        } else {
            return redirect()->back()->with("message", "Parametri nisu validni.");
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
                return redirect(route('login'))->with("message", "Registracija uspešna.");
            } else {
                return redirect()->back()->with("message", "Nije uspela registracija.");
            }
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with("message", "Serverska greška.");
        }
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('user');

        return redirect(route('login'));
    }
}
