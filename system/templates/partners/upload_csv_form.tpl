 <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Clients Details</h4>
</div>
<form id="upload_csv" action="/partners/csv/{$partnerId}" method="post" enctype="multipart/form-data">
    <div class="modal-body ovh">
       <div class="reg-page-wrapper">
            <div class="reg-form-wrapper">
                <div class="width-f pl">                   
                    <div class="width-f pl mg10b">
                        <div class="width-f pl pg1plr">
                            <h4 class="mg5b">
                                <i class="fa folder-o mg5r"></i>
                                Upload CSV file
                            </h4>
                            <div class="width-f">
                                <span class="btn btn-default btn-file width-f">
                                    <input id="input-1" type="file" class="file" name="csv"> 
                                </span>                                  
                            </div>
                        </div>
                    </div>
                    <div class="width-f pl textc">
                        <div class="status"></div>
                        <button class="btn btn-info" type="submit">Submit</button>                            
                    </div>
                </div>
            </div>
        </div>        
    </div>
   <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</form>

{literal}
    <script type="text/javascript">
        //A touch of jQuery magic to keep an eye on the file input
        $(document).on('change', '.btn-file :file', function(){
            var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);    
        });

        $(document).ready( function() {
            $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
               console.log(label);
            });
        });

        //Uplaod CSV document
        $('#upload_csv').ajaxForm({ //validationEngine('attach')
            'beforeSubmit': function () {
                // Show loader
                $('.status').Loader('Submitting...');
                return true;
            },
            'resetForm': true,
            'success': function (resp) {
                //msg and/or redirection to another url
                $('.status').Pesalert(!resp.status || false ? 'info' : 'danger', resp.msg || 'Success');
                if (resp) {
                    window.location = '/partners/list';
                }
            }
        });
    </script>
{/literal}