$(document).ready(function() {

    $('form,input,select,textarea').attr("autocomplete", "off");

    //data table Lists
    $('#partners-list, #orders-list, #payments-list, #contacts-list, #groups-list, #all-list, #scheduled-list, #sent-list').dataTable({
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
    
    //table row click
    $( "#partners-list tbody tr,  #orders-list tbody tr, #payments-list tbody tr, #all-list tbody tr, #sent-list tbody tr, #scheduled-list tbody tr, #groups-list tbody tr, #contacts-list tbody tr" ).on( "click", function( event ) {
        var msgId = $(this).attr('id');
    	$('#msg-details, #sent-details, #scheduled-details').load("/messages/details/" + msgId);

        var partnerId = $(this).attr('id');
    	$('#partner-details').load("/partners/details/" + partnerId);

        var orderId = $(this).attr('id');
    	$('#order-details').load("/orders/details/" + orderId);

        var paymentId = $(this).attr('id');
    	$('#payment-details').load("/orders/details/" + paymentId);

        var contactId = $(this).attr('id');
    	$('#group-details, #contact-details').load("/contacts/details/" + contactId);
    });

	//Sort all ajax loadables
	$('*[role=ajax]').ajaxMagic();
});
