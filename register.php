<?php 
    require "database.php";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    echo $name." ".$email." ".$hashedPassword;
    $sql = "INSERT INTO `users`(`Username`, `Email`, `Password`) VALUES (?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt,"sss", $name, $email, $hashedPassword);
    $result = mysqli_stmt_execute($stmt);
    if($result){
        echo "Succecfull uplod!";
    }else{
        echo "Databse error!";
    }
    header("location: regbej.html")
?>