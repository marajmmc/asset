<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile_update extends Root_Controller
{
    public $permissions;
    public $message;
    public $controller_url;
    public $current_action;
    function __construct()
    {
        parent::__construct();
        $this->message='';
        $this->permissions=Menu_helper::get_permission('user_management/user_profile_update');
        $this->controller_url='user_management/user_profile_update';
        $this->load->model("user_management/user_profile_update_model");
        $this->lang->load("user_create", $this->get_language());
        if($this->permissions)
        {
            $this->permissions['add']=0;
            $this->permissions['delete']=0;
            $this->permissions['view']=0;
        }
    }

    public function index($action='list',$id=0)
    {
        $this->current_action=$action;

        if($action=='list')
        {
            $this->system_list();
        }
        elseif($action=='add')
        {
            $this->system_add();
        }
        elseif($action=='batch_edit')
        {
            $this->system_batch_edit();
        }
        elseif($action=='edit')
        {
            $this->system_edit($id);
        }
        elseif($action=='save')
        {
            $this->system_save();
        }
        elseif($action=='batch_details')
        {
            $this->system_batch_details();
        }
        elseif($action=='batch_delete')
        {
            $this->system_batch_delete();
        }
        else
        {
            $this->system_list();
        }
    }

    private function system_list()
    {
        if($this->permissions['list'])
        {
            $this->current_action='list';
            $ajax['status']=true;

            $user=User_helper::get_user();
            if($user->user_group_id==$this->config->item('UISC_GROUP_ID'))
            {
                $profile_status= User_helper::complete_user_profile_check();
                if(!$profile_status)
                {
                    $ajax['system_content'][]=array("id"=>"#system_wrapper_top_menu","html"=>"");
                    $ajax['system_content'][]=array("id"=>"#system_wrapper","html"=>$this->load_view("user_management/user_profile_update/system_list","",true));
                }
                else
                {
                    $ajax['system_content'][]=array("id"=>"#system_wrapper_top_menu","html"=>$this->load_view("top_menu","",true));
                    $ajax['system_content'][]=array("id"=>"#system_wrapper","html"=>$this->load_view("user_management/user_profile_update/system_list","",true));
                }
            }
            else
            {
                $ajax['system_content'][]=array("id"=>"#system_wrapper_top_menu","html"=>$this->load_view("top_menu","",true));
                $ajax['system_content'][]=array("id"=>"#system_wrapper","html"=>$this->load_view("user_management/user_profile_update/system_list","",true));
            }

            if($this->message)
            {
                $ajax['system_message']=$this->message;
            }
            $ajax['system_page_url']=$this->get_encoded_url('user_management/user_profile_update');
            $ajax['system_page_title']=$this->lang->line("USER_CREATE");
            $this->jsonReturn($ajax);
        }
        else
        {
            $ajax['system_message']=$this->lang->line("YOU_DONT_HAVE_ACCESS");
            $this->jsonReturn($ajax);
        }
    }

    private function system_add()
    {
        //        if($this->permissions['add'])
        //        {
        //            $this->current_action='add';
        //            $ajax['status']=true;
        //            $data=array();
        //
        //            $data['title']=$this->lang->line("CREATE_NEW_USER");
        //
        //            $data['userInfo'] = array
        //            (
        //                'id'=>'',
        //                'username'=>'',
        //                'password'=>'',
        //                'name_bn'=>'',
        //                'division'=>'',
        //                'zilla'=>'',
        //                'upazila'=>'',
        //                'unioun'=>'',
        //                'citycorporation'=>'',
        //                'citycorporationward'=>'',
        //                'municipal'=>'',
        //                'municipalward'=>'',
        //                'mobile'=>'',
        //                'email'=>'',
        //            );
        //
        //
        //            $data['groups']=Query_helper::get_info($this->config->item('table_user_group'),array('id value','name_'.$this->get_language_code().' text'),array('status !=99'), 12);
        //            $data['divisions']=Query_helper::get_info($this->config->item('table_divisions'),array('divid value', 'divname text'), array());
        //            $ajax['system_content'][]=array("id"=>"#system_wrapper_top_menu","html"=>$this->load_view("top_menu","",true));
        //            $ajax['system_content'][]=array("id"=>"#system_wrapper","html"=>$this->load_view("user_management/user_profile_update/system_add_edit",$data,true));
        //
        //            if($this->message)
        //            {
        //                $ajax['system_message']=$this->message;
        //            }
        //
        //            $ajax['system_page_url']=$this->get_encoded_url('user_management/user_profile_update/index/add');
        //            $this->jsonReturn($ajax);
        //        }
        //        else
        //        {
        //            $ajax['system_message']=$this->lang->line("YOU_DONT_HAVE_ACCESS");
        //            $this->jsonReturn($ajax);
        //        }
    }

    private function system_edit($id)
    {
        if($this->permissions['edit'])
        {
            $this->current_action='edit';
            $ajax['status']=true;
            $data=array();

            $data['title']=$this->lang->line("EDIT_USER");

            $data['resources'] = Query_helper::get_info($this->config->item('table_resources'),array('res_id value','res_name text'),array('visible = 1'));

            $data['user_info']=Query_helper::get_info($this->config->item('table_users'),'*',array('id ='.$id),1);
            $uisc_id = $data['user_info']['uisc_id'];

            $data['chairmen_info']=Query_helper::get_info($this->config->item('table_entrepreneur_chairmen_info'),'*',array('uisc_id ='.$uisc_id),1);
            $data['secretary_info']=Query_helper::get_info($this->config->item('table_secretary_infos'),'*',array('user_id ='.$id, 'uisc_id ='.$uisc_id),1);
            $data['entrepreneur_info']=Query_helper::get_info($this->config->item('table_entrepreneur_infos'),'*',array('user_id ='.$id, 'uisc_id ='.$uisc_id),1);
            $data['education_info']=Query_helper::get_info($this->config->item('table_entrepreneur_education'),'*',array('user_id ='.$id, 'uisc_id ='.$uisc_id),1);
            $data['training_info']=Query_helper::get_info($this->config->item('table_training'),'*',array('user_id ='.$id, 'uisc_id ='.$uisc_id),0);
            $data['investment_info']=Query_helper::get_info($this->config->item('table_investment'),'*',array('user_id ='.$id, 'uisc_id ='.$uisc_id),1);
            $data['location_info']=Query_helper::get_info($this->config->item('table_center_location'),'*',array('user_id ='.$id, 'uisc_id ='.$uisc_id),1);
            $data['resources_info']=Query_helper::get_info($this->config->item('table_uisc_resources'),'*',array('user_id ='.$id, 'uisc_id ='.$uisc_id),0);
            $data['device_info']=Query_helper::get_info($this->config->item('table_device_infos'),'*',array('user_id ='.$id, 'uisc_id ='.$uisc_id),1);
            $data['electricity_info']=Query_helper::get_info($this->config->item('table_electricity'),'*',array('user_id ='.$id, 'uisc_id ='.$uisc_id),1);

            //            $user_group_id = $data['user_info']['user_group_id'];
            //            $division_id = $data['user_info']['division'];
            //            $zilla_id = $data['user_info']['zilla'];
            //            $upazila_id = $data['user_info']['upazila'];
            //            //$unioun_id = $data['user_info']['unioun'];
            //            $city_corporation_id = $data['user_info']['citycorporation'];
            //            //$city_corporation_ward_id = $data['user_info']['citycorporationward'];
            //            $municipal_id = $data['user_info']['municipal'];
            //            //$municipal_ward_id = $data['user_info']['municipalward'];
            //
            //            $data['groups']=Query_helper::get_info($this->config->item('table_user_group'),array('id value','name_'.$this->get_language_code().' text'),array('status !=99'), 12);
            //            $data['divisions']=Query_helper::get_info($this->config->item('table_divisions'),array('divid value', 'divname text'), array());
            //            $data['zillas']=Query_helper::get_info($this->config->item('table_zillas'),array('zillaid value', 'zillaname text'), array('visible = 1', 'divid = '.$division_id));
            //            $data['upazilas']=Query_helper::get_info($this->config->item('table_upazilas'),array('upazilaid value', 'upazilaname text'), array('visible = 1', 'zillaid = '.$zilla_id));
            //            $data['unions']=Query_helper::get_info($this->config->item('table_unions'),array('unionid value', 'unionname text'), array('visible = 1', 'zillaid = '.$zilla_id, 'upazilaid='.$upazila_id));
            //            $data['city_corporations']=Query_helper::get_info($this->config->item('table_city_corporations'),array('citycorporationid value', 'citycorporationname text'), array('visible = 1', 'zillaid = '.$zilla_id, 'divid='.$division_id));
            //            $data['city_corporation_words']=Query_helper::get_info($this->config->item('table_city_corporation_wards'),array('citycorporationwardid value', 'wardname text'), array('visible = 1', 'zillaid = '.$zilla_id, 'divid='.$division_id, 'citycorporationid = '.$city_corporation_id));
            //            $data['municipals']=Query_helper::get_info($this->config->item('table_municipals'),array('municipalid value', 'municipalname text'), array('visible = 1', 'zillaid = '.$zilla_id));
            //            $data['municipal_wards']=Query_helper::get_info($this->config->item('table_municipal_wards'),array('wardid value', 'wardname text'), array('visible = 1', 'zillaid = '.$zilla_id, 'municipalid = '.$municipal_id));

            $user=User_helper::get_user();
            if($user->user_group_id==$this->config->item('UISC_GROUP_ID'))
            {
                $profile_status= User_helper::complete_user_profile_check();
                if(!$profile_status)
                {
                    $ajax['system_content'][]=array("id"=>"#system_wrapper_top_menu","html"=>"");
                    $ajax['system_content'][]=array("id"=>"#system_wrapper","html"=>$this->load_view("user_management/user_profile_update/system_add_edit",$data,true));
                }
                else
                {
                    $ajax['system_content'][]=array("id"=>"#system_wrapper_top_menu","html"=>$this->load_view("top_menu","",true));
                    $ajax['system_content'][]=array("id"=>"#system_wrapper","html"=>$this->load_view("user_management/user_profile_update/system_add_edit",$data,true));
                }
            }
            else
            {
                $ajax['system_content'][]=array("id"=>"#system_wrapper_top_menu","html"=>$this->load_view("top_menu","",true));
                $ajax['system_content'][]=array("id"=>"#system_wrapper","html"=>$this->load_view("user_management/user_profile_update/system_add_edit",$data,true));
            }

            if($this->message)
            {
                $ajax['system_message']=$this->message;
            }
            $ajax['system_page_url']=$this->get_encoded_url('user_management/user_profile_update/index/edit/'.$id);
            $this->jsonReturn($ajax);
        }
        else
        {
            $ajax['status']=true;
            $ajax['system_message']=$this->lang->line("YOU_DONT_HAVE_ACCESS");
            $this->jsonReturn($ajax);
        }
    }

    private function system_save()
    {
        $user=User_helper::get_user();
        $id = $this->input->post("id");
        if($id>0)
        {
            if(!$this->permissions['edit'])
            {
                $ajax['status']=false;
                $ajax['system_message']=$this->lang->line("YOU_DONT_HAVE_ACCESS");
                $this->jsonReturn($ajax);
                die();
            }
        }
        else
        {
            if(!$this->permissions['add'])
            {
                $ajax['status']=false;
                $ajax['system_message']=$this->lang->line("YOU_DONT_HAVE_ACCESS");
                $this->jsonReturn($ajax);
                die();
            }
        }

        if(!$this->check_validation())
        {
            $ajax['status']=false;
            $ajax['system_message']=$this->message;
            $this->jsonReturn($ajax);
        }
        else
        {

            $time=time();
            $user_id=$id;
            $uisc_id=$this->input->post('uisc_id');
            if($id>0)
            {


                $this->db->trans_start();  //DB Transaction Handle START


                $dir = $this->config->item("dcms_upload");
                $uploaded = System_helper::upload_file($dir['entrepreneur'],10240,'gif|jpg|png');

                if(array_key_exists('profile_image',$uploaded))
                {
                    if($uploaded['profile_image']['status'])
                    {
                        $user_data['picture_name'] = $uploaded['profile_image']['info']['file_name'];
                        Query_helper::update($this->config->item('table_users'),$user_data, array("id = ".$user_id));
                    }
                    else
                    {
                        $ajax['status']=false;
                        $ajax['system_message']=$this->message.=$uploaded['profile_image']['message'].'<br>';
                        $this->jsonReturn($ajax);
                    }
                }

                // User Table update

                $user_update_data = array();
                $user_update_data['name_bn'] = $this->input->post('entrepreneur_name');
                $user_update_data['name_en'] = $this->input->post('entrepreneur_name');
                Query_helper::update($this->config->item('table_users'),$user_update_data,array("id = ".$id));

                //////// START CHAIRMEN INFO ////////
                $chairmen_info['update_by']=$user->id;
                $chairmen_info['update_date']=$time;
                //$chairmen_info['user_id']=$user_id;
                $chairmen_info['uisc_id']=$uisc_id;

                $chairmen_info['chairmen_name']=$this->input->post('chairmen_name');
                $chairmen_info['chairmen_mobile']=$this->input->post('chairmen_mobile');
                $chairmen_info['chairmen_email']=$this->input->post('chairmen_email');
                $chairmen_info['chairmen_address']=$this->input->post('chairmen_address');
                if($this->input->post('chairmen_id')>0)
                {
                    Query_helper::update($this->config->item('table_entrepreneur_chairmen_info'),$chairmen_info,array("id = ".$this->input->post('chairmen_id')));
                }
                else
                {
                    Query_helper::add($this->config->item('table_entrepreneur_chairmen_info'),$chairmen_info);
                }
                //////// END CHAIRMEN INFO ////////

                //////// START SECRETARY_RELATED_INFO ////////
                $secretary_info['update_by']=$user->id;
                $secretary_info['update_date']=$time;
                $secretary_info['user_id']=$user_id;
                $secretary_info['uisc_id']=$uisc_id;

                $secretary_info['secretary_name']=$this->input->post('secretary_name');
                $secretary_info['secretary_mobile']=$this->input->post('secretary_mobile');
                $secretary_info['secretary_email']=$this->input->post('secretary_email');
                $secretary_info['secretary_address']=$this->input->post('secretary_address');

                if($this->input->post('secretary_id')>0)
                {
                    Query_helper::update($this->config->item('table_secretary_infos'),$secretary_info,array("id = ".$this->input->post('secretary_id')));
                }
                else
                {
                    Query_helper::add($this->config->item('table_secretary_infos'),$secretary_info);
                }
                //////// END SECRETARY_RELATED_INFO ////////

                //////// START ENTREPRENEUR_RELATED_INFO ////////
                $entrepreneur_info['update_by']=$user->id;
                $entrepreneur_info['update_date']=$time;
                $entrepreneur_info['user_id']=$user_id;
                $entrepreneur_info['uisc_id']=$uisc_id;

                $entrepreneur_info['entrepreneur_type']=$this->input->post('entrepreneur_exp_type');
                $entrepreneur_info['entrepreneur_name']=$this->input->post('entrepreneur_name');
                $entrepreneur_info['entrepreneur_mother_name']=$this->input->post('entrepreneur_mother_name');
                $entrepreneur_info['entrepreneur_father_name']=$this->input->post('entrepreneur_father_name');
                $entrepreneur_info['entrepreneur_mobile']=$this->input->post('entrepreneur_mobile');
                $entrepreneur_info['entrepreneur_email']=$this->input->post('entrepreneur_email');
                $entrepreneur_info['entrepreneur_sex']=$this->input->post('entrepreneur_sex');
                $entrepreneur_info['entrepreneur_address']=$this->input->post('entrepreneur_address');
                $entrepreneur_info['entrepreneur_nid']=$this->input->post('entrepreneur_nid');
                $entrepreneur_info['entrepreneur_bank_name']=$this->input->post('entrepreneur_bank_name');
                $entrepreneur_info['entrepreneur_bank_account_no']=$this->input->post('entrepreneur_bank_account_no');
                $entrepreneur_info['entrepreneur_bank_holder_name']=$this->input->post('entrepreneur_bank_holder_name');
                $entrepreneur_info['entrepreneur_blog_member']=$this->input->post('entrepreneur_blog_member');
                $entrepreneur_info['entrepreneur_fb_group_member']=$this->input->post('entrepreneur_fb_group_member');
                //$entrepreneur_info['ques_id']=$this->input->post('ques_id');
                //$entrepreneur_info['ques_ans']=$this->input->post('ques_ans');

                if($this->input->post('entrepreneur_id')>0)
                {
                    Query_helper::update($this->config->item('table_entrepreneur_infos'),$entrepreneur_info,array("id = ".$this->input->post('entrepreneur_id')));
                }
                else
                {
                    Query_helper::add($this->config->item('table_entrepreneur_infos'),$entrepreneur_info);
                }
                //////// END ENTREPRENEUR_RELATED_INFO ////////

                //////// START EDUCATION_RELATED_INFO ////////
                $education_info['update_by']=$user->id;
                $education_info['update_date']=$time;
                $education_info['user_id']=$user_id;
                $education_info['uisc_id']=$uisc_id;

                $education_info['latest_education']=$this->input->post('latest_education');
                $education_info['passing_year']=$this->input->post('passing_year');

                if($this->input->post('education_id')>0)
                {
                    Query_helper::update($this->config->item('table_entrepreneur_education'),$education_info,array("id = ".$this->input->post('education_id')));
                }
                else
                {
                    Query_helper::add($this->config->item('table_entrepreneur_education'),$education_info);
                }
                //////// END EDUCATION_RELATED_INFO ////////

                //////// START ENTREPRENEUR_TRAINING_RELATED_INFO ////////
                $training_info['update_by']=$user->id;
                $training_info['update_date']=$time;
                $training_info['user_id']=$user_id;
                $training_info['uisc_id']=$uisc_id;

                $training_id=$this->input->post('training_id');
                $course_name=$this->input->post('training_course');
                $institute_name=$this->input->post('training_institute');
                $timespan=$this->input->post('training_time');

                for($noc=0; $noc<sizeof($training_id); $noc++)
                {
                    $training_info['course_name']=$course_name[$noc];
                    $training_info['institute_name']=$institute_name[$noc];
                    $training_info['timespan']=$timespan[$noc];
                    if(empty($training_id[$noc]))
                    {
                        Query_helper::add($this->config->item('table_training'),$training_info);
                    }
                    else
                    {
                        Query_helper::update($this->config->item('table_training'),$training_info,array("id = ".$training_id[$noc]));
                    }
                }

                //////// END ENTREPRENEUR_TRAINING_RELATED_INFO ////////

                //////// START INVESTMENT_RELATED_INFO ////////
                $investment_info['update_by']=$user->id;
                $investment_info['update_date']=$time;
                $investment_info['user_id']=$user_id;
                $investment_info['uisc_id']=$uisc_id;

                $investment_info['self_investment']=System_helper::Get_Bng_to_Eng(trim($this->input->post('self_investment')));
                $investment_info['invest_debt']=System_helper::Get_Bng_to_Eng(trim($this->input->post('invest_debt')));
                $investment_info['invested_money']=(System_helper::Get_Bng_to_Eng(trim($this->input->post('self_investment')))+System_helper::Get_Bng_to_Eng(trim($this->input->post('invest_debt'))));//System_helper::Get_Bng_to_Eng(trim($this->input->post('invested_money')));
                $investment_info['invest_sector']=$this->input->post('invest_sector');

                if($this->input->post('investment_id')>0)
                {
                    Query_helper::update($this->config->item('table_investment'),$investment_info,array("id = ".$this->input->post('investment_id')));
                }
                else
                {
                    Query_helper::add($this->config->item('table_investment'),$investment_info);
                }
                //////// END INVESTMENT_RELATED_INFO ////////


                //////// START CENTER_LOCATION_RELATED_INFO ////////
                $location_info['update_by']=$user->id;
                $location_info['update_date']=$time;
                $location_info['user_id']=$user_id;
                $location_info['uisc_id']=$uisc_id;

                $location_info['center_type']=$this->input->post('center_location');

                if($this->input->post('location_id')>0)
                {
                    Query_helper::update($this->config->item('table_center_location'),$location_info,array("id = ".$this->input->post('location_id')));
                }
                else
                {
                    Query_helper::add($this->config->item('table_center_location'),$location_info);
                }
                //////// END CENTER_LOCATION_RELATED_INFO ////////

                //////// START EQUIPMENT ////////
                $resources_info['update_by']=$user->id;
                $resources_info['update_date']=$time;
                $resources_info['user_id']=$user_id;
                $resources_info['uisc_id']=$uisc_id;

                $resources_id=$this->input->post('resources_id');
                $res_id=$this->input->post('res_id');
                $res_detail=$this->input->post('res_detail');
                $quantity=$this->input->post('quantity');
                $status=$this->input->post('status');

                for($nor=0; $nor<sizeof($resources_id); $nor++)
                {
                    $resources_info['res_id']=$res_id[$nor];
                    $resources_info['res_detail']=$res_detail[$nor];
                    $resources_info['quantity']=$quantity[$nor];
                    $resources_info['status']=$status[$nor];
                    if(empty($resources_id[$nor]))
                    {
                        Query_helper::add($this->config->item('table_uisc_resources'),$resources_info);
                    }
                    else
                    {
                        Query_helper::update($this->config->item('table_uisc_resources'),$resources_info,array("id = ".$resources_id[$nor]));
                    }
                }

                //////// END EQUIPMENT ////////

                //////// START DEVICE_RELATED_INFO ////////
                $device_info['update_by']=$user->id;
                $device_info['update_date']=$time;
                $device_info['user_id']=$user_id;
                $device_info['uisc_id']=$uisc_id;

                $device_info['connection_type']=$this->input->post('connection_type');
                $device_info['modem']=$this->input->post('modem');
                $device_info['ip_address']=$this->input->post('ip_address');

                if($this->input->post('device_id')>0)
                {
                    Query_helper::update($this->config->item('table_device_infos'),$device_info,array("id = ".$this->input->post('device_id')));
                }
                else
                {
                    Query_helper::add($this->config->item('table_device_infos'),$device_info);
                }
                //////// END DEVICE_RELATED_INFO ////////

                //////// START ELECTRICITY_RELATED_INFO ////////
                $electricity_info['update_by']=$user->id;
                $electricity_info['update_date']=$time;
                $electricity_info['user_id']=$user_id;
                $electricity_info['uisc_id']=$uisc_id;

                $electricity_info['electricity']=$this->input->post('electricity');
                $electricity_info['solar']=$this->input->post('solar');
                $electricity_info['ips']=$this->input->post('ips');

                if($this->input->post('electricity_id')>0)
                {
                    Query_helper::update($this->config->item('table_electricity'),$electricity_info,array("id = ".$this->input->post('electricity_id')));
                }
                else
                {
                    Query_helper::add($this->config->item('table_electricity'),$electricity_info);
                }
                //////// END ELECTRICITY_RELATED_INFO ////////

                $this->db->trans_complete();   //DB Transaction Handle END

                if ($this->db->trans_status() === TRUE)
                {
                    $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");
                    $save_and_new=$this->input->post('system_save_new_status');
                    if($save_and_new==1)
                    {
                        $this->system_add();
                    }
                    else
                    {
                        $this->system_list();
                    }
                }
                else
                {
                    $ajax['status']=false;
                    $ajax['system_message']=$this->lang->line("MSG_UPDATE_FAIL");
                    $this->jsonReturn($ajax);
                }
            }
            else
            {
                $userDetail['create_by']=$user->id;
                $userDetail['create_date']=time();

                $this->db->trans_start();  //DB Transaction Handle START

                Query_helper::add($this->config->item('table_users'),$userDetail);

                $this->db->trans_complete();   //DB Transaction Handle END

                if ($this->db->trans_status() === TRUE)
                {
                    $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
                    $save_and_new=$this->input->post('system_save_new_status');
                    if($save_and_new==1)
                    {
                        $this->system_add();
                    }
                    else
                    {
                        $this->system_list();
                    }
                }
                else
                {
                    $ajax['status']=false;
                    $ajax['system_message']=$this->lang->line("MSG_CREATE_FAIL");
                    $this->jsonReturn($ajax);
                }
            }
        }
    }

    private function system_batch_edit()
    {
        $selected_ids=$this->input->post('selected_ids');
        $this->system_edit($selected_ids[0]);
    }

    private function system_batch_delete()
    {
        if($this->permissions['delete'])
        {
            $user=User_helper::get_user();
            $selected_ids=$this->input->post('selected_ids');
            $this->db->trans_start();  //DB Transaction Handle START
            foreach($selected_ids as $id)
            {
                Query_helper::update($this->config->item('table_users'),array('status'=>99,'update_by'=>$user->id,'update_date'=>time()),array("id = ".$id));
            }
            $this->db->trans_complete();   //DB Transaction Handle END

            if ($this->db->trans_status() === TRUE)
            {
                $this->message=$this->lang->line("MSG_DELETE_SUCCESS");
                $this->system_list();
            }
            else
            {
                $ajax['status']=false;
                $ajax['system_message']=$this->lang->line("MSG_DELETE_FAIL");
                $this->jsonReturn($ajax);
            }
        }
        else
        {
            $ajax['status']=false;
            $ajax['system_message']=$this->lang->line("YOU_DONT_HAVE_ACCESS");
            $this->jsonReturn($ajax);
        }
    }

    private function check_validation()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('chairmen_name',$this->lang->line('CHAIRMEN_NAME'),'required');
        $this->form_validation->set_rules('chairmen_mobile',$this->lang->line('CHAIRMEN_MOBILE_NO'),'required');
        $this->form_validation->set_rules('chairmen_address',$this->lang->line('CHAIRMAN_ADDRESS'),'required');

        $this->form_validation->set_rules('secretary_name',$this->lang->line('SECRETARY_NAME'),'required');
        $this->form_validation->set_rules('secretary_mobile',$this->lang->line('SECRETARY_MOBILE_NO'),'required');
        $this->form_validation->set_rules('secretary_email',$this->lang->line('SECRETARY_EMAIL'),'required');
        $this->form_validation->set_rules('secretary_address',$this->lang->line('SECRETARY_ADDRESS'),'required');

        $this->form_validation->set_rules('entrepreneur_exp_type',$this->lang->line('ENTREPRENEUR_TYPE'),'required');
        $this->form_validation->set_rules('entrepreneur_name',$this->lang->line('ENTREPRENEUR_NAME'),'required');
        $this->form_validation->set_rules('entrepreneur_mother_name',$this->lang->line('MOTHERS_NAME'),'required');
        $this->form_validation->set_rules('entrepreneur_father_name',$this->lang->line('FATHERS_NAME'),'required');
        //$this->form_validation->set_rules('entrepreneur_qualification',$this->lang->line('ENTREPRENEUR_ACADEMIC_QUALIFICATION'),'required');
        $this->form_validation->set_rules('entrepreneur_mobile',$this->lang->line('ENTREPRENEUR_MOBILE_NO'),'required');
        $this->form_validation->set_rules('entrepreneur_email',$this->lang->line('ENTREPRENEUR_EMAIL'),'required|valid_email');
        $this->form_validation->set_rules('entrepreneur_sex',$this->lang->line('ENTREPRENEUR_GENDER'),'required');
        $this->form_validation->set_rules('entrepreneur_address',$this->lang->line('ENTREPRENEUR_ADDRESS'),'required');

        $this->form_validation->set_rules('connection_type',$this->lang->line('CONNECTION_TYPE'),'required');
        $this->form_validation->set_rules('modem',$this->lang->line('MODEM'),'required');
        $this->form_validation->set_rules('ip_address',$this->lang->line('IP_ADDRESS'),'required');

        $this->form_validation->set_rules('latest_education',$this->lang->line('LATEST_ACADEMIC_INFO'),'required');
        $this->form_validation->set_rules('passing_year',$this->lang->line('PASSING_YEAR'),'required');
        $this->form_validation->set_rules('center_location',$this->lang->line('TYPE'),'required');

        $this->form_validation->set_rules('electricity',$this->lang->line('ELECTRICITY'),'required');
        $this->form_validation->set_rules('solar',$this->lang->line('SOLAR'),'required');
        $this->form_validation->set_rules('ips',$this->lang->line('IPS'),'required');

        $this->form_validation->set_rules('training_course[]',$this->lang->line('COURSE_NAME'),'required');
        $this->form_validation->set_rules('training_institute[]',$this->lang->line('INSTITUTION_NAME'),'required');
        $this->form_validation->set_rules('training_time[]',$this->lang->line('TIME_SPAN'),'required');

        $this->form_validation->set_rules('res_id[]',$this->lang->line('NAME'),'required');
        $this->form_validation->set_rules('res_detail[]',$this->lang->line('DETAIL'),'required');
        $this->form_validation->set_rules('quantity[]',$this->lang->line('NUMBER'),'required');
        $this->form_validation->set_rules('status[]',$this->lang->line('STATUS'),'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->message=validation_errors();
            return false;
        }
        return true;
    }

    public function check_username_existence()
    {
        $username = $this->input->post('username');
        $existence = $this->user_profile_update_model->check_username_existence($username,0);

        if($existence)
        {
            $ajax['status']=false;
            $ajax['system_content'][]=array("id"=>"#user_check","html"=>$this->lang->line('USERNAME_EXISTS'),array(),true);
            $this->jsonReturn($ajax);
        }
        else
        {
            $ajax['status']=true;
            $ajax['system_content'][]=array("id"=>"#user_check","html"=>'',array(),true);
            $this->jsonReturn($ajax);
        }
    }

    public function get_users()
    {
        $users = array();
        if($this->permissions['list'])
        {
            $users = $this->user_profile_update_model->get_users_info();

        }
        $this->jsonReturn($users);
    }



}
