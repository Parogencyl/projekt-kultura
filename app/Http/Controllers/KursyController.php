<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KursyController extends Controller
{
    public function goToKurs(Request $request)
    {
       $key = $request->input('key');
       $name_of_course = $request->input('name');

       $check = DB::table('klucze')->where('klucz', $key)->first();

       if($check){
           if ($check->kurs == $name_of_course) {
               if(strtotime($check->utworzone) > strtotime('-10 day')){
                   session()->put('kurs', $check);
                   return redirect('/szkolenia/kurs');
                }else {
                    if(session()->get('kurs')){
                        session()->forget('kurs');
                    }
                    return back()->with('error', 'Wprowadzony klucz stracił ważność.');
                }
            }else{
                if(session()->get('kurs')){
                    session()->forget('kurs');
                }
                return back()->with('error', 'Wprowadzony klucz jest niewłaściwy lub przypisany jest do innego Kursu.');
            }
        }else{
            return back()->with('error', 'Wprowadzony klucz jest niepoprawny.');
        }
    }

    public function generateKey(Request $request){

        $zamowienie = $request->input('zamowienie');

        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $key = implode($pass);

        $zakup = DB::table('kupione')->where('numer_zamowienia', $zamowienie)->first();


        if(DB::table('klucze')->insert(['osoba' => $zakup->osoba, 'email' => $zakup->email, 'kurs' => $zakup->kurs, 'wariant' => $zakup->wariant, 'klucz' => $key, 'zamowienie' => $zamowienie])){
            return redirect('/admin/zamowienia/kursy')->with('success', 'Klucz dla zamówienia '.$zamowienie.' został wygenerowany.');
        }else{
            return back()->with('error', 'Nie udało się wygenerować klucza.');
        }

        // Mail z kluczem
/*
        if ($wariant == 1) {
            $questions = '';
        }else if($wariant == 2){
            $questions = '<p> <b> W pakiecie "Odpowiedź na 3 dodatkowe pytania dotyczące Twojego wniosku" prosimy o przesłanie pytań na adres 
            stowarzyszenie.projektkultura@gmail.com . W wiadomości prosimy o podanie także numeru zamówienia oraz nazwy wykupionego kursu. </b> </p>';
        } else {
            $questions = '<p> <b> w pakiecie "Szczegółowa analiza Twojego wniosku" prosimy o przesłanie swojego wniosku na adres mailowy 
            stowarzyszenie.projektkultura@gmail.com . W wiadomości prosimy o podanie także numeru zamówienia oraz nazwy wykupionego kursu. </b> </p>';
        }

        $to = $email;

        $subject = 'Informacje do zamówienia '.$order_number;

        $message = '
        <html>
        <head>
        <title>Informacje do zamówienia '.$order_number.'</title>
        </head>
        <body style="font-size: 17px">
        <div>
        <img src="https://www.projekt-kultura.pl/graphics/projekt-kultura-baner.png" alt="logo" width="60%" style="margin-left:20%">
        </div>
        <p>Witaj, płatność za kurs '.$name_of_course.' została właśnie zarejestrowana - za co bardzo dziękujemy. </p>
        <p> Poniżej znajdują się informacje dotyczące Twojego zamówienia. </p>
        <p> <b> Numer zamówienia:</b> '.$order_number.'</p>
        <p> <b> Nazwa kursu:</b> '.$name_of_course.'</p>
        <p> <b> Zawartość zakupionego kursu:</b> '.$wariantText.'</p>
        <p style="font-size:19px"> <b> Klucz dostępu do kursu:</b> '.$key.'</p>
        <p> W celu przejścia do zakupionego kursu należy przejść do zakładaki <a href="https://www.projekt-kultura.pl/szkolenia">Szkolenia</a>, następnie przejść do kursu <b> '.$name_of_course.'</b>.
        Po wybraniu opcji "Więcej" znajduje się okienko "Przejdź do kursu", w którym należy wprowadzić wyżej otrzymany klucz umożliwiający dostęp do 
        zakupionego kursu przez 10 dni. </p>
        '.$questions.'
        <br>
        <hr>
        <p> Pozdrawiamy i zapraszamy do korzystania usług znajdujących się w naszym seriwsie <a href="https://www.projekt-kultura.pl/"> Projekt kultura</a>. </p> 
        <p> Wiadomość została wysłana automatycznie, prosimy nie odpowiadać na nią. </p> 
        <p> Dodatkowe pytania prosimy kierować pod adres mailowy stowarzyszenie.projektkultura@gmail.com.</p>
        <p> <b> Życzymy miłego dnia! </b> </p>
        <p> <b> Projekt kultura </b> </p>
        </body>
        </html>
        ';

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'To: '.$name.' <'.$email.'>';
        $headers[] = 'From: Projekt kultura <stowarzyszenie@projekt-kultura.pl>';

        if(mail($to, $subject, $message, implode("\r\n", $headers))){
            return redirect('/')->with('success', 'Płatność zaksięgowana, w wiadomości email został wysłany klucz dostepu.');
        }else {
            return redirect('/')->with('error', 'Nie udało się wysłac wiadomości email z kluczem.');
        }
*/

    }
}
