<?php
namespace App\Http\Controllers\Admin\Auth;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login',[
            'title' => 'Admin Login',
            'loginRoute' => 'admin.login',
            'forgotPasswordRoute' => 'admin.password.request',
        ]);
    }

    public function login(Request $request)
    {
        $this->validator($request);

        if(Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
            return redirect()
                ->intended(route('admin.home'))
                ->with('status','You are Logged in as Admin!');
        }
        return $this->loginFailed();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.login')
            ->with('status','Admin has been logged out!');

    }

    private function validator(Request $request)
    {
        $rules = [
            'email'    => 'required|email|exists:admins|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];
        $request->validate($rules,$messages);
    }

    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }
}
