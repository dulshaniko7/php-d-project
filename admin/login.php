<?php
include "./includes/autoload.php";
session_start();


if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $_SESSION['username']= $username;

$login_result = User::verify_user($username,$password);
$res = mysqli_fetch_assoc($login_result);

if($res){


    header("Location: index.php");
    echo "ok";
}
else{
    echo "error";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h3>Login</h3>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label for="username">Username: </label>
    <input type="text" name="username"><br>
    <label for="password">Password: </label>
    <input type="password" name="password"><br>
    <br>

    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>