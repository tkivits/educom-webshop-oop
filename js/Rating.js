$(document).ready( function() {
    
    $.getJSON('singleRating.json', function(json){
        rating = json;
        setStars(rating.Average);
        console.log("succes!")
    })

    /// Find spans with class star
    $(".star").html("&star;")

    function setStars(rating){
        $(".star").each( (index, elem) => {
            const itemValue = $(elem).attr("data-value")
            if(itemValue <= rating) {
                $(elem).html("&starf;")
            }
        })
    }
    


});
