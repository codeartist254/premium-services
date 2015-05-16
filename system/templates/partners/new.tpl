<div class="width-f ovh bgee borb bor1 borccc">
    <h4 class="pg10a bold">
        Add a New Partner
    </h4>
</div>
<div class="new-partner-form-wrapper width-f ovh pg10a">
    <form id="add-new-partner" action="/{$globals.partners.submit|cat:($userId)}" enctype="multipart/form-data" method="post">
        <div class="width-f ovh pg10a">
            <label>Business Name</label>
            <input type="text" name="biz_name" class="input"/>
        </div>
        <div class="width-f ovh pg10a">
            <label>Phone</label>
            <input type="text" name="phone" class="input"/>
        </div>
        <div class="width-f ovh pg10a">
            <label>Contact Person</label>
            <input type="text" name="person" class="input"/>
        </div>
        <div class="width-f ovh pg10a">
            <label>Contact Person Phone</label>
            <input type="text" name="person_phone" class="input"/>
        </div>
        <div class="width-f ovh pg10a">
            <label>Contact Person Email</label>
            <input type="text" name="person_email" class="input"/>
        </div>
        <div class="width-f ovh pg10a">
            <input type="submit" value="Submit" class="btn btn-primary"/>
        </div>
    </form>
</div>

<script type="application/javascript">
    $(document).ready(function () {
        $('#add-new-partner').ajaxForm({
            'beforeSubmit': function () {
                // Show loader
//                $('.status').Loader('Submitting...');
            },
            'resetForm': true,
            'success': function (resp) {
                // Show message and/or redirect to url!
                if (resp) {
                    window.location = '/partners/main';
                }
            }
        });
    });
</script>