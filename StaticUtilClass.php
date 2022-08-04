<?php

class Util
{
    public static function getGETvar($var)
    {
        if (empty($_GET[$var]))
        {
            $variable = NULL;
        } else {
            $variable = $_POST[$var];
            $variable = trim($variable);
            $variable = stripslashes($variable);
            $variable = htmlspecialchars($variable);
            $variable = $_GET[$var];
        }
        return $variable;
    }
    public static function getPOSTvar($var)
    {
        if (empty($_POST[$var]))
        {
            $variable = NULL;
        } else {
            $variable = $_POST[$var];
            $variable = trim($variable);
            $variable = stripslashes($variable);
            $variable = htmlspecialchars($variable);
        }
        return $variable;
    }
    public static function logError($msg) 
    {
        echo "LOG TO SERVER: ".$msg;
    }
}

?>