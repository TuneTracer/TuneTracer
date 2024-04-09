<?php
      $conn = new mysqli_connect("localhost", "root", "", "tunetracer");

      if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }

      $searchQuery = $_POST["query"];

      $likesSongsQuery = "SELECT audio.Title, artist.Name as Author
                        FROM audio
                        JOIN likes ON audio.ID = likes.song
                        JOIN artist ON audio.Author = artist.ID
                        WHERE likes.user = 1";

      $resultLikesSongs = $conn->query($likesSongsQuery);

      $likesSongsArray = array(); 

      if ($resultLikesSongs->num_rows > 0) {
      $likesSongsArray = array();
      while ($row = $resultLikesSongs->fetch_assoc()) {
            $likesSongsArray[] = array("cim" => $row["Title"], "szerzo" => $row["Author"]);
      }

      echo json_encode($likesSongsArray);
      } else {
      echo json_encode(array()); // Ha nincs kedvelt dal, üres tömböt küldünk
      }

      $createPlaylistQuery = "INSERT INTO playlistnames (ID, Name) VALUES (1, 'Kedvelt zenék')"; 
      $conn->query($createPlaylistQuery);

      $playlistID = $conn->insert_id; 

      foreach ($likesSongsArray as $likesSong) {
      $addToPlaylistQuery = "INSERT INTO playlists (SongID, PlaylistID) 
                              VALUES ('$playlistID', (SELECT ID FROM audio WHERE Title = '{$likesSong["cim"]}'))";
      $conn->query($addToPlaylistQuery);
      }

      $conn->close();
?>
