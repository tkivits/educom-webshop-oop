<?php

interface IUserCrud
{
    function createNewUser($email, $name, $pw);
    function readUserByEmail($email);
}

?>