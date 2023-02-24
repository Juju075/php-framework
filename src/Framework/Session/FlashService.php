<?php

namespace App\Framework\Session;

class FlashService
{
    private SessionInterface $session;
    private $sessionKey = 'flash';

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }
    public function success(string $message){
        $_SESSION['flash']['success'] = [];

       $flash = $this->session->get($this->sessionKey,[]);
       $flash['success'] = $message;
       $this->session->set($this->sessionKey, $flash);

    }

    public function get(string $type){
        $flash = $this->session->get($this->sessionKey,[]);
        if(array_key_exists($type, $flash)){
            return $flash[$type];
        }
        return  null;
    }

}