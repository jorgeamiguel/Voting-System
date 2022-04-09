

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
                if (!empty($_POST)) {
                    if (empty($_POST['option'][0]) || empty($_POST['option'][1]) || empty($_POST['option'][2])) {
                        ?>            <h1 class="main-h1">Open a pool</h1>
                                <p>Oh, you want create your pool, nice :)</p>
                                <form action="index.php?page=open_pool" method="post">
                                    <div class="pool-div">
                                        <p>Pool title: <input type="text" id="pool_title" name="option[0]"></p>
                                        <section id="option_section1" class="pool-section">
                                            <label for="option1" id="label_option1">Option 1:</label>
                                            <input type="text" id="option1" name="option[1]"><br><br>
                                        </section>
                                        <section id="option_section2" class="pool-section">
                                            <label for="option2" id="label_option2">Option 2:</label>
                                            <input type="text" id="option2" name="option[2]" onchange="checkQuestion(3)"><br><br>
                                        </section>
                                    </div>
                                    <input type="submit" value="Submit" class="main-button" onclick="verifyInputs()">
                                </form>
                                <?php
                    } else {
                        $options = $_POST['option'];
                        foreach ($options as $option){
                            echo $option;
                        }
                    }
                } else { ?>
                                <h1 class="main-h1">Open a pool</h1>
                                <p>Oh, you want create your pool, nice :)</p>
                                <form action="index.php?page=open_pool" method="post">
                                    <div class="pool-div">
                                        <p>Pool title: <input type="text" id="pool_title" name="option[0]"></p>
                                        <section id="option_section1" class="pool-section">
                                            <label for="option1" id="label_option1">Option 1:</label>
                                            <input type="text" id="option1" name="option[1]"><br><br>
                                        </section>
                                        <section id="option_section2" class="pool-section">
                                            <label for="option2" id="label_option2">Option 2:</label>
                                            <input type="text" id="option2" name="option[2]" onchange="checkQuestion(3)"><br><br>
                                        </section>
                                    </div>
                                    <input type="submit" value="Submit" class="main-button" onclick="verifyInputs()">
                                </form>
                <?php }
                ?>