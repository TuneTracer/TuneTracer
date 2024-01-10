<?php 
    session_start();
    function isLoggedIn(){
        require "validateLogin.php";
        if(isset($_SESSION['email'])){
            if(isset($_SESSION['pass'])){
                if(validateLogin($_SESSION['email'],$_SESSION['pass'])){
                    return true;
                }else{
                    return false;
                }   
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
?>