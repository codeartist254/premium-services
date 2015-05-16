<div class="content-two-header">
    <div class="header-left">
        {$partner.0.biz}
    </div>
    <div class="header-right">
        <div class="btn-group">
            <a class="btn btn-info btn-sm mg1lr" data-toggle="modal" href="/{$links.partners.edit|cat:($pId)}" data-target="#edit-partner-modal">
                <i class="fa fa-plus-circle"></i>
                Edit
            </a>
            <a class="btn btn-danger btn-sm"> {*Ajax to delete then go back partner s main page*}
                <i class="fa fa-minus-circle"></i>
                Delete
            </a>
        </div>
    </div>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th colspan="4">Basic Details</th>
    </tr>
    <tr>
        <td><span>Name</span></td>
        <td>{$partner.0.biz}</td>
        <td><span>{$partner.0.biz_type}</span></td>
        <td>Business</td>
    </tr>
    <tr>
        <td><span>Contact Email</span></td>
        <td>{$partner.0.biz_email}</td>
        <td><span>Contact Phone</span></td>
        <td>{$partner.0.biz_mobile}</td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th colspan="4">Contact Person</th>
    </tr>
    <tr>
        <td><span>Name</span></td>
        <td>{$partner.0.contact}</td>
        <td><span>{$partner.0.contact_phone}</span></td>
        <td>Contact Person Phone</td>
    </tr>
    <tr>
        <td><span>Contact Person Email</span></td>
        <td>{$partner.0.contact_email}</td>
        <td><span>Contact Since</span></td>
        <td>{$partner.0.contact_phone}</td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th colspan="4">SMS Stats</th>
    </tr>
    <tr>
        <td><span>Purchases</span></td>
        <td>{$purchases|default:0}</td>
        <td><span>Sent</span></td>
        <td>{$purchases|default:0}</td>
    </tr>
    <tr>
        <td><span>Current Purchase Request</span></td>
        <td>{$purchases|default:0}</td>
        <td><span>Paid</span></td>
        <td>{$purchases|default:'No'}</td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th colspan="4">Other Services</th>
    </tr>
    <tr>
        <td><span>USSD</span></td>
        <td>{$purchases|default:'No'}</td>
        <td><span>USSD Code</span></td>
        <td>{$purchases|default:0}</td>
    </tr>
    <tr>
        <td><span>Shortcode</span></td>
        <td>{$purchases|default:'No'}</td>
        <td><span>Shortcode Number</span></td>
        <td>{$purchases|default:0}</td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th colspan="4">Payments</th>
    </tr>
    <tr>
        <td><span>Sms</span></td>
        <td>{$purchases|default:'No Transaction Yet'}</td>
        <td><span>USSD Code</span></td>
        <td>{$purchases|default:'No Transaction Yet'}</td>
    </tr>
    <tr>
        <td><span>Shortcode</span></td>
        <td colspan="2">{$purchases|default:'No Transaction Yet'}</td>
    </tr>
</table>



{*load buy sms modal*}
<div class="modal fade" id="edit-partner-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bgc6 crff">
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
{*end*}