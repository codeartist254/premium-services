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
                        <h2>Payments [10]</h2>
                    </div>
                    <div class="top-left-content-right ">
                        <div class="btn-group">

                            {*<a href="/members/add_new" class="btn btn-info btn-sm mg1lr"><i class="fa fa-plus-circle"></i> Add new Partner</a>*}
                            {*<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#add-kava-policy"><i class="fa fa-minus-circle"></i> Delete Partner</a>*}

                        </div>
                    </div>
                </div>
            </div>
            <div class="content-one">
                <table  id="payments-list" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Type of Organisation</th>
                        <th>Contact Phone no.</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr id="1">
                        <td><input name="pk" type="checkbox" value="1"/></td>
                        <td><a href="#">Nairobi Java House</a></td>
                        <td><a href="#">Business</a></td>
                        <td><a href="#">09898777878</a></td>
                    </tr>
                    <tr id="1">
                        <td><input name="pk" type="checkbox" value="1"/></td>
                        <td><a href="#">St Emmanual</a></td>
                        <td><a href="#">Church</a></td>
                        <td><a href="#">09898777878</a></td>
                    </tr>
                    <tr id="1">
                        <td><input name="pk" type="checkbox" value="1"/></td>
                        <td><a href="#">Kmi Boys</a></td>
                        <td><a href="#">School</a></td>
                        <td><a href="#">09898777878</a></td>
                    </tr>

                    </tbody>

                </table>
            </div>
            <div class="content-two" id="payment-details">
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