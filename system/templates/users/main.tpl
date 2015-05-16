{include file="shared/header.tpl"}
<body class="hgti">

{include file="shared/header_wrapper.tpl"}
<div class="admin-content-wrapper">
    {include file="shared/sidebar.tpl"}
    <div class="admin-content-right">
        <div id="dashboard" class="width-f pl tab-pane fade in active hgt100p">
            <div class="admin-content-header">
                <div class="admin-content-header-wrapper">
                    <h2 class="pl">Registered Clients</h2>
                    <div class="pr ">
                    </div>
                </div>
            </div>
            <div class="body-content custom-scrollbar">
                <div class="width-f pl pg20tb pg10lr">
                    <div class="width100 ovh pl">
                        <div class="row">
                            <div class="col-md-4">
                                <ul id="nav-container">
                                    <li>
                                        <a class="btn btn-info" data-target="#new-user-modal" href="/{$links.users.new}" data-toggle="modal">
                                            Add
                                        </a>
                                    </li>
                                    {*<li>*}
                                        {*<a class="btn btn-info">*}
                                            {*Edit*}
                                        {*</a>*}
                                    {*</li>*}
                                    {*<li>*}
                                        {*<a class="btn btn-info">*}
                                            {*Profile*}
                                        {*</a>*}
                                    {*</li>*}
                                </ul>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <table id="users-tbl" class="display" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date Created</th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date Created</th>
                                </tr>
                                </tfoot>

                                <tbody>
                                    {foreach $users as $user}
                                        <tr>
                                            <th><input type="checkbox" name="myTextEditBox" value="checked" /></th>
                                            <td>{$user.fname} {$user.lname}</td>
                                            <td>{$user.email}</td>
                                            <td>{$user.phone}</td>
                                            <td>{$user.since}</td>
                                        </tr>
                                    {foreachelse}
                                        <tr>No users yet</tr>
                                    {/foreach}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="width_auto ovh pg20l">

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //messages data tables
    $(document).ready(function() {
        $('#users-tbl').DataTable();
    } );
</script>

{*Add new user modal*}
<div class="modal fade" id="new-user-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body ovh">

            </div>
        </div>
    </div>
</div>
{*End*}
</body>
</html>