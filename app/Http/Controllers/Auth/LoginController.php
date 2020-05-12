<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {

        // get our login input
        $login = $request->input('email');
        $urlReturn = $request->input('_url');

        // check login field
        $login_type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // merge our login field into the request with either email or username as key
        $request->merge([ $login_type => $login ]);

        $settings = AdminSettings::first();
        $request['_captcha'] = $settings->captcha;

        $messages = [
            'g-recaptcha-response.required_if' => trans('misc.captcha_error_required'),
            'g-recaptcha-response.captcha' => trans('misc.captcha_error'),
        ];

        // let's validate and set our credentials
        if ($login_type == 'email') {
            $this->validate($request, [
                'email'    => 'required|email',
                'password' => 'required',
                'g-recaptcha-response' => 'required_if:_captcha,==,on|captcha'
            ], $messages);

            $credentials = $request->only('email', 'password');
        } else {
            $this->validate($request, [
                'email' => 'required',
                'password' => 'required',
                'g-recaptcha-response' => 'required_if:_captcha,==,on|captcha'
            ], $messages);

            $credentials = $request->only('username', 'password');
        }


        if ($this->auth->attempt($credentials, $request->has('remember'))) {
            if ($this->auth->User()->status == 'active') {
                if (isset($urlReturn) && url()->isValidUrl($urlReturn)) {
                    return redirect($urlReturn);
                }
                return redirect()->intended('/');
            }
            if ($this->auth->User()->status == 'suspended') {
                $this->auth->logout();

                return redirect()->back()
                    ->withErrors([
                        'status' => trans('validation.user_suspended'),
                    ]);
            }
            if ($this->auth->User()->status == 'pending') {
                $this->auth->logout();

                return redirect()->back()
                    ->withErrors([
                        'status' => trans('validation.account_not_confirmed'),
                    ]);
            }
        }

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return trans('auth.error_logging');
    }

}
