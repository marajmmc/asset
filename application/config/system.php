<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//public pages
$config['PUBLIC_CONTROLLERS']=array('home', 'entrepreneur_registration','user_registration', 'common', 'eservice_list', 'help_desk_contact','media_corner_photo','media_corner_video','media_corner_print','media_corner_publication','public_notice');
/////// Pagination Config
$config['page_size']=100;
///// report language folder
$config['GET_LANGUAGE']="bangla";

//upload directories
$config['dcms_upload']['entrepreneur']='images/entrepreneur';
$config['dcms_upload']['excel']='uploads/excel';
$config['dcms_upload']['notice']='images/notice';
$config['dcms_upload']['media_photo']='images/media';
$config['dcms_upload']['media_print']='images/media/print_media';
$config['dcms_upload']['media_publication']='images/media/publication';

$config['SUPER_ADMIN_GROUP_ID'] = 1;
$config['A_TO_I_GROUP_ID'] = 2;
$config['DONOR_GROUP_ID'] = 3;
$config['MINISTRY_GROUP_ID'] = 4;

$config['DIVISION_GROUP_ID'] = 5;
$config['DISTRICT_GROUP_ID'] = 6;
$config['UPAZILLA_GROUP_ID'] = 7;
$config['UNION_GROUP_ID'] = 8;

$config['CITY_CORPORATION_GROUP_ID'] = 9;
$config['CITY_CORPORATION_WORD_GROUP_ID'] = 10;
$config['MUNICIPAL_GROUP_ID'] = 11;
$config['MUNICIPAL_WORD_GROUP_ID'] = 12;
$config['UISC_GROUP_ID'] = 13;

$config['ONLINE_UNION_GROUP_ID'] = 1;
$config['ONLINE_CITY_CORPORATION_WORD_GROUP_ID'] = 2;
$config['ONLINE_MUNICIPAL_WORD_GROUP_ID'] = 3;

//$config['SERVICES_STATUS_INACTIVE']=0;
//$config['SERVICES_STATUS_ACTIVE']=1;
//$config['SERVICES_STATUS_PROPOSED']=2;
//$config['SERVICES_STATUS_REJECT']=3;

//$config['SERVICES_STATUS_INACTIVE']=9;
//$config['SERVICES_STATUS_ACTIVE']=1;
//$config['SERVICES_STATUS_PROPOSED']=0;
//$config['SERVICES_STATUS_REJECT']=2;

$config['STATUS_INACTIVE']=0; // SERVICE PROPOSED
$config['STATUS_ACTIVE']=1; // SERVICE, USER APPROVED
$config['STATUS_REJECT']=2;   // USER DENY
$config['STATUS_SUSPEND']=3;
$config['STATUS_TEMPORARY_SUSPEND']=4;
$config['STATUS_DELETE']=99;

$config['GENDER_MALE']=1;
$config['GENDER_FEMALE']=2;

$config['DATE_DISPLAY_FORMAT'] = 'Y-m-d';

$config['system_sidebar01'] = 'position_left_01';
$config['system_sidebar02'] = 'position_top_01';

$config['system_TYPE'] = 'TYPE';

// SERVICE TYPE
$config['service_type'][1] = 'সরকারি';
$config['service_type'][2] = 'বেসরকারি';
$config['service_type'][3] = 'স্থানীয়';

// Entrepreneur Type
$config['entrepreneur_type'][1] = 'ইউনিয়ন পরিষদ';
$config['entrepreneur_type'][2] = 'সিটি কর্পোরেশন';
$config['entrepreneur_type'][3] = 'পৌরসভা';

// Division
$config['division'][10] = 'বরিশাল';
$config['division'][20] = 'চট্টগ্রাম';
$config['division'][30] = 'ঢাকা';
$config['division'][40] = 'খুলনা';
$config['division'][50] = 'রাজশাহী';
$config['division'][55] = 'রংপুর';
$config['division'][60] = 'সিলেট';

// Modems
$config['modem']['GP'] = 'GP';
$config['modem']['Banglalink'] = 'Banglalink';
$config['modem']['Airtel'] = 'Airtel';
$config['modem']['Banglalion'] = 'Banglalion';
$config['modem']['CityCell'] = 'CityCell';
$config['modem']['Robi'] = 'Robi';
$config['modem']['Teletalk'] = 'Teletalk';
$config['modem']['Qubee'] = 'Qubee';

// Equipment Status
$config['equipment_status'][0] = 'ভাল';
$config['equipment_status'][1] = 'ত্রুটিপূর্ণ';

// Year
$config['approval_year']['2012'] = '2012';
$config['approval_year']['2013'] = '2013';
$config['approval_year']['2014'] = '2014';
$config['approval_year']['2015'] = '2015';
$config['approval_year']['2016'] = '2016';
$config['approval_year']['2017'] = '2017';
$config['approval_year']['2018'] = '2018';

// Month
$config['month']['01'] = 'জানুয়ারি';
$config['month']['02'] = 'ফেব্রুয়ারি';
$config['month']['03'] = 'মার্চ';
$config['month']['04'] = 'এপ্রিল';
$config['month']['05'] = 'মে';
$config['month']['06'] = 'জুন';
$config['month']['07'] = 'জুলাই';
$config['month']['08'] = 'আগস্ট';
$config['month']['09'] = 'সেপ্টেম্বর';
$config['month']['10'] = 'অক্টোবর';
$config['month']['11'] = 'নভেম্বর';
$config['month']['12'] = 'ডিসেম্বর';

//report menu id
$config['report_component_id']=3;

//Entrepreneur training course
$config['training_course'][1] = 'বেসিক কম্পিউটিং';
$config['training_course'][2] = 'এম এস ওয়ার্ড';
$config['training_course'][3] = 'এম এস এক্সেল';
$config['training_course'][4] = 'পাওয়ার পয়েন্ট';
$config['training_course'][5] = 'কম্পিউটার হার্ডওয়্যার';
$config['training_course'][6] = 'ওয়েব ডেভেলপমেন্ট';
$config['training_course'][7] = 'গ্রাফিক্স ডিজাইনিং';
$config['training_course'][8] = 'আউট সোর্সিং';

// Center location Info
$config['center_location_info'][1]='ইউপি ভবন';
$config['center_location_info'][2]='পৌরসভা  ভবন';
$config['center_location_info'][3]='সিটি কর্পোরেশন  ওয়ার্ড ভবন';
$config['center_location_info'][4]='ইউপি ভাড়াকৃত ভবন';
$config['center_location_info'][5]='পৌরসভা ভাড়াকৃত ভবন';
$config['center_location_info'][6]='সিটি কর্পোরেশন ভাড়াকৃত ভবন';
$config['center_location_info'][7]='নিজ ভাড়াকৃত ভবন';

// Latest Academic Info
$config['latest_academic_info'][1]='মাধ্যমিক';
$config['latest_academic_info'][2]='উচ্চ মাধ্যমিক';
$config['latest_academic_info'][3]='ডিপ্লোমা';
$config['latest_academic_info'][4]='স্নাতক';
$config['latest_academic_info'][5]='স্নাতকোত্তর';
$config['latest_academic_info'][6]='অন্যান্য';

// Email Notification
$config['from_mail_address']="uisc.bgd@gmail.com";
$config['cc_mail_address_maraj']="marajmmc@gmail.com";

// Media Type
$config['media_type'][1] = "ছবি";
$config['media_type'][2] = "ভিডিও";
$config['media_type'][3] = "প্রিন্ট মিডিয়া";
$config['media_type'][4] = "পাবলিকেশন্স";

// Notice type
$config['notice_type'][1] = 'সাধারন বিজ্ঞপ্তি';
$config['notice_type'][2] = 'বিশেষ বিজ্ঞপ্তি';
$config['notice_type'][3] = 'ওয়েবসাইটে প্রকাশিত বিজ্ঞপ্তি';

// Time Barrier
$config['time_barrier'] = '2015-11-01';

//////////// User Level ///////////
$config['user_level_min']=2;
$config['user_level_max']=13;
