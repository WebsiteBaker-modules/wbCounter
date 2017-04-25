<?php
/**
*    Must include code to stop this file being access directly
*/
if(defined('WB_PATH') == false) die("Cannot access this file directly");

    function wbCounter($sTemplate='default'){
        global $database, $table_day,$table_ips,$table_pages,$table_ref,$table_key,$table_lang, $code2lang,$WS;
        $sAddonName = basename(__DIR__);
        $sAddonPath = WB_PATH.'/modules/'.$sAddonName;
        $retVal = '';
//        register_frontend_modfiles('css');
        ob_start();
        if (is_readable($sAddonPath . '/languages/EN.php')) {require $sAddonPath . '/languages/EN.php';}
        if (is_readable($sAddonPath . '/languages/'.LANGUAGE.'.php')) {require $sAddonPath . '/languages/'.LANGUAGE.'.php';}
        //echo $_SERVER["SCRIPT_FILENAME"].'<br /><br />';
        $sFrontend = 1;
        if(!class_exists('wbstats', false)){require($sAddonPath.'/wbstats.php');}
        if (is_readable($sAddonPath . '/overview.php')) {require ($sAddonPath."/overview.php");}
        $retVal = ob_get_clean();
        $retVal = (@$retVal?:'');
        return $retVal;
    }
