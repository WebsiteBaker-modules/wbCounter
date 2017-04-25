<?php
/**
 *
 * @category        modules
 * @package         wbCounter
 * @original        wbstats
 * @copyright       WebsiteBaker Org. e.V.
 * @author          Ruud Eisinga - Dev4me
 * @author          Dietmar Wöllbrink
 * @author          Manuela v.d.Decken <manuela@isteam.de>
 * @link            http://www.dev4me.nl/
 * @link            http://websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.3
 * @requirements    PHP 5.3.6 and higher
 * @version         $Id:  $
 * @filesource      $HeadURL:  $
 * @lastmodified    $Date:  $
 *
 */

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(defined('WB_PATH') == false) { die('Illegale file access /'.basename(__DIR__).'/'.basename(__FILE__).''); }
/* -------------------------------------------------------- */

        $debugMessage = '';
        $js_back = ADMIN_URL.'/admintools/tool.php';
        $ToolUrl = ADMIN_URL.'/admintools/tool.php?tool='.$sAddonName;
        if( !$admin->get_permission($sAddonName,'module' ) ) {
            $admin->print_error($MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'], $js_back);
        }


/*
ob_start();
print '<pre  class="mod-pre rounded">function <span>'.__FUNCTION__.'( '.''.' );</span>  filename: <span>'.basename(__FILE__).'</span>  line: '.__LINE__.' -> <br />';
print_r( http_build_query( $aDefaultSettings, '', '; ') ); print '</pre>'; flush (); //  ob_flush();;sleep(10); die();
$debugMessage = ob_get_clean();
$debugMessage = '';
*/

$lang = (dirname(__FILE__)) . '/languages/' . LANGUAGE . '.php';
require_once(!file_exists($lang) ? (dirname(__FILE__)) . '/languages/EN.php' : $lang );

if (!class_exists('wbstats', false)){require dirname(__DIR__).'/wbstats.php';}

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
if (!$check = $database->get_one("SELECT sum(user) visitors FROM ".$table_day)) {
    require ("help.php");
    return;
}
require_once ("overview.php");
//$aVars = $oTpl->get_vars();
//print '<pre  class="mod-pre rounded">function <span>'.__FUNCTION__.'( '.''.' );</span>  filename: <span>'.basename(__FILE__).'</span>  line: '.__LINE__.' -> <br />';
//print_r( $aVars ); print '</pre>'; flush (); //  ob_flush();;sleep(10); die();
