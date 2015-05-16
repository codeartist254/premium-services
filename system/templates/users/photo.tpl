{if $photo}
	<img src="{$photo.0.photo}">
{else}
 <a href="/{$globals.users.photo_modal|cat:($activeUser.0.id)}" data-target="#upload-user-photo" data-toggle="modal" class="btn btn-info btn-sm">
    <i class="fa fa-file-image-o "></i> Upload Photo
 </a>
{/if}