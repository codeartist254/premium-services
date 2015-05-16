/**
 * @project Keshaa
 * @author Murwa
 * @copyright (c) Copyright 2014 PD. All Rights Reserved.
 */
// Define a global varriable for wysiwyg keshaa
var wysikeshaa = {
    "font-styles" : false, //Font styling, e.g. h1, h2, etc. Default true
    "emphasis" : true, //Italics, bold, etc. Default true
    "lists" : true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
    "html" : false, //Button which allows you to edit the generated HTML. Default false
    "link" : true, //Button to insert a link. Default true
    "image" : false, //Button to insert an image. Default true,
    "color" : true //Button to change color of font
};
// create an fn function for a loader...
$.fn.Loader = function(txt) {
    txt = typeof txt === 'undefined' ? '' : txt;
    var img = $('<img />', {
        src : document.cdn + 'images/ajax-loader.gif'
    }),
        span = $('<span />', {
        id : 'loader-span'
    });
    if (this.find('span#loader-span').length === 0) {
        var content = $(span).html(txt).append(img);

        // Content should be appended only into a div or a span
        if ($(this).is('div') || $(this).is('span')) {
            // Add content
            $(this).html(content);
        }

        // In case the parent is not visible, show it!
        if (!this.is(':visible')) {
            this.show();
        }
    }
    return this;
};
$.fn.RemoveLoader = function() {
    this.find('span#loader-span').fadeOut('fast', function() {
        this.remove();
    });
    return this;
};

// Create fn for adding an alert to the content!
$.fn.Pesalert = function() {
    var type = arguments[0] || 'info',
        div = $('<div>', {
        'class' : 'alert alert-dismissable alert-' + type,
        'html' : arguments[1] || 'Information'
    }).append($('<button>', {
        'class' : 'close',
        'data-dismiss' : 'alert',
        'aria-hidden' : true,
        'html' : '&times;'
    }));
    // Remove a loader, if any!
    $(this).RemoveLoader();
    // Add what we have to the parent, bt first, we need to remove an alert; if
    // originally present!
    $('.alert .close').trigger('click');
    return arguments[2] || false ? $(this).prepend(div) : $(this).append(div);
};

// Use a dedicated class - imager
$.fn.Imager = function() {
    $(document).on('change', this.selector, function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            var imager = $(this).parents('form').find('.imager').Loader('Working, please wait!');
            reader.onload = function(e) {
                imager.html($('<img/>', {
                    'src' : e.target.result
                }));
            };
            reader.readAsDataURL(this.files[0]);
        };
    });
    return $(this).parents('form') || this;
};

// Load stuff via ajax
$.fn.ajaxMagic = function() {
    $(this).each(function() {
        var data = {},
            url = null;
        $.extend(data, $(this).data() || {});
        // Get the url from the object
        url = data.content;

        // remove url from object
        delete data.content;

        // Get the data
        $(this).load(url, data, function() {
            // Incase there is any time object
            setLiveStamp();
        });
    });
};

$.fn.maps = function (){
    // Define a function to load google maps
    function loadMap(target){
        try{
            var googleMapsLoaded = $.Deferred();
            googleMapsCallback = function() {
                googleMapsLoaded.resolve();
            };
            $.extend({
                loadGoogleMaps : function() {
                    $.ajax({
                        url : "https://maps.googleapis.com/maps/api/js?v=3&callback=googleMapsCallback&sensor=false",
                        dataType : "script"
                    }).fail(googleMapsLoaded.reject);
                    return googleMapsLoaded.promise();
                }
            });
            $.loadGoogleMaps().done(function() {
                $(target).maps();
            });
        }    
        catch(e){
            // Kanyagia!
        }    
    } 
    
    // Load maps
    if ($(this).data('address') || false) {
        // Are maps loaded?
        var target = this;
        if(typeof google === 'object'){
            try{
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    'address' : $(this).data('address')
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        $(target).html($('<img/>').attr('src', 'https://maps.googleapis.com/maps/api/staticmap?center=' + results[0].geometry.location.lat() + ',' + results[0].geometry.location.lng() + '&zoom=10&size=700x250'));
                    }
                });
            }
            catch(e){
                // Tulia na hapa!
            }
        }else{
            loadMap(this);                       
        }        
    };
};

// Close the modal after 0.5 sec; or as specified!
function closeModal() {
    setTimeout(function() {
        $('.modal:visible').modal('hide');
    }, arguments[0] || 500);
}

// Heads up for a modal hidden event; clear the status!
$(document).on('hidden.bs.modal', '.modal', function() {
    $(this).find('.status, .imager').empty();
});

//$.ajaxSetup({
//    'dataType' : 'json',
//    'clearForm' : true,
//    'cache' : false,
//    'error' : function() {
//        // Handl errors here
//    },
//    'complete' : function() {
//        // Perform some action
//        setLiveStamp();
//
//        // Initiate tooltips
//        //$('[role="tooltip"]').tooltip();
//        try {
//            $('.readmore').readmore({
//                moreLink : '<i><a class="bold cr3" href="#">more + +</a></i>',
//                lessLink : '<i><a class="bold cr1" href="#">less - -</a></i>',
//                afterToggle : function(trigger, element, expanded) {
//                    if (!expanded) {
//                        $('html, body').animate({
//                            scrollTop : element.offset().top
//                        }, {
//                            duration : 200
//                        });
//                    }
//                }
//            });
//        } catch(e) {
//            console.log(e);
//        }
//    }
//});

function setLiveStamp() {
    $('.time').each(function() {
        var time = $(this).data('time');
        // Is it a livestamp already?
        if (!$(this).livestamp('isLivestamp')) {
            $(this).livestamp(time);
        };
    });
}

/**
 * Handle fos(fetch on show) role
 */
function fos(that) {
    // Get the field!
    $(that).find('*[role=fos]').each(function() {
        var data = $(this).data() || {},
            url = data.connect || null;
        if (!url) {
            return;
        };
        // Construct an ajax request
        $.ajax({
            'url' : url,
            'type' : 'post',
            'data' : (function() {
                var postData = {};
                for (i in data) {
                    if (i !== 'connect' && i !== 'wysihtml5') {
                        postData[i] = data[i];
                    };
                }
                return postData;
            })(),
            'target' : this,
            'dataType' : 'text',
            'success' : function(resp) {
                $(this.target).val(resp);
            }
        });
    });
}

$(document).ready(function(e) {
    // Deal load tab contents first time on show
    $('*[role=tab]').each(function() {
        $(this).one('show.bs.tab', function(e) {
            var target = $(this).attr('href') || '',
                data = $(target).data() || false;
            if (data.target) {
                target = data.target;

            };
            if ($(target).length > 0 && data) {
                if (data.targetLink) {
                    $(target).load(data.targetLink, function() {
                        $(target).find('*[role=ajax]').ajaxMagic();
                    });
                } else {
                    $(target).find('*[role=ajax]').ajaxMagic();
                    $('*[role=map]').maps();
                };
            }
        });
    });

    // Handle tab display - and url hashes
    $('*[role=tab]').on('show.bs.tab', function() {
        window.location.hash = $(this).attr('href');
    });

    // will show tab based on hash
    function refreshHash() {
        $('a[href="' + window.location.hash + '"]').tab('show');
    }

    // show tab if hash changes in address bar
    $(window).bind('hashchange', refreshHash);

    // read has from address bar and show it
    if (window.location.hash) {
        // show tab on load
        refreshHash();
    }

    // Global image upload viewer
    $('.pictorial').Imager();
    // Avoid an exception here!
    //try {
    //    $('textarea').autogrow({
    //        onInitialize : true
    //    });
    //
    //    // Set a livestamp on any active timeago object
    //    setLiveStamp();
    //
    //    //instantiate the global search...
    //    $('*[role=search]').pesasearch();
    //} catch(e) {
    //    console.log(e);
    //}

    // Add fancy placeholder
    $(document).on('focusin click', '.custom-lr', function(e) {
        $(this).find('label.off').toggleClass('off on');
        if (!$(this).find('textarea, input').is(':focus')) {
            $(this).find('textarea, input').focus();
        };
    });

    /**
     * Validate and submit forms in modals
     */
    $(document).on({
        'loaded.bs.modal' : function(e) {
            var form = $(this).find('form'),
                status = form.find('.status');
            form.validationEngine('attach').ajaxForm({
                'beforeSubmit' : function() {
                    // Check for a specific field
                    var valid = $('#speaker').length === 0 || ($('#speaker').data('value') || false);
                    if (valid) {
                        $(status).Loader('Working. Please be patient...');
                    };
                    return valid;
                },
                'status' : status,
                'resetForm' : true,
                'success' : function(resp) {
                    $(this.status).Pesalert('info', resp.msg || "Something went wrong");
                    // Is it a success?
                    if (!resp.status || false) {
                        closeModal(800);
                    };
                    if (resp.url || false) {
                        window.location = resp.url;
                    };
                }
            });
            fos(this);
            // Attach editor on text area
            form.find('textarea').wysihtml5(wysikeshaa);
            // Add autocomplete - get the sermon speaker
            $('#speaker').autocomplete({
                'source' : $('#speaker').data('target'),
                'minLength' : 2,
                'select' : function(e, ui) {
                    $(this).data({
                        'value' : ui.item.id
                    });
                    $(this).siblings('input').val(ui.item.id);
                }
            });
        },
        'show.bs.modal' : function(e) {
            // Run fos
            fos(this);
        }
    }, '.modal.formy');

    $('form[name=keshaa-invites]').validationEngine('attach').ajaxForm({
        'beforeSubmit' : function() {
            $('.status').Loader('Working. Please be patient...');
        },
        'clearForm' : true,
        'success' : function(responce) {
            $('.status').Pesalert('info', responce.msg || "Something went wrong");
        }
    });

    // Checkout for all ajax loadable
    $('*[role=ajax]').ajaxMagic();

    // Checkout for all remote executables
    (function() {
        var data = {},
            url = null,
            type = null;

        $(document).on('click', '*[role=sts]', function() {
            data = {
                'dataType' : 'json',
                'type' : 'post'
            };
            $.extend(data, $(this).data() || {});
            url = data.remote;
            type = data.type;

            // Clean data
            delete data.remote;
            delete data.type;

            // If remote is not set, check for the href
            if (!url && $(this).is('a')) {
                url = $(this).attr('href');
            };

            // If still we have no url, quit!
            if (!url) {
                return false;
            };

            // Get the data
            $.ajax({
                'type' : type,
                'dataType' : data.dataType,
                'url' : url,
                'data' : data,
                'success' : (function() {// Use anonymous function here to ensure the use of data.success is not messed up
                    var result = function(resp) {
                        console.log(resp);
                    };
                    switch(data.success) {
                    case 'porch' :
                        {
                            result = function(resp) {
                                if (!resp.status || false) {
                                    $(this.target).fadeOut('fast', function() {
                                        $(this).addClass('hidden').siblings('input, a').removeClass('hidden').fadeIn();
                                    });
                                };
                            };
                        }
                    break;
                    case 'pray' :
                        {
                            result = function(resp) {
                                var target = $(this.target).next('a').children();
                                if (!resp.status || false && target.length > 0) {
                                    var cnt = target.data('prayers');
                                    target.data({
                                        'prayers' : ++cnt
                                    }).html(cnt);
                                    $(this.target).text('You prayed for this');
                                };
                            };
                        }
                        break;
                    case 'prayerlist' :
                        {
                            result = function(resp) {
                                resp = Number(resp);
                                if (resp) {
                                    var cnt = $(this.target).parent().data('list');
                                    $(this.target).siblings('a[role=sts]').andSelf().toggleClass('hidden');

                                    // Update the count
                                    resp += cnt;
                                    switch($(this.target).data('mode')) {
                                    case 'prayer' :
                                        {
                                            $('.prayers-listing').data({
                                                'list' : resp
                                            }).find('.prayers-count').html(resp);
                                        }
                                        break;
                                    case 'sermon' :
                                        {
                                            $(this.target).parent().data({
                                                'list' : resp
                                            }).find('.favcnt').html(resp);
                                        }
                                        break;
                                    default :
                                        {
                                            // Nothing to do here
                                        }
                                        break;
                                    };
                                };
                            };
                        }
                        break;
                    case 'prayerpop' :
                        {
                            result = function(resp) {
                                if (!isNaN(resp) || !resp.status || false) {
                                    // Needs to display a blocking message here!
                                    // Are we re-directing a user?
                                    if (resp.url || false) {
                                        window.location = resp.url;
                                        return;
                                    };
                                    $(this.target).closest('.keshaa-item').fadeOut('slow', function() {
                                        if ($(this).siblings('div').length === 0) {
                                            $('<div/>', {
                                                'html' : 'List is empty'
                                            }).insertAfter(this);
                                        };
                                        if ($(this).next('.divider').length) {
                                            $(this).next('.divider').andSelf().remove();
                                        } else {
                                            // This maybe a comment - cmc : comment counter
                                            var cmc = $(this).parents('.comments-box-wrapper').find('*[role=cmc]');
                                            if (cmc.length) {
                                                var cnt = cmc.data('comments');
                                                cmc.data({
                                                    comments : --cnt
                                                }).find('.comments-cnt').html(cnt);
                                            };
                                            $(this).remove();
                                        };
                                    });
                                };
                            };
                        }
                        break;
                    case 'slice' :
                        {
                            result = function(resp) {
                                if ($(resp).hasClass('keshaa-item')) {
                                    var slice = $(this.target).data();
                                    // Do some maths here!
                                    slice.showing += slice.sliceSize;
                                    // Decrease remaining count!
                                    slice.rem = slice.all - slice.showing;

                                    // Is rem less than 1?
                                    if (slice.rem < 1) {
                                        $(this.target).fadeOut('slow', function() {
                                            $(this).remove();
                                        });
                                    } else {
                                        // Increment showing count
                                        $(this.target).data({
                                            showing : slice.showing
                                        });
                                        $(this.target).find('.comment-sliced').html(slice.rem);
                                    }
                                    $(resp).insertBefore($(this.target).parents('.comments-box-upper').next('div').find('form'));
                                };
                            };
                        }
                        break;
                    }
                    return result;
                })(),
                'target' : this
            });
            return false;
        });
    })();
});
