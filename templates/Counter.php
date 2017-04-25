<?php
//:Displays website statistics as a frontendpage
//:usage: [[Counter]]
/*
*    @version    0.0.1
*    @author        Ruud Eisinga (Ruud)
*
global $wb,$table_day,$table_ips,$table_pages,$table_ref,$table_key,$table_lang, $code2lang,$WS;
$mpath = WB_PATH.'/modules/wbCounter/';
$module=basename(__DIR__);
$sFrontend = 'hide';
$lang = $mpath . '/languages/' . LANGUAGE . '.php';
$_sFrontendCss = '/modules/'.$module.'/frontend.css';
if(is_readable(WB_PATH.$_sFrontendCss)) {
    $_sSearch = preg_quote(WB_URL.'/modules/'.$module.'/frontend.css', '/');
    if(preg_match('/<link[^>]*?href\s*=\s*\"'.$_sSearch.'\".*?\/>/si', $wb_page_data)) {
        $_sFrontendCss = '';
    }else {
        $_sFrontendCss = '<link href="'.WB_URL.$_sFrontendCss.'" rel="stylesheet" type="text/css" media="screen" />';
    }
} else { $_sFrontendCss = ''; }
//$output = $_sFrontendCss."\n".'<script src="'.$mpath.'themes/default/js/jquery.poshytip.js"></script>'."\n";
ob_start();
require(!file_exists($lang) ? $mpath . '/languages/EN.php' : $lang );
if(!class_exists('wbstats'), false) { require($mpath.'wbstats.php'); }
require ($mpath."overview.php");
$output .= ob_get_clean();
return $output;
*/
