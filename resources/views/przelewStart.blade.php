<?php
 
    // ob_start();
    
session_start();
 
use App\Http\Controllers\PrzelewyController;
 
$oPrzelewy24_API = new PrzelewyController();

    $email = "bohun19081997@gmail.com";
 
        // Powrotny adres URL
$p24_url_return = 'https://www.projekt-kultura.pl/przelew/';
 
        // Adres dla weryfikacji płatności
$p24_url_status = 'https://www.projekt-kultura.pl/przelew/';

$oPrzelewy24_API->Verify($_POST);
 
if(isset($_GET['submit'])){
    	  // Kwota do zapłaty musi być pomnożona razy 100.
        // Czyli, jeżeli użytkownik ma zapłacić 499 złotych, to kwota do zapłaty
        // to 499 * 100 (wyrażona w groszach)
	$redirect = $oPrzelewy24_API->Pay($_GET['p24_amount'], "Zamówienie: ".$_GET['p24_order_id'], $email, $p24_url_return, $p24_url_status);
	$_SESSION['test'] = $oPrzelewy24_API->Verify($_POST);
	Header('Location: ' . $redirect); exit;
}