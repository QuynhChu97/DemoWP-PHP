( function( api ) {

    api.sectionConstructor['upsell'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );

jQuery(document).ready(function($) {

    "use strict";
    /**
     * Compatible widget field in customizer panel
     */
    $( document ).on( 'expand', '.customize-control-widget_form', function(e){
        $('.range-input').each(function(){
            var $this = $(this);
            $this.slider({
                range: "min",
                value: parseFloat($this.data('value')),
                min: parseFloat($this.data('min')),
                max: parseFloat($this.data('max')),
                step: parseFloat($this.data('step')),
                slide: function( event, ui ) {
                    $this.siblings(".range-input-selector").val(ui.value).trigger('change');
                    $this.siblings(".show-range-value").text(ui.value);
                }
            });
        });

    });
    
});