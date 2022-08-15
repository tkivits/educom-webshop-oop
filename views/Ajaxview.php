<?php
require_once $parent.'/StaticUtilClass.php';

class AjaxDoc
{
    public function __construct($model)
    {
        $this->model = $model;   
    }
    // Encode JSON
    //protected function JsonEncodeAllRatings()
    //{
    //    $input = $this->model->allRatings;
    //    $json = json_encode($input);
    //    var_dump($json);
    //}
    public function JsonEncodeOneRating()
    {
        $id = Util::getGETvar('page');
        $input = $this->model->getProductRatingByID($id);
        $json = json_encode($input);
        echo $json;
    }
}
?>