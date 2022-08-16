$(document).ready( function() {

    /// Get the relevant data
    $.getJSON('AllRatings.json', function(json){
        ratings = json;
        fillStars(ratings);
    })

    /// Fill in stars
    function fillStars(ratings){
        $(".starcontainer").each( (index, elem) => {
            productID = $(elem).attr('data-value');
            rating = ratings[productID - 1].Average;
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

    // Function to post data
    $(".star").click(function() {
        const rating = $(this).attr('data-value');
        const product_id = $(this).attr('id-value');
        console.log({product_id, rating});
        $.post('index.php', {action: 'ajax', id: product_id, rating: rating}, function(data) {console.log(data)});
    })
});
