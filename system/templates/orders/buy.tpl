<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <h4 class="modal-title " id="myModalLabel">
        Buy SMS Units
    </h4>
</div>
<form id="order-sms-form" action="/{$globals.orders.order|cat:($userId)}" method="post" enctype="multipart/form-data">
    <div class="modal-body ovh">
        <div class="width-f pl pg20lr">
            <div class="width-f pl mg10b">
                <label class="width-f ">How many units do you need?</label>
                <input type="text" class="pg10a bor1 bora borcdd br3 width-f ta validate[required]" name="units" placeholder=""/>
            </div>
            <div class="width-f pl mg10b">
                <label class="width-f ">Payment Options</label><br/>
                {*<input type="text" class="pg10a bor1 bora borcdd br3 width-f ta validate[required]" name="units" placeholder=""/>*}
                <label class="width-f pl" for="">
                    <div class="pl custom-radio mg10r">
                        <input id="buy-format1" type="radio" name="buy-sms" value="mpesa" checked/>
                        <label for="buy-format1">.</label>
                    </div>
                        Mpesa (897787,09099089);

                </label>
                <label class="width-f pl" for="">
                    <div class="pl custom-radio mg10r">
                        <input id="buy-format2" type="radio" name="buy-sms" value="airtel"/>
                        <label for="buy-format2">.</label>
                    </div>
                        Airtel Money

                </label>
                <label class="width-f pl" for="">
                    <div class="pl custom-radio mg10r">
                        <input id="buy-format3" type="radio" name="buy-sms" value="cheque"/>
                        <label for="buy-format3">.</label>
                    </div>
                        Cheque

                </label>
                <label class="width-f pl" for="">
                    <div class="pl custom-radio mg10r">
                        <input id="buy-format4" type="radio" name="buy-sms" value="elec"/>
                        <label for="buy-format4">.</label>
                    </div>
                        Electronic  Transfer

                </label>
                <label class="width-f pl" for="">
                    <div class="pl custom-radio mg10r">
                        <input id="buy-format5" type="radio" name="buy-sms" value="other"/>
                        <label for="buy-format5">.</label>
                    </div>
                        Other

                </label>
            </div>
        </div>
    </div>
    <div class="modal-footer ovh">
        <div class="status"></div>
        <button class="btn btn-default" data-dismiss="modal" type="reset">Close</button>
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>

<script type="text/javascript">
    //submit new contact
    $('#order-sms-form').ajaxForm({ //.validationEngine('attach')
        'beforeSubmit': function () {
            return true;
        },
        'resetForm': true,
        'success': function (resp) {
            alert('Your order has been successfully placed');
            window.location = '/';
        }
    });
</script>