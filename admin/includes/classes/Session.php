<?php


class Session
{

    public $sign_in;
    public $user_id;

    function __construct()
    {
        session_start();
        $this->is_login();
    }

    public function is_login(){
        if(isset($_SESSION['user_id'])){
            $this->user_id = $_SESSION['user_id'];
            $this->sign_in = true;
        }
        else{
            unset($this->user_id);
            $this->sign_in= false;
        }
    }

    public function login($user){
        if($user){
                    $this->user_id = $_SESSION['user_id'] = $user->id;
        }
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->sign_in = false;
    }

}

$session = new Session();
