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
                        <h2>Orders [{count($orders)}]</h2>
                    </div>
                    <div class="top-left-content-right ">
                        {*<div class="btn-group">*}

                            {*<a href="/members/add_new" class="btn btn-info btn-sm mg1lr"><i class="fa fa-plus-circle"></i> Add new Partner</a>*}
                            {*<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#add-kava-policy"><i class="fa fa-minus-circle"></i> Delete Partner</a>*}

                        {*</div>*}
                    </div>
                </div>
            </div>
            <div class="content-one">
                <table  id="orders-list" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Type</th>
                        <th>Client</th>
                        <th>Payment</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        {foreach $orders as $order}
                            <tr id="{$order.id}">
                                <td><input name="pk" type="checkbox" value="{$order.id}"/></td>
                                <td><a href="#">{$order.type}</a></td>
                                <td><a href="#">{$order.client}</a></td>
                                <td><a href="#">{$order.payment}</a></td>
                                <td>
                                    <a class="btn btn-danger btn-sm">
                                        <i class="fa fa-minus-circle"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>

                </table>
            </div>
            <div class="content-two" id="order-details">
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
</body>
</html>