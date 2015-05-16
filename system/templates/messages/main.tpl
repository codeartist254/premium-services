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
                        <h2>Compose New Message</h2>
                    </div>
                    <div class="top-left-content-right ">

                    </div>
                </div>
            </div>
            <div class="content-one">
                <form id="compose-new-msg" action="/{$links.message.send|cat:($userId)}" method="post"
                      enctype="multipart/form-data">
                    <div class="msg-outer-wrapper">
                        <label> Enter message recipients:</label>
                        <input type="text" id="contacts" value="" name="contact[]">
                        <label>Or send to your groups:</label>
                        <input type="text" id="groups" value="" name="group[]">

                        <label>Enter your message:</label>
                        <textarea name="msg" id="msg" class="input"></textarea>
                        <span>Words remaining: <strong id="counter"></strong> </span>

                        <div class="msg-buttons">
                            <label class="width50">
                                <div class="custom-check pl" style="width: 20px !important;">
                                    <input id="message-1" type="checkbox" name="schedule" value="scheduled">
                                    <label for="message-1">.</label>
                                </div>
                                    Schedule this message
                                </span>
                            </label>
                            <div class="msg-buttons-right width_auto ovh pg10l">
                                <button type="submit" class="btn btn-success">Send Message</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="content-two">
                <table class="default" width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><h1>{count($balance)|default:0}</h1>

                            <p>SMS balance</p></td>
                        <td><h1>{count($sent)|default:0}</h1>

                            <p>Sent SMS</p></td>
                    </tr>
                    <tr>
                        <td><h1>{count($scheduled)|default:0}</h1>

                            <p>Scheduled SMS</p></td>
                        <td><h1>{count($failed)|default:0}</h1>

                            <p>Failed SMSes</p></td>
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


<script type="application/javascript">
    //send message
    $('#compose-new-msg').validationEngine('attach').ajaxForm({
        'beforeSubmit': function () {
            return true;
        },
        'resetForm': true,
        'clearForm': true,
        'success': function () {
//            window.location = '/messages/all'
        }
    });

    $("#contacts").tokenInput("/messages/select-contacts");

    $("#groups").tokenInput("/messages/select-groups");

    $('#msg').simplyCountable({
        counter: '#counter',
        countType: 'characters',
        maxCount: 160,
        countDirection: 'down',
        strictMax: true
    });

</script>
</body>
</html>