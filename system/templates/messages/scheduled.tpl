{include file="shared/header.tpl"}

<body>
{include file="shared/top_header.tpl"}
<div class="content-wrapper">
    {include file="shared/sidebar.tpl"}
    <div class="content-right">
        <div class="content-inner-wrapper">
            <div class="content-header">
                <div class="top-content">
                    <div class="top-left-content-left">
                        <h2>Scheduled Messages[{count($scheduled)}]</h2>
                    </div>
                    <div class="top-left-content-right ">

                    </div>
                </div>
            </div>
            <div class="content-one">
                <table  id="scheduled-list" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Message</th>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach $msgs as $msg}
                        {if $msg.status eq 'scheduled'}
                            <tr id="{$msg.id}">
                                <td><input name="pk" type="checkbox" value="{$msg.id}"/></td>
                                <td><a href="#">{$msg.msg}</a></td>
                                <td><a href="#">{$msg.sender}</a></td>
                                <td><a href="#">{$msg.receiver}</a></td>
                                <td><a href="#">{$msg.status}</a></td>
                                <td><a href="#">{$msg.date}</a></td>
                            </tr>
                        {/if}
                    {/foreach}
                    </tbody>

                </table>
            </div>
            <div class="content-two" id="scheduled-details">
                <table class="default" width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><h1>{count($balance)|default:0}</h1><p>SMS balance</p></td>
                        <td><h1>{count($sent)|default:0}</h1><p>Sent SMS</p></td>
                    </tr>
                    <tr>
                        <td><h1>{count($scheduled)|default:0}</h1><p>Scheduled SMS</p></td>
                        <td><h1>{count($failed)|default:0}</h1><p>Failed SMSes</p></td>
                    </tr>
                </table>
                <table class="default" width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <th colspan="4">Payments</th>
                    </tr>
                    <tr>
                        <td><span>Paid</span></td>
                        <td>{$paid|default: 0}</td>
                        <td><span>Pending Payments</span></td>
                        <td>{$paid|default: 0}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('#').DataTable();
    } );
</script>
</body>
</html>