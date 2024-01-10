<?php 
    function validateLogin($name,$pass){
        require "database.php";
        $sql = "SELECT * FROM users WHERE Email='$name'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                if (password_verify($pass, $row['Password'])) {
                    $conn->close();
                    return true;
                }else{
                    $conn->close();
                    return false;
                }
            }
            $conn->close();
            return false;
        }
        $conn->close();
        return false;
    }
?>