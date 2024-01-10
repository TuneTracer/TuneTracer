<?php
      // Adatbázis kapcsolódás
      $servername = "tunetracer.hu";
      $username = "tunetracer";
      $password = "tunetracer123321";
      $dbname = "tunetracer";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }

      // Keresési lekérdezés
      $searchQuery = $_POST["query"];
      $sql = "SELECT * FROM audio WHERE Title LIKE '%$searchQuery%' OR Author LIKE '%$searchQuery%'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
            // Keresési eredmények kiírása
            $resultsArray = array();
            while($row = $result->fetch_assoc()) {
                  $resultsArray[] = array("cim" => $row["Title"], "szerzo" => $row["Author"]);
            }

      echo json_encode($resultsArray);
      }

      $conn->close();
?>
