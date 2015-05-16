// JavaScript Document

$(document).ready(function (e) {
    // cache the id
    var navbox = $('.nav-tabs');

    // activate tab on click
    navbox.on('click', 'a', function (e) {
        var $this = $(this);
        // prevent the Default behavior
        e.preventDefault();
        // send the hash to the address bar
        window.location.hash = $this.attr('href');
        // activate the clicked tab
        $this.tab('show');
    });

    // will show tab based on hash
    function refreshHash() {
        navbox.find('a[href="' + window.location.hash + '"]').tab('show');
    }

    // show tab if hash changes in address bar
    $(window).bind('hashchange', refreshHash);

    // read has from address bar and show it
    if (window.location.hash) {
        // show tab on load
        refreshHash();
    }
    $('a[href="#"]').click(function (e) {
        e.preventDefault();
    });


    $(".admin-navigation li a").click(function () {
        //$(this).children('.user_menu').toggleClass('hide');
        console.log('am here');
    });

});

(function ($) {
    $(window).load(function () {

        //$.mCustomScrollbar.defaults.scrollButtons.enable=true; //enable scrolling buttons by default

        $(".custom-scrollbar").mCustomScrollbar({
            //setHeight:340,
            theme: "dark"
        });
    });
})(jQuery);
