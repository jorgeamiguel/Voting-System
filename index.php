<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <?php
            require "head.html";
        ?>
    </head>

    <body>
        <?php
            require "header.html";
        ?>

        <main class="main">
            <?php
                $page = "index.html";
                if(isset($_GET["page"])){
                    $html = $_GET["page"].".html";
                    $php = $_GET["page"].".php";
                    if (file_exists($php)){
                        $page = $php;
                    }elseif (file_exists($html)){
                        $page = $html;
                    }
                }
                require $page;
            ?>

        </main>
        <?php
            require "footer.html";
        ?>
    </body>
</html>