<div class="modal-header">
    <a type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">x</span>
        <span class="sr-only">Close</span>
    </a>
    <h4 id="myModalLabel" class="modal-title">Edit User Details</h4>
</div>
<form id="update-kava-user" action="/{$globals.users.update|cat:($userId)}" method="post" enctype="multipart/form-data">
    <div class="modal-body ovh">
        <div class="reg-page-wrapper">
            <div class="reg-form-wrapper">
                <div class="width-f pl">                   
                       <div class="width-f pl mg10b">
                            <div class="width50 pl pg1pr">
                                <div class="width-f pl pg10a">
                                    <h4 class="mg5b">
                                        <i class="fa fa-user mg5r"></i>
                                        First Name
                                    </h4>
                                    <input class="input form-control form-item validate[required]" value="{$details.0.fname}" name="fname" type="text" placeholder="Name"/>
                                </div>
                            </div>
                            <div class="width50 pl pg1pr">
                                <div class="width-f pl pg10a">
                                    <h4 class="mg5b">
                                        <i class="fa fa-user mg5r"></i>
                                        Last Name
                                    </h4>
                                    <input class="input form-control form-item validate[required]" value="{$details.0.sname}" name="lname" type="text" placeholder="Last name"/>
                                </div>
                            </div>
                        </div>
                        <div class="width-f pl mg10b">
                            <div class="width-f pl pg1pr">
                                <div class="width50 pl pg1pr">
                                    <div class="width-f pl pg10a">
                                        <h4 class="mg5b">
                                            <i class="fa fa-envelope mg5r"></i>
                                            Email
                                        </h4>
                                        <input class="input form-control form-item validate[required]" value="{$details.0.email}" name="email" type="text" placeholder="Email"/>
                                    </div>                                            
                                </div>
                                <div class="width50 pl pg1pr">
                                    <div class="width-f pl pg10a">
                                        <h4 class="mg5b">
                                            <i class="fa fa-cog mg5r"></i>
                                            Role
                                        </h4>
                                        <select class="input form-control form-item validate[required]" name="role" placeholder="Role">
                                            <option value=""></option>
                                            {foreach $roles as $role}
                                                <option {if $details.0.role_id eq $role.id} selected='selected' {/if} value="{$role.id}">{$role.role_title}</option>
                                            {/foreach}
                                        </select>
                                    </div>                                            
                                </div>
                            </div>
                        </div> 
                        <div class="width-f pl textc">
                            <div class="status"></div>
                            <button class="btn btn-info" type="submit">Update User</button>
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
            $('#update-kava-user').ajaxForm({ //.validationEngine('attach')
                'beforeSubmit': function () {
                    // Show loader
                    $('.status').Loader('Submitting...');
                    return true;
                },
                'resetForm': true,
                'success': function (resp) {
                    //msg and/or redirection to another url
                    $('.status').Pesalert(!resp.status || false ? 'info' : 'danger', resp.msg || 'Success');                    
                        window.location = '/users/list'                    
                }
            });
        });
    </script> 
{/literal}
