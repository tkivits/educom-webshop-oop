<?php
require_once 'PageModel.php';
class AjaxModel extends PageModel
{
    public $allRatings;
    public function __construct($copy, $ratingCrud)
    {
        PARENT::__construct($copy, $ratingCrud);
        if (empty($copy) || empty($copy->allRatings))
        {
            try {
                $this->allRatings = $this->crud->readAllRatings();
            } catch (Exception $e) {
                Util::logError($e);
                $this->genericerr = 'Something went wrong, please try again later!';
            }
        } else {
            $this->allRatings = $copy->allRatings;
        }
    }
    public function getProductRatingByID($id)
    {
        // Get rating for a product by id

        try {
            $avgRating = $this->crud->readRatingForProduct($id);
        } catch (Exception $e) {
            Util::logError($e);
            $this->genericerr = 'Something went wrong, please try again later!';
        }
        return $avgRating;
    }
}

?>