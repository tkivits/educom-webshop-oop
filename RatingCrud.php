<?php

class RatingCrud
{
    private $crud;
    private $genericException;
    public function __construct($crud)
    {
        $this->crud = $crud;
        $this->genericException = 'Something went wrong, please try again later.';
    }
    public function createNewRating($productID, $rating, $userID)
    {
        // Create a new rating for user_id
        
        $params = array(':product_id' => $productID, ':rating' => $rating, ':user_id' => $userID);
        $result = $this->crud->createRatingsRow($params);
        if (!$result)
        {
            throw new Exception ($this->genericException);
        }
    }
    public function readAllRatings()
    {
        // Read average ratings for all products

        $avgRating = $this->crud->readAverageRatingForAllProducts();
        if (!$avgRating)
        {
            throw new Exception ($this->genericException);
        }
        return $avgRating;
    }
    public function readRatingForProduct($productID)
    {
        // Read average rating for a specific product

        $avgRating = $this->crud->readAverageRatingForProduct($productID);
        if (!$avgRating)
        {
            throw new Exception ($this->genericException);
        }
        return $avgRating;
    }
    public function readExistingRating($productID, $userID)
    {
        $table = 'ratings';
        $rowOne = 'product_id';
        $rowTwo = 'user_id';
        $valueOne = $productID;
        $valueTwo = $userID;
        $result = $this->crud->readOneRowByTwoVal($table, $rowOne, $rowTwo, $valueOne, $valueTwo);
        if (!$result) {
            return null;
        } else {
            return $result;
        }
    }
    public function updateRating($rating, $userID, $productID)
    {
        // Update rating for specific user and product

        $params = array(':rating' => $rating, ':user_id' => $userID, ':product_id' => $productID);
        $result = $this->crud->updateRating($params);
        if (!$result)
        {
            throw new Exception ($this->genericException);
        }
    }
}
?>