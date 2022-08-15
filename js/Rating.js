$(document).ready( function() {
    
    value = 3

    /// Find spans with class star
    $(".star").html("&star;")

    /// Fill with value
    $(".star").each( (index, elem) => {
        const itemValue = $(elem).attr("data-value")
        if(itemValue <= value) {
            $(elem).html("&starf;")
        }
    })


});
