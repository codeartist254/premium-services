<div class="content-two-header">
    <div class="header-left">
        Nairobi Java House
    </div>
    <div class="header-right">
        <a href="#" class="btn btn-default">Edit</a>
    </div>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th colspan="4">Basic Details</th>
    </tr>
    <tr>
        <td><span>Name</span></td>
        <td>Nairobi Java House</td>
        <td><span>Type</span></td>
        <td>Business</td>
    </tr>
    <tr>
        <td><span>Contact Email</span></td>
        <td>okk@gmail.com</td>
        <td><span>Contact Phone</span></td>
        <td>0725988474</td>
    </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th colspan="4">SMS Stats</th>
    </tr>
    <tr>
        <td><span>Purchases</span></td>
        <td>{$purchases|default:0}</td>
        <td><span>Send</span></td>
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