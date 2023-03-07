<?php

namespace jarvis;

class JarvisLogger{
    private bool $gar = false;
    private ?string $nc = null;
    private ?string $err = null;

    private $users = array(
            'sedar' =>'theGoat',
            'stark'=> 'warmachinerox'
    );

    public function generateLoginForm(string $action): void{ ?>
        <!--Le formulaire-->
        <center>username: sedar/ password: theGoat</center>
        <div class="formulaire">
            <div class="form-entete">
                Please Login
            </div>
            <form method="POST" action="<?php echo $action; ?>">
                <input type="text" class="form-control" id="pseudo" placeholder="USERNAME"
                       name="pseudo">
                <input type="password" class="form-control" id="password" placeholder="PASSWORD"
                       name="psw">
                <button type="submit" id = "btn-submit" >
                     LOGIN
                </button>
            </form>
        </div>

    <?php }

    public function log(string $username, string $password) : array{

        if(array_key_exists($username, $this->users))
            if($this->users[$username] == $password)
                $this->gar = true;

//        $username_correct = "stark";
//        $password_correct = "sed";

//        $this->gar = ( ($username == $username_correct) &&
//            ($password ==$password_correct ) );

        if($this->gar)
            $this->nc = $username;

        else {
            if (empty($username))
                $this->err = "username is empty";

            else if (empty($password))
                $this->err = "password is empty";

            else if ((!empty($username)) && (!empty($password)))
                $this->err = "authentication failed";
        }

        $tableau = array(
            'granted'  => $this->gar,
            'nick' => $this->nc,
            'error' => $this->err,
        );

    return $tableau;
    }
}