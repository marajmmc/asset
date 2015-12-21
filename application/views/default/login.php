<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$CI =& get_instance();
?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN LOGIN -->
<div class="login" style="background: none!important;">
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="<?php echo $CI->get_encoded_url("home/login");?>" method="post">
            <h3 class="form-title">Login to your account</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <div class="input-icon">
                    <i class="fa fa-user"></i>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
                </div>
            </div>
            <div class="form-actions">
                <label class="checkbox">
                    <input type="checkbox" name="remember" value="1"/> Remember me </label>
                <button type="submit" class="btn blue pull-right">
                    Login <i class="m-icon-swapright m-icon-white"></i>
                </button>
            </div>
            <div class="login-options">
                <h4>Or login with</h4>
                <ul class="social-icons">
                    <li>
                        <a class="facebook" data-original-title="facebook" href="#">
                        </a>
                    </li>
                    <li>
                        <a class="twitter" data-original-title="Twitter" href="#">
                        </a>
                    </li>
                    <li>
                        <a class="googleplus" data-original-title="Goole Plus" href="#">
                        </a>
                    </li>
                    <li>
                        <a class="linkedin" data-original-title="Linkedin" href="#">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="forget-password">
                <h4>Forgot your password ?</h4>
                <p>
                    no worries, click <a href="javascript:;" id="forget-password">
                        here </a>
                    to reset your password.
                </p>
            </div>
            <div class="create-account">
                <p>
                    Don't have an account yet ?&nbsp; <a href="javascript:;" id="register-btn">
                        Create an account </a>
                </p>
            </div>
        </form>
        <!-- END LOGIN FORM -->
        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form class="forget-form" action="index.html" method="post">
            <h3>Forget Password ?</h3>
            <p>
                Enter your e-mail address below to reset your password.
            </p>
            <div class="form-group">
                <div class="input-icon">
                    <i class="fa fa-envelope"></i>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
                </div>
            </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn">
                    <i class="m-icon-swapleft"></i> Back </button>
                <button type="submit" class="btn blue pull-right">
                    Submit <i class="m-icon-swapright m-icon-white"></i>
                </button>
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->
    </div>
</div>
<!-- END LOGIN -->
<script>
    jQuery(document).ready(function() {
//        Login.init();
        // init background slide images
        $.backstretch([
                "<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/admin/pages/media/bg/1.jpg",
                "<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/admin/pages/media/bg/2.jpg",
                "<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/admin/pages/media/bg/3.jpg",
                "<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/admin/pages/media/bg/4.jpg"
            ], {
                fade: 1000,
                duration: 8000
            }
        );
    });
</script>