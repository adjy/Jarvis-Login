
<?php
require_once "config.php" ;

require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use jarvis\Template ;
use jarvis\JarvisLogger ;

?>

<!-- Démarre le buffering -->
<?php ob_start() ?>


<?php  $cont = new JarvisLogger() ?>

<script>
        let btn = document.getElementsByClassName("btn-logOut");
        btn[0].classList.add("butt-none");
</script>

<?php if (isset($_POST['pseudo']) && isset($_POST['psw'])): // si le paramètre msg a bien été reçu...
        $username = $_POST["pseudo"];
        $username = htmlspecialchars($username) ;

        $password = $_POST["psw"];
        $password = htmlspecialchars($password) ;

        $tab = $cont->log($username,$password );

        if(!$tab['granted']) : ?>
            <div class="errMsg">
                <span> <?php
                    $erreur = $tab['error'];
                    if($erreur != null)
                    echo $tab['error']; ?>

                </span>
            </div>
            <?php $cont->generateLoginForm("index.php"); ?>

        <?php else : ?>
            <div class="hello">
                Hello <?php echo $tab['nick']; ?>
            </div>
            <script>
                    let btn2 = document.getElementsByClassName("btn-logOut");
                    btn2[0].classList.remove("butt-none");

                    btn2[0].addEventListener('mousedown', function (){
                        <?php unset($_POST['pseudo']); ?>
                    })
            </script>
        <?php endif ?>

<?php else : ?>
    <?php $cont->generateLoginForm("index.php"); ?>

<?php endif ?>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>


<?php $title = "Stark"; ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content, $title); ?>