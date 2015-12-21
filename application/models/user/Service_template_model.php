<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Service_template_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_uisc_services()
    {
        $CI =& get_instance();
        $user = User_helper::get_user();
        $uisc_id = $user->uisc_id;

        $CI->db->from($CI->config->item('table_services_uisc').' uisc_services');
        $CI->db->select('uisc_services.service_id');
        $CI->db->select('services.service_name');
        $CI->db->where('uisc_services.uisc_id', $uisc_id);
        $CI->db->where('uisc_services.status', $CI->config->item('STATUS_ACTIVE'));
        $CI->db->join($CI->config->item('table_services').' services', 'services.service_id = uisc_services.service_id', 'LEFT');
        $results = $CI->db->get()->result_array();

        return $results;
    }

    public function get_service_name($id)
    {
        $CI =& get_instance();

        $CI->db->from($CI->config->item('table_services').' services');
        $CI->db->select('services.service_name');
        $CI->db->where('services.service_id', $id);
        $results = $CI->db->get()->row_array();
        return $results['service_name'];
    }

    public function chk_existing_uploded_excel_file($invoice_date)
    {
        $CI =& get_instance();
        $toDay = strtotime($invoice_date);
        $user = User_helper::get_user();
        $user_id = $user->id;

        $CI->db->from($CI->config->item('table_excel_history').' history');
        $CI->db->select('COUNT(history.id) file_quantity');
        $CI->db->where('history.user_id', $user_id);
        $CI->db->where('history.upload_date', $toDay);
        $results = $CI->db->get()->row_array();
        return $results['file_quantity'];

    }

    public function get_service_id($name)
    {
        $CI =& get_instance();

        $CI->db->from($CI->config->item('table_services').' services');
        $CI->db->select('services.service_id');
        $CI->db->where('services.service_name', $name);
        $results = $CI->db->get()->row_array();
        return $results['service_id'];
    }

    public function check_uisc_service_existence($post_service_name)
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
        $CI->db->where('services.service_name', $post_service_name);
        $CI->db->where('services_uisc.status', $this->config->item('STATUS_ACTIVE'));
        $CI->db->where(' ( services.status = '. $this->config->item('STATUS_ACTIVE').' OR services.status ='. $this->config->item('STATUS_INACTIVE').' )');
        $result_uisc = $CI->db->get()->row_array();

        if(!empty($result_uisc['service_id']) && !empty($result_uisc['service_name']) && !empty($post_service_name))
        {
            return array($result_uisc['service_id'], $result_uisc['service_name']);
        }
        else
        {
            return false;
        }
    }

    public function delete_invoice_data($invoice_date)
    {
        $CI =& get_instance();
        $user = User_helper::get_user();

        $invoice_sql="DELETE invoices FROM ".$this->config->item('table_invoices')." WHERE invoices.invoice_date='".$invoice_date."' AND invoices.uisc_id='".$user->uisc_id."' ";

        $invoice_details_sql="
        DELETE invoice_details FROM
        ".$this->config->item('table_invoice_details')."
        LEFT JOIN ".$this->config->item('table_invoices')." AS invoices ON invoices.invoice_id=invoice_details.invoice_id
        WHERE invoices.invoice_date='".$invoice_date."' AND invoices.uisc_id='".$user->uisc_id."'";

        $user_zilla = $user->zilla;
        $zilla_table_invoice = str_pad($user_zilla, 2, "0", STR_PAD_LEFT).'_invoices';
        $zilla_table_invoice_details = str_pad($user_zilla, 2, "0", STR_PAD_LEFT).'_invoice_details';

        $zilla_invoice_sql="DELETE FROM $zilla_table_invoice WHERE $zilla_table_invoice".".invoice_date='".$invoice_date."' AND $zilla_table_invoice".".uisc_id='".$user->uisc_id."' ";

        $zilla_invoice_details_sql="
        DELETE $zilla_table_invoice_details FROM
        $zilla_table_invoice_details
        LEFT JOIN $zilla_table_invoice AS invoices ON invoices.invoice_id=$zilla_table_invoice_details".".invoice_id
        WHERE invoices.invoice_date='".$invoice_date."' AND invoices.uisc_id='".$user->uisc_id."'";

        $CI->db->trans_start();

        $CI->db->query($invoice_sql);
        $CI->db->query($invoice_details_sql);
        $CI->db->query($zilla_invoice_sql);
        $CI->db->query($zilla_invoice_details_sql);

        $CI->db->trans_complete();   //DB Transaction Handle END

        if($CI->db->trans_status() === TRUE)
        {
            return true;
        }
        else
        {
            return false;
        }
    }



}