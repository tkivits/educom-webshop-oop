<?php
require_once 'BasicDoc.php';

class AjaxDoc extends BasicDoc
{
    protected function runTest()
    {
        var_dump($this->model->allRatings);
        echo '<br>';
        echo '<br>';
        $oneRating = $this->model->getProductRatingByID('1');
        var_dump($oneRating);
        echo '<br>';
        echo '<br>';
        $twoRating = $this->model->getProductRatingByID('2');
        var_dump($twoRating);
        echo '<br>';
        echo '<br>';
        $threeRating = $this->model->getProductRatingByID('3');
        var_dump($threeRating);
        echo '<br>';
        echo '<br>';
        $fourRating = $this->model->getProductRatingByID('4');
        var_dump($fourRating);
        echo '<br>';
        echo '<br>';
        $fiveRating = $this->model->getProductRatingByID('5');
        var_dump($fiveRating);
    }
    // Encode JSON
    protected function JsonEncodeAllRatings()
    {
        $input = $this->model->allRatings;
        $json = json_encode($input);
        var_dump($json);
    }
    protected function JsonEncodeOneRating()
    {
        $input = $this->model->getProductRatingByID('5');
        $json = json_encode($input);
        var_dump($json);
    }

    // Decode JSON
    protected function showContent() 
    {
        $this->runTest();
        echo '<br>';
        echo '<br>';
        $this->JsonEncodeAllRatings();
        echo '<br>';
        echo '<br>';
        $this->JsonEncodeOneRating();
    }
}

?>