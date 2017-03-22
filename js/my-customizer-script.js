(function($){
    wp.customize("traveller_my_settings", function(value) {
        console.log(value)
        value.bind(function(newval) {
            $("#traveller_my_settings").html(newval);
        } );
    });
})(jQuery);