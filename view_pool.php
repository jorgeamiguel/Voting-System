<?php

    if(isset($_GET["id"])){
        require 'db.php';
        $pool_id = $_GET["id"];
        $pool_title = getPool($pool_id);
        if (!empty($pool_title)) {
            $options = getOptions($pool_id);

            echo 
                '<h1 class="main-h1">'.$pool_title.'</h1>',
                '<form action="index.php?page=view_pool" method="post">',
                '<div class="pool-div">';

            foreach ($options as $option){

                echo 
                    '<section id="'.$option["option"].'" class="pool-section">',
                        '<input type="radio" value="'.$option["id"].'" name="vote_id">',
                        '<label for="'.$option["option"].'" id="label_'.$option["option"].'">'.$option["option"].'     ('.$option["votes"].' votes)</label><br><br>',
                    '</section>';
            }
            

            echo
                '</div>',
                '<input type="submit" value="Vote" class="main-button">',
                '</form>';

        } else
            echo "<h1 class='main-h1'>Doesn't exist any vote with this id.</h1>";

    } else if (isset($_POST["vote_id"])) {
        $vote_id = $_POST["vote_id"];
        require 'vote_processed.php';



    } else {
        echo "<h1 class='main-h1'>Doesn't exist any vote with this id.</h1>";
    }


?>