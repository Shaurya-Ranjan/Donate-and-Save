<?php
$name=$_POST['name'];
$purpose=$_POST['purpose'];
$email=$_POST['email'];
$amount=$_POST['amount'];

include 'instamojo/Instamojo.php';


$api=new Instamojo\Instamojo('test_2acdfa8023aea8e046035344eda','test_2b782a2c5182499631bce790592', 'https://test.instamojo.com/api/1.1/');
try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $amount,
        "send_email" => true,
        "email" => $email,
        "buyer_name"=> $name,
        "phone"=> $phone,
        "send_sms"=> false,
        "allow_repeated_payments"=> false,
        "redirect_url" => "http://savelives1.epizy.com/codes/"
        //"webhook"=> 
        ));
   // print_r($response);
   $pay_url=$response['longurl'];
   header("location:$pay_url");
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}




?>
