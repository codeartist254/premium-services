$(document).ready(function() {

    $('form,input,select,textarea').attr("autocomplete", "off");

    //loading data table content from the server
    $(document).ready(function() {
        $('#members-list').dataTable( {
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/members/load"
        } );
    } );

    //data table Lists
    $('#user-list, #role-list, #member-list, #partner-list, #agg-list, #msp-list, #partner-type-list').dataTable({
        "paging": false,
        "info": false,
        "bSort": false,
        "oLanguage": { "sSearch": "" } 
    });
    
    $('.dataTables_filter input').attr("placeholder", "Search");

    $("tbody tr").on('click',function(event) {
        $("tbody tr").removeClass('row_selected');        
        $(this).addClass('row_selected');
    });

    //submit new user
    $('#add-new-user').validationEngine('attach').ajaxForm({
        'beforeSubmit': function () {
            // Show loader
            $('.status').Loader('Submitting...');
            return true;
        },
        'resetForm': true,
        'success': function (resp) {
            //window.location = '/users/list'
        }
    });

    //submit new role
    $('#add-new-role').validationEngine('attach').ajaxForm({
        'beforeSubmit': function () {
            // Show loader
            $('.status').Loader('Submitting...');
            return true;
        },
        'resetForm': true,
        'success': function (resp) {
            window.location = '/roles/list'
        }
    });

    //submit new partner
    $('#add-new-agg').validationEngine('attach').ajaxForm({
        'beforeSubmit': function () {
            // Show loader
            $('.status').Loader('Submitting...');
            return true;
        },
        'resetForm': true,
        'success': function (resp) {
            window.location = '/aggregators/list'
        }
    });

    //submit new member
    $('#add-new-member').validationEngine('attach').ajaxForm({
        'beforeSubmit': function () {
            // Show loader
            $('.status').Loader('Submitting...');
            return true;
        },
        'resetForm': false,
        'success': function (resp) {
            var data = $.parseJSON(resp);
            if(data.error == true) {
                alert(data.message);
            } else {
                window.location = '/members/list';
            }
            //
        }
    });

    //submit new partner
    $('#add-new-partner').validationEngine('attach').ajaxForm({
        'beforeSubmit': function () {
            // Show loader
            $('.status').Loader('Submitting...');
            return true;
        },
        'resetForm': true,
        'success': function (resp) {
            window.location = '/partners/list'
        }
    });

    //submit new partner type
    $('#add-partner-type').ajaxForm({ //.validationEngine('attach')
        'beforeSubmit': function () {
            // Show loader
            $('.status').Loader('Submitting...');
            return true;
        },
        'resetForm': true,
        'success': function (resp) {
            window.location = '/partner_types/list'
        }
    });

    //submit new medical service provider
    $('#add-new-msp').validationEngine('attach').ajaxForm({
        'beforeSubmit': function () {
            // Show loader
            $('.status').Loader('Submitting...');
            return true;
        },
        'resetForm': true,
        'success': function (resp) {
        	//alert(resp);
            window.location = '/msps/list'
        }
    });
    
    //table row click
    $( "#members-list tbody tr, #user-list tbody tr, #partner-list tbody tr, #msp-list tbody tr, #agg-list tbody tr, #role-list tbody tr, #partner-type-list tbody tr" ).on( "click", function( event ) {
        var memberId = $(this).attr('id');
    	$('#members-details').load("/members/details/"+memberId);

        var userId = $(this).attr('id');
        $('#user-details').load("/users/details/"+userId);

        var partnerId = $(this).attr('id');
        $('#partner-details').load("/partners/details/"+partnerId);

        var mspId = $(this).attr('id');
        $('#msp-details').load("/msps/details/"+mspId);

        var aggId = $(this).attr('id');
        $('#aggregator-details').load("/aggregators/details/"+aggId);

        var roleId = $(this).attr('id');
        $('#role-details').load("/roles/details/"+roleId);

        var typeId = $(this).attr('id');
        $('#partner-type-details').load("/partner_types/details/"+typeId);
    });

});
