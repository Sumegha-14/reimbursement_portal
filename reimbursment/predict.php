<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
<style>
    .button1 {
  background-color: #4CAF50; 
  color: white; 
  border: 2px solid #4CAF50;
  height:65px;
  width:13%;
}

.button1:hover {
  background-color:white ;
  color: #4CAF50;
}

    </style>
        

</head>
<body>
<div class="w3-container">
  <h2 ><center>Symptoms and Prediction</center></h2>
<form>
  <table class="w3-table-all w3-centered" align="center" border=1>
        <tr>
            <th>Symptoms</th>
            <th>Response<br>(Enter 0 for no or 1 for yes)</th>
            <!--<th><input type="text" id="response"></th>-->
        </tr>
        <tr>
            <td>Itching</td>
            <td><input type="text" id="response1"></td>
        </tr>
        
        <tr>
            <td>skin_rash</td>
            <td><input type="text" id="response2"></td>
        </tr>
        <tr>
            <td>Chills</td>
            <td><input type="text" id="response3"></td>
        </tr>
        <tr>
            <td>Joint_pain</td>
            <td><input type="text" id="response4"></td>
        </tr>
        <tr>
            <td>Voimiting</td>
            <td><input type="text" id="response5"></td>
        </tr>
        <tr>
            <td>Fatigue</td>
            <td><input type="text" id="response6"></td>
        </tr>
        <tr>
            <td>Weight loss</td>
            <td><input type="text" id="response7"></td>
        </tr>
        <tr>
            <td>Lethargy</td>
            <td><input type="text" id="response8"></td>
        </tr>
        <tr>
            <td>Cough</td>
            <td><input type="text" id="response9"></td>
        </tr>
        <tr>
            <td>High fever</td>
            <td><input type="text" id="response10"></td>
        </tr>
        <tr>
            <td>Breathlessness</td>
            <td><input type="text" id="response11"></td>
        </tr>
        <tr>
            <td>Sweating</td>
            <td><input type="text" id="response12"></td>
        </tr>
        <tr>
            <td>Headache</td>
            <td><input type="text" id="response13"></td>
        </tr>
        <tr>
            <td>Yellowish Skin</td>
            <td><input type="text" id="response14"></td>
        </tr>
        <tr>
            <td>Dark Urine</td>
            <td><input type="text" id="response15"></td>
        </tr>
        <tr>
            <td>Nausea</td>
            <td><input type="text" id="response16"></td>
        </tr>
        <tr>
            <td>Loss of apetite</td>
            <td><input type="text" id="response17"></td>
        </tr>
        <tr>
            <td>Abdominal pain</td>
            <td><input type="text" id="response18"></td>
        </tr>
        <tr>
            <td>Dairrhoea</td>
            <td><input type="text" id="response19"></td>
        </tr>
        <tr>
            <td>Yellowing of eyes</td>
            <td><input type="text" id="response20"></td>
        </tr>
        <tr>
            <td>Restlessness</td>
            <td><input type="text" id="response21"></td>
        </tr>
        <tr>
            <td>Chest_pain</td>
            <td><input type="text" id="response22"></td>
        </tr>
        <tr>
            <td>Excessive Hunger</td>
            <td><input type="text" id="response23"></td>
        </tr>
        <tr>
            <td>Irritatibility</td>
            <td><input type="text" id="response24"></td>
        </tr>
        <tr>
            <td>Muscle pain</td>
            <td><input type="text" id="response25"></td>
        </tr>
        </table>
</form>
<center><button class="button1" id="click1" onclick="myFunction()" >Predict</button></center>
<script>
    function myFunction(){
    let arr=[];
    for(let i=1;i<=25;i++)
    {
        arr.push(parseInt(document.getElementById(`response${i}`).value))
    }
    obj=JSON.stringify({symptoms:arr})
    console.log(obj)

   
    jQuery.ajax({
          url:"http://127.0.0.1:12345/predict" ,
          type: "POST",
          data: obj,
          dataType: "text",
          contentType:"application/json",
          //'allowedOrigins' => ['localhost:1018'],
          success: function(result) {
 	      alert(result);
          },
          error: function(xhr,status,error){
              console.log(error)
          }
});
   
    }

</script>
</body>
</html>
