<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Nishi php registration form</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <style>
         .error {
             color: #FF0000;
             }
         .output{
             color:white;
        font-size:20px;
        }
      </style>
   
</head>

<body>
    <?php


$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "practice" ;


         // define variables and set to empty values
         $nameErr = $emailErr = $genderErr = $websiteErr = $phoneErr= "";
         $name = $email = $gender = $phone =  $address = $birthdate  = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            
            if (empty($_POST["address"])) {
               $address = "";
            }else {
               $address = test_input($_POST["address"]);
            }
            
            if (empty($_POST["birthdate"])) {
                $birthdate = "";
             }else {
                $birthdate = test_input($_POST["birthdate"]);
             }

             if (empty($_POST["phone"])) {
                $phone = "";
             }else {
                $phone = test_input($_POST["phone"]);
                $valid= validate_num($phone);
                if($valid==false){
                    $phoneErr="phone no. is invalid";
                }
                else{
                    $phoneErr=" ";
                }
             }
            

          if (empty($_POST["gender"])) {
               $genderErr = "Gender is required";
            }else {
               $gender = test_input($_POST["gender"]);
            }
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

         function validate_num($phone) {
         
            
    if(preg_match("/^[6-9]{1}[0-9]{9}$/", $phone)) {
      $valid= true;
}
else{
    $valid=false;
}
return $valid;
         }

         //DATABASE CONNECTION
   $con = mysqli_connect($servername, $username , $password,$dbname) or   die("connection failed". mysqli_connect_error());

        $querry = "INSERT INTO test(name ,email,gender,phone, address, birthdate ) values ('$name' , '$email', '$gender' ,'$phone','$address','$birthdate' )";
         $result= mysqli_query($con, $querry) or die(mysqli_error($con));
         if($result)
         {   
             echo (1);
             
           }
                  
     
         mysqli_close($con);
      

     
      ?>
      
    <div class="page-wragtpper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST">
                        <div class="input-group">
                        <label class="input--style-3" for="name">Name</label>
                            <input class="input--style-3" type="text"  name="name" >
                        </div>
                        <div class="input-group">
                        <label class="input--style-3" for="name">Birthdate</label>
                       
                            <input class="input--style-3 js-datepicker" type="text"  name="birthdate">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                        </div>
                        <div class="input-group">
                        <label class="input--style-3" for="name">Gender</label>
                       
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="gender">
                                    <option disabled="disabled" selected="selected">Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">

                        <label class="input--style-3" for="name">Email</label>
                            <input class="input--style-3" type="text" name="email">
                            <span class = "error"> <?php echo $emailErr;?></span>
              
                        </div>
                        <div class="input-group">
                        <label class="input--style-3" for="name">Phone</label>
                        
                            <input class="input--style-3" type="text"  name="phone">
                            <span class = "error"> <?php echo $phoneErr;?></span>
              
                        </div>
                        <div class="input-group">
                        <label class="input--style-3" for="name">Address</label>

                            <input class="input--style-3" type="text" name="address">
                        </div>
                       
                        <div class="p-t-10">
                        
                            <button class="btn btn--pill btn--green" type="submit">Submit</button>
                        </div>
                        
                    </form>



                </div>
                <div class="card-heading"></div>
                
            </div>

<marquee></marquee>

<marquee></marquee>

<marquee></marquee>
            <div class="card card-3">
                <div class="card-body">
                    <h2 class="title"><center>Succesfully Data Inserted</center></h2>

                    <?php
                    if($emailErr==null){
         echo "<h2 color = white>Your given values are as:</h2>";

         echo "<p class='output'>" ."NAME:         ". $name . "</p>" ;
         echo "<br>";
         
         echo "<p class='output'>" . "EMAIL:       ".$email . "</p>" ;
         
         echo "<br>";
         
         //echo "<p class='output'>" ."BIRTHDATE:     ". $birthdate. "</p>";
         //echo "<br>";
         
         echo "<p class='output'>" ."PHONE:          ".$phone. "</p>";
         echo "<br>";
         
         echo "<p class='output'>" ."Address:          ".$address. "</p>";
         echo "<br>";
        
         echo "<p class='output'>"."GENDER :          ". $gender. "</p>";
        }
        else{
        
            echo "<p class='output'>"."Invalid Details"."</p>";        }
      ?>
   


                </div>
                
            </div>


        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
   

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
