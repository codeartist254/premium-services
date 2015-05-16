
<div class="content-left">
    {if $isAdmin eq 0}
        <div class="company-info">
            <h3>{$org.0.name}</h3>
            <p>0 sms</p>
            <a data-toggle="modal" href="/{$globals.orders.buy|cat:($userId)}" data-target="#buy-sms-modal" class="btn btn-sm btn-success">
                Buy SMS
            </a>
        </div>
    {elseif $isAdmin eq 1}
        <div class="company-info">
            <h3 style="margin-bottom: 5px;">{$org.0.name}</h3>
            <a data-toggle="modal" href="/{$globals.orders.allocate_modal|cat:($userId)}" data-target="#buy-sms-modal" class="btn btn-sm btn-success">
                Allocate SMS
            </a>
        </div>
    {/if}
    {if $isAdmin eq 1}
        <h1>Administration</h1>
        <ul>
            <li><a href="/{$globals.partners.main}">Partners</a></li>
            <li><a href="/{$globals.orders.main}">Orders</a></li>
            <li><a href="/{$globals.payments.main}">Payments</a></li>
        </ul>
    {/if}

    <h1>SMS</h1>
    <ul>
        <li><a href="/{$globals.messages.main}">Compose</a></li>
        <li><a href="/{$globals.messages.all}">All</a></li>
        <li><a href="/{$globals.messages.sent}">Sent SMS</a></li>
        <li><a href="/{$globals.messages.scheduled}">Scheduled</a></li>
    </ul>

    <h1>Contacts</h1>
    <ul>
        <li><a href="/{$globals.contacts.groups}">Groups</a></li>
        <li><a href="/{$globals.contacts.contacts}">Contact List</a></li>
    </ul>
    <!--
    <h1>Others</h1>

    <ul>
        <li><a href="#">USSD App Request</a></li>
        <li><a href="#">Shortcode Request</a></li>
        <li><a href="#">Two-way SMS app</a></li>
    </ul>
    -->
</div>

{*load buy sms modal*}
<div class="modal fade" id="buy-sms-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
{*end*}