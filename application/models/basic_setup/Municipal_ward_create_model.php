<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Municipal_ward_create_model extends CI_Model
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
                            municipal_wards.wardid id,
                            municipal_wards.wardname,
                            municipal_wards.wardnameeng,
                            municipal_wards.visible,
                            municipals.municipalid,
                            municipals.municipalname,
                            municipals.municipaleng,
                            zillas.zillaname,
                            divisions.divname
                        ');
        $this->db->from($CI->config->item('table_municipal_wards').' municipal_wards');
        $this->db->join($CI->config->item('table_municipals').' municipals','municipals.zillaid=municipal_wards.zillaid AND municipals.municipalid=municipal_wards.municipalid ','LEFT');
        $this->db->join($CI->config->item('table_zillas').' zillas','zillas.zillaid = municipals.zillaid','LEFT');
        $this->db->join($CI->config->item('table_divisions').' divisions','divisions.divid = zillas.divid','LEFT');
        //$this->db->where('city_corporations.visible',$this->config->item('STATUS_ACTIVE'));
        $this->db->order_by('divisions.divid, zillas.zillaid, municipals.municipalid, municipal_wards.wardid');
        $users = $this->db->get()->result_array();
        //echo $this->db->last_query();
        foreach($users as &$user)
        {
            $user['edit_link']=$CI->get_encoded_url('basic_setup/municipal_ward_create/index/edit/'.$user['id']);
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