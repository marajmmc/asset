<?php
class Website_helper
{
    public static function get_total_uiscs()
    {
        $CI = & get_instance();
        $CI->db->from($CI->config->item('table_uisc_infos').' uisc');
        $CI->db->select('uisc.*');
        $CI->db->where('uisc.status !=',99);
        $result = $CI->db->count_all_results();

        if($result)
        {
            return $result;
        }
        else
        {
            return 0;
        }
    }

    public static function get_total_entrepreneurs_men()
    {
        //        $CI = & get_instance();
        //        $CI->db->from($CI->config->item('table_entrepreneur_infos').' entrepreneur');
        //        $CI->db->select('entrepreneur.*');
        //        $CI->db->where('entrepreneur.status !=',99);
        //        $CI->db->where('entrepreneur.entrepreneur_sex', $CI->config->item('GENDER_MALE'));
        //        $result = $CI->db->count_all_results();
        //
        //        if($result)
        //        {
        //            return $result;
        //        }
        //        else
        //        {
        //            return 0;
        //        }

        $CI = & get_instance();

        $CI->db->from($CI->config->item('table_users').' users');
        $CI->db->join($CI->config->item('table_entrepreneur_infos').' entrepreneur_infos','entrepreneur_infos.user_id = users.id', 'INNER');
        $CI->db->where('users.status', $CI->config->item('STATUS_ACTIVE'));
        $CI->db->where('entrepreneur_infos.entrepreneur_sex', $CI->config->item('GENDER_MALE'));
        $result = $CI->db->count_all_results();

        if($result)
        {
            return $result;
        }
        else
        {
            return 0;
        }
    }

    public static function get_total_entrepreneurs_women()
    {
        //        $CI = & get_instance();
        //        $CI->db->from($CI->config->item('table_entrepreneur_infos').' entrepreneur');
        //        $CI->db->select('entrepreneur.*');
        //        $CI->db->where('entrepreneur.status !=',99);
        //        $CI->db->where('entrepreneur.entrepreneur_sex', $CI->config->item('GENDER_FEMALE'));
        //        $result = $CI->db->count_all_results();
        //
        //        if($result)
        //        {
        //            return $result;
        //        }
        //        else
        //        {
        //            return 0;
        //        }

        $CI = & get_instance();

        $CI->db->from($CI->config->item('table_users').' users');
        $CI->db->join($CI->config->item('table_entrepreneur_infos').' entrepreneur_infos','entrepreneur_infos.user_id = users.id', 'INNER');
        $CI->db->where('users.status', $CI->config->item('STATUS_ACTIVE'));
        $CI->db->where('entrepreneur_infos.entrepreneur_sex', $CI->config->item('GENDER_FEMALE'));
        $result = $CI->db->count_all_results();

        if($result)
        {
            return $result;
        }
        else
        {
            return 0;
        }
    }

    public static function get_total_income_today()
    {
        $CI = & get_instance();
        $time_barrier = strtotime($CI->config->item('time_barrier'));
        $exist_amount=1940000000;

        $CI = & get_instance();
        $CI->db->from($CI->config->item('table_invoices').' invoices');
        $CI->db->select('SUM(invoices.total_income) total_income');
        $CI->db->where('unix_timestamp(invoices.invoice_date)>', $time_barrier);
        $result = $CI->db->get()->row_array();

        if($result['total_income'])
        {
            return $exist_amount+$result['total_income'];
        }
        else
        {
            return $exist_amount;
        }
    }

    public static function get_total_services()
    {
        $CI = & get_instance();
        $CI->db->from($CI->config->item('table_services').' services');
        $CI->db->select('services.*');
        $CI->db->where('services.status', 1);
        $result = $CI->db->count_all_results();

        if($result)
        {
            return $result;
        }
        else
        {
            return 0;
        }
    }

    public static function get_total_all_services()
    {
        $CI = & get_instance();
        $exist_service=206000000;
        $time_barrier = strtotime($CI->config->item('time_barrier'));

        $CI = & get_instance();
        $CI->db->from($CI->config->item('table_invoice_details').' invoice_details');
        $CI->db->select('invoice_details.*');
        $CI->db->where('unix_timestamp(invoices.invoice_date)>', $time_barrier);
        $CI->db->join($CI->config->item('table_invoices').' invoices','invoices.invoice_id = invoice_details.invoice_id', 'INNER');
        $result = $CI->db->count_all_results();

        if($result)
        {
            return $result+$exist_service;
        }
        else
        {
            return $exist_service;
        }
    }

    public static function get_total_investment()
    {
        $CI = & get_instance();
        $CI->db->from($CI->config->item('table_investment').' investment');
        $CI->db->select('SUM(investment.invested_money) total_invest');
        $result = $CI->db->get()->row_array();

        if($result['total_invest'])
        {
            return $result['total_invest'];
        }
        else
        {
            return 0;
        }
    }

    public static function get_all_public_notices()
    {
        $CI = & get_instance();

        $CI->db->select(
            "
            notice.id,
            notice.notice_title,
            notice.notice_details,
            notice.upload_file,
            notice.`status`,
            notice.notice_type,
            notice.create_by,
            notice.create_date,
            notice.update_by,
            notice.update_date,
            core_01_users.name_bn user_name,
            core_02_user_group.name_bn group_name
            ");
        $CI->db->from($CI->config->item('table_notice').' notice');
        $CI->db->join($CI->config->item('table_users').' core_01_users','core_01_users.id = notice.create_by', 'LEFT');
        $CI->db->join($CI->config->item('table_user_group').' core_02_user_group','core_02_user_group.id = core_01_users.user_group_id', 'LEFT');
        $CI->db->where('notice.notice_type', 3);
        $CI->db->limit(5);
        $results = $CI->db->get()->result_array();
        //echo $CI->db->last_query();
        return $results;
    }

    public static function get_service_income_detail($invoice_id)
    {
        $user = User_helper::get_user();
        $CI = & get_instance();
        $CI->db->from($CI->config->item('table_invoice_details').' invoice_details');
        $CI->db->select('invoice_details.*');
        $CI->db->select('services.service_name uisc_service_name');
        $CI->db->where('invoice_details.invoice_id', $invoice_id);

        $CI->db->join($CI->config->item('table_services').' services','services.service_id = invoice_details.service_id', 'LEFT');
        $results = $CI->db->get()->result_array();
        return $results;
    }
}