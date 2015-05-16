<div class="details-wrapper">
    <div class="top-body">
        <div class="top-body-left"> {$user.0.fname} {$user.0.sname}</div>
        <div class="top-body-right"> 
            <a href="/{$globals.users.edit|cat:($user.0.id)}" data-target="#edit-user-modal" data-toggle="modal" class="btn btn-info btn-sm">
                <i class="fa fa-edit"></i> Edit
            </a> 
            {if $user.0.status eq 1}
              <a class="btn btn-success btn-sm" href="/{$globals.users.status|cat:($user.0.id)}">
                <i class="fa fa-power-off"></i>  
                ACTIVE
              </a>
            {elseif $user.0.status eq 0}
              <a class="btn btn-danger btn-sm" href="/{$globals.users.status|cat:($user.0.id)}">
                <i class="fa fa-power-off"></i>  
                INACTIVE
              </a>
            {/if}
        </div>
    </div>
    <div class="member-details">
        <div class="member-details-left" data-content="/{$globals.users.photo_show|cat:($user.0.id)}" role="ajax"> 
        </div>
        <div class="member-details-right">
            <p> <i class="fa fa-envelope"></i> &nbsp;&nbsp;{$user.0.email}</p>
            <p> <i class="fa fa-cog"></i> &nbsp;&nbsp;{$user.0.role}</p>
            <p> <i class="fa fa-user"></i> &nbsp;&nbsp;Agent Code : {$user.0.user_code}</p>
        </div>
    </div>
    <div class="member-details">
        <h1>User roles </h1>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    Can Setup System: 
                    {if ($user.0.can_setup_system) === 1}
                        <strong>Yes</strong>
                    {elseif ($user.0.can_setup_system) === 0}
                        <strong>No</strong>
                    {/if}
                </td>
                <td>&nbsp;</td>
                <td>
                    Can Manage Aggregators:
                    {if ($user.0.can_man_agg) === 1}
                        <strong>Yes</strong>
                    {elseif ($user.0.can_man_agg) === 0}
                        <strong>No</strong>
                    {/if}
                </td>
                <td>&nbsp;</td>
                <td>
                    Can Manage Members:
                    {if ($user.0.can_man_membs) === 1}
                        <strong>Yes</strong>
                    {elseif ($user.0.can_man_membs) === 0}
                        <strong>No</strong>
                    {/if}
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    Can Manage MSPs:
                    {if ($user.0.can_man_msps) === 1}
                        <strong>Yes</strong>
                    {elseif ($user.0.can_man_msps) === 0}
                        <strong>No</strong>
                    {/if}
                </td>
                <td>&nbsp;</td>
                <td>
                    Can Manage Partners:
                    {if ($user.0.can_man_partners) === 1}
                        <strong>Yes</strong>
                    {elseif ($user.0.can_man_partners) === 0}
                        <strong>No</strong>  
                    {/if}
                </td>
                <td>&nbsp;</td>
            </tr>
           
        </table>
    </div>  
</div>

{*edit user details modal*}
    <div id="edit-user-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content  br0">
                <!-- Content will be loaded here from "remote.php" file -->
            </div>
        </div>
    </div>
{*End*}

{literal}
    <script type="text/javascript">       
        $('#kava-user-status').tooltip({
            'show': true,
            'placement': 'top',
            'title': "Click here to change status"
        });
    </script>
{/literal}
