<div class="modal-header  ">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <h4 class="modal-title ft20" id="myModalLabel">
        New Group
    </h4>
</div>
<form id="new-group-form" action="/{$globals.contacts.add_group|cat:($userId)}" method="post" enctype="multipart/form-data">
    <div class="modal-body ovh">
        <div class="width-f pl pg20lr">
            <div class="width-f pl mg10b">
                <label class="width-f ">Full name</label>
                <input type="text" class="input validate[required]" name="groupname" placeholder="Group name"/>
            </div>
            <div class="width-f pl mg10b">
                <label class="width-f ">Description</label>
                <textarea name="descr" cols="" rows="" class="input">

                </textarea>
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
    $('#new-group-form').ajaxForm({ //.validationEngine('attach')
        'beforeSubmit': function () {
            return true;
        },
        'resetForm': true,
        'success': function (resp) {
            window.location = '/contacts/groups'
        }
    });
</script>