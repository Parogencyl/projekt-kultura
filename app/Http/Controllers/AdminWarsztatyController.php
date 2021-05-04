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
        $text1 = $request->input('text');
        $czySprzedawac = $request->input('czy_sprzedawac');
        $price = $request->input('price');
        $id = $request->input('id');

        if ($czySprzedawac == null) {
            $czySprzedawac = 0;
        }else {
            $czySprzedawac = 1;
        }

        $warsztat = DB::table('warsztaty')->where('id', $id)->first();
        
        $name = $warsztat->nazwa;
        
        if (DB::table('warsztaty')->where('id', $id)->update(['text' => $text1, 'czy_sprzedac' => $czySprzedawac, 'cena' => $price])) {
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
        $text1 = $request->input('text');
        $czySprzedawac = $request->input('czy_sprzedawac');
        $name = $request->input('name');
        $price = $request->input('price');

        if ($czySprzedawac == null) {
            $czySprzedawac = 0;
        }else {
            $czySprzedawac = 1;
        }
        
        if (DB::table('warsztaty')->insert(['nazwa' => $name, 'text' => $text1, 'czy_sprzedac' => $czySprzedawac, 'cena' => $price])) {
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
