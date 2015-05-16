{$title = $error->title|cat:' | Pesadata'}
{include file="shared/error_header.tpl"}
<div class="page-wrapper" id="error-wrapper">
  <div class="error-container">
    <div class="{$error->emoticon}">
      <div id="error-title"></div>
      <h1><strong>Error {$error->code} :</strong> {$error->title}</h1>
      <div id="error-description">{$error->msg}</div>
      {include file="errors/links.tpl"}
    </div>
  </div>
{include file="shared/footer.tpl"}
</div>
</body>
</html>