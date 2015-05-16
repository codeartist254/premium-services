{include file="shared/includes_login.tpl"}
<div class="top-header-wrapper">
    <div class="top-header">
        <div class="top-header-left">
            <a href="#"><img src="{$cdn}images/logo.png" alt="" /></a>
        </div>
        <div class="top-header-right">
            <a href="/">Go to our home page</a>
        </div>
    </div>
</div>
<div class="header-intro">
    <h1>Welcome back friend</h1>
    <h2>Don't have an account yet? <a href="/{$links.access.reg}">Sign up for free!</a></h2>
</div>

<form id="admin-login-form" method="post" action="{$sys_domain}{$links.access.login}">
    <div class="login-wrapper">
    <label>Email Address</label>
    <input type="text" value="" name="uname" placeholder="Email Address" />
    <label>Password</label>
    <input type="password" value=""name="pwd" placeholder="Password"/>
    <input type="submit" class="btn btn-info" value="Sign In" />
    <div class="login-inner-wrapper">
        <div class="login-inner-left">
            <input type="checkbox" value="1" /> Remember me
        </div>
        <div class="login-inner-right">
            <a href="#">Forgot password</a>
        </div>
    </div>
        <div class="width-f" id="status"></div>
</div>
</form>
<div class="footer-wrapper">
</div>