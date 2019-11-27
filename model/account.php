<?php

class Account
{
    private $userName, $passWord, $email;

    public function __construct($userName, $passWord, $email)
    {
        $this->userName = $userName;
        $this->passWord = $passWord;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getPassWord()
    {
        return $this->passWord;
    }

    /**
     * @param mixed $passWord
     */
    public function setPassWord($passWord)
    {
        $this->passWord = $passWord;
    }

}

class AccountDB
{
    public static function get_all_accounts()
    {
        $userDB = self::userDB();
        $list_users = array();
        foreach ($userDB as $element) {
            $user = new Account($element['username'], $element['password'], $element['email']);
            $list_users[] = $user;
        }
        return $list_users;
    }

    public static function userDB()
    {

        return isset($_SESSION['userDB']) ? $_SESSION['userDB'] : array();
    }

    public static function register_user($username, $passWord, $email)
    {
        $userDB = self::userDB();
        if (!empty($username) && !empty($passWord) && !empty($email)) {
            $user = array(
                'username' => $username,
                'password' => $passWord,
                'email' => $email
            );
        } else return false;
        $userDB[] = $user;
        $_SESSION['userDB'] = $userDB;
        return true;
    }

    public static function validate_user($username, $email)
    {
        $userDB = self::userDB();
        $result = '';
        foreach ($userDB as $item) {
            if ($item['username'] == $username) return $result = 'username';
            elseif ($item['email'] == $email) return $result = 'email';
        }
        return $result;
    }

    public static function check_user($userName, $passWord)
    {
        $userDB = self::userDB();
        $result = false;
        foreach ($userDB as $element) {
            if ($element['username'] == $userName && $element['password'] == $passWord) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    public static function check_login(&$userName, &$passWord)
    {
        $userName = isset($_COOKIE['userName']) ? $_COOKIE['userName'] : false;
        $passWord = isset($_COOKIE['passWord']) ? $_COOKIE['passWord'] : false;
        $email = isset($_COOKIE['email']) ? $_COOKIE['email'] : false;
        if ($userName && $passWord) {
            if (AccountDB::check_user($userName, $passWord, $email))
                return true;
        } else return false;
    }
}