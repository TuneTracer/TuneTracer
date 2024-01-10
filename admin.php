<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    felhasználó kezzelő
    <form action="" method="">

        <input type="submit">
    </form>
</body>
</html>

<?php
    require "database.php";

    $sql = "SELECT * FROM users";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $input);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) 
    {
          echo "Hibaüzenet";
    } 
    else if (mysqli_num_rows($result) > 0) 
    {
          echo "<br><br><table>";
          echo "<th>Név</th><th>Latin</th><th>Évszám</th>";
          while ($row = mysqli_fetch_assoc($result)) 
          {
          echo "<tr>";
          echo "<td>" . $row["ID"] . "</td><td>" . $row["Username"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["RealName"] . "</td><td>" . $row["BDay"] . "</td><td>" . $row["Password"] . "</td><td>" . $row["isAdmin"] . "</td>";
          echo "</tr>";
          }
          echo "</table>";
    }
    mysqli_stmt_close($stmt);
mysqli_close($conn);


?>