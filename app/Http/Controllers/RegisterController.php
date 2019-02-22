<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Mail;
use App\User;
use DB;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('user.index',compact('users'));

    }




    /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return IlluminateContractsValidationValidator
    */
   protected function validator(array $data)
   {
       return Validator::make($data, [
           'name' => 'required|max:255',
           'email' => 'required|email|max:255|unique:users',
           'password' => 'required|min:6|confirmed',
           'address' => 'required',
           'number' => 'required|numeric',
           'gender' => 'required',
           'dob'=>'required|date',

       ]);
   }

   /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return User
    */
   protected function create(array $data)
   {
       return User::create([
           'name' => $data['name'],
           'email' => $data['email'],
           'password' =>  Hash::make($data['password']),
           'verify_token' => str::random(30),
           'is_active'=>0,
           'address' => $data['address'],
           'number' => $data['number'],
           'gender' => $data['gender'],
           'dob'=>$data['dob'],
         ]);
   }
   public function register(Request $request) {

     $input = $request->all();
     $validator = $this->validator($input);
     //dd($input);
     if ($validator->passes()){
       $user = $this->create($input)->toArray();
       //$user['verify_token'] = str::random(30);

      // DB::table('users')->insert(['verify_token'=>str::random(30)]);
      //dd($user);
       Mail::send('email.activation', $user, function($message) use ($user){
         $message->to($user['email']);
         $message->subject('Activation Code');
         $message->sender('pratik.korade@tacto.in');
       });
       return redirect()->to('login')->with('success',"We sent activation code. Please check your mail.");
     }
     return back()->with('errors',$validator->errors());
   }


   public function userActivation($token){
     $check = DB::table('users')->where('verify_token',$token)->first();
     if(!is_null($check)){
       $user = User::find($check->id);
       if ($user->is_active ==1){
         return redirect()->to('login')->with('success',"user are already actived.");

       }
       $user->update(['is_active' => 1]);
       //DB::table('users')->where('verify_token',$token);
       return redirect()->to('login')->with('success',"user active successfully.");
     }
     return redirect()->to('login')->with('warning',"your token is invalid");
   }



    public function regView()
    {
      return view('auth.register');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {  $user = DB::table('users')->where('id',$id)->first();
      //dd($user);
      return view ('user.show',compact('user'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(User $user)
    //
    // {
    //
    //      return view ('index')->With(array('users' =>$users));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $user = DB::table('users')->where('id',$id)->first();
              return view ('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
      // $input = $request->all();
      // $validator = $this->validator($input);
      $data = Input::only('name', 'email', 'dob', 'address',
              'number', 'gender');
      //dd($data);
      $user = User::where('id', $id)->update(["name" => $data['name'],'email'=>$data['email'],'dob'=>$data['dob'],'address'=>$data['address']]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      $user->delete();
      return redirect("/user");
    }
}
