<?php
session_start(); 
include "database.php";
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
    $sql = "SELECT * FROM users WHERE Email='$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $name;
            echo "<br>";
            echo $row['Email'];
            echo "<br>";
            echo $row['Password'];
            echo "<br>";
            if (password_verify($pass, $row['Password'])) {
                echo "Logged in!";
                $_SESSION['user_name'] = $row['Username'];
                $_SESSION['email'] = $row['Email'];
                $_SESSION['key'] = $row['Password'];
                $conn->close();
                header("Location: index.html");
                exit();
            }else{
                $conn->close();
                header("Location: regbej.php?error=Incorect User name or password");
                echo md5($pass)."<br>";
                echo "Password fail";
                exit();
            }
        }
        $conn->close();
        header("Location: regbej.php?error=Incorect User name or password");
    } else {
        $conn->close();
        header("Location: regbej.php?error=Incorect User name or password");
    }
}
?>