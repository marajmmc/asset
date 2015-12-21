<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
    $CI=& get_instance();
//echo "<pre>";
//print_r($user_info);
//echo "</pre>";

?>
<div id="system_content" class="system_content_margin">
    <div id="system_action_button_container" class="system_action_button_container">
        <?php
        $CI->load_view('system_action_buttons');
        ?>
    </div>

    <div class="clearfix"></div>
    <form id="system_save_form" action="<?php echo $CI->get_encoded_url('user_management/user_profile_update/index/save'); ?>" method="post">
        <input type="hidden" name="id" value="<?php if(isset($user_info['id'])){echo $user_info['id'];}else{echo 0;}?>"/>
        <input type="hidden" name="uisc_id" value="<?php if(isset($user_info['uisc_id'])){echo $user_info['uisc_id'];}else{echo 0;}?>"/>
        <input type="hidden" name="system_save_new_status"  id="system_save_new_status" value="0"/>
        <div class="row widget">
            <div class="widget-header">
                <div class="title">
                    <?php echo $title; ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- START CHAIRMEN_RELATED_INFO-->
            <div class="col-lg-12   ">
                <div class="box round first">
                    <h2 class="text-center"><?php echo $this->lang->line('CHAIRMEN_RELATED_INFO');?></h2>
                    <div class="block ">
                        <table class="signup table" width="100%">
                            <tbody>
                            <tr>
                                <td class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('NAME');?> <span style="color: #FF0000">*</span></td>
                                <td width="28%" class="custom fieldcell">
                                    <div class="input text">
                                        <input name="chairmen_name" id="chairmen_name" class="validate[required]" type="text" value="<?php echo $chairmen_info['chairmen_name'];?>"/>
                                        <input type="hidden" name="chairmen_id" id="chairmen_id" class="validate[required]" value="<?php echo $chairmen_info['id'];?>"/>
                                    </div>
                                </td>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('MOBILE_NO')?><span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input text">
                                        <input name="chairmen_mobile" id="chairmen_mobile" class="validate[required]" value="<?php echo $chairmen_info['chairmen_mobile'];?>" type="text" maxlength="11" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('EMAIL')?></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input text">
                                        <input name="chairmen_email" id="chairmen_email" class="validate[required,custom[email]]" value="<?php echo $chairmen_info['chairmen_email'];?>" type="text"/>
                                    </div>
                                </td>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('ADDRESS')?> <span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input textarea">
                                        <textarea name="chairmen_address" id="chairmen_address" rows="1" cols="22" class="validate[required]"><?php echo $chairmen_info['chairmen_address'];?></textarea>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END CHAIRMEN_RELATED_INFO-->
            <!-- START SECRETARY_RELATED_INFO-->
            <div class="col-lg-12">
                <div class="box round first">
                    <h2 class="text-center"><?php echo $this->lang->line('SECRETARY_RELATED_INFO');?></h2>
                    <div class="block ">
                        <table class="signup table" width="100%">
                            <tbody>
                            <tr>
                                <td class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('NAME');?> <span style="color: #FF0000">*</span></td>
                                <td width="28%" class="custom fieldcell">
                                    <div class="input text">
                                        <input name="secretary_name" id="secretary_name" value="<?php echo $secretary_info['secretary_name'];?>" class="validate[required]" type="text"/>
                                        <input name="secretary_id" id="secretary_id" value="<?php echo $secretary_info['id'];?>" class="" type="hidden" />
                                    </div>
                                </td>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('MOBILE_NO')?><span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input text">
                                        <input name="secretary_mobile" id="secretary_mobile" value="<?php echo $secretary_info['secretary_mobile'];?>" class="validate[required]" type="text" maxlength="11" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('EMAIL')?><span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input text">
                                        <input name="secretary_email" id="secretary_email" value="<?php echo $secretary_info['secretary_email'];?>" class="validate[required,custom[email]]" type="text"/>
                                    </div>
                                </td>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('ADDRESS')?> <span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input textarea">
                                        <textarea name="secretary_address" id="secretary_address" rows="1" cols="22" class="validate[required]"> <?php echo $secretary_info['secretary_address'];?></textarea>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SECRETARY_RELATED_INFO-->
            <!-- START ENTREPRENEUR_RELATED_INFO-->
            <div class="col-lg-12">
                <div class="box round first">
                    <h2 class="text-center"><?php echo $this->lang->line('ENTREPRENEUR_RELATED_INFO');?></h2>
                    <div class="block" id="entrepreneur_list">
                        <table class="signup table" width="100%">
                            <tbody>
                            <tr>
                                <td class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('ENTREPRENEUR_TYPE');?> <span style="color: #FF0000">*</span></td>
                                <td  class="custom fieldcella">
                                    <select name='entrepreneur_exp_type' id='entrepreneur_exp_type' class='selectbox-1 validate[required]'>
                                        <option value=''><?php echo $this->lang->line('SELECT')?></option>
                                        <option value='1' <?php if($entrepreneur_info['entrepreneur_type']==1) {echo "selected='selected'";}  ?>><?php echo $this->lang->line('ENTREPRENEUR');?></option>
                                        <option value='2' <?php if($entrepreneur_info['entrepreneur_type']==2) {echo "selected='selected'";}  ?>><?php echo $this->lang->line('NOVICE_ENTREPRENEUR');?></option>
                                    </select>
                                    <input type="hidden" id="entrepreneur_id" name="entrepreneur_id" value="<?php echo $entrepreneur_info['id'];?>" />
                                </td>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('NAME');?> <span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input text">
                                        <input name="entrepreneur_name" id="entrepreneur_name" value="<?php echo $entrepreneur_info['entrepreneur_name'];?>" class="validate[required]" type="text"/>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('MOTHERS_NAME');?> <span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input text">
                                        <input name="entrepreneur_mother_name" id="entrepreneur_mother_name" value="<?php echo $entrepreneur_info['entrepreneur_mother_name'];?>" class="validate[required]" type="text"/>
                                    </div>
                                </td>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('FATHERS_NAME');?> <span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input text">
                                        <input name="entrepreneur_father_name" id="entrepreneur_father_name" value="<?php echo $entrepreneur_info['entrepreneur_father_name'];?>" class="validate[required]" type="text"/>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('MOBILE_NO');?> <span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input text">
                                        <input name="entrepreneur_mobile" id="entrepreneur_mobile" value="<?php echo $entrepreneur_info['entrepreneur_mobile'];?>" class="validate[required]" type="text" maxlength="11"/>
                                    </div>
                                </td>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('EMAIL');?> <span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input text">
                                        <input name="entrepreneur_email" id="entrepreneur_email" value="<?php echo $entrepreneur_info['entrepreneur_email'];?>" class="validate[required,custom[email]]" type="text"/>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('GENDER');?> <span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input select">
                                        <select name="entrepreneur_sex" id="entrepreneur_sex" class="selectbox-1 validate[required]">
                                            <option value="<?php echo $this->config->item('GENDER_MALE');?>" <?php if($entrepreneur_info['entrepreneur_sex']==$this->config->item('GENDER_MALE')){echo "selected='selected'";}?>><?php echo $this->lang->line('MALE');?></option>
                                            <option value="<?php echo $this->config->item('GENDER_FEMALE');?>" <?php if($entrepreneur_info['entrepreneur_sex']==$this->config->item('GENDER_FEMALE')){echo "selected='selected'";}?>><?php echo $this->lang->line('FEMALE');?></option>
                                        </select>
                                    </div>
                                </td>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('ADDRESS');?> <span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input textarea">
                                        <textarea name="entrepreneur_address" id="entrepreneur_address" rows="1" cols="22" class="validate[required]"><?php echo $entrepreneur_info['entrepreneur_address'];?></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('NID');?> <span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input select">
                                        <input name="entrepreneur_nid" id="entrepreneur_nid" value="<?php echo $entrepreneur_info['entrepreneur_nid'];?>" class="validate[required]" type="text"/>
                                    </div>
                                </td>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('BANK_NAME');?> </span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input textarea">
                                        <input name="entrepreneur_bank_name" id="entrepreneur_bank_name" value="<?php echo $entrepreneur_info['entrepreneur_bank_name'];?>" class="" type="text"/>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('BANK_ACCOUNT_NO');?> </span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input select">
                                        <input name="entrepreneur_bank_account_no" id="entrepreneur_bank_account_no" value="<?php echo $entrepreneur_info['entrepreneur_bank_account_no'];?>" class="validate[required]" type="text"/>
                                    </div>
                                </td>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('BANK_ACCOUNT_HOLDER_NAME');?> </span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input textarea">
                                        <input name="entrepreneur_bank_holder_name" id="entrepreneur_bank_holder_name" value="<?php echo $entrepreneur_info['entrepreneur_bank_holder_name'];?>" class="" type="text"/>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('BLOG_MEMBER');?> <span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input select">
                                        <select name="entrepreneur_blog_member" id="entrepreneur_blog_member" class="selectbox-1 validate[required]">
                                            <option value="<?php echo $this->config->item('STATUS_ACTIVE');?>" <?php if($entrepreneur_info['entrepreneur_blog_member']==$this->config->item('STATUS_ACTIVE')){echo "selected=selected";}?>><?php echo $this->lang->line('YES');?></option>
                                            <option value="<?php echo $this->config->item('STATUS_INACTIVE');?>" <?php if($entrepreneur_info['entrepreneur_blog_member']==$this->config->item('STATUS_INACTIVE')){echo "selected=selected";}?>><?php echo $this->lang->line('NO');?></option>
                                        </select>
                                    </div>
                                </td>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('FACE_BOOK_GROUP_MEMBER');?> <span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <div class="input textarea">
                                        <select name="entrepreneur_fb_group_member" id="entrepreneur_fb_group_member" class="selectbox-1 validate[required]">
                                            <option value="<?php echo $this->config->item('STATUS_ACTIVE');?>" <?php if($entrepreneur_info['entrepreneur_fb_group_member']==$this->config->item('STATUS_INACTIVE')){echo "selected=selected";}?>><?php echo $this->lang->line('YES');?></option>
                                            <option value="<?php echo $this->config->item('STATUS_INACTIVE');?>" <?php if($entrepreneur_info['entrepreneur_fb_group_member']==$this->config->item('STATUS_INACTIVE')){echo "selected=selected";}?>><?php echo $this->lang->line('NO');?></option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="custom smalllabelcell"><span class="labelcell">
                                    <?php echo $this->lang->line('PROFILE_PIC');?><span style="color: #FF0000">*</span>
                                </td>
                                <td  class="custom fieldcell">
                                    <div class="input select">
                                        <div id="imtext" style="width: 150px; height: 150px;">
                                            <?php
                                            if(!empty($user_info['picture_name']))
                                            {
                                                ?>
                                                <img src="<?php echo base_url().'images/entrepreneur/'.$user_info['picture_name']; ?>" style="width: 130px; height: 130px;" id="imtext" />
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <img src="<?php echo base_url()?>images/profile.png" style="width: 130px; height: 130px;" id="imtext" />
                                                <?php
                                            }

                                            ?>

                                        </div>
                                        <input type="file" name="profile_image" id="profile_image" data-preview-container="#imtext" data-preview-height="30" class="validate[custom[validateMIME[image/jpeg|image/png|image/jpg|image/gif]]]" />
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END ENTREPRENEUR_RELATED_INFO-->
            <!-- START EDUCATION_RELATED_INFO-->
            <div class="col-lg-12">
                <div class="box round first">
                    <h2 class="text-center"><?php echo $this->lang->line('EDUCATION_RELATED_INFO');?></h2>
                    <div class="block ">
                        <table class="signup table" width="100%">
                            <tbody>
                            <tr>
                                <td class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('LATEST_ACADEMIC_INFO');?><span style="color: #FF0000">*</span></td>
                                <td>
                                    <div class="input select">

                                        <select name="latest_education" id="latest_education" class="selectbox-1">
                                            <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                            <?php
                                            foreach($this->config->item('latest_academic_info') as $key=>$academic)
                                            {
                                                if($key==$education_info['latest_education'])
                                                {
                                                    ?>
                                                    <option value="<?php echo $key;?>" selected><?php echo $academic;?></option>
                                                <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <option value="<?php echo $key;?>"><?php echo $academic;?></option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>

                                        <input type="hidden" id="education_id" name="education_id" value="<?php echo $education_info['id'];?>" />
                                    </div>
                                </td>
                                <td class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('PASSING_YEAR');?><span style="color: #FF0000">*</span></td>
                                <td>
                                    <div class="input select">
                                        <select name="passing_year" id="passing_year" class="selectbox-1">
                                            <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                            <?php
                                            $current_year=date('Y', time())+1;
                                            for($i=1970; $i<$current_year; $i++)
                                            {
                                                if($i==$education_info['passing_year'])
                                                {
                                                    ?>
                                                    <option value="<?php echo $i;?>" selected><?php echo $i;?></option>
                                                <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END EDUCATION_RELATED_INFO-->
            <!-- START ENTREPRENEUR_TRAINING_RELATED_INFO-->
            <div class="col-lg-12">
                <div class="box round first">
                    <h2 class="text-center"><?php echo $this->lang->line('ENTREPRENEUR_TRAINING_RELATED_INFO');?></h2>
                    <div class="block ">
                        <table class="signup table" id="training_info" width="100%">
                            <thead>
                            <tr>
                                <th class="labelcell"><?php echo $this->lang->line('COURSE_NAME');?></th>
                                <th class="labelcell"><?php echo $this->lang->line('INSTITUTION_NAME');?></th>
                                <th class="labelcell"><?php echo $this->lang->line('TIME_SPAN');?></th>
                                <th class="labelcell"><?php echo $this->lang->line('DELETE');?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(empty($training_info))
                            {
                                ?>
                            <tbody>
                            <tr id="supliments_1">
                                <td class="custom fieldcell">
                                    <div class="input select">
                                        <select name="training_course[]" id="training_course[]" class="selectbox-1 ">
                                            <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                            <?php
                                            foreach($this->config->item('training_course') as $key=>$training)
                                            {
                                                ?>
                                                <option value="<?php echo $key;?>"><?php echo $training;?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                        <span style="color: #FF0000">*</span>
                                        <input type="hidden" name="training_id[]" id="training_id[]" value="" class="" />
                                    </div>
                                </td>

                                <td class="custom fieldcell">
                                    <div class="input text">
                                        <input type="text" name="training_institute[]" id="training_institute[]" class="" />
                                        <span style="color: #FF0000">*</span>
                                    </div>
                                </td>
                                <td class="custom fieldcell">
                                    <div class="input text">
                                        <input type="text" name="training_time[]" id="training_time[]" class="" />
                                        <span style="color: #FF0000">*</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                                <?php
                            }
                            else
                            {
                                for($i=0; $i<sizeof($training_info); $i++)
                                {
                                    ?>
                                    <tr id="supliments_1">
                                        <td class="custom fieldcell">
                                            <div class="input select">
                                                <select name="training_course[]" id="training_course[]" class="selectbox-1 ">
                                                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                                    <?php
                                                    foreach($this->config->item('training_course') as $course_id=>$training)
                                                    {
                                                        if($course_id==$training_info[$i]['course_name'])
                                                        {
                                                            ?>
                                                            <option value="<?php echo $course_id;?>" selected><?php echo $training;?></option>
                                                        <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <option value="<?php echo $course_id;?>"><?php echo $training;?></option>
                                                        <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <input type="hidden" name="training_id[]" id="training_id[]" value="<?php echo $training_info[$i]['id'];?>" class="" />
                                            </div>
                                        </td>

                                        <td class="custom fieldcell">
                                            <div class="input text">
                                                <input type="text" name="training_institute[]" id="training_institute[]" value="<?php echo $training_info[$i]['institute_name'];?>" class="" />
                                            </div>
                                        </td>
                                        <td class="custom fieldcell">
                                            <div class="input text">
                                                <input type="text" name="training_time[]" id="training_time[]" value="<?php echo $training_info[$i]['timespan'];?>" class="" />
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                            }

                            ?>
                            </tbody>
                        </table>

                        <table class="signup table" width="100%">
                            <tr class="add" id="add_more_1">
                                <td class="custom labelcell">
                                    <input type="button" style="cursor:pointer;" id="1" class="myButton add_more" name="1" value="<?php echo $this->lang->line('ADD_MORE');?>" onclick="RowIncrementTraining()"/>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END ENTREPRENEUR_TRAINING_RELATED_INFO-->
            <!-- START INVESTMENT_RELATED_INFO-->
            <div class="col-lg-12">
                <div class="box round first">
                    <h2 class="text-center"><?php echo $this->lang->line('INVESTMENT_RELATED_INFO');?></h2>
                    <div class="block ">
                        <table class="signup table" width="100%">
                            <tbody>
                            <tr>

                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('SELF_INVESTMENT');?><span style="color: #FF0000">*</span></span></td>
                                <td>
                                    <div class="input select">
                                        <input type="text" name="self_investment" id="self_investment" class="total_investment selectbox-1 validate[required]" value="<?php echo $investment_info['self_investment'];?>"  onkeypress="return numbersOnly(event)" />
                                        <input type="hidden" name="investment_id" id="investment_id" class="selectbox-1 validate[required]" value="<?php echo $investment_info['id'];?>" />
                                    </div>
                                </td>
                                <td class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('INVEST_DEBT');?> <span style="color: #FF0000">*</span></td>
                                <td>
                                    <div class="input select">
                                        <input type="text" name="invest_debt" id="invest_debt" class="total_investment selectbox-1 validate[required]" value="<?php echo $investment_info['invest_debt'];?>"  onkeypress="return numbersOnly(event)" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('INVESTED_MONEY_AMOUNT');?> <span style="color: #FF0000">*</span></td>
                                <td>
                                    <div class="input select">
                                        <input readonly type="text" name="invested_money" id="invested_money" class="selectbox-1 validate[required]" value="<?php echo $investment_info['invested_money'];?>"  onkeypress="return numbersOnly(event)" />
                                    </div>
                                </td>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('INVEST_SECTOR');?><span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <textarea name="invest_sector" id="invest_sector" class="validate[required]"><?php echo $investment_info['invest_sector'];?></textarea>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <script>
                    $(document).on("keyup", ".total_investment", function(event)
                    {
                        var self_investment = parseInt($("#self_investment").val())
                        var invest_debt = parseInt($("#invest_debt").val())
                        var total_invested_money = (self_investment+invest_debt)
                        if(isNaN(total_invested_money))
                        {
                            total_invested_money=0;
                        }
                        $("#invested_money").val(total_invested_money);
                    })
                </script>
            </div>
            <!-- END INVESTMENT_RELATED_INFO-->
            <!-- START CENTER_LOCATION_RELATED_INFO-->
            <div class="col-lg-12">
                <div class="box round first">
                    <h2 class="text-center"><?php echo $this->lang->line('CENTER_LOCATION_RELATED_INFO');?></h2>
                    <div class="block ">
                        <table class="signup table" width="100%">
                            <tbody>
                            <tr>
                                <td class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('TYPE');?><span style="color: #FF0000">*</span></td>
                                <td>
                                    <div class="input select">
                                        <select name="center_location" id="center_location" class="selectbox-1 validate[required]">
                                            <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                            <?php
                                            foreach($this->config->item('center_location_info') as $key=>$location)
                                            {
                                                if($key==$location_info['center_type'])
                                                {
                                                    ?>
                                                    <option value="<?php echo $key;?>" selected="selected"><?php echo $location;?></option>
                                                <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <option value="<?php echo $key;?>"><?php echo $location;?></option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" id="location_id" name="location_id" value="<?php echo $location_info['id'];?>" />
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END CENTER_LOCATION_RELATED_INFO-->
            <!-- START EQUIPMENT-->
            <div class="col-lg-12">
                <div class="box round first">
                    <h2 class="text-center"><?php echo $this->lang->line('EQUIPMENT');?></h2>
                    <div class="block ">
                        <table class="signup table" id="resource_info" width="100%">
                            <thead>
                            <tr>
                                <th class="labelcell"><?php echo $this->lang->line('NAME');?></th>
                                <th class="labelcell"><?php echo $this->lang->line('DETAIL');?></th>
                                <th class="labelcell"><?php echo $this->lang->line('NUMBER');?></th>
                                <th class="labelcell"><?php echo $this->lang->line('STATUS');?></th>
                                <th class="labelcell"><?php echo $this->lang->line('DELETE');?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sl=1;
                            if(empty($resources_info))
                            {
                                ?>
                            <tbody>
                            <tr id="supliments_1">
                                <td  class="custom fieldcell">
                                    <div class="input select">
                                        <select name="res_id[]" id="res_id[]" class="selectbox-1" style="width: 90%">
                                            <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                            <?php
                                            foreach($resources as $equipment)
                                            {
                                                ?>
                                                <option value="<?php echo $equipment['value'];?>"><?php echo $equipment['text'];?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <span style="color: #FF0000">*</span>
                                        <input name="resources_id[]" id="resources_id[]" value="" class="" type="hidden"/>
                                    </div>

                                </td>

                                <td  class="custom fieldcell">
                                    <textarea name="res_detail[]" id="res_detail[]" class="" style="width: 90%"></textarea>
                                    <span style="color: #FF0000">*</span>
                                </td>
                                <td  class="custom fieldcell">
                                    <div class="input text">
                                        <input name="quantity[]" id="quantity[]" class="" type="text" style="width: 90%"/>
                                        <span style="color: #FF0000">*</span>
                                    </div>
                                </td>
                                <td class="custom col2">
                                    <select name='status[]' id='status[]' class='selectbox-1' style="width: 90%">
                                        <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                        <?php
                                        foreach($this->config->item('equipment_status') as $val=>$equipment_status)
                                        {
                                            ?>
                                            <option value="<?php echo $val;?>"><?php echo $equipment_status;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <span style="color: #FF0000">*</span>
                                </td>
                            </tr>
                            </tbody>
                                <?php
                            }
                            else
                            {
                                for($i=0; $i<sizeof($resources_info); $i++)
                                {
                                    ?>
                                    <tr id="supliments_1">
                                        <td  class="custom fieldcell">
                                            <div class="input select">
                                                <select name="res_id[]" id="res_id[]" class="selectbox-1 " style="width: 90%">
                                                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                                    <?php
                                                    foreach($resources as $equipment)
                                                    {
                                                        if($equipment['value']==$resources_info[$i]['res_id'])
                                                        {
                                                            ?>
                                                            <option value="<?php echo $equipment['value'];?>" selected="selected"><?php echo $equipment['text'];?></option>
                                                        <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <option value="<?php echo $equipment['value'];?>"><?php echo $equipment['text'];?></option>
                                                        <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <span style="color: #FF0000">*</span>
                                                <input name="resources_id[]" id="resources_id[]" value="<?php echo $resources_info[$i]['id'];?>" class="" type="hidden"/>
                                            </div>
                                        </td>

                                        <td  class="custom fieldcell">
                                            <textarea name="res_detail[]" id="res_detail[]" class="" style="width: 90%"><?php echo $resources_info[$i]['res_detail'];?></textarea>
                                            <span style="color: #FF0000">*</span>
                                        </td>
                                        <td  class="custom fieldcell">
                                            <div class="input text">
                                                <input name="quantity[]" id="quantity[]" value="<?php echo $resources_info[$i]['quantity'];?>" class="" type="text" style="width: 90%"/>
                                                <span style="color: #FF0000">*</span>
                                            </div>
                                        </td>
                                        <td class="custom col2">
                                            <select name='status[]' id='status[]' class='selectbox-1' style="width: 90%">
                                                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                                <?php
                                                foreach($this->config->item('equipment_status') as $val=>$equipment_status)
                                                {
                                                    if($val==$resources_info[$i]['status'])
                                                    {
                                                        ?>
                                                        <option value="<?php echo $val;?>" selected="selected"><?php echo $equipment_status;?></option>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <option value="<?php echo $val;?>"><?php echo $equipment_status;?></option>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <span style="color: #FF0000">*</span>
                                        </td>
                                    </tr>
                                    <?php
                                    ++$sl;
                                }
                            }

                            ?>

                            </tbody>
                        </table>
                        <table class="signup table" width="100%">
                            <tr class="add" id="add_more_1">
                                <td class="custom labelcell">
                                    <input type="button" style="cursor:pointer;" id="1" class="myButton add_more" name="1" value="<?php echo $this->lang->line('ADD_MORE');?>" onclick="RowIncrementResource()"/>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END EQUIPMENT-->
            <!-- START DEVICE_RELATED_INFO-->
            <div class="col-lg-12">
                <div class="box round first">
                    <h2><?php echo $this->lang->line('DEVICE_RELATED_INFO');?></h2>
                    <div class="block ">
                        <table class="signup table" width="100%">
                            <tbody>
                            <tr>
                                <td class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('CONNECTION_TYPE');?> <span style="color: #FF0000">*</span></td>
                                <td>
                                    <div class="input select">
                                        <select name="connection_type" id="connection_type" class="selectbox-1 validate[required]">
                                            <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                            <option value="Lan" <?php if($device_info['connection_type']=='Lan'){echo "selected='selected'";}?>>Lan</option>
                                            <option value="Wireless" <?php if($device_info['connection_type']=='Wireless'){echo "selected='selected'";}?>>Wireless</option>
                                        </select>
                                        <input type="hidden" id="device_id" name="device_id" value="<?php echo $device_info['id'];?>" />
                                    </div>
                                </td>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('MODEM');?><span style="color: #FF0000">*</span></span></td>
                                <td>
                                    <div class="input select">
                                        <select name="modem" id="modem" class="selectbox-1 validate[required]">
                                            <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                            <?php
                                            foreach($this->config->item('modem') as $val=>$modem)
                                            {
                                                if($val==$device_info['modem'])
                                                {
                                                    ?>
                                                    <option value="<?php echo $val;?>" selected="selected"><?php echo $modem;?></option>
                                                <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <option value="<?php echo $val;?>"><?php echo $modem;?></option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('IP_ADDRESS');?><span style="color: #FF0000">*</span></span></td>
                                <td width="29%" class="custom fieldcell">
                                    <textarea name="ip_address" id="ip_address" class="validate[required]"><?php echo $device_info['ip_address'];?></textarea>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- END DEVICE_RELATED_INFO-->
            <!-- START ELECTRICITY_RELATED_INFO-->
            <div class="col-lg-12">
                <div class="box round first">
                    <h2 class="text-center"><?php echo $this->lang->line('ELECTRICITY_RELATED_INFO');?></h2>
                    <div class="block ">
                        <table class="signup table" width="100%">
                            <tbody>
                            <tr>
                                <td class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('ELECTRICITY');?><span style="color: #FF0000">*</span></td>
                                <td>
                                    <div class="input select">
                                        <select name="electricity" id="electricity" class="selectbox-1 validate[required]">
                                            <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                            <option value="<?php echo $this->config->item('STATUS_ACTIVE');?>" <?php if($electricity_info['electricity']==$this->config->item('STATUS_ACTIVE')){echo "selected='selected'";}?>><?php echo $this->lang->line('YES')?></option>
                                            <option value="<?php echo $this->config->item('STATUS_INACTIVE');?>" <?php if($electricity_info['electricity']==$this->config->item('STATUS_INACTIVE')){echo "selected='selected'";}?>><?php echo $this->lang->line('NO')?></option>
                                        </select>
                                        <input type="hidden" id="electricity_id" name="electricity_id" value="<?php echo $electricity_info['id'];?>" />
                                    </div>
                                </td>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('SOLAR');?><span style="color: #FF0000">*</span></span></td>
                                <td>
                                    <div class="input select">
                                        <select name="solar" id="solar" class="selectbox-1 validate[required]">
                                            <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                            <option value="<?php echo $this->config->item('STATUS_ACTIVE');?>" <?php if($electricity_info['solar']==$this->config->item('STATUS_ACTIVE')){echo "selected='selected'";}?>><?php echo $this->lang->line('YES')?></option>
                                            <option value="<?php echo $this->config->item('STATUS_INACTIVE');?>" <?php if($electricity_info['solar']==$this->config->item('STATUS_INACTIVE')){echo "selected='selected'";}?>><?php echo $this->lang->line('NO')?></option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="custom smalllabelcell"><span class="labelcell"><?php echo $this->lang->line('IPS');?><span style="color: #FF0000">*</span></span></td>
                                <td>
                                    <div class="input select">
                                        <select name="ips" id="ips" class="selectbox-1 validate[required]">
                                            <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                            <option value="<?php echo $this->config->item('STATUS_ACTIVE');?>" <?php if($electricity_info['ips']==$this->config->item('STATUS_ACTIVE')){echo "selected='selected'";}?>><?php echo $this->lang->line('YES')?></option>
                                            <option value="<?php echo $this->config->item('STATUS_INACTIVE');?>" <?php if($electricity_info['ips']==$this->config->item('STATUS_INACTIVE')){echo "selected='selected'";}?>><?php echo $this->lang->line('NO')?></option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END ELECTRICITY_RELATED_INFO-->
        </div>
        <div class="box round first">
            <div class="block">
                <table class="signup table" width="100%">
                    <tr>
                        <td colspan="1" class="custom labelcell" style="text-align: center;">
                            <input type="submit" style="cursor:pointer; margin-right: 37px !important;" class="myButton" id="submitRegistration" name="submitRegistration" value="<?php echo $this->lang->line('SAVE');?>" />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</div>

<script>
    //////////////////////////////////////// Table Row add delete function ///////////////////////////////
    var ExId = 0;
    function RowIncrementResource()
    {
        var table = document.getElementById('resource_info');

        var rowCount = table.rows.length;
        //alert(rowCount);
        var row = table.insertRow(rowCount);
        row.id = "T" + ExId;
        row.className = "tableHover";
        //alert(row.id);
        var cell1 = row.insertCell(0);
        cell1.innerHTML = "<select name='res_id[]' id='res_id"+ExId+"' class='selectbox-1'>\n\
        <option value=''><?php echo $this->lang->line('SELECT');?></option>\n\
        <?php
        foreach ($resources as $resource)
        {
            echo "<option value='$resource[value]'>$resource[text]</option>";
        }
        ?></select><input type='hidden' id='resources_id[]' name='resources_id[]' value=''  />";
        var cell1 = row.insertCell(1);
        cell1.innerHTML = "<textarea name='res_detail[]' id='res_detail[]' class=''></textarea>";
        var cell1 = row.insertCell(2);
        cell1.innerHTML = "<input name='quantity[]' id='quantity[]' class='' type='text'/>";
        var cell1 = row.insertCell(3);
        cell1.innerHTML = "<select name='status[]' id='status[]' class='selectbox-1 validate[required]'>\n\
        <option value=''><?php echo $this->lang->line('SELECT');?></option>\n\
            <option value='0'>ভাল </option>\n\
            <option value='1'>ত্রুটিপূর্ণ </option>\n\
        </select>";
        cell1 = row.insertCell(4);
        cell1.innerHTML = "<input type='button' onclick=\"RowDecrementResource('resource_info','T"+ExId+"')\" style='cursor:pointer;' id='resource_del_btn"+ExId+"' name='resource_del_btn[]' value='মুছুন' class='more myButton' />";
        cell1.style.cursor = "default";
        document.getElementById("res_id" + ExId).focus();
        ExId = ExId + 1;
        $("#resource_info").tableDnD();
    }

    function RowDecrementResource(tableID, id)
    {
        try {
            var table = document.getElementById(tableID);
            for (var i = 1; i < table.rows.length; i++)
            {
                if (table.rows[i].id == id)
                {
                    table.deleteRow(i);
                    // showAlert('SA-00106');
                }
            }
        }
        catch (e) {
            alert(e);
        }
    }

    var ExId = 0;
    function RowIncrementTraining()
    {
        var table = document.getElementById('training_info');

        var rowCount = table.rows.length;
        //alert(rowCount);
        var row = table.insertRow(rowCount);
        row.id = "T" + ExId;
        row.className = "tableHover";
        //alert(row.id);
        var cell1 = row.insertCell(0);
        cell1.innerHTML = "<select name='training_course[]' id='training_course"+ExId+"' class='selectbox-1'>\n\
            <option value=''><?php echo $this->lang->line('SELECT');?></option>\n\
            <?php
            foreach ($this->config->item('training_course') as $key=>$training)
            {
                echo "<option value='$key'>$training</option>";
            }
            ?></select><input type='hidden' id='training_id[]' name='training_id[]' value='' />";
        var cell1 = row.insertCell(1);
        cell1.innerHTML = "<input type='text' name='training_institute[]' id='training_institute[]' class='' />";
        var cell1 = row.insertCell(2);
        cell1.innerHTML = "<input name='training_time[]' id='training_time[]' class='' type='text'/>";

        cell1 = row.insertCell(3);
        cell1.innerHTML = "<input type='button' onclick=\"RowDecrementTraining('training_info','T"+ExId+"')\" style='cursor:pointer;' id='training_del_btn"+ExId+"' name='training_del_btn[]' value='মুছুন' class='more myButton' />";
        cell1.style.cursor = "default";
        document.getElementById("training_course" + ExId).focus();
        ExId = ExId + 1;
        $("#training_info").tableDnD();
    }

    function RowDecrementTraining(tableID, id)
    {
        try {
            var table = document.getElementById(tableID);
            for (var i = 1; i < table.rows.length; i++)
            {
                if (table.rows[i].id == id)
                {
                    table.deleteRow(i);
                    // showAlert('SA-00106');
                }
            }
        }
        catch (e) {
            alert(e);
        }
    }
</script>