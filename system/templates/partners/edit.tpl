<div class="width-f ovh bgee borb bor1 borccc">
    <h4 class="pg10a bold">
        Add a New Partner
    </h4>
</div>
<div class="new-partner-form-wrapper width-f ovh pg10a">
    <form id="edit-existing-partner" action="/{$globals.partners.update|cat:($partnerId)}" enctype="multipart/form-data" method="post">
        <div class="width-f ovh pg10a">
            <label>Business Name</label>
            <input type="text" name="biz_name" class="input" value="{$partner.0.biz}"/>
        </div>
        <div class="width-f ovh pg10a">
            <label>Phone</label>
            <input type="text" name="phone" class="input" value="{$partner.0.biz_mobile}"/>
        </div>
        <div class="width-f ovh pg10a">
            <label>Contact Person</label>
            <input type="text" name="person" class="input" value="{$partner.0.contact}"/>
        </div>
        <div class="width-f ovh pg10a">
            <label>Contact Person Phone</label>
            <input type="text" name="person_phone" class="input" value="{$partner.0.contact_phone}"/>
        </div>
        <div class="width-f ovh pg10a">
            <label>Contact Person Email</label>
            <input type="text" name="person_email" class="input" value="{$partner.0.contact_email}"/>
        </div>
        <div class="width-f ovh pg10a">
            <input type="submit" value="Submit" class="btn btn-primary"/>
        </div>
    </form>
</div>

<script type="application/javascript">
    $(document).ready(function () {
        $('#edit-existing-partner').ajaxForm({
            'beforeSubmit': function () {
            },
            'resetForm': true,
            'success': function (resp) {
                // Show message and/or redirect to url!
                if (resp) {
                    alert('Be patient work in Progress ;-)');
//                    window.location = '/partners/main';
                }
            }
        });
    });
</script>