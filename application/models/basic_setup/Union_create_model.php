<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Union_create_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_record_list()
    {
        $CI =& get_instance();
        $this->db->select
                        ('
                            unions.rowid id,
                            unions.unionname,
                            divisions.divname,
                            zillas.zillaname,
                            upa_zilas.upazilaname,
                            unions.unionid,
                            unions.visible
                        ');
        $this->db->from($CI->config->item('table_unions').' unions');
        $this->db->join($CI->config->item('table_zillas').' zillas','zillas.zillaid = unions.zillaid','LEFT');
        $this->db->join($CI->config->item('table_divisions').' divisions','divisions.divid = zillas.divid','LEFT');
        $this->db->join($CI->config->item('table_upazilas').' upa_zilas','upa_zilas.zillaid = unions.zillaid AND upa_zilas.upazilaid = unions.upazilaid','LEFT');
        $this->db->where('unions.visible',$this->config->item('STATUS_ACTIVE'));
        $this->db->order_by('divisions.divid, zillas.zillaid, upa_zilas.upazilaid, unions.unionid');
        $users = $this->db->get()->result_array();

        foreach($users as &$user)
        {
            $user['edit_link']=$CI->get_encoded_url('basic_setup/union_create/index/edit/'.$user['id']);
            if($user['visible']==1)
            {
                $user['status_text']=$CI->lang->line('ACTIVE');
            }
            else if($user['visible']==0)
            {
                $user['status_text']=$CI->lang->line('INACTIVE');
            }
            else
            {
                $user['status_text']=$user['visible'];
            }
        }
        return $users;
    }


    public function check_existence($value,$id, $field_name)
    {
        $CI =& get_instance();

        $CI->db->from($CI->config->item('table_zillas'));
        $CI->db->where($field_name,$value);
        if($id<1)
        {
            $CI->db->where('divid !=',$id);
        }
        $result = $CI->db->get()->row_array();
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}