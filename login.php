<?php
session_start();
require_once "config.php";
$name=$pwd="";
$name_err=$pwd_err="";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if (empty($_POST["uname"])) {
        $name_err="Name is required";
      }
        else {
        $name=test_input($_POST["uname"]);
      }
        if (empty($_POST["pwd"])) {
        $pwd_err="Password is required";
      }
        else {
        $pwd=test_input($_POST["pwd"]);
      }    
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
   $sql = "select * from student where username = '$name' and password = '$pwd'";  
          $result = mysqli_query($con, $sql);  
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
          $count = mysqli_num_rows($result);  
            
          if($count == 1){  
              echo "<h1><center> Login successful </center></h1>";  
              session_start();
              $_SESSION["name"]=$name;
              header("location: welcome.php");
          }  
          else{  
              echo "<h1> Login failed. Invalid username or password.</h1>";  
          }     
  ?>
  <!DOCTYPE html>
<html>
<head>
<title>LogIn Page</title>
<meta charset="UTF-8">
<style>
* {
  box-sizing: border-box;
}

.login {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
  background-color: lightgray;
  text-align: center;
}

input[type=text], input[type=password] {
width: 50%;
padding: 16px 32px;
margin: 4px 0px;
font-size: 1vw;
text-align: center;
}

#pwd1 {
margin: 20px 0px;
}

input[type=submit] {
background-color: green;
border: none;
border-radius: 16px;
padding: 16px 32px;
margin: 20px 0px;
width: 50%;
cursor: pointer;
color: white;
font-size: 1vw;
}

input[type=submit]:focus {
background-color: lightgreen;
}

.error {
color: red;
}

</style>
</head>

<body>




<div class="login">
  <h2 style="font-size:5vw">LOG IN</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="uname" style="font-size:2vw"><strong>Username</strong></label><br>
  <input type="text" id="uname" name="uname" placeholder="Firstname Lastname" value="<?php echo $name;?>"><br>
  <span class="error"><?php echo $name_err;?></span>
  <br><br>
  <label for="pwd" style="font-size:2vw" id="pwd1"><strong>Password</strong></label><br>
  <input type="password" id="pwd" name="pwd"><br>
  <span class="error"><?php echo $pwd_err;?></span>
  <br><br>
  <a href="welcome.php" target="_blank"><input type="submit" value="Submit"></a>
  </form>
  <p>Don't have an account?<a href="register.php" target="_blank"> Sign Up</a></p>
</div>



</body>
</html>
