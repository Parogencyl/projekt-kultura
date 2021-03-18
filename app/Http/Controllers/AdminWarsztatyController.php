<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Storage, File;

class AdminWarsztatyController extends Controller
{
    public function editWarsztaty(Request $request){

        switch($request->input('submit')){
            case 'submit':

        $fileName = $request->file('zdjecie1');
        $fileName2 = $request->file('zdjecie2');
        $fileName3 = $request->file('zdjecie3');
        $fileName4 = $request->file('zdjecie4');
        $title1 = $request->input('title1');
        $title2 = $request->input('title2');
        $title3 = $request->input('title3');
        $text1 = $request->input('text1');
        $text2 = $request->input('text2');
        $text3 = $request->input('text3');
        $id = $request->input('id');

        $warsztat = DB::table('warsztaty')->where('id', $id)->first();
        
        $name = $warsztat->nazwa;
        
        if ($warsztat->title1 != $title1 || $warsztat->title2 != $title2 || $warsztat->title3 != $title3 || $warsztat->text1 != $text1 || $warsztat->text2 != $text2 || $warsztat->text3 != $text3) {
            if (DB::table('warsztaty')->where('id', $id)->update(['title1' => $title1, 'title2' => $title2, 'title3' => $title3, 'text1' => $text1, 'text2' => $text2, 'text3' => $text3])) {
                if ($fileName != null) {
                    $nameImage1 = $name."_1.png";
                    Storage::disk('public-graphics')->putFileAs('/warsztaty', $fileName, $nameImage1);
                }
                if ($fileName2 != null) {
                    $nameImage2 = $name."_2.png";
                    Storage::disk('public-graphics')->putFileAs('/warsztaty', $fileName2, $nameImage2);
                }
                if ($fileName3 != null) {
                    $nameImage3 = $name."_3.png";
                    Storage::disk('public-graphics')->putFileAs('/warsztaty', $fileName3, $nameImage3);
                }
                if ($fileName4 != null) {
                    $nameImage4 = $name."_4.png";
                    Storage::disk('public-graphics')->putFileAs('/warsztaty', $fileName4, $nameImage4);
                }
                return redirect('/admin/warsztaty')->with('success', 'Warsztat został zedytowany.');
            } else {
                return back()->with('error', 'Nie udało się zedytować warsztatu.')->withInput();
            }
        } else { 
            if ($fileName != null) {
                $nameImage1 = $name."_1.png";
                Storage::disk('public-graphics')->putFileAs('/warsztaty', $fileName, $nameImage1);
            }
            if ($fileName2 != null) {
                $nameImage2 = $name."_2.png";
                Storage::disk('public-graphics')->putFileAs('/warsztaty', $fileName2, $nameImage2);
            }
            if ($fileName3 != null) {
                $nameImage3 = $name."_3.png";
                Storage::disk('public-graphics')->putFileAs('/warsztaty', $fileName3, $nameImage3);
            }
            if ($fileName4 != null) {
                $nameImage4 = $name."_4.png";
                Storage::disk('public-graphics')->putFileAs('/warsztaty', $fileName4, $nameImage4);
            }
            return redirect('/admin/warsztaty')->with('success', 'Warsztat został zedytowany.');
        }
        
        return back()->with('error', 'Nie udało się edytować warsztatu.')->withInput();
        break;

        case 'delete':
            $id = $request->input('id');
            $warsztat = DB::table('warsztaty')->where('id', $id)->first();
            $name = $warsztat->nazwa;
            
            if(DB::table('warsztaty')->where('id', $id)->delete()){
                File::delete(public_path('/graphics/warsztaty/'.$name.'_1.png'));
                File::delete(public_path('/graphics/warsztaty/'.$name.'_2.png'));
                File::delete(public_path('/graphics/warsztaty/'.$name.'_3.png'));
                File::delete(public_path('/graphics/warsztaty/'.$name.'_4.png'));
                return redirect('/admin/warsztaty')->with('success', 'Warsztat został usunięty.');
            }else {
                return redirect('/admin/warsztaty')->with('success', 'Warsztat został usunięty, lecz bez obrazu.');
            }
            return back()->with('error', 'Nie udało się usunąć Warsztatu.');

            break;
        } 
    }

    public function addWarsztaty(Request $request){

        $fileName = $request->file('zdjecie1');
        $fileName2 = $request->file('zdjecie2');
        $fileName3 = $request->file('zdjecie3');
        $fileName4 = $request->file('zdjecie4');
        $title1 = $request->input('title1');
        $title2 = $request->input('title2');
        $title3 = $request->input('title3');
        $text1 = $request->input('text1');
        $text2 = $request->input('text2');
        $text3 = $request->input('text3');
        $name = $request->input('name');
        
        if (DB::table('warsztaty')->insert(['nazwa' => $name, 'title1' => $title1, 'title2' => $title2, 'title3' => $title3, 'text1' => $text1, 'text2' => $text2, 'text3' => $text3])) {
            if ($fileName != null) {
                $nameImage1 = $name."_1.png";
                Storage::disk('public-graphics')->putFileAs('/warsztaty', $fileName, $nameImage1);
            }
            if ($fileName2 != null) {
                $nameImage2 = $name."_2.png";
                Storage::disk('public-graphics')->putFileAs('/warsztaty', $fileName2, $nameImage2);
            }
            if ($fileName3 != null) {
                $nameImage3 = $name."_3.png";
                Storage::disk('public-graphics')->putFileAs('/warsztaty', $fileName3, $nameImage3);
            }
            if ($fileName4 != null) {
                $nameImage4 = $name."_4.png";
                Storage::disk('public-graphics')->putFileAs('/warsztaty', $fileName4, $nameImage4);
            }
            return redirect('/admin/warsztaty')->with('success', 'Warsztat został dodany.');
        } else {
            return back()->with('error', 'Nie udało się dodać warsztatu.')->withInput();
        }
    }
}
