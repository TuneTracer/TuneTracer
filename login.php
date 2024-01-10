<?php
session_start(); 
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$name = validate($_POST['email']);
$pass = validate($_POST['pass']);
if (empty($name)) {
    echo "User Name is required";
    exit();
}else if(empty($pass)){
    echo "Password is required";
    exit();
}else{
    require "validateLogin.php";
    if(validateLogin($name,$pass)){
        $_SESSION['email'] = $name;
        $_SESSION['pass'] = $pass;
        header("Location: index.php");
    }else{
        header("Location: regbej.php?error=Incorect User name or password");
    }
}
?>