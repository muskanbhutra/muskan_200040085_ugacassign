<?php
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
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $sql="INSERT INTO student
  VALUES ('$name', '$pwd');";

  if (mysqli_query($con,$sql)) {
      echo "Registration successful";
      
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }

  mysqli_close($con);
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
  <h2 style="font-size:5vw">SIGN UP</h2>
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
</div>
<?php
echo "<h2>Username: </h2>";
echo $name;
?>



</body>
</html>
