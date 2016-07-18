// Handles a slideshow-like tutorial
// 
// To use create a structure as follows (can be any element type, does not have to be sections):
//    <section id="tutorial" data-num-slides="3">
//        <section id="tutorial-1" class="tutorial-section">
//          Step 1...
//        </section>
//        <section id="tutorial-2" class="tutorial-section">
//          Step 1...
//        </section>
//        ...


(function( $ ) {
 
    $.fn.tutorial = function( options ) {
        // This is the easiest way to have default options.
        var settings = $.extend({
            // Defaults
            onCompletion: function(){}
        }, options );
 
        // hide all the tutorial sections, previous button, and show first slide
        $(".tutorial-section").hide();
        $("#tutorial-1").show();


        // create next/previous buttons
        $("#tutorial").append(`
            <section>
                <span class="tutorial-btns">
                    <button id="tutorial-prev-btn" class="btn"><i class="fa fa-angle-left"></i> Back</button>
                    <button id="tutorial-next-btn" class="btn">Next <i class="fa fa-angle-right"></i></button>
                </span>
            </section>`);

        current_tutorial_slide = 1;
        total_tutorial_slides = $("#tutorial").data("num-slides");
        $("#tutorial").data("current_tutorial_slide", current_tutorial_slide);

        // Show/hide the previous button if necessary
        if(current_tutorial_slide == 1) {
            $("#tutorial-prev-btn").hide();
        } else {
            $("#tutorial-prev-btn").show();
        }

        // previous button handler
        $("#tutorial-prev-btn").click(function() {
            $("#tutorial-"+current_tutorial_slide).hide();
            current_tutorial_slide -= 1;
            $("#tutorial-"+current_tutorial_slide).show();

            // Show/hide the previous button if necessary
            if(current_tutorial_slide == 1) {
                $("#tutorial-prev-btn").hide();
            } else {
                $("#tutorial-prev-btn").show();
            }
        });

        // next button handler
        $("#tutorial-next-btn").click(function() {
            // Call completion handler when all slides seen
            if(current_tutorial_slide == total_tutorial_slides) {
                options.onCompletion.call(this);
                return;
            }

            $("#tutorial-"+current_tutorial_slide).hide();
            current_tutorial_slide += 1;
            $("#tutorial-"+current_tutorial_slide).show();

            // Show/hide the previous button if necessary
            if(current_tutorial_slide == 1) {
                $("#tutorial-prev-btn").hide();
            } else {
                $("#tutorial-prev-btn").show();
            }
        });
    };
}( jQuery ));
