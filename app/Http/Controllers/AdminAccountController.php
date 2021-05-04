<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class AdminAccountController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make(request()->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:25', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Wprowadzone dane nie spełniają wymagań.")->withInput();
        }

        if(User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ])){
            return redirect('/admin');
        }
    }

    public function login(Request $request){
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8|max:25',
            ]);
            if ($validator->fails()) {
                return back()->with('error', 'Błędne dane.')->withInput();
            }
            
            if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect('admin');
            } else {
                return back()->with('error', 'Błędne dane.')->withInput();
            }
        }

        public function logout(Request $request){
            Auth::logout();
            
            $request->session()->invalidate();
            
            $request->session()->regenerateToken();
            
            return redirect('/admin');
        }
        
        public function resetPassword(Request $request){
            $email = $request->input('email');
            $password = $request->input('password');
            $passwordConfirm = $request->input('password_confirmation');

            if ($password != $passwordConfirm) {
                return back()->with('error', 'Podane hasła się nie zgadzają.');
            }

            if(DB::table('users')->where('email', $email)->update(['password' => Hash::make($request->input('password'))])){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                return redirect('/admin');
            } else {
                return back()->with('error', 'Coś poszło nie tak.')->withInput();
            }

        }
    
}
    