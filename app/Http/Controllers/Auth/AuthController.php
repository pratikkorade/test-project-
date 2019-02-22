<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Cookie\Factory;
use Illuminate\Auth\Events\Logout;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {

      //Auth::logout();
      // if (Auth::viaRemember()) {
      //   dd('already LOGIN');
      // }
        $userdata = array(
                       'email'     => Input::get('email'),
                       'password'  => Input::get('password')

                     );
        $password =Input::get('password');
        $email=Input::get('email');

        $remember  =Input::get('remember');
        if (Auth::attempt($userdata)) {
            if ($remember==1) {
              //$response = new Response('Hello World');
              //cookie('loginemail',$email, 250);
            //Cookie::('loginpassword',$password, 250);
            $name='loginpassword';
            $time=250;
          //Cookie::queue($name ,$password,$time);
          //Cookie::make($name ,$password,$time);
            //$responsqueuee = new Response('Hello World');
          //  $response->withCookie(cookie('loginpassword',$password, 250,"/"));
            //$response->withCookie(cookie('loginemail',$email, 250,"/"));
          return redirect()->to('/')->WithCookie(Cookie('loginemail',$email, 250))->WithCookie(Cookie('loginpassword',$password, 250))->WithCookie(Cookie('rememberme',1, 250));
        }
        else {
          //dd(Cookie());
          //$cookie1 = Cookie()->forget('loginemail');
          //$cookie2 = \Cookie::forget('loginpassword');
          //$cookie3 = \Cookie::forget('loginpassword');
          return redirect()->to('/');//->withCookie(Cookie::forget($cookie1));
        }

      }
        else {  //dd('invalid');
            return redirect()->to('login')->with('warning',"invalid email id & password");
        }

    }

    //  protected function logout()
    // {//dd('working');
    //   Auth::user()->logout();
    //    return redirect()->to('login');
    //
    //  }





    // /**
    //  * Get a validator for an incoming registration request.
    //  *
    //  * @param  array  $data
    //  * @return \Illuminate\Contracts\Validation\Validator
    //  */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|max:255',
    //         'email' => 'required|email|max:255|unique:users',
    //         'password' => 'required|confirmed|min:6',
    //     ]);
    // }
    //
    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return User
    //  */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }
}
