( function( api ) {

    // Extends our custom "example-1" section.
    api.sectionConstructor['pro-section'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );

jQuery(document).ready(function($){
    /* Move widgets to their respective sections */
	wp.customize.section( 'sidebar-widgets-feature' ).panel( 'frontpage_settings' );
	wp.customize.section( 'sidebar-widgets-feature' ).priority( '25' );
    wp.customize.section( 'sidebar-widgets-testimonial' ).panel( 'frontpage_settings' );
	wp.customize.section( 'sidebar-widgets-testimonial' ).priority( '35' );    
    wp.customize.section( 'sidebar-widgets-cta' ).panel( 'frontpage_settings' );
	wp.customize.section( 'sidebar-widgets-cta' ).priority( '40' );
    
    //Scroll to section
    $('body').on('click', '#sub-accordion-panel-frontpage_settings .control-subsection .accordion-section-title', function(event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        scrollToSection( section_id );
    });
    
    /* Home page preview url */
    wp.customize.panel( 'frontpage_settings', function( section ){
        section.expanded.bind( function( isExpanded ) {
            if( isExpanded ){
                wp.customize.previewer.previewUrl.set( digital_download_cdata.home );
            }
        });
    });  

    $('body').on('click', '.flush-it', function(event) {
        $.ajax ({
            url     : digital_download_cdata.ajax_url,  
            type    : 'post',
            data    : 'action=flush_local_google_fonts',    
            nonce   : digital_download_cdata.nonce,
            success : function(results){
                //results can be appended in needed
                $( '.flush-it' ).val(digital_download_cdata.flushit);
            },
        });
    });
        
});

function scrollToSection( section_id ){
    var preview_section_id = "banner_section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {
        
        case 'accordion-section-download_section':
        preview_section_id = "recent_items";
        break;
        
        case 'accordion-section-sidebar-widgets-feature':
        preview_section_id = "feature_section";
        break;
        
        case 'accordion-section-newsletter_section':
        preview_section_id = "subscribe_section";
        break;
        
        case 'accordion-section-sidebar-widgets-testimonial':
        preview_section_id = "testimonial_section";
        break;
        
        case 'accordion-section-sidebar-widgets-cta':
        preview_section_id = "cta_section";
        break;
    }

    if( $contents.find('#'+preview_section_id).length > 0 && $contents.find('.home').length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + preview_section_id ).offset().top
        }, 1000);
    }
}