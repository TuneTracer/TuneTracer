<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color: rgb(17, 13, 60); color: #0be897;">
<style>
    *{
    margin: 0;
    padding: 0;
    font-family: "Segoe UI", Arial, sans-serif;
    color: #0be897;
    user-select: none;
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
    }


    /*minden*/

    th, td {
                  border: 1px solid #0be897;
                  text-align: left;
                  padding: 8px;
            }
            header {
    background: rgb(8, 8, 43);
}

.navbar{
    background: rgb(8, 8, 43);
    backdrop-filter: blur(5px);
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    padding: 10px 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

#navbar{
    background: transparent;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

@media (max-width: 800px) {
    #navbar{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 0px;
        margin: 0px;
        width: 80%;
    }
    .navbar {
        background-color: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(8px);
        border: 2px solid rgba(0, 0, 0, 0.4);
        border-radius: 7px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        padding: 10px 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        width: 80%;
    }
 }

.navbar-left {
    background: transparent;
    display: flex;
    align-items: center;
}

.navbar-left ul {
    background: transparent;
    list-style: none;
    padding: 0;
    display: flex;
}

li {
    white-space: nowrap;
}

.navbar-left li {
    background: transparent;
    margin: 0 15px;
}

.navbar-left a, span, .icons {
    background: transparent;
    text-decoration: none;
    color: #0be897;
    position: relative;
    transition: color 0.3s ease;
}

.navbar-left a:hover, span:hover, .icons:hover {
    background: transparent;
    color: #0be897;
}

.navbar-left a::after, .icons::after {
    background: transparent;
    content: "";
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: #0be897;
    opacity: 0;
    transition: opacity 0.4s, transform 0.3s;
    transform: scaleX(0);
}

.navbar-left a:hover::after, i:hover::after {
    background: transparent;
    opacity: 1;
    transform: scaleX(1);
}

button{
    color: rgba(0, 0, 0, 0.0);
    background-color: rgba(0, 0, 0, 0.0);
}

.search-container button {
    background: transparent;
    float: right;
    padding: 6px 10px;
    margin-top: 1px;
    margin-right: 16px;
    font-size: 20px;
    border: none;
    cursor: pointer;
}

.search-container form {
    background: black;
    position: relative;
    transition: all 1s;
    width: 300px;
    height: 50px;
    box-sizing: border-box;
    border-radius: 25px;
    border: 4px solid #0be897;
    padding: 5px;
}

.search-bar {
    background: transparent;
    position: absolute;
    top: 0;
    left: 0;
    width: 210px;
    height: 100%;
    line-height: 30px;
    outline: 0;
    border: 0;
    display: block;
    font-size: 1em;
    border-radius: 20px;
    padding: 0 20px;
}

.search-icon{
    background: transparent;
    box-sizing: border-box;
    padding: 10px;
    width: 42.5px;
    height: 42.5px;
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 50%;
    color: #04825B;
    text-align: center;
    font-size: 1.2em; 
}

.search-container form:hover input{
    background: black;
    display: block;
}

.search-container form:hover .fa{
    background: black;
    color: #0be897;
}

.navbar-right {
    background: transparent;
    display: flex;
    align-items: center;
}

.button {
    background: transparent;
    background-color: #0be897;
    border: none;
    color: black;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 4px;
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius: 15px;
    transition: all 0.3s ease, color 0.3s ease;
}

.button:hover {
    background-color: #04825B; 
    color: white;
    transform: scale(1.05);
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
}
</style>
<header>
            <nav class="navbar">
                <div id="navbar" style="padding: 0px;">
                    <div class="navbar-left">
                        <ul>  
                            <li><a href="profil.html" onclick="toggleProfilePage()">
                                <span style="margin-right: 2px;">Profil</span>
                                <i class="fas fa-user-circle"></i>
                            </a></li>   
                            <li id="zenek"><a href="#" style="display: flex; align-items: center; margin-right: 4px;">
                                <span style="margin-right: 3px;">Főmenü</span>
                                <i class="fa fa-solid fa-music"></i>
                            </a></li>                                    
                        </ul>
                    </div>
                </div>
            </nav>
        </header>       


   <h1>Felhasználó Törlése (ID alapján)</h1>
    <form action="admin.php" method="post">
        <input type="text" name="userId">

        <input type="submit">
    </form>
    <br>


    <h1>Művész Hozzáadása</h1>
    <form action="admin.php" method="post">
        <input type="text" name="Name">
        <input type="text" name="desc">
        <input type="file">
    </form>
    <br>

</body>
</html>

<?php
    require "database.php";
    if (isset($_POST["userId"]) || !isset($_POST["userId"]))
    {

        //Felhasználó Törlés
        $userId = $_POST["userId"];
        $sql = "DELETE FROM users WHERE ID = ?";
        
        $stmt = mysqli_prepare($conn, $sql);

        if (!$stmt) {
            die("Hiba a lekérdezés előkészítése során: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        //Művész Hozzáadás

        //Lekérdezés

        $sql = "SELECT * FROM users";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if (mysqli_num_rows($result) == 0) 
        {
              echo "Hibaüzenet";
        } 
        else if (mysqli_num_rows($result) > 0) 
        {
            echo "<h1>Felhasználó Kezelő Felület</h1>";
              echo "<br><br><table>";
              echo "<tr> <td>'ID'</td> <td>'Username'</td> <td>'Email'</td> <td>'RealName'</td> <td>'BDay'</td> <td>'Password'</td> <td>'isAdmin'</td> </tr>";
              while ($row = mysqli_fetch_assoc($result)) 
              {
              echo "<tr>";
              echo "<td>" . $row["ID"] . "</td><td>" . $row["Username"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["RealName"] . "</td><td>" . $row["BDay"] . "</td><td>" . $row["Password"] . "</td><td>" . $row["isAdmin"] . "</td>";
              echo "</tr>";
              }
              echo "</table>";
        }
    
    
        echo "<h1>Művész Kezelő Felület</h1>";
        $sql = "SELECT * FROM artist";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if (mysqli_num_rows($result) == 0) 
        {
              echo "Hibaüzenet";
        } 
        else if (mysqli_num_rows($result) > 0) 
        {
              echo "<br><br><table>";
              echo "<tr> <td>'ID'</td> <td>'Name'</td> <td>'Description'</td> </td> 'Profilkép' <td>";
              while ($row = mysqli_fetch_assoc($result)) 
              {
              echo "<tr>";
              echo "<td>" . $row["ID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Description"] . "</td>'Profilkép'<td>";
              echo "</tr>";
              }
              echo "</table>";
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        }
    else
    {

    }
?>