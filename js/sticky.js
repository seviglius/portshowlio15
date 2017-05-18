jQuery(document).ready(function ($) {


$('.sideNav').each(function() {

    $(this).affix({
        offset: {
            top: function(e) {
                var $curSection = $(e).closest('.row');
                return (this.top = $curSection.offset().top - 10);
            },
            bottom: function (e) {
                var $nextSection = $(e).closest('section').next('section');
                //if last element, go to bottom of page
                var bottom = ($nextSection.length === 0) ? 0 :
                             $(document).height() - $nextSection.offset().top;
                return (this.bottom = bottom);
            }
        }
    });
});



});
