<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    private $rootRoute = 'produtos.index';

    private $loginRoute = 'login';


    public function index(Request $request)
    {

        if ($request->isMethod('post')) {

            return $this->authenticate($request);
        }

        if (Auth::check()) {
            return redirect()->route($this->rootRoute);
        }


        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'O campo e-mail é obrigatório',
                'password.required' => 'O campo Senha é obrigatório',
                'email' => 'Preencha um e-mail válido'
            ]
        );
        // dd($credentials);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended(route($this->rootRoute));
        } else {
            return back()->withInput()->with('error', 'Credenciais inválidas!');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route($this->loginRoute);
    }
}
