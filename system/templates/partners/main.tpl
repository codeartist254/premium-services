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
                        <h2>Partners [{count($partners)}]</h2>
                    </div>
                    <div class="top-left-content-right ">
                        <div class="btn-group">
                            <a data-toggle="modal" href="/{$links.partners.new|cat:($userId)}" data-target="#add-new-partner"class="btn btn-info btn-sm mg1lr"><i class="fa fa-plus-circle"></i> Add new Partner</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-one">
                <table  id="partners-list" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Business Name</th>
                        <th>Phone No.</th>
                        <th>Contact Person</th>
                        <th>Contact Phone no.</th>
                    </tr>
                    </thead>
                    <tbody>
                        {foreach $partners as $partner}
                            <tr id="{$partner.id}">
                                <td><input name="pk" type="checkbox" value="{$partner.id}"/></td>
                                <td><a href="#">{$partner.bname}</a></td>
                                <td><a href="#">{$partner.bphone}</a></td>
                                <td><a href="#">{$partner.person}</a></td>
                                <td><a href="#">{$partner.cphone}</a></td>
                            </tr>
                        {/foreach}
                    </tbody>

                </table>
            </div>
            <div class="content-two" id="partner-details">
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

{*New partner Modal*}
<div id="add-new-partner" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content  br0">
            <!-- Content will be loaded here from "remote.php" file -->
        </div>
    </div>
</div>
{*End*}
</body>
</html>