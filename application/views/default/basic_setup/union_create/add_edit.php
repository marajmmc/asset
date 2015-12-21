<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
    $CI=& get_instance();
//echo "<pre>";
//print_r($zillas);
//echo "</pre>";
?>
<div id="system_content" class="system_content_margin">
    <div id="system_action_button_container" class="system_action_button_container">
        <?php
        $CI->load_view('system_action_buttons');
        ?>
    </div>

    <?php
    //print_r($union_info);
    ?>

    <div class="clearfix"></div>
    <form id="system_save_form" action="<?php echo $CI->get_encoded_url('basic_setup/union_create/index/save'); ?>" method="post">
        <input type="hidden" name="id" value="<?php if(isset($union_info['rowid'])){echo $union_info['rowid'];}else{echo 0;}?>"/>
        <input type="hidden" name="system_save_new_status"  id="system_save_new_status" value="0"/>
        <div class="row widget">
            <div class="widget-header">
                <div class="title">
                    <?php echo $title; ?>
                </div>
                <div class="clearfix"></div>
            </div>


            <div class="row show-grid " id="zilla_option">
                <div class="col-xs-4">
                    <label class="control-label pull-right"><?php echo $CI->lang->line('ZILLA_NAME_BN'); ?><span style="color:#FF0000">*</span></label>
                </div>
                <div class="col-sm-4 col-xs-8">
                    <select disabled name="" id="user_zilla_id" class="form-control">
                        <?php
                        foreach($zillas as $zilla)
                        {
                            ?>
                            <option value="<?php echo $zilla['value'];?>"><?php echo $zilla['text'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row show-grid " id="zilla_option">
                <div class="col-xs-4">
                    <label class="control-label pull-right"><?php echo $CI->lang->line('UPAZILA_NAME_BN'); ?><span style="color:#FF0000">*</span></label>
                </div>
                <div class="col-sm-4 col-xs-8">
                    <select disabled name="" id="" class="form-control">
                        <?php
                        foreach($upazillas as $upazilla)
                        {
                            ?>
                            <option value="<?php echo $upazilla['value'];?>"><?php echo $upazilla['text'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>


            <div style="" class="row show-grid " id="">
                <div class="col-xs-4">
                    <label class="control-label pull-right"><?php echo $CI->lang->line('UNION_NAME_BN'); ?><span style="color:#FF0000">*</span></label>
                </div>
                <div class="col-sm-4 col-xs-8">
                    <input type="text" name="union_detail[unionname]" class="form-control" value="<?php echo $union_info['unionname'];?>">
                </div>
            </div>

            <div style="" class="row show-grid " id="">
                <div class="col-xs-4">
                    <label class="control-label pull-right"><?php echo $CI->lang->line('UPAZILA_NAME_EN'); ?><span style="color:#FF0000">*</span></label>
                </div>
                <div class="col-sm-4 col-xs-8">
                    <input type="text" name="union_detail[unionnameeng]" class="form-control" value="<?php echo $union_info['unionnameeng'];?>">
                </div>
            </div>

            <div style="" class="row show-grid " id="">
                <div class="col-xs-4">
                    <label class="control-label pull-right"><?php echo $CI->lang->line('GO_CODE'); ?><span style="color:#FF0000">*</span></label>
                </div>
                <div class="col-sm-4 col-xs-8">
                    <input disabled type="text" name="" class="form-control" value="<?php echo $union_info['unionid'];?>">
                </div>
            </div>

            <div style="" class="row show-grid">
                <div class="col-xs-4">
                    <label class="control-label pull-right"><?php echo $CI->lang->line('STATUS'); ?></label>
                </div>
                <div class="col-sm-4 col-xs-8">
                    <select disabled name="" class="form-control" id="module_options">
                        <?php
                        $CI->load_view('dropdown',array('drop_down_default_option'=>false,'drop_down_options'=>array(array('text'=>$CI->lang->line('INACTIVE'),'value'=>0),array('text'=>$CI->lang->line('ACTIVE'),'value'=>1)),'drop_down_selected'=>$union_info['visible']));
                        ?>
                    </select>
                </div>
            </div>

        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function ()
    {
        $(document).on("change","#user_division_id",function()
        {
            $("#zilla_option").show();
            $("#user_zilla_id").val("");
            var division_id=$(this).val();
            if(division_id>0)
            {
                $.ajax({
                    url: '<?php echo $CI->get_encoded_url('common/get_zilla'); ?>',
                    type: 'POST',
                    dataType: "JSON",
                    data:{division_id:division_id},
                    success: function (data, status)
                    {

                    },
                    error: function (xhr, desc, err)
                    {
                        console.log("error");

                    }
                });
            }
            else
            {
                $("#zilla_option").hide();
            }
        });
    })
</script>