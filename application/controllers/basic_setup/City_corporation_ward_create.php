<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_corporation_ward_create extends Root_Controller
{
    public $permissions;
    public $message;
    public $controller_url;
    public $current_action;
    function __construct()
    {
        parent::__construct();
        $this->message='';
        $this->permissions=Menu_helper::get_permission('basic_setup/city_corporation_ward_create');
        if($this->permissions)
        {
            $this->permissions['add']=0;
            $this->permissions['delete']=0;
            $this->permissions['view']=0;
        }
        $this->controller_url='basic_setup/city_corporation_ward_create';
        $this->load->model("basic_setup/city_corporation_ward_create_model");
        $this->lang->load("basic_setup", $this->get_language());
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
            $ajax['system_content'][]=array("id"=>"#system_wrapper_top_menu","html"=>$this->load_view("top_menu","",true));
            $ajax['system_content'][]=array("id"=>"#system_wrapper","html"=>$this->load_view("basic_setup/city_corporation_ward_create/list","",true));

            if($this->message)
            {
                $ajax['system_message']=$this->message;
            }
            $ajax['system_page_url']=$this->get_encoded_url('basic_setup/city_corporation_ward_create');
            $ajax['system_page_title']=$this->lang->line("CITY_CORPORATION_WARD_CREATE_TITLE");
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


        if($this->permissions['add'])
        {

            $this->current_action='add';
            $ajax['status']=true;
            $data=array();

            $data['title']=$this->lang->line("CITY_CORPORATION_WARD_CREATE_TITLE");

            $data['UpazilaInfo'] = array
            (
                'id'=>0,
                'upazilaid'=>'',
                'upazilaname'=>'',
                'upazilanameeng'=>'',
                'zillaid'=>'',
                'divid'=>'',
                'visible'=>1,
            );
            //$data['upazilla']=Query_helper::get_info($this->config->item('table_upazilas'),'', array());
            $data['divisions']=Query_helper::get_info($this->config->item('table_divisions'),array('divid value', 'divname text'), array());
            $ajax['system_content'][]=array("id"=>"#system_wrapper_top_menu","html"=>$this->load_view("top_menu","",true));
            $ajax['system_content'][]=array("id"=>"#system_wrapper","html"=>$this->load_view("basic_setup/city_corporation_ward_create/add_edit",$data,true));

            if($this->message)
            {
                $ajax['system_message']=$this->message;
            }

            $ajax['system_page_url']=$this->get_encoded_url('basic_setup/city_corporation_ward_create/index/add');
            $this->jsonReturn($ajax);
        }
        else
        {
            $ajax['system_message']=$this->lang->line("YOU_DONT_HAVE_ACCESS");
            $this->jsonReturn($ajax);
        }
    }

    private function system_edit($id)
    {
        if($this->permissions['edit'])
        {
            $this->current_action='edit';
            $ajax['status']=true;
            $data=array();

            $data['title']=$this->lang->line("CITY_CORPORATION_WARD_CREATE_TITLE");

            $data['city_corporation_ward_info']=Query_helper::get_info($this->config->item('table_city_corporation_wards'),'*',array('rowid ='.$id),1);
            $data['corporations']=Query_helper::get_info($this->config->item('table_city_corporations'),array('citycorporationid value', 'citycorporationname text'), array('zillaid='.$data['city_corporation_ward_info']['zillaid'],'citycorporationid='.$data['city_corporation_ward_info']['citycorporationid']));
            $data['zillas']=Query_helper::get_info($this->config->item('table_zillas'),array('zillaid value', 'zillaname text'), array('zillaid='.$data['city_corporation_ward_info']['zillaid']));

            $ajax['system_content'][]=array("id"=>"#system_wrapper_top_menu","html"=>$this->load_view("top_menu","",true));
            $ajax['system_content'][]=array("id"=>"#system_wrapper","html"=>$this->load_view("basic_setup/city_corporation_ward_create/add_edit",$data,true));
            if($this->message)
            {
                $ajax['system_message']=$this->message;
            }
            $ajax['system_page_url']=$this->get_encoded_url('basic_setup/city_corporation_ward_create/index/edit/'.$id);
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
            $city_corporation_ward_detail = $this->input->post('city_corporation_ward_detail');
            //unset($city_corporation_ward_detail['divid']);

            if($id>0)
            {
                //$city_corporation_ward_detail['update_by']=$user->id;
                //$city_corporation_ward_detail['update_date']=time();

                $this->db->trans_start();  //DB Transaction Handle START

                Query_helper::update($this->config->item('table_city_corporation_wards'),$city_corporation_ward_detail,array("rowid = ".$id));

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
                //$city_corporation_ward_detail['create_by']=$user->id;
                //$city_corporation_ward_detail['create_date']=time();

                //                $this->db->trans_start();  //DB Transaction Handle START
                //
                //                Query_helper::add($this->config->item('table_upazilas'),$city_corporation_ward_detail);
                //
                //                $this->db->trans_complete();   //DB Transaction Handle END
                //
                //                if ($this->db->trans_status() === TRUE)
                //                {
                //                    $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
                //                    $save_and_new=$this->input->post('system_save_new_status');
                //                    if($save_and_new==1)
                //                    {
                //                        $this->system_add();
                //                    }
                //                    else
                //                    {
                //                        $this->system_list();
                //                    }
                //                }
                //                else
                //                {
                //                    $ajax['status']=false;
                //                    $ajax['system_message']=$this->lang->line("MSG_CREATE_FAIL");
                //                    $this->jsonReturn($ajax);
                //                }
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
                Query_helper::update($this->config->item('table_divisions'),array('status'=>99,'update_by'=>$user->id,'update_date'=>time()),array("id = ".$id));
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

        $this->form_validation->set_rules('city_corporation_ward_detail[wardname]',$this->lang->line('CITY_CORPORATION_WARD_NAME_BN'),'required');
        $this->form_validation->set_rules('city_corporation_ward_detail[wardnameeng]',$this->lang->line('CITY_CORPORATION_WARD_NAME_EN'),'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->message=validation_errors();
            return false;
        }
        return true;
    }


    public function get_list()
    {
        $divisions = array();
        if($this->permissions['list'])
        {
            $divisions = $this->city_corporation_ward_create_model->get_record_list();
        }
        $this->jsonReturn($divisions);
    }



}
