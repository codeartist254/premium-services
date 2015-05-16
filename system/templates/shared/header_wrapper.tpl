{*<div class="header-wrapper">*}
    {*<div class="logo" style="">*}
        {*<a href="#">*}
            {*<img src="{$cdn}images/logo.png" alt="">*}
            {*mTrack SMS*}
        {*</a>*}
    {*</div>*}
    {*<div class="logged-in-user">*}
        {*<div class="logged-in-user-pic" data-content="/{$globals.users.photo_show|cat:($activeUser.0.id)}" role="ajax" >*}
            {**}
        {*</div>*}
        {*<div class="logged-in-user-name">*}
            {*<div class="dropdown pr">*}
                {*<a id="menu-more" href="#" class="pg10lr"  data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">*}
                    {*<i class="fa fa-caret-down"></i>*}
                {*</a>*}
                {*<ul class="dropdown-menu no-bullet mg0a br2 pg0a zi-mx right0" role="menu" aria-labelledby="menu-more">*}
                    {*<li>*}
                        {*<a href="/{$globals.users.settings|cat:($activeUser.0.id)}" data-target="#update-user-settings" data-toggle="modal" class="pg10tb pg8lr">*}
                            {*<i class="fa fa-wrench mg5r"></i>*}
                            {*Change Password*}
                        {*</a>*}
                    {*</li>*}
                    {*<li>*}
                        {*<a href="/logout" class="pg10tb pg8lr">*}
                            {*<i class="fa fa-power-off mg5r"></i>*}
                            {*Logout*}
                        {*</a>*}
                    {*</li>*}
                {*</ul>*}
            {*</div>*}
            {*<div class="width_auto ovh mg5r">*}
                {*<a href="#">{$activeUser.0.fname} {$activeUser.0.sname}</a>*}
            {*</div>*}
        {*</div>*}
    {*</div>*}
{*</div>*}
<div class=" adminheader">
    <div class="adminheader-content row">
        <div class="xlarge-2 mlarge-2 large-3 medium-6 small-6 columns">
            <a href="index.shtml">
                <img class="logo-size" src="{$cdn}images/logo4.svg" alt=""/>
            </a>
        </div>
        <div class="xlarge-8 mlarge-8 large-6 columns">

            &nbsp;
        </div>
        <div class="xlarge-2 mlarge-2 large-3 medium-6 small-6 columns pg10lr textr dropdown">
            <a class="pr cr33 mg10t crp" data-target="#admin-model" data-toggle="dropdown">
                <div class="pl width50x hgt50 ovh br50p bora bor1 borccc">
                    <img class="width-f" src="{$cdn}images/default-mtu-512.png" alt=""/>
                </div>
                <div class="width_auto ovh mg20lm">
                    <div class="width-f pl bold" >
                        {$activeUser.0.fname} {$activeUser.0.sname}
                        <i class="fa fa-caret-down mg5l"></i>
                    </div>
                    <div class="width-f pl pg20r">
						<span class="">
							Administrator
						</span>
                    </div>
                </div>
            </a>
            <ul id="admin-model" class="width-f pl dropdown-menu zi100 br2 pg0a" role="menu">
                <li class="width-f pl mg0a pg0a">
                    <a class="width-f pl pg10tb"  href="/{$globals.users.settings|cat:($activeUser.0.id)}" data-target="#update-user-settings" data-toggle="modal">
                        <i class="fa fa-wrench mg5r"></i>
                        Change Password
                    </a>
                </li>
                <li class="width-f pl mg0a pg0a">
                    <a class="width-f pl pg10tb" href="/settings">
                        <i class="fa fa-gears mg5r"></i>
                        Settings
                    </a>
                </li>
                <li class="width-f pl mg0a pg0a">
                    <a class="width-f pl pg10tb" href="/logout">
                        <i class="fa fa-power-off mg5r"></i>
                        Logout
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>
{*Upload user photo modal*}
    <div id="upload-user-photo" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content  br0">
                <!-- Content will be loaded here from "remote.php" file -->
            </div>
        </div>
    </div>
{*End*}

{*edit user settings details modal*}
    <div id="update-user-settings" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content  br0">
                <!-- Content will be loaded here from "remote.php" file -->
            </div>
        </div>
    </div>
{*End*}