<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function view_register()
    {
        return view('auth.register');
    }

    public function view_login()
    {
        return view('auth.login');
    }


    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'gender' => 'required',
            'instagram_username' => 'required',
            'hobby' => 'required|array|min:3',
            'mobile_number' => 'required',
        ]);

        $hobby = implode(',', (array) $request->input('hobby'));

        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'gender' => $validateData['gender'],
            'instagram_username' => $validateData['instagram_username'],
            'hobby' => $hobby,
            'mobile_number' => $validateData['mobile_number'],
            'register_fee' => rand(100000, 125000),
        ]);

        Auth::login($user);

        return redirect('/login');
    }

    public function payment(Request $request)
    {
        $user = Auth::user();
        $price = $user->register_fee;

        return view('auth.payment', compact('price'));
    }

    public function update_paid(Request $request)
    {
        $validatedData = $request->validate([
            'payment_amount' => 'required|numeric|min:0',
            'price' => 'required|numeric',
        ]);

        $payment_amount = $validatedData['payment_amount'];
        $price = $validatedData['price'];
        $difference = $payment_amount - $price;

        $user = Auth::user();

        if ($difference < 0) {
            return redirect()->back()->with('error', 'You are still underpaid $' . number_format(-$difference, 2));
        } elseif ($difference > 0) {
            return redirect()->route('handle_overpayment', [
                'amount' => $difference,
                'payment_amount' => $payment_amount,
                'price' => $price
            ]);
        } else {
            $user->has_paid = true;
            $user->save();
            return redirect()->back()->with('success', 'Payment successful!');
        }
    }

    public function handle_overpayment(Request $request)
    {
        $amount = $request->input('amount');
        $payment_amount = $request->input('payment_amount');
        $price = $request->input('price');

        return view('auth.over_payment', [
            'amount' => $amount,
            'payment_amount' => $payment_amount,
            'price' => $price
        ]);
    }

    public function process_overpayment(Request $request)
    {
        $action = $request->input('action');
        $paymen_amount = $request->input('payment_amount');
        $price = $request->input('price');
        $user = Auth::user();

        if ($action === 'accept') {
            $amount = $request->input('amount');
            $user->wallet += $amount;
            $user->has_paid = true;
            $user->save();


            return redirect()->route('user.index')->with('success', 'The excess amount has been added to your wallet.');
        } else {
            return redirect()->route('payment')->with('error', 'Please enter the correct payment amount.');
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);

            return redirect()->route('user.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
