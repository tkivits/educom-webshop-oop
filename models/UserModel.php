<?php
require_once 'PageModel.php';

class UserModel extends PageModel
{
    public $name = '';
    public $namerr = '';
    public $email = '';
    public $emailerr = '';
    public $phone = '';
    public $phonerr= '';
    public $compref = '';
    public $compreferr = '';
    public $mess = '';
    public $messerr = '';
    public function __construct($pageModel)
    {
        PARENT::__construct($pageModel);
    }

}

?>