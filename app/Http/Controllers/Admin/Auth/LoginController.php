<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/administrator-panel/dashboard';

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('get')) {
            return $this->showLoginForm();
        }
        if ($request->isMethod('post')) {
            return $this->login($request);
        }
    }

    public function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function showLoginForm()
    {
        if ($this->guard()->check()) {
            return redirect()->intended('administrator-panel/dashboard');
        }
        return view('admin.auth.login');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $this->validateLogin($request);
        $credentials = $request->only('email', 'password');
        $remember = $request->remember_me ?? false;

        if ($this->guard()->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('administrator-panel/dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);
    }

    /**
     * @param Request $request
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function logout(Request $request): RedirectResponse
    {
        auth()->guard('admin')->logout();

        $request->session()->invalidate();

        return redirect()->route('admin.login');
    }

}
