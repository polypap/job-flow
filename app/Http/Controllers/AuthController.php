<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetMail;
use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Show the login form
     */
    public function login(Request $request) {
        return view('auth.login');
    }

    /**
     * Show the registration form
     */
    public function register(Request $request) {
        return view('auth.register');
    }

    /**
     * Show the Forgot Account form
     */
    public function forgotPassword (Request $request) {
        return view('auth.forgot');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|max:50|min:3',
            'email'=> 'unique:users|required',
            'password' => 'required_with:confirmpassword|same:confirmpassword|min:7',
            'confirmpassword' => 'min:7'
        ]);

        $user = new User();
        $user->name = $validatedData ['name'];
        $user->email = $validatedData ['email'];
        $user->password = Hash::make($validatedData ['password']);
        $user->remember_token = Str::random(40);

        $user->save();

        //send email
        Mail::to($user->email)->send(new RegisterMail($user));

        return redirect()->route('login')->with('success', 'Your account has been successfuly created. A verification has been sent to ' . $user->email . '. You must verify your account before loging in.');
    }

    public function verifyAccount($token) {
        //grab the user
        $user = User::where('remember_token', $token)->first();

        if(!empty($user)) {
            $user->email_verified_at = date('Y-m-d H:i:s');
            //update the user token
            $user->remember_token = Str::random(40);
            //save the user
            $user->save();
            //take the user to the login Screen
            return redirect()->route('login')->with('success', 'Your Account Has Been Successfuly Verified');
        } else {
            abort(404);
        }
    }

    /**
     * Attempt to login a user
     */
    public function authenticate(Request $request) {
        $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);

        $credentials = $request->only('email','password');
        $remember = $request->filled('remember');
        
        //attempt to login
        if(Auth::attempt($credentials,$remember)) {
            //check if the user has been verified
            if(!empty(auth()->user()->email_verified_at)) {
                //take the user to the dashboard
                return redirect()->route('dashboard');
            } else {
                //save the current user IF
                $user_id = auth()->user()->id;
                //logout the user
                Auth::logout();

                //Update the user's token
                $user = User::getSingleByID($user_id);
                $user->remember_token = Str::random(40);
                $user->save();

                //send a new email to verify the user account
                Mail::to($user->email)->send(new RegisterMail($user));

                //take the user back to login screen
                return redirect()->route('login')->with('error', 'Your account has been verified yet. A new verification link has been sent to '. $user->email);
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

     /**
     * Display a listing of the resource.
     */
    public function processForgot(Request $request) {
        $validatedData = $request->validate([
            'email' => 'email|required'
        ]);

        //find the user with the giver email
        $user = User::where('email', $validatedData['email'])->first();

        //if the user is found then send a reset link to the user, else the user does not exist
        if(!empty($user)) {
            //reset the current user token
            $user->remember_token = Str::random(40);
            $user->save();

            //send reset link to the user's email
            Mail::to($user->email)->Send(new PasswordResetMail($user));

            //redirect the user back to home with a message that a password reset link was sent
            return redirect()->back()->with('success', 'A reset link has been sent to '. $user->email);

        } else {
            return redirect()->back()->with('error', 'There is no account assoicated to this email');
        }
    }

    /**
     * Display the reset password view
     */
    public function resetPassword($token) {
        $user = User::where('remember_token', $token)->first();
        if(!empty($user)){
            return view('auth.reset_password',['user'=> $user]);
        } else {
            abort(404);
        }
    }

    public function processResetPassword($token, Request $request) {
        $validatedData = $request->validate([
            'password' => 'required_with:confirmpassword|same:confirmpassword|min:7',
            'confirmpassword' => 'min:7'
        ]);

        $user = User::where('remember_token','=', $token)->first();

        //if the user is found proceed with restting the password and update the token
        if(!empty($user)) {
            $user->password = Hash::make($validatedData['password']);
            $user->remember_token = Str::random(40);

            $user->save();

            //Take the user to the login screen with a message
            return redirect()->route('login')->with('success', 'Your password has been successfully updated. You can now login');
        } else {
            abort(404);
        }
    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        //take user to home
        return redirect()->route('home');
    }
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

   
}
