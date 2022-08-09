<?php
include_once 'Interfaces/IUserCrud.php';

class UserCrud implements IUserCrud
{
    private $crud;
    public function __construct($crud)
    {
        $this->crud = $crud;
    }
    public function createNewUser($email, $name, $pw)
    {
        $userParams = array(':email' => $email, ':name' => $name, ':pw' => $pw);
        try {
            $result = $this->crud->createUserRow($userParams);
            if (!$result)
            {
                throw new Exception("Failed to create new user");
            }
        } catch (PDOException $e) {
            Util::logError($e);
        }
        return $result;
    }
    public function readUserByEmail($email)
    {
        $table = 'users';
        $row = 'email';
        $result = $this->crud->readOneRow($table, $row, $email);
        if (!$result)
        {
            $result = null;
        }
        return $result;
    }
}

?>