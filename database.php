<?php
      try {
            $conn = mysqli_connect("localhost", "root", "", "tunetracer");
      } catch (Exception $e) {
            echo $e;
            die("Nem sikerült csatlakozni");
      }
?>
