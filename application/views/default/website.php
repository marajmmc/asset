<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$CI =& get_instance();

?>
<style>
    body {
        background: #e9e9e9;
        font-family: 'Roboto', sans-serif;
        text-align: center;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

	.right_top_box{
		font-family:nikoshBAN;
		font-size:18px;
		color:#303;
		width:135px;
		float:right;
	}
	.margin-left-top{
		margin-left:10px;
		margin-top:4px;
	}
	.li-tab{
		margin-bottom:10px !important;
		box-shadow:1px 1px #CCFFCC ;
	}

	.link_cls{
		margin-bottom:5px;
		border-bottom:#CCC 1px solid;
		font-family:nikoshBAN;
		font-size:18px;
		padding:5px;
	}
	.link_cls a:hover{
		color:#036;
	}

</style>
<script type="text/javascript">
		jQuery(function(){

			jQuery('#camera_wrap_1').camera({
				height: '330px',
				thumbnails: true
			});
		});
</script>
    <!-- start slider -->
<div id="system_content" class="dashboard-wrapper col-lg-12">
    <div class="col-lg-9">
        <div class="row-fluid">
        <div style="width:100%; margin-bottom:15px; height:300px !important;">

            <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
                <div data-thumb="<?php echo base_url() ?>/images/slideshow/t1.png" data-src="<?php echo base_url() ?>/images/slideshow/1.png">
                    <div class="camera_caption fadeFromBottom">
                        উদ্যোক্তা সম্মেলনে বক্তব্য রাখছেন মাননীয় প্রধানমন্ত্রী <em>১১ই নভেম্বর, ২০১৪ - জাতীয় প্যারেড স্কোয়ার</em>
                    </div>
                </div>
                <div data-thumb="<?php echo base_url() ?>/images/slideshow/t2.png" data-src="<?php echo base_url() ?>/images/slideshow/2.png">
                    <div class="camera_caption fadeFromBottom">
                        নারী উদ্যোক্তা কর্তৃক সেবা প্রদান <em>ফুলতলা ডিজিটাল সেন্টার, গাজীপুর </em>
                    </div>
                </div>
                <div data-thumb="<?php echo base_url() ?>/images/slideshow/t3.png" data-src="<?php echo base_url() ?>/images/slideshow/3.png">
                    <div class="camera_caption fadeFromBottom">
                        ডিজিটাল পাসপোর্ট গ্রহনের ফর্ম এখন পাওয়া যাচ্ছে সকল ডিজিটাল সেন্টারে
                    </div>
                </div>
                <div data-thumb="<?php echo base_url() ?>/images/slideshow/t4.png" data-src="<?php echo base_url() ?>/images/slideshow/4.png">
                    <div class="camera_caption fadeFromBottom">
                        বিদেশে গমন ইচ্ছুক নারী কর্মীদের ফর্ম পূরন চলছে
                    </div>
                </div>
        	</div>
        </div>
		</div>

        <div class="row-fluid">
            <div class="span-9">
                <div class="widget">
                    <h5 style="color: #cd0a0a; padding: 5px;">
                        ডিজিটাল সেন্টার ম্যানেজমেন্ট সিস্টেমের ডাটা মাইগ্রেশনের কাজ চলমান রয়েছে। উদ্যোক্তাদের সিস্টেম থেকে রিপোর্ট আপলোড টেমপ্লেট ডাউনলোড করে/সিস্টেম থেকে বিগত তারিখসহ বর্তমান রিপোর্ট আপলোড করার অনুরোধ জানাচ্ছি। রিপোর্ট আপলোড সংক্রান্ত সহযোগিতার জন্য হেল্পডেস্কে যোগাযোগের অনুরোধ করছি।
                    </h5>
                    <div class="widget-header" style="padding-top:10px; padding-bottom:35px;">
                        <div class="title" style="font-family:nikoshBAN !important; font-size:19px !important;">
                            <marquee width="100%">
                                <?php
                                $notices = Website_helper::get_all_public_notices();
                                if(is_array($notices) && sizeof($notices)>0)
                                {
                                    foreach($notices as $notice)
                                    {
                                    ?>
                                        <a style="color: white;" href="<?php echo $CI->get_encoded_url('notice_management/public_notice/'); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $notice['notice_title'];?></a>
                                    <?php
                                    }
                                }
                                else
                                {
                                    echo $CI->lang->line('NO_PUBLIC_NOTICE');
                                }
                                ?>
                            </marquee>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="row-fluid">
                            <div class="metro-nav">
                                <div id="top_service_yesterday" class="metro-nav-block nav-block-dark-green double" style="width:32% !important;">
                                    <a  class="click external" id="1" href="javascript:void(0);" style=" margin-top:-20px; margin-left: -15px;text-align:center;">
                                        <div class="brand" style="width:100% !important;text-align:center !important;"><?php echo $this->lang->line('YESTERDAY_TOP_SERVICE_PROVIDER');?></div>
                                    </a>
                                </div>
                                <div id="top_income_yesterday" class="metro-nav-block nav-block-dark-green double" style="width:32% !important;">
                                    <a class="click2 external" id="1" href="javascript:void(0);" style=" margin-top:-20px; margin-left: -4px;text-align:center;">
                                        <div class="brand" style="width:100% !important;text-align:center !important;"><?php echo $this->lang->line('YESTERDAY_TOP_INCOME_PROVIDER');?></div>
                                    </a>
                                </div>

                                <div id="top_service_lastsevendays" class="metro-nav-block nav-block-dark-green double" style="width:33% !important">
                                    <a class="click external" id="2" href="javascript:void(0);" style=" margin-top:-20px; margin-left: -15px; text-align:center;">
                                        <div class="brand" style="width:100% !important;text-align:center !important;"><?php echo $this->lang->line('LAST_SEVEN_DAYS_TOP_SERVICE_PROVIDER');?></div>
                                    </a>
                                </div>
                                <div id="top_income_lastsevendays" class="metro-nav-block nav-block-dark-green double" style="width:32% !important;">
                                    <a class="click2 external" id="2" href="javascript:void(0);" style=" margin-top:-20px; margin-left: -4px;text-align:center;">
                                        <div class="brand" style="width:100% !important;text-align:center !important;"><?php echo $this->lang->line('LAST_SEVEN_DAYS_TOP_INCOME');?></div>
                                    </a>
                                </div>

                                <div id="top_service_lastmonth" class="metro-nav-block nav-block-dark-green double" style="width:32% !important;">
                                    <a class="click external" id="3" href="javascript:void(0);" style=" margin-top:-20px; margin-left: -4px; text-align:center;">
                                        <div class="brand" style="width:100% !important;text-align:center !important;"><?php echo $this->lang->line('LAST_MONTH_TOP_SERVICE_PROVIDER');?></div>
                                    </a>
                                </div>
                                <div id="top_income_lastmonth" class="metro-nav-block nav-block-dark-green double" style="width:32% !important;">
                                    <a class="click2 external" id="3" href="javascript:void(0);" style=" margin-top:-20px; margin-left: -4px;text-align:center;">
                                        <div class="brand" style="width:100% !important;text-align:center !important;"><?php echo $this->lang->line('LAST_MONTH_TOP_INCOME');?></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="wrapper">
        <ul class="stats">
            <li class="li-tab">
                <div style="font-family:nikoshBan;" class="left margin-left-top">
                    <h4 style="font-family:nikoshBan;color:#900;">৫২৭৫ <?php //echo Website_helper::get_total_uiscs(); ?>&nbsp;টি</h4>
                    <p><?php echo $this->lang->line('SERVICE_CENTER');?></p>
                </div>
                <div class="chart" style=" float:right; margin-top:0px;">
                    <span class="right_top_box" style="color:#900;"><?php echo $this->lang->line('ALL_UDC_PDC_CDC');?></span>
                </div>
            </li>
            <li class="li-tab">
                <div  style="font-family:nikoshBan;" class="left margin-left-top">
                    <h4 style="font-family:nikoshBan;;color:#0DAED3;"><?php echo System_helper::Get_Eng_to_Bng(Website_helper::get_total_services()); ?>&nbsp;টি</h4>
                    <p><?php echo $this->lang->line('SERVICES_TYPE');?></p>
                </div>
                <div class="chart" style=" float:right; margin-top:0px;">
                    <span class="right_top_box" style="color:#8E52A0; font-family:nikoshBan;">
                        <?php echo System_helper::Get_Eng_to_Bng(Website_helper::get_total_all_services());?>&nbsp;টি
                        <br />
                        <?php echo $this->lang->line('TOTAL_SERVICES');?>
                    </span>
                </div>
            </li>
            <li class="li-tab">
                <div style="font-family:nikoshBan;" class="left margin-left-top">
                    <h4 style="font-family:nikoshBan;color:#8E52A0;">৳  <?php echo System_helper::Get_Eng_to_Bng(number_format(Website_helper::get_total_income_today())); ?></h4>
                    <p style="color:#8E52A0"><?php echo $this->lang->line('TAKA');?></p>
                </div>
                <div class="chart" style=" float:right; margin-top:0px;">
                    <span class="right_top_box" style="color:#8E52A0">প্রাপ্ত প্রতিবেদনের ভিত্তিতে</span>
                </div>
            </li>
            <li class="li-tab">
                <div class="left margin-left-top">
                    <h4 style="font-family:nikoshBan;color:#FFB400;"> <?php echo System_helper::Get_Eng_to_Bng(Website_helper::get_total_entrepreneurs_men()); ?>&nbsp;জন</h4>
                    <p><?php echo $this->lang->line('ENTREPRENEUR');?></p>
                </div>
                <div class="chart" style=" float:right; margin-top:0px;">
                    <span class="right_top_box" style="color:#FFB400"><?php echo $this->lang->line('NUMBER_OF_ENTREPRENEUR_MEN');?></span>
                </div>
            </li>
            <li class="li-tab">
                <div style="font-family:nikoshBan;" class="left margin-left-top">
                    <h4 style="font-family:nikoshBan;color:#090;"><?php echo System_helper::Get_Eng_to_Bng(Website_helper::get_total_entrepreneurs_women()); ?>&nbsp;জন</h4>
                    <p style="color:#090;"><?php echo $this->lang->line('ENTREPRENEUR');?></p>
                </div>
                <div class="chart" style=" float:right; margin-top:0px;">
                    <span class="right_top_box" style="color:#090"><?php echo $this->lang->line('NUMBER_OF_ENTREPRENEUR_WOMEN');?></span>
                </div>
            </li>
        </ul>
    </div>

    <hr class="hr-stylish-1">
        <div class="wrapper">
            <div id="scrollbar-two">
                <div class="scrollbar">
                    <div class="track">
                        <div class="thumb">
                            <div class="end">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="viewport">
                    <div class="overview">
                        <div class="featured-articles-container">
                            <h5 class="heading-blue">
                                গুরুত্বপূর্ণ লিঙ্ক
                            </h5>

                            <li class="link_cls">
                            	<a class="external" href="http://www.infokosh.gov.bd/" target="_blank">
                                <table width="100%">
                                	<tr>
                                    	<td width="20%">
                                            <img src="<?php echo base_url() ?>/images/link/if-logo.png" width="36" height="36"/>
                                		</td>
                                        <td width="80%" align="left">
                            	            <span>জাতীয় ই-তথ্য কোষ</span>
                                		</td>
                                	</tr>
                                </table>
                                </a>
                            </li>

                            <li class="link_cls">
                            <a class="external" href="http://forms.portal.gov.bd/" target="_blank">
                            <table width="100%">
                                	<tr>
                                    	<td width="20%">
                            	            <img src="<?php echo base_url() ?>/images/link/form_logo.png" width="36" height="36"/>
                                		</td>
                                        <td width="80%" align="left">
                                            <span>বাংলাদেশ ফরম</span>
                                		</td>
                                	</tr>
                                </table>
                                </a>
                            </li>

                            <li class="link_cls">
                            	<a class="external" href="http://services.portal.gov.bd/" target="_blank">
                                <table width="100%">
                                	<tr>
                                    	<td width="20%">
                                            <img src="<?php echo base_url() ?>/images/link/service_logo.png" width="36" height="36"/>
                                		</td>
                                        <td width="80%" align="left">
                            	            <span>সেবাকুঞ্জ</span>
                                        </td>
                                    </tr>
                                </table>
                                </a>
                            </li>

                            <li class="link_cls">
                            	<a class="external" href="http://www.passport.gov.bd/" target="_blank">
                                <table width="100%">
                                	<tr>
                                    	<td width="20%">
                                            <img src="<?php echo base_url() ?>/images/link/passport.jpg" width="26" height="30"/>
                                		</td>
                                        <td width="80%" align="left">
                            	            <span>পাসপোর্ট আবেদন</span>
                                        </td>
                                    </tr>
                                </table>
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- TOTAL CONTENT -->
</div>

<!-- TOTAL CONTENT -->
</div>


<script type="text/javascript">

    $(document).ready(function()
    {
        /////// YESTER DAY
        $(document).on("click","#top_service_yesterday",function()
        {
            window.open("<?php echo $CI->get_encoded_url('website/home/get_top_service_yesterday'); ?>","popupWindow", "directories=no,toolbar=no,scrollbars=yes ,location=0,statusbar=0 ,menubar=yes,resizable=1,width="+screen.width +",height=600,left = 20,top = 50");
        });
        $(document).on("click","#top_income_yesterday",function()
        {
            window.open("<?php echo $CI->get_encoded_url('website/home/get_top_income_yesterday'); ?>","popupWindow", "directories=no,toolbar=no,scrollbars=yes ,location=0,statusbar=0 ,menubar=yes,resizable=1,width="+screen.width +",height=600,left = 20,top = 50");
        });
        /////// LAST SEVEN DAY
        $(document).on("click","#top_service_lastsevendays",function()
        {
            window.open("<?php echo $CI->get_encoded_url('website/home/get_top_service_last_seven_days'); ?>","popupWindow", "directories=no,toolbar=no,scrollbars=yes ,location=0,statusbar=0 ,menubar=yes,resizable=1,width="+screen.width +",height=600,left = 20,top = 50");
        });
        $(document).on("click","#top_income_lastsevendays",function()
        {
            window.open("<?php echo $CI->get_encoded_url('website/home/get_top_income_last_seven_days'); ?>","popupWindow", "directories=no,toolbar=no,scrollbars=yes ,location=0,statusbar=0 ,menubar=yes,resizable=1,width="+screen.width +",height=600,left = 20,top = 50");
        });
        //////// LAST MONTH
        $(document).on("click","#top_service_lastmonth",function()
        {
            window.open("<?php echo $CI->get_encoded_url('website/home/get_top_service_last_month'); ?>","popupWindow", "directories=no,toolbar=no,scrollbars=yes ,location=0,statusbar=0 ,menubar=yes,resizable=1,width="+screen.width +",height=600,left = 20,top = 50");
        });
        $(document).on("click","#top_income_lastmonth",function()
        {
            window.open("<?php echo $CI->get_encoded_url('website/home/get_top_income_last_month'); ?>","popupWindow", "directories=no,toolbar=no,scrollbars=yes ,location=0,statusbar=0 ,menubar=yes,resizable=1,width="+screen.width +",height=600,left = 20,top = 50");
        });
    });

//    $('.switch').click(function()
//    {
//        $(this).children('i').toggleClass('fa-pencil');
//        $('.login').animate({height: "toggle", opacity: "toggle"}, "slow");
//        $('.register').animate({height: "toggle", opacity: "toggle"}, "slow");
//    });
</script>