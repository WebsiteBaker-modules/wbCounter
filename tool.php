<?php
/**
 *
 * @category        admintools
 * @package         wbCounter
 * @original        wbstats
 * @author          Ruud Eisinga - Dev4me
 * @link            http://www.dev4me.nl/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.x
 * @requirements    PHP 5.2.2 and higher
 * @version         0.1.9.x
 * @lastmodified    Februari 20, 2015
 *
 */
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(defined('WB_PATH') == false) { die('Cannot access '.basename(__DIR__).'/'.basename(__FILE__).' directly'); }
/* -------------------------------------------------------- */
$sAddonName = basename(__DIR__);
require(WB_PATH .'/modules/'.$sAddonName.'/languages/EN.php');
if(file_exists(WB_PATH .'/modules/'.$sAddonName.'/languages/'.LANGUAGE .'.php')) {
    require(WB_PATH .'/modules/'.$sAddonName.'/languages/'.LANGUAGE .'.php');
}
if (!class_exists('wbstats', false)){require __DIR__.'/wbstats.php';}

$moduleName = basename(__DIR__);
$admintool_url = ADMIN_URL .'/admintools/index.php';
$module_link = ADMIN_URL .'/admintools/tool.php?tool='.$moduleName;
$module_overview_link = ADMIN_URL .'/admintools/tool.php?tool='.$moduleName.'&overview';
$module_visitors_link = ADMIN_URL .'/admintools/tool.php?tool='.$moduleName.'&visitors';
$module_history_link = ADMIN_URL .'/admintools/tool.php?tool='.$moduleName.'&history';
$module_help_link = ADMIN_URL .'/admintools/tool.php?tool='.$moduleName.'&help';
$sFrontend = '';
require_once ("head.php");
if (isset($_GET['overview'])) {
    require ("overview.php");
    return;
}
if (isset($_GET['visitors'])) {
    require ("visitors.php");
    return;
}
if (isset($_GET['history'])) {
    require ("history.php");
    return;
}
if (isset($_GET['help'])) {
    require ("help.php");
    return;
}
if (!$check = $database->get_one('SELECT SUM(`user`) visitors FROM '.$table_day)) {
    require ("help.php");
    return;
}
require_once ("overview.php");
