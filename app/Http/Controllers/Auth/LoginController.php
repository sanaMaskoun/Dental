<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {

            if (auth()->user()->type == UserTypeEnum::admin) {
                return redirect()->route('admin_dashboard');
            }else if (auth()->user()->type == UserTypeEnum::doctor) {
                 return redirect()->route('doctor_dashboard');
            }
            else if (auth()->user()->type == UserTypeEnum::patient) {
                 return redirect()->route('index');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }

    }
}
