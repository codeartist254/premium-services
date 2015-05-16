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
                        <h2>Contacts[{count($contacts)}]</h2>
                    </div>
                    <div class="top-left-content-right ">
                        <div class="btn-group">
                            <a data-toggle="modal" href="/{$links.contacts.new_contact|cat:($userId)}" data-target="#new-contact-modal"  class="btn btn-info btn-sm mg1lr"><i class="fa fa-plus-circle"></i> Add New Contact</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-one">
                <table  id="contacts-list" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                        {foreach $contacts as $contact}
                            <tr id="{$contact.id}">
                                <td><input name="pk" type="checkbox" value="{$contact.id}"/></td>
                                <td><a href="#">{$contact.name}</a></td>
                                <td><a href="#">{$contact.phone}</a></td>
                                <td><a href="#">{$contact.since}</a></td>
                            </tr>
                        {/foreach}
                    </tbody>

                </table>
            </div>
            <div class="content-two" id="contact-details">
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

{*New contact modal *}
    <div class="modal fade" id="new-contact-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
</body>
</html>