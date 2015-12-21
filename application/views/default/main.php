<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
$CI=& get_instance();
$user=User_helper::get_user();
?>
<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.1
Version: 3.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $CI->lang->line('WEBSITE_TITLE');?></title>
        <link rel="icon" type="image/ico" href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/images/ico.ico" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
        <link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL PLUGIN STYLES -->
        <!-- BEGIN PAGE STYLES -->
        <link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE STYLES -->
        <!-- BEGIN THEME STYLES -->
        <!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
        <link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/admin/layout4/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/admin/layout4/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->

    </head>

<body class="page-header-fixed page-sidebar-closed-hide-logo ppage-sidebar-closed-hide-logo">
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";
        var site_url = "<?php echo site_url(); ?>";
        var display_date_format = "yy-mm-dd";
        var SELCET_ONE_ITEM = "<?php echo $CI->lang->line('SELECT_ONE_ITEM'); ?>";
        var DELETE_CONFIRM = "<?php echo $CI->lang->line('DELETE_CONFIRM'); ?>";

    </script>


        <div id="top_header">
            <?php
            $CI->load_view('header');
            ?>
        </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <?php
        if($user)
        {
            $CI->load_view('sidebar_left');
        }
        ?>
        <div id="system_wrapper" class="wrapper">

        </div>
    </div>
    <!--footer Start-->
    <div id="system_wrapper_footer" class="wrapper page-footer">
        <!-- BEGIN FOOTER -->
        <!-- END FOOTER -->
    </div>


        <!--footer end-->
    <!-- /#wrapper -->
    <!-- jQuery -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/respond.min.js"></script>
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/excanvas.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/plugins/select2/select2.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/metronic/admin/layout/scripts/demo.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
        });
    </script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq/jqxgrid.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq/jqxgrid.edit.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq/jqxcheckbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq//jqxlistbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq//jqxdropdownlist.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq//jqxmenu.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq/jqxgrid.filter.js"></script>

    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq/jqxgrid.columnsresize.js"></script>

    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq/jqxdata.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/jq/jqxdatatable.js"></script>
    <!-- END JAVASCRIPTS -->
    <!-- Menu Toggle Script -->
    <div id="system_loading"><img src="<?php echo base_url().'assets/templates/'.$CI->get_template(); ?>/images/spinner.gif"></div>
    <div id="system_message"></div>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/system_common.js"></script>

</body>

</html>
