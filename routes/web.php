<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/szkolenia', function () {
    return view('szkolenia');
});
Route::get('/warsztaty', function () {
    return view('warsztaty');
});
Route::get('/warsztaty/{nazwa}', function () {
    return view('warsztaty-opis');
});
Route::get('/zespoly', function () {
    return view('zespoly');
});
Route::get('/zespoly/{nazwa}', function () {
    return view('zespoly-opis');
});
Route::get('/poznaj-nas', function () {
    return view('poznaj_nas');
});
Route::get('/regulamin', function () {
    return view('regulamin');
});
Route::get('/szkolenia/kurs', function () {
    if(session()->get('kurs')){
        return view('kurs');
    } else {
        return redirect('/szkolenia');
    }
});

Route::get('/zakup/{nazwa}', function () {
    return view('zakup');
});

Route::get('/warsztaty/zakup/{nazwa}', function () {
    return view('zakupWarsztat');
});

Route::post('/przelew/weryfikacja/warsztat', [App\Http\Controllers\PrzelewyController::class, 'verifyPaymentWarsztat']);
Route::post('/przelew/weryfikacja/kurs', [App\Http\Controllers\PrzelewyController::class, 'verifyPaymentKurs']);

Route::post('/zakup/sprawdzenie', [App\Http\Controllers\BuyFormController::class, 'validation']);
Route::post('/warsztaty/zakup/sprawdzenie', [App\Http\Controllers\BuyFormController::class, 'validationWarsztaty']);

Route::post('/blog/blogPost', [App\Http\Controllers\AdminAktualnosciController::class, 'blogPost']);
Route::get('/blog/{tutul}', function () {
    return view('post');
});

Route::post('/szkolenia/checkKey', [App\Http\Controllers\KursyController::class, 'goToKurs']);
Route::post('/szkolenia/generate', [App\Http\Controllers\KursyController::class, 'generateKey']);


Auth::routes();

Route::get('/admin', function () {
    if(Auth::id()){
        return view('admin/index');
    }else{
        return view('auth/login');
    }
})->name('admin');

Route::get('/admin/rejestracja', function () {
    return view('auth/register');
});

Route::get('/admin/resetuj_haslo', function () {
    return view('auth/passwords/reset');
})->middleware('auth');
Route::post('/admin/resetuj_haslo', [App\Http\Controllers\AdminAccountController::class, 'resetPassword']);

Route::get('/admin/szkolenia', function () {
    return view('admin/szkolenia');
})->middleware('auth');

Route::get('/admin/warsztaty', function () {
    return view('admin/warsztaty');
})->middleware('auth');

Route::get('/admin/zespoly', function () {
    return view('admin/zespoly');
})->middleware('auth');

Route::get('/admin/zamowienia', function () {
    return view('admin/zamowienia');
})->middleware('auth');

Route::get('/admin/zamowienia/warsztaty', function () {
    return view('admin/zamowieniaWarsztaty');
})->middleware('auth');

Route::get('/admin/zamowienia/kursy', function () {
    return view('admin/zamowieniaKursy');
})->middleware('auth');

Route::get('/admin/dodaj_post', function () {
    return view('admin/dodaj_post');
})->middleware('auth');

Route::get('/admin/blog/{tytul}', function () {
    return view('admin/manage_post');
})->middleware('auth');

Route::get('/admin/edytuj_kurs/{nazwa}', function () {
    return view('admin/edytuj_kurs');
})->middleware('auth');

Route::get('/admin/dodaj_kurs', function () {
    return view('admin/dodaj_kurs');
})->middleware('auth');

Route::get('/admin/warsztaty/{nazwa}', function () {
    return view('admin/edytuj_warsztat');
})->middleware('auth');

Route::get('/admin/dodaj_warsztat', function () {
    return view('admin/dodaj_warsztat');
})->middleware('auth');

Route::get('/admin/zespoly/{nazwa}', function () {
    return view('admin/edytuj_zespol');
})->middleware('auth');

Route::get('/admin/dodaj_zespol', function () {
    return view('admin/dodaj_zespol');
})->middleware('auth');

Route::get('/admin/kurs/{nazwa}', function () {
    return view('admin/kurs');
})->middleware('auth');

Route::post('/admin/rejestracja/register', [App\Http\Controllers\AdminAccountController::class, 'create']);
Route::post('/admin/login', [App\Http\Controllers\AdminAccountController::class, 'login']);
Route::post('/admin/logout', [App\Http\Controllers\AdminAccountController::class, 'logout']);
Route::post('/admin/addBaner', [App\Http\Controllers\AdminAktualnosciController::class, 'addBaner']);
Route::post('/admin/deleteBaner', [App\Http\Controllers\AdminAktualnosciController::class, 'deleteBaner']);
Route::post('/admin/addPost', [App\Http\Controllers\AdminAktualnosciController::class, 'addPost']);
Route::post('/admin/goToPost', [App\Http\Controllers\AdminAktualnosciController::class, 'goToPost']);
Route::post('/admin/editPost', [App\Http\Controllers\AdminAktualnosciController::class, 'editPost']);
Route::post('/admin/addVideo', [App\Http\Controllers\AdminSzkoleniaController::class, 'addVideo']);
Route::post('/admin/deleteVideo', [App\Http\Controllers\AdminSzkoleniaController::class, 'deleteVideo']);
Route::post('/admin/edytuj_kurs', [App\Http\Controllers\AdminSzkoleniaController::class, 'editKurs']);
Route::post('/admin/dodaj_kurs', [App\Http\Controllers\AdminSzkoleniaController::class, 'addKurs']);
Route::post('/admin/edytuj_warsztat', [App\Http\Controllers\AdminWarsztatyController::class, 'editWarsztaty']);
Route::post('/admin/dodaj_warsztat', [App\Http\Controllers\AdminWarsztatyController::class, 'addWarsztaty']);
Route::post('/admin/edytuj_zespol', [App\Http\Controllers\AdminZespolyController::class, 'editZespoly']);
Route::post('/admin/dodaj_zespol', [App\Http\Controllers\AdminZespolyController::class, 'addZespoly']);
Route::post('/admin/dodaj_film', [App\Http\Controllers\AdminSzkoleniaController::class, 'addMainVideo']);
Route::post('/admin/generateKey', [App\Http\Controllers\KursyController::class, 'generateKey']);


Route::get('mail/send', [App\Http\Controllers\MailController::class, 'send']);


