<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function dashboard(){

        return view('hrms.dashboard');

    }

    public function changePassword()
    {
        return view('auth.change-password');
    }

    public function processChangePassword(Request $request)
    {

        $this->validate($request,
            [
                'current' => 'required',
                'new' => 'required',
                'confirm' => 'required',
            ]);


        $password = $request->current;
        $user = User::where('id', \Auth::user()->id)->first();


        if (Hash::check($password, $user->password)){
            $user->password = bcrypt($request->new);

            if ($request->new != $request->confirm){
                return redirect()->back()->with('error','New & Confirm passwords does not match');
            }
            $user->save();

            return redirect()->to('/')->with('info','Password Updated');
        }else{
            \Session::flash('error','Supplied Password does not match records');

            return redirect()->back();
        }
    }

    public function processPasswordReset(Request $request)
    {
        $email = $request->email;
        $user  = User::where('email', $email)->first();

        if ($user) {
            $string = strtolower(str_random(6));


            $this->mailer->send('hrms.auth.reset_password', ['user' => $user, 'string' => $string], function ($message) use ($user) {
                $message->from('no-reply@dipi-ip.com', 'Digital IP Insights');
                $message->to($user->email, $user->name)->subject('Your new password');
            });

            \DB::table('users')->where('email', $email)->update(['password' => bcrypt($string)]);

            return redirect()->to('/')->with('message', 'Login with your new password received on your email');
        } else {
            return redirect()->to('/')->with('message', 'Your email is not registered');
        }

    }

  /*  public function showLogin()
    {
        return view('welcome');
    }

    public function doLogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required',
            ]);

        $email    = $request->email;
        $password = $request->password;
        $remember = $request->remember;

        $user = User::where('email', $email)->first();
        if ($user) {

            if (\Auth::attempt(['email' => $email, 'password' => $password],$remember)) {
                return redirect()->to('home');
            } else {
                \Session::flash('error', 'Email or password does not match!');
            }
        } else {
            \Session::flash('error', 'User does not match our records!');
        }

        return redirect()->to('/');

    }

    public function doLogout()
    {
        \Auth::logout();

        return redirect()->to('/');
    }


  */


}
