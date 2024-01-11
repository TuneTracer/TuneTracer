<?php
      $servername = "tunetracer.hu";
      $username = "tunetracer";
      $password = "tunetracer123321";
      $dbname = "tunetracer";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT Title, Author, filename FROM audio WHERE id > " . $_GET['currentTrackId'] . " LIMIT 1";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo json_encode($row);
      }

      $conn->close();
?>
