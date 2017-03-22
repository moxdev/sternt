jQuery(document).ready(function(){
    var zindex = 10;

    jQuery(".question-content").click(function(e){
        e.preventDefault();

        var isShowing = false;

        if (jQuery(this).hasClass("show")) {
            isShowing = true
        }

        if (jQuery(".question-wrapper").hasClass("showing")) {
            // a card is already in view
            jQuery(".question-content.show")
                .removeClass("show");

            if (isShowing) {
            // this card was showing - reset the grid
                jQuery(".question-wrapper")
                    .removeClass("showing");
            } else {
                // this card isn't showing - get in with it
                jQuery(this)
                .css({zIndex: zindex})
                .addClass("show");

            }

        zindex++;

        } else {
        // no cards in view
            jQuery(".question-wrapper")
                .addClass("showing");
            jQuery(this)
                .css({zIndex:zindex})
                .addClass("show");

        zindex++;
        }

    });
});