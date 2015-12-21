<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
$CI=& get_instance();
$components=User_helper::get_task_module_component($CI->config->item('system_sidebar01'));
?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu1" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <?php
            foreach($components as $component)
            {
                ?>
                <li>
                    <a class="external" href="javascript:;">
                        <i class="<?php echo $component['component_icon']; ?>"></i>
                        <span class="title"><?php echo $component['component_name'] ?></span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <?php
                        foreach($component['modules'] as $module)
                        {
                        ?>
                        <li>
                            <a class="external" href="javascript:;">
                                <i class="<?php echo $module['module_icon']; ?>"></i> <?php echo $module['module_name']; ?> <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <?php
                                foreach($module['tasks'] as $task)
                                {
                                    ?>
                                    <li>
                                        <a class="" href="<?php echo $CI->get_encoded_url($task['controller']); ?>"><i class="<?php echo $task['task_icon']; ?>"></i><?php echo $task['task_name']; ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
            <?php
            }
            ?>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->
