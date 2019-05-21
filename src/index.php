<?php

$MerchantID = 'e6483c86-5834-11e9-9303-000c29344814'; //Required
$Amount = 1000; //Amount will be based on Toman - Required
$Description = 'Testing payment'; // Required
$Email = 's.m.moghadas2012@gmail.com'; // Optional
$Mobile = '09375088328'; // Optional
$CallbackURL = 'localhost/verify.php'; // Required


$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentRequest(
[
'MerchantID' => $MerchantID,
'Amount' => $Amount,
'Description' => $Description,
'Email' => $Email,
'Mobile' => $Mobile,
'CallbackURL' => $CallbackURL,
]
);

//Redirect to URL You can do it also by creating a form
if ($result->Status == 100) {
Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
//برای استفاده از زرین گیت باید ادرس به صورت زیر تغییر کند:
//Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority.'/ZarinGate');
} else {
echo'ERR: '.$result->Status;
}