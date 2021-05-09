<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome Page</title>
<style>
a:link, a:visited {
  background-color: green;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  float: right;
  clear: both;
}

a:hover, a:active {
  background-color: lightgreen;
}
</style>
</head>

<body>
<div class="logout">
<a href="logout.php">Sign Out</a>
</div>
<h1>Welcome, <span><?php echo htmlspecialchars($_SESSION["name"]); ?></span></h1>
</body>
</html>