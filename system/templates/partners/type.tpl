{include file="shared/header.tpl"}
<body>
<div class="layout-wrapper">
    {include file="shared/header_wrapper.tpl"}
    <div class="page-container">
        {include file="shared/sidebar.tpl"}
        <div class="content-wrapper">
            <div class="left-content">
                <div class="top-content">
                    <div class="top-left-content-left">
                        <h2>{$title}</h2>
                    </div>
                    <div class="top-left-content-right ">
                            <a data-target="#add-partner-type" data-toggle="modal" class="btn btn-info btn-sm"><i class="fa fa-plus-circle"></i> Add new partner type</a>
                    </div>
                </div>

                <div class="content-body">
                    <table  id="partner-type-list" class="display" cellspacing="0" width="100%">
                        <thead>
	                        <tr>
	                            <th></th>
	                            <th>Partner Type</th>
	                            <th>Card Fee</th> 
	                            <th>Since</th>
	                        </tr>
                        </thead>
                        <tbody>
	                        {foreach $types as $type}
	                            <tr id="{$type.id}">
	                                <td><input name="pk" type="checkbox" value="{$type.id}"/></td>
	                                <td><a href="#">{$type.title}</a></td>
	                                <td><a href="#">{$type.fee}</a></td> 
	                                <td><a href="#">{$type.since}</a></td>
	                            </tr>
	                        {/foreach}
                        </tbody>                        
                    </table>
                </div>
            </div>
            <div class="right-content">
                <div class="top-content" style="padding:27px;">

                </div>
                <div class="content-body" id="partner-type-details">
                
                </div>
            </div>
        </div>
    </div>
</div>

{*add partner modal form*}
<div class="modal fade" id="add-partner-type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content br0">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">New Partner Type</h4>
            </div>
            <div class="modal-body ovh">
                <div class="reg-page-wrapper">
                    <div class="reg-form-wrapper">
                        <div class="width-f pl">
                            <form id="add-partner-type" action="/{$links.partners.add_type}" method="post" enctype="multipart/form-data">
                                <div class="width-f pl bora bor1 borcdd mg10b">
                                	<h2 class="pg10a bgee width-f pl bold">Partner Type Details</h2>
	                                <div class="width-f pl pg10a">	                                	
		                                <div class="width-f pl mg10b">
		                                    <div class="width50 pl pg1plr">
		                                        <div class="width-f pl ">
		                                            <h4 class="mg5b">
		                                                <i class="fa fa-briefcase mg5r"></i>
		                                                Parter Type
		                                            </h4>
		                                            <input  class="input form-control form-item validate[required]" name="ptype" type="text" placeholder="Partner Type"/>
		                                        </div>
		                                    </div>
		                                    <div class="width50 pl pg1plr">
		                                        <div class="width-f pl ">
		                                            <h4 class="mg5b">
		                                                <i class="fa fa-map-marker mg5r"></i>
		                                                Minimum Dependants
		                                            </h4>
		                                            <input  class="input form-control form-item validate[required]" name="dependants" type="text" placeholder="Minimum Dependants"/>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="width-f pl mg10b">
		                                    <div class="width50 pl pg1plr">
		                                        <h4 class="mg5b">
		                                            <i class="fa fa-phone mg5r"></i>
		                                            Minimum Members
		                                        </h4>
		                                        <input  class="input form-control form-item validate[required]" name="members" type="text" placeholder="Minimum Members"/>
		                                    </div>
		                                    <div class="width50 pl pg1plr">
		                                        <h4 class="mg5b">
		                                            <i class="fa fa-map-marker mg5r"></i>
		                                            Card Fee
		                                        </h4>
		                                        <input  class="input form-control form-item validate[required]" name="fee" type="text" placeholder="Card fee"/>
		                                    </div>
		                                </div>
		                                
		                                <div class="width-f pl mg10b">
		                                    <div class="width50 pl pg1plr">
		                                        <h4 class="mg5b">
		                                            <i class="fa fa-flag mg5r"></i>
		                                            Premium Threshold Percentage
		                                        </h4>
		                                        <input  class="input form-control form-item validate[required]" name="percentage" type="text" placeholder="Premium Threshold Percentage"/>
		                                    </div>
	                                        <div class="width50 pl pg1plr">
	                                            <h4 class="mg5b">
	                                                <i class="fa fa-cogs mg5r"></i>
	                                                Dependant Card Fee
	                                            </h4>
		                                        <input  class="input form-control form-item validate[required]" name="dependant_card" type="text" placeholder="Dependant Card Fee"/>
	                                        </div>   
		                                </div>
		                                <div class="width-f pl pg10b">
		                                	<div class="width-f pl mg10b">
			                                    <div class="width-f pl pg1plr">
			                                        <h4 class="mg5b">
			                                            <i class="fa fa-user mg5r"></i>
			                                            Payment packages
			                                        </h4>
			                                        <input  class="input form-control form-item validate[required]" name="packages" type="text" placeholder="Payment packages"/>
			                                    </div>
			                                </div>
	                                	</div>
	                                </div>
	                                <div class="width-f pl textc mg10b">
	                                    <div class="status"></div>
	                                    <button class="btn btn-info" type="submit">Add Partner</button>
	                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{*End*}
</body>
</html>
