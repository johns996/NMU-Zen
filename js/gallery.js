jQuery(document).ready(function($){ 
    //nth-child is 1-index( so opts.currSlide + 2 will load the next slide on the slideshow).
    function lazyLoadImage(imageIndex) {
        var selectedImage = $(".lazy:nth-child(" + imageIndex + ")");
        console.log('Lazy Loading: ' + imageIndex);
        selectedImage.lazyload();
    }
    
    var galleryOpts = $('#cycle-1').data('cycle.API').getSlideOpts(this);
    var thumbnailOpts = $('#cycle-2').data('cycle.API').getSlideOpts(this);
    var slideCount = thumbnailOpts.slideCount;
    console.log('Slide Count: ' + slideCount);
    lazyLoadImage(1);
    
    $('#main-gallery .next').click(function(e){
            lazyLoadImage((galleryOpts.currSlide + 3));
            console.log("There are " + (slideCount - (galleryOpts.currSlide + 1)) + " slides remaining.");
            console.log("The next slide is: " + (+galleryOpts.currSlide +  1));
            
            $('#cycle-1').cycle('goto', +galleryOpts.currSlide + 1);
            galleryOpts = $('#cycle-1').data('cycle.API').getSlideOpts(this);

            $('#cycle-2').cycle('goto', +galleryOpts.currSlide);
            thumbnailOpts = $('#cycle-2').data('cycle.API').getSlideOpts(this);
    });
    $('#main-gallery .prev').click(function(e){
            lazyLoadImage((galleryOpts.currSlide - 1));
            
            $('#cycle-1').cycle('goto', +galleryOpts.currSlide - 1);
            galleryOpts = $('#cycle-1').data('cycle.API').getSlideOpts(this);

            $('#cycle-2').cycle('goto', +galleryOpts.currSlide);
            thumbnailOpts = $('#cycle-2').data('cycle.API').getSlideOpts(this);
    });

    $('#thumbnail-gallery .next').click(function(e){
            if ((thumbnailOpts.currSlide + 5) > slideCount){
                $('#cycle-2').cycle('goto', slideCount - 5);
            }
            else {
                $('#cycle-2').cycle('goto', +thumbnailOpts.currSlide + 5);
            }
            thumbnailOpts = $('#cycle-2').data('cycle.API').getSlideOpts(this);
    });
    $('#thumbnail-gallery .prev').click(function(e){
            if ((thumbnailOpts.currSlide + 5) > slideCount){
                $('#cycle-2').cycle('goto', slideCount - 5);
            }
            else if ((thumbnailOpts.currSlide - 5) < 0) {
                $('#cycle-2').cycle('goto', 0);
            }
            else {
                $('#cycle-2').cycle('goto', +thumbnailOpts.currSlide - 5);
            }
            thumbnailOpts = $('#cycle-2').data('cycle.API').getSlideOpts(this);
    });
    $('#cycle-2 .cycle-slide').click(function(){
        var index = $('#cycle-2').data('cycle.API').getSlideIndex(this);
        console.log('Lazy Loading Slide Click: ' + (+index + +1));
        lazyLoadImage((+index + +2));
        $('#cycle-1').cycle('goto', index);
        galleryOpts = $('#cycle-1').data('cycle.API').getSlideOpts(this);
        thumbnailOpts = $('#cycle-2').data('cycle.API').getSlideOpts(this);
    });

});
