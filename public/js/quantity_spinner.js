$( function() {
    var quantity = $( "#quantity" ).spinner();
    quantity.bind("keydown",function (event) {event.preventDefault();
    });
} );