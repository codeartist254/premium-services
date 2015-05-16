<div class="top-header">
    <div class="top-header-wrapper">
    <div class="top-header-left">
        <a href="#">Mtrack SMS</a>
    </div>
    <div class="top-header-right">
        <div class="dropdown pr">
            <a id="menu-more" href="#" class="pg10lr"  data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                {$org.0.name} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a data-toggle="modal" href="/{$globals.users.settings|cat:($userId)}" data-target="#edit-user-settings" class="pg10tb pg8lr">
                        <i class="fa fa-wrench mg5r"></i>
                        Settings
                    </a>
                </li>
                <li>
                    <a href="/logout" class="pg10tb pg8lr">
                        <i class="fa fa-power-off mg5r"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="edit-user-settings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body"><div class="te">
                </div></div>
        </div>
    </div>
</div>