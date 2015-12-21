<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Root_Controller
{
    public function index()
    {
        $ajax['status']=true;
        $ajax['system_content'][]=array("id"=>"#top_header","html"=>$this->load_view("header","",true));
        $ajax['system_content'][]=array("id"=>"#system_wrapper","html"=>$this->load_view("website","",true));
        $ajax['system_content'][]=array("id"=>"#system_wrapper_top_menu","html"=>$this->load_view("top_menu","",true));
        $ajax['system_content'][]=array("id"=>"#system_wrapper_footer","html"=>$this->load_view("footer","",true));

        $ajax['system_page_url']=base_url();
        $ajax['system_page_title']=$this->lang->line("WEBSITE_TITLE");
        $this->jsonReturn($ajax);
    }

    public function dashboard()
    {
        $user=User_helper::get_user();
        if($user)
        {
            $this->dashboard_page();
        }
        else
        {
            $this->login_page();
        }
    }

    public function login()
    {
        $user=User_helper::get_user();
        if($user)
        {
            $this->dashboard_page();
        }
        else
        {
            if($this->input->post())
            {
                if(User_helper::login($this->input->post("username"),$this->input->post("password")))
                {
                    $user=User_helper::get_user();
                    $user_info['user_id']=$user->id;
                    $user_info['login_time']=time();
                    $user_info['ip_address']=$this->input->ip_address();
                    $user_info['request_headers']=json_encode($this->input->request_headers());
                    Query_helper::add($this->config->item('table_user_login_history'),$user_info);
                    $this->dashboard_page($this->lang->line("MSG_LOGIN_SUCCESS"));
                }
                else
                {
                    $ajax['status']=false;
                    $ajax['system_message']=$this->lang->line("MSG_USERNAME_PASSWORD_INVALID");
                    $this->jsonReturn($ajax);
                }
            }
            else
            {
                $this->login_page();//login page view
            }

        }

    }
    public function logout()
    {
        $this->session->sess_destroy();
        //$this->login_page($this->lang->line("MSG_LOGOUT_SUCCESS"));
        //$this->logout_page();//logout
        //$this->website();
        //$this->footer_reload();
        redirect(base_url());
    }

//    public function footer_reload()
//    {
//        $ajax['status']=true;
//        $ajax['system_content'][]=array("id"=>"#system_wrapper_footer","html"=>$this->load_view("footer","",true));
//        $this->jsonReturn($ajax);
//    }

    public function forget_password()
    {
        $ajax['status']=true;

        $ajax['system_content'][]=array("id"=>"#system_wrapper","html"=>$this->load_view("forget_password","",true));
        $ajax['system_content'][]=array("id"=>"#system_wrapper_top_menu","html"=>$this->load_view("top_menu","",true));
        $ajax['system_page_url']=$this->get_encoded_url('home/forget_password');
        //$ajax['system_page_url']=base_url();
        $ajax['system_page_title']=$this->lang->line("FORGET_PASSWORD_TITLE");
        $this->jsonReturn($ajax);
    }
    public function forget_password_send_email()
    {
        $ajax['status']=true;
        $ajax['system_content'][]=array("id"=>"#system_wrapper","html"=>$this->load_view("forget_password","",true));
        $ajax['system_content'][]=array("id"=>"#system_wrapper_top_menu","html"=>$this->load_view("top_menu","",true));
        $ajax['system_page_url']=$this->get_encoded_url('home/forget_password');
        $ajax['system_page_title']=$this->lang->line("FORGET_PASSWORD_TITLE");
        $this->jsonReturn($ajax);
    }
    public function user_profile_list()
    {

    }
}
