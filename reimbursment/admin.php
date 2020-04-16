<?php
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: sumeghasawa@gmail.com' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" type="text/css" media="screen" href="main.css" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        var i;
        var s1=" ";
        $.ajax({url:"http://localhost/devsoc_api/api/payment/read.php", success:function(result){
            //console.log(result.data[0].id);
            //console.log(result.data.length);
            for( i=0;i<result.data.length;i++){
                 s1 = s1 + (result.data[i].id)+", " ;
                 console.log(result.data[i].id);
                 }
            $("#div1").html(s1);
            //call[i]=result.data[i].id;
            //console.log(s1);
            }
        
        });
        
    });

</script>
<!--script>
var mysql      = require('sql');
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
password : '',
  database : 'devvsoc'
});

connection.connect();
connection.query('SELECT * from transaction ', function(err, rows, fields) {
  if (!err)
    console.log('The solution is: ', rows);
  else
    console.log('Error while performing Query.');
});

connection.end();
/*
$qy=mysqli_query($db2,$sql2);
$res=mysqli_fetch_assoc($qy);
$dat=$res['date_1'];
//echo $dat;
  $tday=date("Y-m-d");
  $pdate2=strtotime($dat);
  $tdate2=strtotime($tday);
  
  $diff=abs($tdate2-$pdate2);
  $years = floor($diff / (365*60*60*24));  
  
  
// To get the month, subtract it with years and 
// divide the resultant date into 
// total seconds in a month (30*60*60*24) 
$months = floor(($diff - $years * 365*60*60*24) 
                               / (30*60*60*24));  
  
  
// To get the day, subtract it with years and  
// months and divide the resultant date into 
// total seconds in a days (60*60*24) 
$days = floor(($diff - $years * 365*60*60*24 -  
             $months*30*60*60*24)/ (60*60*24));
             echo $days; */
</script>-->
</head>
<body>
<form method="post" action="admin.php">
    <div id="div1"></div><br>
    Enter the same value as above:<br>
<input type="text" id="text" name="call2" />
<input type="submit" name="call1">
</form>

<?php
if(isset($_POST['call1'])){
$ttid=$_POST['call2'];
$db = mysqli_connect('localhost', 'root', '', 'devvsoc');
$db2= mysqli_connect('localhost', 'root', '', 'payment_portal');
$sql="SELECT * FROM transaction WHERE tid= '$ttid'";
$query1=mysqli_query($db,$sql);
if($query1){
$result1=mysqli_fetch_assoc($query1);
$amt=$result1['return_1'];
$dat=$result1['date_1'];
//echo $dat;
  $tday=date("Y-m-d");
  $pdate2=strtotime($dat);
  $tdate2=strtotime($tday);
  
  $diff=abs($tdate2-$pdate2);
  $years = floor($diff / (365*60*60*24));  
  
  
// To get the month, subtract it with years and 
// divide the resultant date into 
// total seconds in a month (30*60*60*24) 
$months = floor(($diff - $years * 365*60*60*24) 
                               / (30*60*60*24));  
  
  
// To get the day, subtract it with years and  
// months and divide the resultant date into 
// total seconds in a days (60*60*24) 
$days = floor(($diff - $years * 365*60*60*24 -  
             $months*30*60*60*24)/ (60*60*24));
            
if($amt==0 && ($years>=0 && $months>=1 && $days>=0)){

  $empid=$result1['employee_id'];
  $sqemail="SELECT * FROM users where employeeid='$empid'";
  $sqres=mysqli_query($db,$sqemail);
  $resmail=mysqli_fetch_assoc($sqres);
  $mail=$resmail['email'];
$msg='Dear user, your reimbursment is successfull';
$mailsuc=mail($mail,'Reimbursment', $msg,$headers);
if($mailsuc){
    echo "Mail is sent to the employee";
$dq1="delete from payment1 where id='$ttid'";
$dq2=mysqli_query($db2,$dq1);
if($dq2){
echo "<br>Removed from payments";
}
else{
echo "Not removed from payments";
}
$usql="UPDATE transaction set return_1=True where tid='$ttid'";
$uq=mysqli_query($db,$usql);

}
else{
    echo "Mail not sent, error in sendmail";
}
}
else{
    if($amt==1){
        echo " No reimbursment";
    }
    if($amt==0){
      
echo "Not been more than 30 days yet. No reimbursment";
    }

}
}
else
echo "There is some error";
}
?>
</body>
</html>
