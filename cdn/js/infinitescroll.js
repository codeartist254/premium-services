/**
 **	Manage infinite scroll
 **	@project: Pesadata
 * 	@copyright (c) Copyright 2014 PD. All Rights Reserved.
 **	@author: @murwa2013
 **/
(function(){
    var scroller = function(settings){
        this.settings = settings;
        this.init = init;
        return this;
    };
    function init(){
        var settings = this.settings;

        // Do we have a url?
        if (!settings.targetFeeds) {
            throw('No link specified');
        };

        settings.cdn = document.cdn;
        $(settings.scroller).scrollTop(0).off('scroll');

        // Make the loader first time!

        var loader = new Image();
        loader.src = settings.cdn + settings.loaderSrc;
        settings.loaderId = loader.id = 'infiload';

        // Add to settings object!
        settings.loader = loader;

        // Bind the done loading event!
        $(document).on('done.scroller', function (e){
            // Remove the loader!
            $('#' + settings.loaderId).remove();
            return false;
        });

        $(settings.scroller).on('scroll', function(e) {
            // Do we have a target?
            if (!settings.target || $(settings.target).length === 0) {
                return;
            };
            if (!settings.loading) {
                if ($(settings.scroller).scrollTop() + $(settings.scroller).height() >= $(settings.doc).height() * settings.offSet) {
                    if ($(settings.target).is(':visible')) {
                        infiniteLoad(settings);
                    };
                }
            }
        });
        return this;
    }
    function infiniteLoad(settings){
        // Add the current page to the data object
        settings.data.page = ++settings.page;

        // Send request
        $.ajax({
            type : 'POST',
            dataType : 'html',
            url: settings.targetFeeds,
            data : settings.data,
            beforeSend: function() {
                settings.loading = true;
                $(settings.loader).clone().appendTo(settings.target);
            },
            success: function(html) {
                $(document).trigger('done.scroller');
                if (!html || $(html).children().length <= 0 || $(html).find('#end').length > 0 || $(html).attr('id') === 'end') {
                    $(settings.scroller).off('scroll');
                }
                if (settings.selector) {
                    html = $(html).filter(settings.selector).html();
                };

                // Remove end if any!
                $(settings.target).find('#end').remove();

                // Add results
                $(html).appendTo(settings.target);
                settings.done(settings);
                settings.loading = false;
            }
        });
    }
    //define default values...
    $.fn.scroller = function ($options){
        $(this).each(function (){
            var scrolled = new scroller($.extend({
                target: this,			// Results holder
                page: 0,
                loading : false,
                data: {},
                targetFeeds: $(this).data('target-feeds'),				// Url
                offSet: 0.7,
                selector : null,
                done : function(){
                    // Remove the scroller!
                },
                scroller : window,		// What to listen on
                doc : document,			// Whole content
                loaderSrc : 'images/ajax-loader.gif'
            }, $options, $(this).data())).init();
        });
    };
})(jQuery);