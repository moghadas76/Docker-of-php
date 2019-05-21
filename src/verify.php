<?php

$MerchantID = 'e6483c86-5834-11e9-9303-000c29344814';
$Amount = 1000; //Amount will be based on Toman
$Authority = $_GET['Authority'];

if ($_GET['Status'] == 'OK') {

$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentVerification(
[
'MerchantID' => $MerchantID,
'Authority' => $Authority,
'Amount' => $Amount,
]
);

if ($result->Status == 100) {
echo 'Transaction success. RefID:'.$result->RefID;
} else {
echo 'Transaction failed. Status:'.$result->Status;
}
} else {
echo 'Transaction canceled by user';
}