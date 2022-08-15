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
            console.log(elem);
            $(".star", elem).each( (index, el) => {
                const itemValue = $(el).attr("data-value")
                if(itemValue <= rating) {
                    $(el).html("&starf;")
                }
            })
        })
    }

    /// Find spans with class star
    $(".star").html("&star;")

    // Functie om data te posten
});
