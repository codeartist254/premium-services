<div class="modal-header  ">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <h4 class="modal-title ft20" id="myModalLabel">
        New Contact
    </h4>
</div>
<form id="new-contact-form" action="/{$globals.contacts.add_contact|cat:($userId)}" method="post" enctype="multipart/form-data">
    <div class="modal-body ovh">
        <div class="width-f pl pg20lr">
            <div class="width-f pl mg10b">
                <p>Enter the name and phone number of the contact to add, choose the group to add it to and then click on the 'Add Contact' button.</p>
            </div>
            <div class="width-f pl mg10b">
                <label class="width-f ">Full name</label>
                <input type="text" class="pg10a bor1 bora borcdd br3 width-f ta validate[required]" name="fullname" placeholder="Full name"/>
            </div>
            <div class="width-f pl mg10b">
                <label class="width-f ">Mobile number</label>
                <input type="text" class="pg10a bor1 bora borcdd br3 width-f ta validate[required]" name="mobile" placeholder="Mobile no."/>
            </div>
            <div class="width-f pl mg10b">
                <label class="width-f ">Add to</label>
                <select name="group" class="input">
                    <option>--Choose group--</option>
                    {foreach $groups as $group}
                        <option value="{$group.id}">{$group.name}</option>
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
    $('#new-contact-form').ajaxForm({ //.validationEngine('attach')
        'beforeSubmit': function () {
            return true;
        },
        'resetForm': true,
        'success': function (resp) {
            window.location = '/contacts/contacts'
        }
    });
</script>