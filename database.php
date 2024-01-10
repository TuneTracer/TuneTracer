<?php
      try {
            $conn = mysqli_connect("localhost", "root", "", "konyvtarak");
      } catch (Exception $e) {
            die("Nem sikerült csatlakozni");
      }
?>