<?php
      try {
            $conn = mysqli_connect("tunetracer.hu", "tunetracer", "tunetracer123321", "tunetracer");
      } catch (Exception $e) {
            echo $e;
            die("Nem sikerült csatlakozni");
      }
?>