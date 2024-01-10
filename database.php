<?php
      try {
            $conn = mysqli_connect("tunetracer.hu", "tunetracer", "tunetercer123321", "konyvtarak");
      } catch (Exception $e) {
            die("Nem sikerült csatlakozni");
      }
?>