<?php
$db = mysqli_connect('localhost', 'root', '', 'payment_portal');
 $today=date("m-d-Y");
        echo "You are applying for reimbursement on " . $today. "<br>";
        if(isset($_POST['submit'])){
            $tid=$_POST['Transaction'];
            $amount=$_POST['Amount'];
            echo "<br>";
            echo "Your claim with transaction id - $tid is applied for reimbursement";
            echo"<br>";
            echo "The amount to be paid back is - $amount <br>";
$sql="INSERT INTO payment1(id,amount) VALUES('$tid','$amount')";
$quer=mysqli_query($db,$sql);
if($quer)
{
    echo "Succcess";
}
else{
echo "not updated";
}
        }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Apply</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
    <div class = "row">
        <div class = "col-12">
        <form method="POST" action="Apply.php">
            <table >
                <tr>
            <td> Transaction id:</td>
            <td> <input type = "text" name = "Transaction" class = " " required></td></tr>
            <tr> <td>Amount:</td>
            <td> <input type = "text" name = "Amount" class = " " required></td></tr>
      
            </table>
            <button type = "submit" name = "submit" class = " " >Apply</button><br> 
        </form>
    </div>
    </div>
        <script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.dropotron.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
</body>
</html> 

