
<div class="modal-header ">
    <a type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">x</span>
        <span class="sr-only">Close</span>
    </a>
    <h4 id="myModalLabel" class="modal-title">Change User Password</h4>
</div>
<form id="update-admin-pwd" action="/{$globals.users.password|cat:($userId)}" method="post" enctype="multipart/form-data">
    <div class="modal-body ovh">
        <div class="reg-page-wrapper">
            <div class="reg-form-wrapper">
                <div class="width-f pl">
                        <div class="width-f pl mg10b">
                            <div class="width-f pl pg1pr">
                                <div class="width50 pl pg1pr">
                                    <div class="width-f pl pg10a">
                                        <h4 class="mg5b">
                                            <i class="fa  fa-key mg5r"></i>
                                            New Password
                                        </h4>
                                        <input class="input form-control form-item validate[required]" name="pwd" type="password" placeholder="New Password"/>
                                    </div>                                            
                                </div>
                                <div class="width50 pl pg1pr">
                                    <div class="width-f pl pg10a">
                                        <h4 class="mg5b">
                                            <i class="fa  fa-key mg5r"></i>
                                            Confirm New Password
                                        </h4>
                                        <input class="input form-control form-item validate[required]" name="conf_pwd" type="password" placeholder="Confirm password"/>
                                    </div>                                            
                                </div>
                            </div>
                        </div>  
                        <div class="width-f pl textc">
                            <div class="status"></div>
                            <button class="btn btn-info" type="submit">Update User Password</button>
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
            $('#update-admin-pwd').ajaxForm({ //.validationEngine('attach')
                'beforeSubmit': function () {
                    // Show loader
                    $('.status').Loader('Submitting...');
                    return true;
                },
                'resetForm': true,
                'success': function (resp) {
                    //msg and/or redirection to another url
                    $('.status').Pesalert(!resp.status || false ? 'info' : 'danger', resp.msg || 'Success');                    
                        closeModal();                    
                }
            });
        });
    </script> 
{/literal}
