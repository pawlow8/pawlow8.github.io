
<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['phone']) and !empty($_POST['message'])){
    $email_odbiorcy = 'kontakt@przeprowadzki.com.pl'; 
    $header = 'Reply-To: <'.$_POST['email']."> \r\n";  
    $header .= "MIME-Version: 1.0 \r\n";  
    $header .= "Content-Type: text/html; charset=UTF-8";  
    $wiadomosc = "<p>Dostałeś wiadomość od:</p>"; 
    $wiadomosc .= "<p>Imie i nazwisko: " . $_POST['name'] . "</p>"; 
    $wiadomosc .= "<p>Email: " . $_POST['email'] . "</p>";
    $wiadomosc .= "<p>Telefon: " . $_POST['phone'] . "</p>";
    $wiadomosc .= "<p>Przeprowadzka z: " . $_POST['warszawa'] . "</p>";
    $wiadomosc .= "<p>Piętro: " . $_POST['pietro'] . "</p>";
    $wiadomosc .= "<p>Winda: " . $_POST['winda1'] . "</p>";
    $wiadomosc .= "<p>Przeprowadzka z: " . $_POST['do'] . "</p>";
    $wiadomosc .= "<p>Piętro: " . $_POST['do-pietro'] . "</p>";
    $wiadomosc .= "<p>Winda: " . $_POST['winda2'] . "</p>";
    $wiadomosc .= "<p>Planowana data: " . $_POST['data'] . "</p>";
    $wiadomosc .= "<p>Przeprowadzka: " . $_POST['przeprowadzka'] . "</p>";
    $wiadomosc .= "<p>Pakowanie(puste = brak): " . $_POST['pakowanie'] . "</p>";
    $wiadomosc .= "<p>Magazynowanie(puste = brak): " . $_POST['magazynowanie'] . "</p>";

    $message = '<!doctype html><html lang="pl"><head><meta charset="utf-8">'.$wiadomosc.'</head><body><script id="__bs_script__">//<![CDATA[
    document.write("<script async src='/browser-sync/browser-sync-client.js?v=2.23.6'><\/script>".replace("HOST", location.hostname));
//]]></script>
';
    $subject = 'Wiadomość ze strony...';
    $subject = '=?utf-8?B?'.base64_encode($subject).'?=';
    if(mail($email_odbiorcy , $subject, $message, $header)){ 
        die('Wiadomość została wysłana');
    }else{ 
      die('Wiadomość nie została wysłana'); 
    }
  }
?>