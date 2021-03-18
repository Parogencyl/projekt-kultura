<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, File, Storage;

class AdminZespolyController extends Controller
{
    public function editZespoly(Request $request){

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

        $zespol = DB::table('zespoly')->where('id', $id)->first();
        
        $name = $zespol->nazwa;
        
        if ($zespol->title1 != $title1 || $zespol->title2 != $title2 || $zespol->title3 != $title3 || $zespol->text1 != $text1 || $zespol->text2 != $text2 || $zespol->text3 != $text3) {
            if (DB::table('zespoly')->where('id', $id)->update(['title1' => $title1, 'title2' => $title2, 'title3' => $title3, 'text1' => $text1, 'text2' => $text2, 'text3' => $text3])) {
                if ($fileName != null) {
                    $nameImage1 = $name."_1.png";
                    Storage::disk('public-graphics')->putFileAs('/zespoly', $fileName, $nameImage1);
                }
                if ($fileName2 != null) {
                    $nameImage2 = $name."_2.png";
                    Storage::disk('public-graphics')->putFileAs('/zespoly', $fileName2, $nameImage2);
                }
                if ($fileName3 != null) {
                    $nameImage3 = $name."_3.png";
                    Storage::disk('public-graphics')->putFileAs('/zespoly', $fileName3, $nameImage3);
                }
                if ($fileName4 != null) {
                    $nameImage4 = $name."_4.png";
                    Storage::disk('public-graphics')->putFileAs('/zespoly', $fileName4, $nameImage4);
                }
                return redirect('/admin/zespoly')->with('success', 'Zespół został zedytowany.');
            } else {
                return back()->with('error', 'Nie udało się zedytować zespołu.')->withInput();
            }
        } else { 
            if ($fileName != null) {
                $nameImage1 = $name."_1.png";
                Storage::disk('public-graphics')->putFileAs('/zespoly', $fileName, $nameImage1);
            }
            if ($fileName2 != null) {
                $nameImage2 = $name."_2.png";
                Storage::disk('public-graphics')->putFileAs('/zespoly', $fileName2, $nameImage2);
            }
            if ($fileName3 != null) {
                $nameImage3 = $name."_3.png";
                Storage::disk('public-graphics')->putFileAs('/zespoly', $fileName3, $nameImage3);
            }
            if ($fileName4 != null) {
                $nameImage4 = $name."_4.png";
                Storage::disk('public-graphics')->putFileAs('/zespoly', $fileName4, $nameImage4);
            }
            return redirect('/admin/zespoly')->with('success', 'Zespół został zedytowany.');
        }
        
        return back()->with('error', 'Nie udało się edytować zespołu.')->withInput();
        break;

        case 'delete':
            $id = $request->input('id');
            $zespol = DB::table('zespoly')->where('id', $id)->first();
            $name = $zespol->nazwa;
            
            if(DB::table('zespoly')->where('id', $id)->delete()){
                File::delete(public_path('/graphics/zespoly/'.$name.'_1.png'));
                File::delete(public_path('/graphics/zespoly/'.$name.'_2.png'));
                File::delete(public_path('/graphics/zespoly/'.$name.'_3.png'));
                File::delete(public_path('/graphics/zespoly/'.$name.'_4.png'));
                return redirect('/admin/zespoly')->with('success', 'Zespół został usunięty.');
            }else {
                return redirect('/admin/zespoly')->with('success', 'Zespół został usunięty, lecz bez obrazu.');
            }
            return back()->with('error', 'Nie udało się usunąć zespołu.');

            break;
        } 
    }

    public function addZespoly(Request $request){

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
        
        if (DB::table('zespoly')->insert(['nazwa' => $name, 'title1' => $title1, 'title2' => $title2, 'title3' => $title3, 'text1' => $text1, 'text2' => $text2, 'text3' => $text3])) {
            if ($fileName != null) {
                $nameImage1 = $name."_1.png";
                Storage::disk('public-graphics')->putFileAs('/zespoly', $fileName, $nameImage1);
            }
            if ($fileName2 != null) {
                $nameImage2 = $name."_2.png";
                Storage::disk('public-graphics')->putFileAs('/zespoly', $fileName2, $nameImage2);
            }
            if ($fileName3 != null) {
                $nameImage3 = $name."_3.png";
                Storage::disk('public-graphics')->putFileAs('/zespoly', $fileName3, $nameImage3);
            }
            if ($fileName4 != null) {
                $nameImage4 = $name."_4.png";
                Storage::disk('public-graphics')->putFileAs('/zespoly', $fileName4, $nameImage4);
            }
            return redirect('/admin/zespoly')->with('success', 'Zespol został dodany.');
        } else {
            return back()->with('error', 'Nie udało się dodać zespolu.')->withInput();
        }
    }
}
