<?php

class AjaxDoc
{
    public function __construct($model)
    {
        $this->model = $model;   
    }
    // Encode JSON
    public function JsonEncodeAllRatings()
    {
        $input = $this->model->allRatings;
        file_put_contents('allRatings.json', json_encode($input));
    }
    public function JsonEncodeOneRating($id)
    {
        
        $input = $this->model->getProductRatingByID($id);
        file_put_contents('singleRating.json', json_encode($input));
    }
}
?>