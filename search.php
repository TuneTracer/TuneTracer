<?php
    $servername = "tunetracer.hu";
    $username = "tunetracer";
    $password = "tunetracer123321";
    $dbname = "tunetracer";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $searchQuery = $_POST["query"];
    $sql = "SELECT audio.Title, artist.Name as Author, audio.filename
            FROM audio
            JOIN artist ON audio.Author = artist.ID
            WHERE audio.Title LIKE '%$searchQuery%' OR artist.Name LIKE '%$searchQuery%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $resultsArray = array();
        while ($row = $result->fetch_assoc()) {
            $resultsArray[] = array("cim" => $row["Title"], "szerzo" => $row["Author"], "filenev" => $row["filename"]);
        }

        echo json_encode($resultsArray);
    }

    $conn->close();
?>
