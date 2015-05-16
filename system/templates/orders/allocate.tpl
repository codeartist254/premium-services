<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <h4 class="modal-title " id="myModalLabel">
        Allocate SMS Units
    </h4>
</div>
<form id="allocate-sms-form" action="/{$globals.orders.allocate}" method="post" enctype="multipart/form-data">
    <div class="modal-body ovh">
        <div class="width-f pl pg20lr">
            <div class="width-f pl mg10b">
                <label class="width-f ">How many units do you need?</label>
                <input type="text" class="pg10a bor1 bora borcdd br3 width-f ta validate[required]" name="units" placeholder=""/>
            </div>
            <div class="width-f pl mg10b">
                <label class="width-f ">Allocate to: </label>
                <select name="client">
                    <option>Select Client</option>
                    {foreach $partners as $partner}
                        {if $partner.role neq 1}
                            <option value="{$partner.id}">{$partner.bname}</option>
                        {/if}
                    {/foreach}
                </select>
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
    $('#allocate-sms-form').ajaxForm({ //.validationEngine('attach')
        'beforeSubmit': function () {
            return true;
        },
        'resetForm': true,
        'success': function (resp) {
            window.location = '/';
        }
    });
</script>