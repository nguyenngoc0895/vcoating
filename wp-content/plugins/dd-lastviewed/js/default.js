( function( $ ) {

    $( document ).ready( function() {
        bindSelect ();

        $(document).on('keypress', '.exclude_ids .select2-search__field', function (e) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((isNaN(e.key) && e.key !== ',') || (!$(this).val() && e.key === ',')) {
                e.preventDefault();
            }
        });

        var color = $('.button-primary').css("background-color");
        $(document).on('hover', '.select2-results__option--highlighted[aria-selected]', function () {
            $('.select2-results__option').removeAttr('style');
            $(this).css('background-color', color);
        });
    });

    $(document).on('widget-updated widget-added', function(){
        bindSelect();
    });
    // $(document).on('click','.widget[id*="dd_last_viewed-"] .widget-control-remove', function(){
    //     var id = ($(this).closest('.widget').attr('id').split('-'))[2];
    //
    //     console.log(id);
    //     console.log('delte da motherfcker');
    //
    //     document.cookie = "cookie_data_lastviewed_widget_" + id + " =; expires = Thu, 01 Jan 1970 00:00:00 GMT;path=/"
    // });
    $(document).on('click','.dd-switch', function(){
        $(this).toggleClass('on');
        $(this).next('input').trigger('click');

        if (!$(this).hasClass( 'on' )) {
            var link = $(this).parent().parent().find('.lv_link.button-primary');
            if (link.length) {
                link.trigger('click');
            }
        }

        if($(this).next('[id*="lastViewed_showExcerpt"]').length > 0) {
            $(this).parent().parent().next('.contentSettings').toggleClass('hidden');
        }
        if($(this).next('[id*="advanced_cookie_settings_checked"]').length > 0) {
            $(this).parent().parent().next('.contentSettings').toggleClass('hidden');
        }
        if($(this).next('[id*="avoid_widget_caching_checked"]').length > 0) {
            $(this).parent().parent().next('.contentSettings').toggleClass('hidden');
        }
    });

    $(document).on('click','.lv_link', function(){
        var dd_switch_sibling = $(this).parent().parent().find('.dd-switch');

        $(this).toggleClass('button-primary');
        $(this).next('input').trigger("click");

        if ($(this).hasClass( 'button-primary' ) && !dd_switch_sibling.hasClass('on')) {
            dd_switch_sibling.trigger("click");
        }
    });

    $(document).on('click','.js-collapse', function(e){
        e.preventDefault();
        $(this).next().toggleClass('visible');
    });

    function bindSelect () {
        var disableAccessibilityMode =  $('.editwidget');

        if (disableAccessibilityMode.length) {
            disableAccessibilityMode.find('.js-types-and-terms').select2({
                width: '100%',
                containerCssClass: "ddlv-types-and-terms"
            });
            disableAccessibilityMode.find('.js-exclude-ids').select2({
                tags: true,
                tokenSeparators: [',', ' '],
                width: '100%',
                containerCssClass: "ddlv-exclude-ids",
                maximumSelectionLength: 0,
                dropdownCss: { 'display': 'none' },
                createTag: function (params) {
                    // Don't offset to create a tag if there is no @ symbol
                    if (isNaN(params.term)) {
                        // Return null to disable tag creation
                        return null;
                    }

                    return {
                        id: params.term,
                        text: params.term
                    }
                }
            });
        }

        var widgetSelector = ".widget[id*=\'dd_last_viewed-\']";

        $(widgetSelector).each(function() {
            var selector = $(this).find('.js-types-and-terms'),
                id = $(this).attr('id').split('-'),
                selector_excl_ids = $(this).find('.js-exclude-ids');

            id = id[2];
            if(!selector.data('select2') && id !== '__i__') {
                selector.select2({
                    width: '100%',
                    containerCssClass: "ddlv-types-and-terms"
                });
                selector_excl_ids.select2({
                    tags: true,
                    tokenSeparators: [',', ' '],
                    width: '100%',
                    containerCssClass: "ddlv-exclude-ids",
                    maximumSelectionLength: 0,
                    dropdownCss: { 'display': 'none' },
                    createTag: function (params) {
                        // Don't offset to create a tag if there is no @ symbol
                        if (isNaN(params.term)) {
                            // Return null to disable tag creation
                            return null;
                        }

                        return {
                            id: params.term,
                            text: params.term
                        }
                    }
                });
            }
        });
    }
    
} )( jQuery );