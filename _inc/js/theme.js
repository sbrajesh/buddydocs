jQuery(document).ready(function() {
    
		
        jQuery.scrollUp({
        scrollName: 'scrollUp', // Element ID
        scrollDistance: 300, // Distance from top/bottom before showing element (px)
        scrollFrom: 'top', // 'top' or 'bottom'
        scrollSpeed: 300, // Speed back to top (ms)
        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
        animation: 'fade', // Fade, slide, none
        animationInSpeed: 200, // Animation in speed (ms)
        animationOutSpeed: 200, // Animation out speed (ms)
        scrollText: 'Scroll to top', // Text for element, can contain HTML
        scrollTitle: false, // Set a custom <a> title if required. Defaults to scrollText
        scrollImg: false, // Set true to use image
        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        zIndex: 2147483647 // Z-Index for the overlay
        });
		    
jQuery('#s,#adminbar-search').liveSearch({url:ajaxurl+ '?action=buddydocs_search&s='}); 

jQuery( 'nav#top-bar' ).meanmenu({meanScreenWidth:'768'});

//faq open close

jQuery( 'body.post-type-archive-bdocs-faq #content' ).on( 'click', 'h1.entry-title a', function(){
    jQuery(this).parent().parent().parent().toggleClass('faq-open');
    jQuery(this).parent().parent().next('.entry').slideToggle('slow');
    return false;
    
});

/*
//load more faqs via ajax
var jq = jQuery;
jQuery('body.post-type-archive-bdocs-faq').on( 'click', '.pagination a', function( $target ){
    //get the page val from the elemnt clicked
    var $this =jq( this );
    var $el = $this;
    
    
    var page_no = parseInt( $this.text() );
    
    if( !page_no )
        return true;
    //otherwise handle it
    
    jq.post(ajaxurl, { action: 'buddydocs_load_faq', 'page': page_no}, function(resp){
        
        if(resp.content){
            
            $this.parent().before(resp.content).show('slow'); 
       
        }
    },'json');
    
    
    
    return false;
    
});
*/

});

