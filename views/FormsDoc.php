<?php
require_once 'BasicDoc.php';
abstract class FormsDoc extends BasicDoc 
{
    abstract protected function showRequiredField();
    abstract protected function showFormStart();
    abstract protected function showEmailInput();
    abstract protected function showSubmitButton();
    abstract protected function showFormEnd();
}
?>