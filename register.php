<?php 
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    require "database.php";
    $name = validate($_POST["name"]);
    $email = validate($_POST["email"]);
    $pass = validate($_POST["pass"]);
    $hashedPassword = password_hash($pass,PASSWORD_BCRYPT);
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
    header("location: regbej.php")
?>