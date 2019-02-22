<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;
use Mail;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
  private $user;

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('guest');

    }

    public function forgotPassView()
    {
      return view('auth.forgotPassword');

    }
    public function passwordReset()
    {		$data = [
			'id' => Input::get('id'),
			'password' => Input::get('password'),
			'password_confirmation' => Input::get('password_confirmation'),
			'password_reset_code' => Input::get('password_reset_code')
		];
    //dd($data);
		$v = Validator::make($data, [
			'id' => 'required|exists:users,id',
			'password' => 'required',
			'password_confirmation' => 'required|same:password',
			'password_reset_code' => 'required|exists:users,password_reset_code,id,' . Input::get('id')
		]);

		if ($v->fails()) {	// validation error
			return redirect('forgot-password/' . $data['id'] . '/' . $data['password_reset_code'])
				->withErrors($v)
				->withInput();
		}
		else {	// no validation error
			$user = User::where('id', $data['id'])->update(['password' => Hash::make($data['password']), "password_reset_code" => null]);



			return redirect('login')->with('flash_info', 'Password has been updated.');
		}
	}




    public function postForgotPassword($id,$token){
      $user = DB::table('users')->where('id',$id)->where('password_reset_code',$token)->get();
      //dd($user);

      if($user){
      //  dd($user);
                  return redirect()->to('password-reset/'.$id.'/'.$token );
      }
      return redirect()->to('login')->with('warning',"your token is invalid");
    }

    public function passresetview($id,$token)
    { //dd($id);
      //dd($token);
      return view('auth.passwordReset')->With(array('id' =>$id ,'password_reset_code' =>$token));

    }

    public function forgotPassword()
    {
      $email = Input::get('email');
      //dd($email);
      $user = DB::table('users')->where('email', $email)->first();
      //dd($user);
	//	$user = $this->user->findByEmail($email);
      if ($user) {	// user found
        $password_reset_code = str_random(40);
        $emailData = [
          'id' => $user->id,
          'name' => $user->name,
          'email' => $email,
          'password_reset_code' => $password_reset_code
        ];
        //dd($emailData);
    // $user = $this->user->find($user->id);
			  $user->password_reset_code = $password_reset_code;
			//$user->update();
        DB::table('users')->where('email', $email)->update(['password_reset_code' => $password_reset_code]);

			/* Send out the Password Reset Code */
			  Mail::send('email.forgot-password', $emailData, function($mailer) use ($emailData) {
			       	$mailer->to($emailData['email'], $emailData['name'])
						->subject('Admin Password Reset Instructions')
            ->sender('pratik.korade@tacto.in');
			     });
        return redirect()->to('forgot-password')->with('success',"We sent activation code. Please check your mail.");
      }
      else{
        return back()->with('warning',"This email id not exist.");
      }
    }


}
