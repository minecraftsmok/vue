<?php
        header('Access-Control-Allow-Origin: *');
        include "connect.php"; //wzór pliku we wpisie "Pełny panel administracyjny MySQLi"
        if ($sql = $baza->prepare( "SELECT * FROM cars ORDER BY id"))
        {
                $sql->execute(); //wykonaj SQL
                $sql->bind_result($id ,$isActive, $age, $firstName, $lastName);
                while ($sql->fetch())
                  $people[] = array(
                    "isActive" => $isActive,
                    "age" => $age,
                    "first_name" => $firstName,
                    "last_name" => $lastName,
                    "id" => $id
                   ); //dla każdego nazwiska tworzy 2 pary, nazwiska przekonwertowane do UTF
                $sql->close();
        }
        $baza->close();
        echo json_encode($people, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>