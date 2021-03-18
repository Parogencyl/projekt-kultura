<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KursyController extends Controller
{
    public function goToKurs(Request $request)
    {
       $key = $request->input('key');

       $check = DB::table('klucze')->where('klucz', $key)->first();

       if($check){
           if(strtotime($check->utworzone) > strtotime('-10 day')){
               session()->put('kurs', $check);
               return redirect('/szkolenia/kurs');
           }else {
               if(session()->get('kurs')){
                    session()->forget('kurs');
               }
               return back()->with('error', 'Podany klucz stracił ważność');
           }
       }else{
           if(session()->get('kurs')){
                session()->forget('kurs');
           }
           return back()->with('error', 'Niepoprawny klucz');
       }

    }
}
