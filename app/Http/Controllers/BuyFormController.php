<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BuyFormRequest;
use DB;
use App\Http\Controllers\PrzelewyController;

class BuyFormController extends Controller
{
    public function validation(BuyFormRequest $request){
        $validated = $request->validated();
        if($validated){
            $name_of_course = $request->input('name_of_course');
            $price = $request->input('price');
            $email = $request->input('email');
            $name = $request->input('name');
            $surname = $request->input('surname');
            $phone = $request->input('phone');
            $wariant = $request->input('wariant');
            $czyFaktura = $request->input('faktura');
            $company = $request->input('company');
            $nip = $request->input('nip');
            $street = $request->input('street');
            $numberOfFlat = $request->input('numberOfFlat');
            $city = $request->input('city');
            $zip = $request->input('zip');

            $company_info = null;

            if ($czyFaktura == 'faktura') {
                if ($street == null || $numberOfFlat == null || $zip == null || $city == null) {
                    return back()->with('error', 'Należy wypełnić wszystkie pola do wystawienia faktury.')->withInput();
                }else {
                    $company_info = $street.' '.$numberOfFlat.' | '.$zip.' '.$city;
                }
            }else {
                $czyFaktura = 'Brak'; 
            }

            $all_orders = DB::table("kupione")->orderBy('id', 'DESC')->first();
            if ($all_orders == null) {
                $all_orders = 0;
            } else {
                $all_orders = substr($all_orders->numer_zamowienia, 0, -1);
            }
            
            $order_number = '';
            $all_orders += 1;
            for ($i=0; $i < 6-(strlen($all_orders)); $i++) { 
                $order_number .= '0';
            }
            $order_number .= $all_orders;
            $order_number .= 'K';

            $_POST['p24_session_id'] = uniqid();
            $_POST['p24_order_id'] = $order_number;

            if(DB::table('kupione')->insert(['numer_zamowienia' => $order_number, 'kurs' => $name_of_course, 'wariant' => $wariant, 'email' => $email,
            'osoba' => $name.' '.$surname, 'telefon' => $phone, 'potwierdzenie_platnosci' => $czyFaktura, 'firma' => $company, 'nip' => $nip, 
            'dane_firmy' => $company_info, 'czy_zaplacono' => 'Nie', 'cena' => $price, 'id_sesji' => $_POST['p24_session_id']])){

            $oPrzelewy24_API = new PrzelewyController();

                    // Powrotny adres URL
            $p24_url_return = 'https://www.projekt-kultura.pl/';
            
                // Adres dla weryfikacji płatności
            $p24_url_status = 'https://www.projekt-kultura.pl/przelew/weryfikacja/kurs';

            $pay = $oPrzelewy24_API->Verify($_POST);

            if($pay){
                $redirect = $oPrzelewy24_API->Pay($_POST['p24_amount'], $order_number, $email, $p24_url_return, $p24_url_status, $_POST['p24_session_id']);
                Header('Location: ' . $redirect); exit;
            }

            return redirect('/')->with('success', 'Dziękujemy za zakup kursu.');
            //return redirect('/')->with('success', 'Dziękujemy za zakup kursu. Więcej informacji znajduje się w mailu wysłanym pod adres wskazany podczas zakupu.');
            }
            return back()->with('erorr', 'Coś poszło nie tak, sprawdź wprowadzone dane.')->withInput();



        }else {
            return back()->withInput();
        }
    }


    public function validationWarsztaty(BuyFormRequest $request){
        $validated = $request->validated();
        if($validated){
            $name_of_warsztat = $request->input('name_of_warsztat');
            $price = $request->input('price');
            $email = $request->input('email');
            $name = $request->input('name');
            $surname = $request->input('surname');
            $phone = $request->input('phone');

            $all_orders = DB::table("kupione_warsztaty")->orderBy('id', 'DESC')->first();
            if ($all_orders == null) {
                $all_orders = 0;
            } else {
                $all_orders = substr($all_orders->numer_zamowienia, 0, -1);
            }
            
            $order_number = '';
            $all_orders += 1;
            for ($i=0; $i < 6-(strlen($all_orders)); $i++) { 
                $order_number .= '0';
            }
            $order_number .= $all_orders;
            $order_number .= 'W';

            $oPrzelewy24_API = new PrzelewyController();

                    // Powrotny adres URL
            $p24_url_return = 'https://www.projekt-kultura.pl/';
            
                // Adres dla weryfikacji płatności
            $p24_url_status = 'https://www.projekt-kultura.pl/przelew/weryfikacja/warsztat';

            $_POST['p24_session_id'] = uniqid();
            $_POST['p24_order_id'] = $order_number;

            $pay = $oPrzelewy24_API->Verify($_POST);
            
            if(DB::table('kupione_warsztaty')->insert(['numer_zamowienia' => $order_number, 'warsztat' => $name_of_warsztat, 'email' => $email,
            'osoba' => $name.' '.$surname, 'telefon' => $phone, 'czy_zaplacono' => 'Nie', 'cena' => $price, 'id_sesji' => $_POST['p24_session_id']])){
                
                session(['name' => $name, 'email' => $email, 'name_of_warsztat' => $name_of_warsztat, 'order_number' => $order_number,]);
                
                if($pay){
                    // Kwota do zapłaty musi być pomnożona razy 100.
                    // Czyli, jeżeli użytkownik ma zapłacić 499 złotych, to kwota do zapłaty
                    // to 499 * 100 (wyrażona w groszach)
                    $redirect = $oPrzelewy24_API->Pay($_POST['p24_amount'], $order_number, $email, $p24_url_return, $p24_url_status, $_POST['p24_session_id']);
                    Header('Location: ' . $redirect); exit;
                }
                
            return redirect('/')->with('success', "Dziękujemy za zakup warsztatu $name_of_warsztat.");
            }
            return back()->with('erorr', 'Coś poszło nie tak, sprawdź wprowadzone dane.')->withInput();


        }else {
            return back()->with('erorr', 'Wprowadzone dane są niepoprawne.')->withInput();
        }
    }
}




 /*   
            $to = $email;

            $subject = 'Dziękujemy za zakup kursu.';

            $message = '
            <html>
            <head>
            <title>Dziękujemy za zakup kursu '.$name_of_course.'</title>
            </head>
            <body style="font-size: 17px">
            <div>
            <img src="https://www.projekt-kultura.pl/graphics/projekt-kultura-baner.png" alt="logo" width="60%" style="margin-left:20%">
            </div>
            <p>Witaj, otrzymaliśmy Twoje zamówienie na kurs '.$name_of_course.' - za co bardzo dziękujemy. </p>
            <p> Poniżej znajdują się informacje dotyczące Twojego zamówienia. </p>
            <p> <b> Numer zamówienia:</b> '.$order_number.'</p>
            <p> <b> Nazwa kursu:</b> '.$name_of_course.'</p>
            <p> <b> Zawartość zakupionego kursu:</b> '.$wariantText.'</p>
            <p> Kolejne wskazówki oraz klucz dostępu do kursu zostanie przesłany w osobnej wiadomości email, po potwierdzeniu płatności. </p>
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

            mail($to, $subject, $message, implode("\r\n", $headers));
*/