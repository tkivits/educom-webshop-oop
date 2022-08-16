<?php

class Ajaxcontroller
{
    public function __construct($copy)
    {
        if (empty($copy)){
            $this->crud = new Crud;
            $this->crud = new RatingCrud($this->crud);
            $this->model = new AjaxModel(null, $this->crud);
            $this->view = new AjaxDoc($this->model);
        } else {
            $this->crud = $copy->crud;
            $this->model = $copy->model;
            $this->view = $copy->view;
        }
    }
    public function processRequest()
    {
        if ($_SESSION['login'] == True)
        {
            $productID = Util::getPOSTvar('id');
            $rating = Util::getPOSTvar('rating');
            $oldrating = $this->crud->readExistingRating($productID, $_SESSION['user_id']);
            if (!$oldrating) {
                $this->crud->createNewRating($productID, $rating, $_SESSION['user_id']);
            } else {
                $this->crud->updateRating($rating, $_SESSION['user_id'], $productID);
            }
        }
    }
}

?>