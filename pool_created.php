            <h1 class="main-h1">Congratulations!!! Pool created with success!</h1>
            <p>Share the link below to get people vote:</p>
            
<?php
    $pool_id = insertPool($options[0],$options);
    $pool_link = '<a class="header-link" href="http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?page=view_pool&id='.$pool_id.'">http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?page=view_pool&id='.$pool_id.'</a>';
    echo $pool_link;
?>