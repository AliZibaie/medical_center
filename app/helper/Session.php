<?php

namespace app\app\helper;
class Session
{
    private static Session $session;
    private int $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
        $this->setAuthSession();
        self::$session = $this;
    }

    public function setAuthSession(){
        $_SESSION['user_id'] = $this->userId;
    }

    public static function destroy(){

        unset($_SESSION['user_id']);
        unset($_SESSION['PHPSESSID']);
        session_destroy();
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return Session
     */
    public static function getSession(): Session|bool
    {
       if (isset(self::$session)){
           return self::$session;
       }
       return false;
    }

    /**
     * @param Session $session
     */
    public static function setSession(Session $session): void
    {
        self::$session = $session;
    }

}