<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/payment.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
$payment=new payment($db);

$result = $payment->read();

$num = $result->rowCount();


if($num>0){
    $payment_arr=array();
    $payment_arr['data']=array();

    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $payment_item=array(
            'id'=>$id,
            'amount'=>$amount
        );
        array_push($payment_arr['data'],$payment_item);
   }
   echo json_encode($payment_arr);
}
else
{
    echo json_encode(
        array('message'=>'No Payment Found')
    );

}

