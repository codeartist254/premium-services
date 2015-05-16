<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mtrack Solutions</title>
    <link href="{$cdn}css/rset.css" type="text/css"  rel="stylesheet" media="all" />
    <link href="{$cdn}components/bootstrap/dist/css/bootstrap.min.css" type="text/css"  rel="stylesheet" media="all" />
    <link href="{$cdn}components/font-awesome/css/font-awesome.min.css" type="text/css"  rel="stylesheet" media="all" />
    <link href="{$cdn}components/datatables/css/jquery.dataTables.min.css" type="text/css"  rel="stylesheet" media="all" />
    <link href="{$cdn}components/validationEngine/css/validationEngine.jquery.css"  type="text/css"  rel="stylesheet" media="all"/>
    <link href="{$cdn}components/tokenizer/styles/token-input.css"  type="text/css"  rel="stylesheet" media="all"/>
    <link href="{$cdn}components/tokenizer/styles/token-input-facebook.css"  type="text/css"  rel="stylesheet" media="all"/>
    <link href="{$cdn}css/custom-styles.css" type="text/css"  rel="stylesheet" media="all"  />
    <link href="{$cdn}css/admin.css" type="text/css"  rel="stylesheet" media="all"  />

    <script type="application/javascript" src="{$cdn}components/datatables/js/jquery.js"></script>
    <script type="application/javascript" src="{$cdn}components/jquery-form/jquery.form.js"></script>
    <script type="application/javascript" src="{$cdn}components/validationEngine/js/jquery.validationEngine.js"></script>
    <script type="application/javascript" src="{$cdn}components/validationEngine/js/languages/jquery.validationEngine-en.js"></script>
    <script type="application/javascript" src="{$cdn}components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="application/javascript" src="{$cdn}components/datatables/js/jquery.dataTables.min.js"></script>
    <script type="application/javascript" src="{$cdn}components/tokenizer/src/jquery.tokeninput.js"></script>
    <script type="application/javascript" src="{$cdn}js/jquery.simplyCountable.js"></script>
    <script type="application/javascript" src="{$cdn}js/common.js"></script>
    <script type="application/javascript" src="{$cdn}js/admin.js"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            //data table Lists
            $('#members-list').dataTable({
                "paging": false,
                "info": false,
                "bSort": false,
                "oLanguage": { "sSearch": "" }
            });

            $('.dataTables_filter input').attr("placeholder", "Search");
        })
    </script>
</head>