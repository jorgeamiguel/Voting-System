<?php
    function dbConnect() {
        require "info.php";
        try { 
            $db_Connection = new PDO($sql, $username, $password, $dsn_Options);
            $db_Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo 'Connection error: ' . $error->getMessage();
        }
        return $db_Connection;
    }


    function dbDisconnect($connection) {
        $query = $connection->prepare('KILL CONNECTION_ID()');
        $query->execute();
        $connection = null;
    }


    function getPool($pool_id) {
        $connection = dbConnect();
        $query = 'SELECT name FROM pools WHERE id = :pool_id';
        $query = $connection->prepare($query);
        $query->bindParam(':pool_id', $pool_id);
        $query->execute();
        $result = $query->fetchAll( PDO::FETCH_ASSOC );
        $pool_title = $result;
        if (!empty($result))
            $pool_title = $result[0]['name'];;
        
        return $pool_title;
    }


    function getOptions($pool_id) {
        $connection = dbConnect();
        $query = 'SELECT option, votes, id FROM options WHERE pool_id = :pool_id';
        $query = $connection->prepare($query);
        $query->bindParam(':pool_id', $pool_id);
        $query->execute();
        $options = $query->fetchAll( PDO::FETCH_ASSOC );
        return $options;
    }

    function insertVote($vote_id){
        $connection = dbConnect();
        $query = "UPDATE options SET votes = votes + 1 WHERE id = $vote_id";
        $query = $connection->prepare($query);
        if (!$query->execute()) {
            echo "Unable to register pool title.";
        }
    }

    function insertPool($title,$options){
        unset($options[0]);
        array_values($options);
        $connection = dbConnect();
        $query = "INSERT INTO pools (name) VALUES (:title)";
        $query = $connection->prepare($query);
        $query->bindParam(':title', $title);
        if ($query->execute()) {
            $pool_id = $connection->lastInsertId();
            insertOptions($pool_id,$options,$connection);
            return $pool_id;
        } else {
            echo "Unable to register pool title.";
        }
    }


    function insertOptions($pool_id,$options,$connection){
        foreach ($options as $option){
            if ($option != ''){
                $query = 'INSERT INTO options (pool_id, option) VALUES (:pool_id,:option)';
                $query = $connection->prepare($query);
                $query->bindParam(':pool_id', $pool_id);
                $query->bindParam(':option', $option);
                if (!$query->execute()) {
                    echo "Unable to register options.";
                }
            }
        }
        //dbDisconnect($connection);
    }




?>