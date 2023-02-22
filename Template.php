<?php
class Template{
    public static function render(string $content, string $title) : void{?>

        <!doctype html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="css.css">
            <script src = "js.js"></script>
            <title> <?php echo $title ?> </title>
        </head>
        <body>
            <div class="container">
                <div>
                    <?php include "header.php";?>
                </div>

                <div id="injected-content">
                    <?php echo $content ?> <!-- INJECTION DU CONTENU -->
                </div>

                <div>
                    <?php include "footer.php";?>
                </div>
            </div>

        </body>
        </html>

        <?php
    }

}