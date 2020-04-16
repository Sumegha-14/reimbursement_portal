<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <meta charset="utf-8">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="main.js"></script>
</head>
<body style="background-color: black;">
    <br><br>
    <div id="contact">
        <div class="main">
      <div class="main-inner">
        <div class="container">
          <div class="row">
            <div class="span12">
              <div class="heads">
        <h1>Accessories</h1></div>
          <!--<a href="/departments/add" class="btn btn-small btn-primary"><i class="btn-icon-only icon-ok"></i>Add Department</a>-->
          <br><br>
          <table class="table table-striped table-bordered">
            <thead>
              <tr style="color: white;">
                <th> Item ID </th>
                <th>  Name </th>
               <th>View</th>
               
              </tr>
            </thead>
            <tbody>
            <!--?
              foreach ($departments as $dept) {
                // $emp->username
            ?>-->
            <form method="post" action="list.php">
              <tr style="color: black;">
                <td> 1 </td>
                <td> Mobiles </td>

              <td>
               <!-- <button type="submit" name="product" value="1">Go</button>-->
               <input type="submit" name="mobile">
              </td>
              </tr>
            </form>
            <form method="post" action=list.php>
              <form method="post" action="list.php">
            <tr style="color: white;">
                <td> 2 </td>
                <td> Laptop </td>
                   <td> <input type="submit" name="laptop" style="color:black;"></td>
              </tr>
              </form>
              <form method="post" action=list.php>
              <tr style="color: black;">
                <td> 3</td>
                <td> Refrigerator </td>
                   <td> <input type="submit" name="refg"></td>
              </tr>
            </form>
             <form method="post" action=list.php>
              <tr style="color: white;">
                <td> 4 </td>
                <td> Ipad </td>
                   <td> <input type="submit" name="ipad"style="color:black;"></td>
              </tr>
            </form>
            </tbody>
          </table>
    
        </div>
        </div>
      </div>
      </div>
    </div>
      </div>
      
    
</body>
</html>