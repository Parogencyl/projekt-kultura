<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Storage;
use DB;
use Validator;

class AdminSzkoleniaController extends Controller
{
    public function addVideo(Request $request){
        $fileName = $request->file('promo');
        $name = "szkoleniaReklama.mp4";

        if(Storage::disk('public-graphics')->putFileAs('', $fileName, $name)){
            return back()->with('success', 'Film został dodany.');
        }
        return back()->with('error', 'Film nie został dodany.');
    }

    public function deleteVideo(Request $request){
        if(File::delete(public_path('graphics/szkoleniaReklama.mp4'))){
            return back()->with('success', 'Film został usunięty.');
        }
        return back()->with('error', 'Film nie został usunięty.');
    }

    public function editKurs(Request $request){

        switch($request->input('submit')){
            case 'submit':

        $fileName = $request->file('videoZwiastun');
        $time = $request->input('laczny_czas');
        $price = $request->input('price');
        $price2 = $request->input('price2');
        $price3 = $request->input('price3');
        $wariant1 = $request->input('wariant1');
        $wariant2 = $request->input('wariant2');
        $wariant3 = $request->input('wariant3');
        $learn = $request->input('learn');
        $id = $request->input('id');

        $kurs = DB::table('kursy')->where('id', $id)->first();
        
        $name = $kurs->nazwa;
        
        if ($kurs->laczny_czas != $time || $kurs->cena != $price || $kurs->cena2 != $price2 || $kurs->cena3 != $price3 || $kurs->czego_sie_nauczysz != $learn || $kurs->wariant1 != $wariant1  || $kurs->wariant2 != $wariant2 || $kurs->wariant3 != $wariant3) {
            if (DB::table('kursy')->where('id', $id)->update(['laczny_czas' => $time, 'cena' => $price, 'cena2' => $price2, 'cena3' => $price3, 'czego_sie_nauczysz' => $learn, 'wariant1' => $wariant1, 'wariant2' => $wariant2, 'wariant3' => $wariant3])) {
                if ($fileName != null) {
                    $nameVideo = $name."_zwiastun.mp4";
                    Storage::disk('public-graphics')->putFileAs('/kursy', $fileName, $nameVideo);
                }
                return redirect('/admin/szkolenia')->with('success', 'Kurs został zedytowany.');
            } else {
                return back()->with('error', 'Nie udało się zedytować kursu.')->withInput();
            }
        } else {
            if ($fileName != null) {
                $nameVideo = $name."_zwiastun.mp4";
                Storage::disk('public-graphics')->putFileAs('/kursy', $fileName, $nameVideo);
                return redirect('/admin/szkolenia')->with('success', 'Kurs został zedytowany.');
            }
            return back()->with('error', 'Nie udało się zmienić zawartości kursu.')->withInput();
        }
        
        return back()->with('error', 'Nie udało się edytować kursu.')->withInput();
        break;

        case 'delete':
            $id = $request->input('id');
            $name = $request->input('nameOfCourse');
            
            DB::table('klucze')->where('kurs', $id)->delete();
            if(DB::table('kursy')->where('id', $id)->delete()){
                if (File::delete(public_path('/graphics/kursy/'.$name.'_zwiastun.mp4'))) {
                    File::delete(public_path('/graphics/kursy/'.$name.'.mp4'));
                    return redirect('/admin/szkolenia')->with('success', 'Kurs został usunięty.');
                }else {
                    return redirect('/admin/szkolenia')->with('success', 'Kurs został usunięty, lecz bez filmu.');
                }
            }
            return back()->with('error', 'Nie udało się usunąć kursu.');

            break;
        } 
    }

    public function addKurs(Request $request){

        $validator = Validator::make(request()->all(), [
            'price' => ['required', 'numeric'],
            'price2' => ['required', 'numeric'],
            'price3' => ['required', 'numeric'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Wprowadzone dane nie spełniają wymagań (Pamiętaj grosze mają być podane po . (kropce).")->withInput();
        }

        $fileName = $request->file('videoZwiastun');
        $name = $request->input('name');
        $time = $request->input('laczny_czas');
        $price = $request->input('price');
        $price2 = $request->input('price2');
        $price3 = $request->input('price3');
        $wariant1 = $request->input('wariant1');
        $wariant2 = $request->input('wariant2');
        $wariant3 = $request->input('wariant3');
        $learn = $request->input('learn');

        $nameZwiastun = $name."_zwiastun.mp4";

        if(Storage::disk('public-graphics')->putFileAs('/kursy', $fileName, $nameZwiastun)){
            if (DB::table('kursy')->insert(['nazwa' => $name, 'laczny_czas' => $time, 'cena' => $price, 'cena2' => $price2, 'cena3' => $price3, 'czego_sie_nauczysz' => $learn, 'wariant1' => $wariant1, 'wariant2' => $wariant2, 'wariant3' => $wariant3])) {
                return redirect('/admin/szkolenia')->with('success', 'Kurs został dodany.');
            } else {
                return back()->with('error', 'Nie udało się zapisać kursu.')->withInput();
            }
        }else {
            return back()->with('error', 'Nie udało się wgrać filmu.')->withInput();
        }
        return back()->with('error', 'Nie udało się dodać kursu.')->withInput();
    }

    public function addMainVideo(Request $request){
        $fileName = $request->file('video');
        $nameVideo = $request->input('name').".mp4";

        if(Storage::disk('public-graphics')->putFileAs('/kursy', $fileName, $nameVideo)){
            return back()->with('success', 'Film został dodany.');
        }
        return back()->with('error', 'Film nie został dodany.');
    }

}
