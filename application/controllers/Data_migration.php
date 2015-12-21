<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';

class Data_migration extends CI_Controller
{
    public function uisc_info()
    {
        $this->db->from('uisc_infos');
        //$this->db->limit(5,0);
        $result= $this->db->get()->result_array();
        $array=array();

        $this->db->trans_start();

        for($i=0; $i<sizeof($result); $i++)
        {
            $created=strtotime($result[$i]['date']);

            if($result[$i]['status']=='pending')
            {
                $status=0; // DCMS SYSTEM ACTIVE STATUS VALUE
            }
            elseif($result[$i]['status']=='approved')
            {
                $status=1; // DCMS SYSTEM DELETE STATUS VALUE
            }
            elseif($result[$i]['status']=='disapproved')
            {
                $status=2; // DCMS SYSTEM REJECT STATUS VALUE
            }
            else
            {
                $status=''; // DCMS SYSTEM PROPOSED STATUS VALUE
            }

            if($result[$i]['type']==0)
            {
                $group_id=13;
                $uisc_type=1;
            }
            elseif($result[$i]['type']==1)
            {
                $group_id=13;
                $uisc_type=2;
            }
            elseif($result[$i]['type']==2)
            {
                $group_id=13;
                $uisc_type=3;
            }
            else
            {
                $group_id='';
                $uisc_type='';
            }

            $users['id']=$result[$i]['uisc_id'];
            $users['uisc_type']=$uisc_type;
            $users['user_group_id']=$group_id;
            $users['uisc_name']=$result[$i]['uisc_name'];
            $users['division']=$result[$i]['division'];
            $users['zilla']=$result[$i]['zilla'];
            $users['upazilla']=$result[$i]['upazila'];
            $users['union']=$result[$i]['unioun'];
            $users['citycorporation']=$result[$i]['citycorporation'];
            $users['citycorporationward']=$result[$i]['citycorporationward'];
            $users['municipal']=$result[$i]['municipal'];
            $users['municipalward']=$result[$i]['municipalward'];
            $users['uisc_email']=$result[$i]['uisc_email'];
            $users['uisc_mobile']=$result[$i]['uisc_mobile_no'];
            $users['uisc_address']=$result[$i]['uisc_address'];
            $users['ques_id']=$result[$i]['ques_id'];
            $users['ques_ans']=$result[$i]['ques_ans'];
            $users['image']=$result[$i]['image'];
            $users['status']=$status;
            $users['create_date']=$created;

            $this->db->insert('uisc_infos_new', $users);
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE)
        {
            echo "data transfer complete";
        }
    }

    public function user_info()
    {
        $this->db->select('
            users.id,
            users.username,
            users.`password`,
            users.group_id,
            users.uisc_id,
            users.ques_id,
            users.ques_ans,
            users.division,
            users.zilla,
            users.upazila,
            users.unioun,
            users.citycorporation,
            users.citycorporationward,
            users.municipal,
            users.municipalward,
            users.address_type,
            users.created,
            users.modified,
            users.createdby,
            users.`status`,
            users.login_status,
            users.ques_status,
            users.password_change_status,
            users.uisc_email,
            users.uisc_mobile_no,
            users.uisc_address,
            users.del_status,
            users.image,
            users.myname,
            entrepreneur_infos.entrepreneur_name,
            entrepreneur_infos.entrepreneur_sex
        ');
        $this->db->from('users');
        $this->db->join('entrepreneur_infos','entrepreneur_infos.uisc_id = users.username', 'LEFT');
        //$this->db->where('users.group_id',2);
        //$this->db->limit(500,0);
        $result= $this->db->get()->result_array();
        $array=array();

        $this->db->trans_start();

        //        $users['username']='superadmin';
        //        $users['password']=md5(md5('123'));
        //        $users['user_group_id']=1;
        //        $users['uisc_id']='';
        //        $users['ques_id']='';
        //        $users['ques_ans']='';
        //        $users['division']='';
        //        $users['zilla']='';
        //        $users['upazila']='';
        //        $users['unioun']='';
        //        $users['citycorporation']='';
        //        $users['citycorporationward']='';
        //        $users['municipal']='';
        //        $users['municipalward']='';
        //        $users['uisc_type']='';
        //        $users['create_date']='';
        //        $users['update_date']='';
        //        $users['create_by']='';//$result[$i]['createdby'];
        //        $users['status']=1;
        //        $users['first_login']='';
        //        $users['email']='maraj@softbdltd.com';
        //        $users['mobile']='01946190311';
        //        $users['present_address']='Soft BD Ltd';
        //        $users['picture_name']='';
        //        $users['name_bn']="Md. Maraj Hossain";
        //        $users['name_en']='Md. Maraj Hossain';

        for($i=0; $i<sizeof($result); $i++)
        {
            $created=strtotime($result[$i]['created']);
            $modified=strtotime($result[$i]['modified']);

            //            if(($result[$i]['status']==1 && $result[$i]['del_status']==0))
            //            {
            //                $status=1; // DCMS SYSTEM ACTIVE STATUS VALUE
            //            }
            //            elseif(($result[$i]['status']==0 && $result[$i]['del_status']==2) || ($result[$i]['status']==1 && $result[$i]['del_status']==1))
            //            {
            //                $status=99; // DCMS SYSTEM DELETE STATUS VALUE
            //            }
            //            elseif($result[$i]['group_id']==2 &&  (($result[$i]['status']==0 && $result[$i]['del_status']==2) || ($result[$i]['status']==1 && $result[$i]['del_status']==1)))
            //            {
            //                $status=2; // DCMS SYSTEM REJECT STATUS VALUE
            //            }
            //            else
            //            {
            //                $status=0; // DCMS SYSTEM PROPOSED STATUS VALUE
            //            }

            if($result[$i]['group_id']==2 && $result[$i]['address_type']==0)
            {
                $group_id=13;
                $uisc_type=1;
            }
            elseif($result[$i]['group_id']==2 && $result[$i]['address_type']==1)
            {
                $group_id=13;
                $uisc_type=2;
            }
            elseif($result[$i]['group_id']==2 && $result[$i]['address_type']==2)
            {
                $group_id=13;
                $uisc_type=3;
            }
            elseif($result[$i]['group_id']==3)
            {
                $group_id=1;
                $uisc_type='';
            }
            elseif($result[$i]['group_id']==1 && $result[$i]['address_type']==1)
            {
                $group_id=5;
                $uisc_type='';
            }
            elseif($result[$i]['group_id']==1 && $result[$i]['address_type']==2)
            {
                $group_id=6;
                $uisc_type='';
            }
            elseif($result[$i]['group_id']==1 && $result[$i]['address_type']==3)
            {
                $group_id=7;
                $uisc_type='';
            }
            elseif($result[$i]['group_id']==1 && $result[$i]['address_type']==4)
            {
                $group_id=6;
                $uisc_type='';
            }
            elseif($result[$i]['group_id']==1 && $result[$i]['address_type']==5)
            {
                $group_id=9;
                $uisc_type='';
            }
            else
            {
                $group_id='';
                $uisc_type='';
            }
            if($result[$i]['entrepreneur_sex']==0)
            {
                $gender=1;
            }
            elseif($result[$i]['entrepreneur_sex']==1)
            {
                $gender=2;
            }
            else
            {
                $gender='';
            }
            $users['username']=$result[$i]['username'];
            $users['password']=md5($result[$i]['password']);
            $users['user_group_id']=$group_id;
            $users['uisc_id']=$result[$i]['uisc_id'];
            $users['ques_id']=$result[$i]['ques_id'];
            $users['ques_ans']=$result[$i]['ques_ans'];
            $users['division']=$result[$i]['division'];
            $users['zilla']=$result[$i]['zilla'];
            $users['upazila']=$result[$i]['upazila'];
            $users['unioun']=$result[$i]['unioun'];
            $users['citycorporation']=$result[$i]['citycorporation'];
            $users['citycorporationward']=$result[$i]['citycorporationward'];
            $users['municipal']=$result[$i]['municipal'];
            $users['municipalward']=$result[$i]['municipalward'];
            $users['uisc_type']=$uisc_type;
            $users['create_date']=$created;
            $users['update_date']=$modified;
            $users['create_by']='';//$result[$i]['createdby'];
            $users['gender']=$gender;
            $users['status']=$result[$i]['status'];
            $users['first_login']=$result[$i]['login_status'];
            $users['email']=$result[$i]['uisc_email'];
            $users['mobile']=$result[$i]['uisc_mobile_no'];
            $users['present_address']=$result[$i]['uisc_address'];
            $users['picture_name']=$result[$i]['image'];
            $users['name_bn']=$result[$i]['myname'];
            $users['name_en']=$result[$i]['myname'];

            $this->db->insert('core_01_users', $users);
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE)
        {
            echo "data transfer complete";
        }
    }



    public function entrepreneur_info()
    {
        $this->db->select
        ('
            entrepreneur_infos.entrepreneur_id,
            users.id user_id,
            users.uisc_id dcms_id,
            entrepreneur_infos.entrepreneur_type,
            entrepreneur_infos.entrepreneur_name,
            entrepreneur_infos.entrepreneur_father_name,
            entrepreneur_infos.entrepreneur_qualification,
            entrepreneur_infos.entrepreneur_mobile,
            entrepreneur_infos.entrepreneur_email,
            entrepreneur_infos.entrepreneur_sex,
            entrepreneur_infos.entrepreneur_address
        ');
        $this->db->from('entrepreneur_infos');
        $this->db->join('core_01_users users','users.username = entrepreneur_infos.uisc_id', 'INNER');
        //$this->db->limit(5,0);
        $result= $this->db->get()->result_array();

        $this->db->trans_start();

        for($i=0; $i<sizeof($result); $i++)
        {
            $created=time();
            $status=1;
            if($result[$i]['entrepreneur_type']==0)
            {
                $entrepreneur_type=1;
            }
            elseif($result[$i]['entrepreneur_type']==1)
            {
                $entrepreneur_type=2;
            }
            elseif($result[$i]['entrepreneur_type']==2)
            {
                $entrepreneur_type=3;
            }
            else
            {
                $entrepreneur_type='';
            }

            if($result[$i]['entrepreneur_sex']==0)
            {
                $entrepreneur_sex=1;
            }
            elseif($result[$i]['entrepreneur_sex']==1)
            {
                $entrepreneur_sex=2;
            }
            else
            {
                $entrepreneur_sex='';
            }

            $users['uisc_id']=$result[$i]['dcms_id'];
            $users['user_id']=$result[$i]['user_id'];
            $users['entrepreneur_type']=$entrepreneur_type;
            $users['entrepreneur_name']=$result[$i]['entrepreneur_name'];
            $users['entrepreneur_father_name']=$result[$i]['entrepreneur_father_name'];
            $users['entrepreneur_qualification']=$result[$i]['entrepreneur_qualification'];
            $users['entrepreneur_mobile']=$result[$i]['entrepreneur_mobile'];
            $users['entrepreneur_email']=$result[$i]['entrepreneur_email'];
            $users['entrepreneur_sex']=$entrepreneur_sex;
            $users['entrepreneur_address']=$result[$i]['entrepreneur_address'];
            $users['status']=$status;
            $users['create_date']=$created;

            $this->db->insert('entrepreneur_infos_new', $users);
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE)
        {
            echo "data transfer complete";
        }
    }

    public function resources_info()
    {
        $this->db->select
        ('
            uisc_resources.id,
            uisc_resources.res_id,
            uisc_resources.res_detail,
            uisc_resources.quantity,
            uisc_resources.`status`,
            users.uisc_id dcms_id,
            users.id user_id
        ');
        $this->db->from('uisc_resources');
        $this->db->join('core_01_users users','users.username = uisc_resources.uisc_id', 'INNER');
        //$this->db->limit(5,0);
        $result= $this->db->get()->result_array();

        $this->db->trans_start();

        for($i=0; $i<sizeof($result); $i++)
        {
            $created=time();
            $status=1;
            if($result[$i]['status']==0)
            {
                $status=1;
            }
            elseif($result[$i]['status']==1)
            {
                $status=0;
            }
            else
            {
                $status='';
            }

            $users['uisc_id']=$result[$i]['dcms_id'];
            $users['user_id']=$result[$i]['user_id'];
            $users['res_id']=$result[$i]['res_id'];
            $users['res_detail']=$result[$i]['res_detail'];
            $users['quantity']=$result[$i]['quantity'];
            $users['status']=$status;
            $users['create_date']=$created;

            $this->db->insert('uisc_resources_new', $users);
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE)
        {
            echo "data transfer complete";
        }
    }

    public function secretary_info()
    {
        $this->db->select
        ('
            secretary_infos.secretary_id,
            secretary_infos.uisc_id,
            secretary_infos.secretary_name,
            secretary_infos.secretary_mobile,
            secretary_infos.secretary_email,
            secretary_infos.secretary_address,
            users.id user_id,
            users.uisc_id dcms_id
        ');
        $this->db->from('secretary_infos');
        $this->db->join('core_01_users users','users.username = secretary_infos.uisc_id', 'INNER');
        //$this->db->limit(5,0);
        $result= $this->db->get()->result_array();

        $this->db->trans_start();

        for($i=0; $i<sizeof($result); $i++)
        {
            $created=time();
            $status=1;

            $users['uisc_id']=$result[$i]['dcms_id'];
            $users['user_id']=$result[$i]['user_id'];
            $users['secretary_name']=$result[$i]['secretary_name'];
            $users['secretary_email']=$result[$i]['secretary_email'];
            $users['secretary_mobile']=$result[$i]['secretary_mobile'];
            $users['secretary_address']=$result[$i]['secretary_address'];
            $users['status']=$status;
            $users['create_date']=$created;

            $this->db->insert('secretary_infos_new', $users);
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE)
        {
            echo "data transfer complete";
        }
    }

    public function device_info()
    {
        $this->db->select
        ('
            device_infos.modem,
            device_infos.connection_type,
            device_infos.ip_address,
            users.id user_id,
            users.uisc_id dcms_id
        ');
        $this->db->from('device_infos');
        $this->db->join('core_01_users users','users.username = device_infos.uisc_id', 'INNER');
        //$this->db->limit(5,0);
        $result= $this->db->get()->result_array();

        $this->db->trans_start();

        for($i=0; $i<sizeof($result); $i++)
        {
            $created=time();
            $status=1;

            $users['uisc_id']=$result[$i]['dcms_id'];
            $users['user_id']=$result[$i]['user_id'];
            $users['modem']=$result[$i]['modem'];
            $users['connection_type']=$result[$i]['connection_type'];
            $users['ip_address']=$result[$i]['ip_address'];
            $users['status']=$status;
            $users['create_date']=$created;

            $this->db->insert('device_infos_new', $users);
        }
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE)
        {
            echo "data transfer complete";
        }
    }





}
