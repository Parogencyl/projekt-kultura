<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use DB;

class AdminAktualnosciController extends Controller
{
    public function addBaner(Request $request){
        
        $fileName = $request->file('baner');
        $number = $request->input('el');

        $name = "baner".$number.".jpg";

        if(Storage::disk('public-graphics')->putFileAs('/baners', $fileName, $name)){
            return back()->with('success', 'Udało się dodać nowe zdjęcie.');
        } else {
            return back()->with('error', 'Nie udało się dodać nowego zdjęcia');
        }

    }

    public function deleteBaner(Request $request){
        
        $number = $request->input('file');

        $name = "/graphics/baners/baner".$number.".jpg";

        //dd($number);

        if(File::exists(public_path('graphics/baners/baner'.$number.'.jpg'))){
            if(File::delete(public_path('graphics/baners/baner'.$number.'.jpg'))){
                return back()->with('success', 'Udało się usunąć zdjęcie numer '.$number);
            } else {
                return back()->with('error', 'Nie udało się usunąć zdjęcia numer '.$number);
            }
        } else {
            return back()->with('error', 'Nie ma takiego pliku.');
        }
    }

    public function goToPost(Request $request){
        return redirect('/admin/blog'.'/'.$request->input('title'));
    }

    public function blogPost(Request $request){
        return redirect('/blog'.'/'.$request->input('title'));
    }
    
    public function addPost(Request $request){

        $fileName = $request->file('image');
        $title = $request->input('title');
        $short = $request->input('short');
        $long = $request->input('long');

        //dd(pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME));

        $name = $title.".jpg";

        if(Storage::disk('public-graphics')->putFileAs('/posts', $fileName, $name)){
            if (DB::table('blog')->insert(['tytul' => $title, 'skrocony_tekst' => $short, 'pelny_tekst' => $long])) {
                return redirect('/admin')->with('success', 'Post został dodany.');
            } else {
                return back()->with('error', 'Nie udało się zapisać postu.')->withInput();
            }
            return back()->with('error', 'Nie udało się wgrać zdjęcia.')->withInput();
        }

        return back()->with('error', 'Nie udało się dodać postu.')->withInput();
    }

    public function editPost(Request $request){

        $fileName = $request->file('image');
        $title = $request->input('title');
        $short = $request->input('short');
        $long = $request->input('long');
        $id = $request->input('id');

        $post = DB::table('blog')->where('id', $id)->first();
        
        if ($post->tytul != $title || $post->skrocony_tekst != $short || $post->pelny_tekst != $long) {
            if (DB::table('blog')->where('id', $id)->update(['tytul' => $title, 'skrocony_tekst' => $short, 'pelny_tekst' => $long])) {
                return redirect('/admin')->with('success', 'Post został zedytowany.');
            } else {
                return back()->with('error', 'Nie udało się zedytować postu.')->withInput();
            }
        } else {
            if ($fileName != null) {
                $name = $title.".jpg";
                Storage::disk('public-graphics')->putFileAs('/posts', $fileName, $name);
                return redirect('/admin')->with('success', 'Post został zedytowany.');
            }else{
                return back()->with('error', 'Nie wprowadzono żadnych zmian.')->withInput();
            }
        }
        
        return back()->with('error', 'Nie udało się zmienić zawartości postu.')->withInput();
    }
}
