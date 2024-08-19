<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\UserAddress;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController extends Controller
{
    public function registerAccountSave(Request $request)
    {

        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'address'  => 'required|string|max:255',
        ]);

        $user = User::create([
            'name'     => $validatedData['name'],
            'email'    => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'address'  => $validatedData['address'],
        ]);

        return redirect('/login')->with('success', 'Registration successful!');
    }

    public function login()
    {



        if (auth()->check()) {
            return redirect()->route('dashboard');
        }

        return view('frontend.user.login');
    }














    public function loginData(Request $request)
    {






        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);


        $loginType = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';


        $credentials = [
            $loginType => $request->input('login'),
            'password' => $request->input('password'),
        ];


        if (Auth::attempt($credentials)) {

            // if (Auth::check()) {
            //     $userId    = Auth::user()->id;
            //     dd( $userId  );

            // }
            return redirect()->route('dashboard');


        } else {
            return back()->withErrors(['login' => 'Invalid credentials']);
        }
    }



    public function registerAccount()
    {
        return view('frontend.user.registerAccount');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Google Auth login page
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function authGoogle(Request $request): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Google Auth Login Callback
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function authGoogleCallback(Request $request): RedirectResponse
    {
        try {
            $user     = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
            } else {
                $newUser = User::create([
                    'name'      => $user->name,
                    'email'     => $user->email,
                    'google_id' => $user->id,
                    'password'  => bcrypt('123456'),
                ]);
                Auth::login($newUser);
            }

            return redirect()->intended('dashboard');
        } catch (Exception $e) {
            return redirect()->route('login');
        }
    }

    public function updatePassword(Request $request)
    {

        // dd($request);

        if ($request->old_password && !Auth::user()->provider_id && !Hash::check($request->old_password, Auth::user()->password)) {
            // Toastr::error('Your old password is wrong');
            return back();
        }

        if ($request->new_password != $request->confirm_password) {
            // Toastr::error('Password did not match');
            return back();
        }

        DB::table('users')->where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        // Toastr::success('Password Changed Successfully');
        return back();
    }
}
