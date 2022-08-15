$(document).ready( function() {

    /// Get the relevant data
    $.getJSON('AllRatings.json', function(json){
        ratings = json;
        fillStars(ratings);
        console.log("succes!")
    })

    /// Fill in stars
    function fillStars(ratings){
        $(".starcontainer").each( (index, elem) => {
            productID = $(elem).attr('data-value');
            console.log(productID);
            rating = ratings[productID - 1].Average;
            console.log(rating);
            $(".star").each( (index, elem) => {
                const itemValue = $(elem).attr("data-value")
                if(itemValue <= rating) {
                    $(elem).html("&starf;")
                }
            })
        })
    }

    /// Find spans with class star
    $(".star").html("&star;")
});
