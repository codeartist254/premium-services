<div class="modal-header">
    <a type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">x</span>
        <span class="sr-only">Close</span>
    </a>
    <h4 id="myModalLabel" class="modal-title">Upload User Photo</h4>
</div>
<form id="upload-user-photo" action="/{$globals.users.photo_upload|cat:($userId)}" method="post" enctype="multipart/form-data">
    <div class="modal-body ovh">
        <div class="reg-page-wrapper">
            <div class="reg-form-wrapper">
                <div class="width-f pl">                   
                        <div class="width-f pl mg10b">
                            <div class="width-f pl pg1pr">
                                <div class="width-f pl pg1pr">
                                    <div class="width-f pl pg10a">
                                        <h4 class="mg5b">
                                            <i class="fa  fa-file-image-o mg5r"></i>
                                            Upload User Photo
                                        </h4>
                                        <input class="input form-control form-item validate[required]" value="{$details.0.email}" name="photo" type="file"/>
                                    </div>                                            
                                </div>
                            </div>
                        </div> 
                        <div class="width-f pl textc">
                            <div class="status"></div>
                            <button class="btn btn-info" type="submit">Upload Photo</button>
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
        $(document).ready(function() {
            $('form,input,select,textarea').attr("autocomplete", "off");
            //update existing aggregator
            $('#upload-user-photo').ajaxForm({ //.validationEngine('attach')
                'beforeSubmit': function () {
                    // Show loader
                    $('.status').Loader('Submitting...');
                    return true;
                },
                'resetForm': true,
                'success': function (resp) {
                    closeModal();
                }
            });
        });
    </script> 
{/literal}
