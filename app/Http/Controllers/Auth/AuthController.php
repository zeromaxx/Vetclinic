<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Mail;

use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function process_register(Request $request)
    {
        $validation = [
            'unique' => 'Το όνομα χρήστη υπάρχει ήδη.',
            'min' => 'Το ΑΦΜ πρέπει να είναι τουλάχιστον 9 αριθμούς.',
            'max' => 'Το ΑΦΜ πρέπει να είναι μέχρι 9 αριθμούς.',
            'email.unique' => 'Το email υπάρχει ήδη.',
            'afm.unique' => 'Το ΑΦΜ υπάρχει ήδη.',
        ];

        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'afm' => 'required|min:9|max:9|unique:users'
        ], $validation);


        $username = $request->input('username');
        $email = $request->input('email');
        $name = $request->input('name');
        $afm = $request->input('afm');
        $phone = $request->input('phone');
        $surname = $request->input('surname');
        $fullname = $surname . ' ' . $name;

        $user = User::create([
            'username' => $username,
            'password' => Hash::make($request->input('password')),
            'afm' => $afm,
            'telephone' => $phone,
            'fullname' => $fullname,
            'email' => $email,
            'role' => 'customer'
        ]);

        if (!empty($user)) {
            $request->session()->flash('success_msg', 'Ο λογαριασμός δημιουργήθηκε με επιτυχία !');
            return redirect()->route('login');
        }
        return redirect()->route('auth.register');
    }

    public function process_login(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];
        $validator = Validator::make($request->except(['_token']), $rules);
        if ($validator->fails()) {
            return Redirect::to('login')->withErrors($validator);
        }

        $username = trim($request->input('username'));
        $password = trim($request->input('password'));

        $credentials = [
            'username' => $username,
            'password' => $password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            $request->session()->flash('error_msg', 'Λάθος στοιχεία εισόδου.');
            return redirect()->back();
        }
    }

    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $validation = [
            'email' => 'Το email  δεν είναι σωστό.',
            'exists' => 'Το email  δεν υπάρχει.',

        ];

        $request->validate([
            'email' => 'required|email|exists:users',
        ], $validation);

        $token = Str::random(64);
        PasswordReset::insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'Σας έχει σταλεί ο σύνδεσμος για την αλλαγή του κωδικού σας στο email σας');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $validation = [
            'exists' => 'Το email δεν είναι σωστό',
            'min' => 'Ο κωδικός πρέπει να είναι τουλάχιστον 6 χαρακτήρες.',
            'confirmed' => 'Η επαλήθευση του κωδικού δεν ταιριάζει.',
            'email' => 'Το email πρέπει να είναι έγκυρη διεύθυνση.',
        ];

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ], $validation);

        $updatePassword = PasswordReset::where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
        PasswordReset::where(['email' => $request->email])->delete();

        return redirect('/login')->with('message', 'Ο κωδικός σας άλλαξε με επιτυχία!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function quickLogin(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->intended('/');
        }

        return redirect()->back()->with('error', 'Quick login failed.');
    }
}
