<?php
   

   // INÍCIO DE INFORMAÇÕES PARA TESTE

   $title = 'teteasda';
   $connection = db_connect();
   //insertPool('headshasd',$connection);
   //teste($connection);
    $teste = $_POST["name"];
   function teste($connection){
       $options = [
           [
               'pool_id' => 46,
                'option' => 'jasde'
            ],
           [
               'pool_id' => 52,
                'option' => 'dasasd'
           ]
       ];

        $sql = 'INSERT INTO options (pool_id, option) VALUES (:pool_id,:option)';
        $query = $connection->prepare($sql);
        foreach ($options as $option){
            if ($query->execute($option)) {
                echo $connection->lastInsertId();
            } else {
                echo "Unable to create record";
            }
        }

   }

   // FIM DE INFORMAÇÕES PARA TESTE

    function insertPool($title,$connection){
        $query = "INSERT INTO pools (name) VALUES (:title)";
        $query = $connection->prepare($query);
        $query->bindParam(':title', $title);
        if ($query->execute()) {
            echo $connection->lastInsertId();
        } else {
            echo "Unable to create record";
        }
    }


    function insertOptions($pool_id,$option,$connection){
        $query = $connection->prepare('INSERT INTO options (pool_id, option) VALUES (:pool_id,:option)');
        $query->bindParam(':pool_id', $pool_id);
        $query->bindParam(':option', $option);
        if ($query->execute()) {
            echo $connection->lastInsertId();
        } else {
            echo "Unable to create record";
        }
    }



    function db_connect() {
        require "info.php";
        try { 
            $db_Connection = new PDO($sql, $username, $password, $dsn_Options);
            echo "Connected successfully";
        } catch (PDOException $error) {
            echo 'Connection error: ' . $error->getMessage();
        }
        return $db_Connection;
    }
?>