{include file="shared/includes_login.tpl"}
    <div class="top-header-wrapper">
        <div class="top-header">
            <div class="top-header-left">
                <a href="#"><img src="{$cdn}images/logo.png" alt="" /></a>
            </div>
            <div class="top-header-right">
                <a href="#">Go to our home page</a>
            </div>
        </div>
    </div>
    <div class="header-intro" style="width:700px;">
        <h1>You're just 60 seconds away from your new Mtrack account.</h1>
        <h2>Already have an account yet? <a href="/login">Sign in?</a></h2>
    </div>
    <form id="registration-form" action="/{$links.access.registration}" method="post" enctype="multipart/form-data">
        <div class="login-wrapper" style="width:890px;">
            <div class="login-wrapper-left">
                <label>Name of your organisation:*</label>
                <input type="text" value=""  name="name" placeholder=""/>

                <label>Type of organisation</label>


                <select name="type">
                    <option value="Business">Business</option>
                    <option value="Church">Church</option>
                    <option value="School">School</option>
                    <option value="NGO">NGO</option>
                    <option value="Other">Other</option>
                </select>

                <div class="login-inner-wrapper">
                    <div class="login-inner-left">
                        <label>Mobile phone number:*</label>
                        <input type="text" value="" name="phone" placeholder=""/>
                    </div>
                    <div class="login-inner-right">
                        <label>Valid email address:*</label>
                        <input type="text" value="" name="email" placeholder=""/>
                    </div>
                </div>

                <div class="login-inner-wrapper">
                    <div class="login-inner-left">
                        <label>Password</label>
                        <input type="password" value="" name="pwd" placeholder=""/>
                    </div>
                    <div class="login-inner-right">
                        <label>Confirm Password</label>
                        <input type="password" value="" name="pwd_conf" placeholder=""/>
                    </div>
                </div>
                <input type="submit" class="btn btn-info" style="width:50%; text-align:center;" value="Sign up" />
            </div>
            <div class="login-wrapper-right">
                <img src="{$cdn}images/chiye.jpg" width="130" height="100" class="img-circle" alt="" />
                <p>"Using Mtrack.com gives us the possibility to collect employee satisfaction data in real time and to take immediate action where and when necessary!" </p>
                <p><strong>Evans Wachiye, Keshaa.com</strong></p>
            </div>
        </div>
    </form>