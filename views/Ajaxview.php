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
    }
    // Encode JSON

    // Decode JSON
    protected function showContent() 
    {
        $this->runTest();
    }
}

?>