<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';

class Test_maraj extends CI_Controller
{
    public function index()
    {


        //echo date('Y-m-d g:i', time());
        echo "<br />";

                $month=9; $year=2015;
                $days_in_month = @date('t', @mktime(0, 0, 0, $month, 1, $year));
                $s_date=$year.'-'.$month.'-01';
                $e_date=$year.'-'.$month."-".$days_in_month;
                $start_date = strtotime($s_date);
                $end_date = strtotime($e_date);

                $date = strtotime("+7 day", $start_date);

                //        $first_start_date = date('Y-m-d', $start_date);
                //        $first_end_date = strtotime("+7 day", $start_date);
                //
                //        $second_first_date=strtotime("+8 day", $start_date);
                //        $second_end_date=strtotime("+14 day", $start_date);
                //
                //        $three_first_date=strtotime("+15 day", $start_date);
                //        $three_end_date=strtotime("+21 day", $start_date);
                //
                //        $three_first_date=strtotime("+22 day", $start_date);
                //        $three_end_date=strtotime("+28 day", $start_date);



        for($i=1; $i<8; $i++)
        {
            $date = strtotime(date("Y-m-d"));// current date
            echo date('Y-m-d',strtotime("-$i month", $date))."<br />";

        }
    }

    function date_rang()
    {
        $start_date = date('Y-m-d', strtotime('01-01-2015'));
        $end_date =  date('Y-m-d', strtotime('07-01-2015'));
        $day = 86400; // Day in seconds
        $format = 'Y-m-d'; // Output format (see PHP date funciton)
        $sTime = strtotime($start_date); // Start as time
        $eTime = strtotime($end_date); // End as time
        echo $numDays = round(($eTime - $sTime) / $day) + 1;
        $days = array();
        for ($d = 0; $d < $numDays; $d++)
        {
            $days[] = date($format, ($sTime + ($d * $day)));
        }
        echo "<pre>";
        print_r($days);
        echo "</pre>";
    }


    public function check_service($service_name='সরকারি ফরম')
    {
        $CI =& get_instance();
        $user = User_helper::get_user();
        $CI->db->select
            ('
            services_uisc.service_id,
            services.service_name
        ');
        $CI->db->from($CI->config->item('table_services_uisc').' services_uisc');
        $this->db->join($CI->config->item('table_services').' services','services.service_id = services_uisc.service_id', 'INNER');
        $CI->db->where('services_uisc.user_id', $user->id);
        $CI->db->where('services_uisc.uisc_id', $user->uisc_id);
        $CI->db->where('services.service_name', $service_name);
        $CI->db->where('services_uisc.status', $this->config->item('STATUS_ACTIVE'));
        $CI->db->where(' ( services.status = '. $this->config->item('STATUS_ACTIVE').' OR services.status ='. $this->config->item('STATUS_INACTIVE').' )');
        $result_uisc = $CI->db->get()->row_array();

        if(!empty($result_uisc['service_id']) && !empty($result_uisc['service_name']))
        {
            return array($result_uisc['service_id'], $result_uisc['service_name']);
        }
        else
        {
            return false;
        }
    }

    function show_service()
    {
        list($service_id, $service_name)=$this->check_service();

        echo $service_name;
        //        echo "<pre>";
        //        print_r($this->check_service());
        //        echo "</pre>";
    }

    function send_mail()
    {
        $msg = "First line of text\nSecond line of text";
        $msg = wordwrap($msg,70);
        $user=User_helper::mail_send('marajmmc@gmail.com','maraj@softbdltd.com', '','','user password',$msg);
        echo $user;

        // the message


// use wordwrap() if lines are longer than 70 characters


// send email
        //mail("marajmmc@gmail.com","My subject",$msg);
    }

}
