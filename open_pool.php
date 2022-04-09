<!-- <div class="vote-div">
                <p class="vote-paragraph">Do you want one vote per mail?</p>
                <div class="vote-div-radio">
                    <input type="radio" id="yes" name="mail_confirmation" value="Yes">
                    <label for="Yes">Yes</label><br>
                </div>
                <div class="vote-div-radio">
                    <input type="radio" id="no" name="mail_confirmation" value="No" checked>
                    <label for="no">no</label><br>
                </div>
            </div>
            -->
<?php
    require 'db.php';
    if (!empty($_POST)) {
        if (empty($_POST['option'][0]) || empty($_POST['option'][1]) || empty($_POST['option'][2])) {
            require('open_pool.html');
        } else {
            $options = $_POST['option'];
            require('pool_created.php');
        }
    } else {
        require('open_pool.html');
    }
?>