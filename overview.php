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

    $sAddonName = (@$sAddonName?:basename(__DIR__));
    // set addon depending path / url
    $sAddonPath = WB_PATH.'/modules/'.$sAddonName;
    $sAddonUrl  = WB_URL.'/modules/'.$sAddonName;
    if (is_readable($sAddonPath.'/languages/EN.php')) {require($sAddonPath.'/languages/EN.php');}
    if (is_readable($sAddonPath.'/languages/'.LANGUAGE.'.php')) {require($sAddonPath.'/languages/'.LANGUAGE.'.php');}
if (!class_exists('wbstats', false)){require __DIR__.'/wbstats.php';}

    $stats = new wbstats();
    $aData = $stats->getStats();
    $r = $aData; // backend object
/*
        if(@DEBUG){
            ob_start();
            print '<pre  class="mod-pre rounded">function <span>'.__FUNCTION__.'( '.''.' );'
                . '</span>line: '.__LINE__.' -> '
                . '</span>filename: <span>'.basename(__DIR__).'/'.basename(__FILE__).'<br />'
                //. '$bAdvanced = '.$bAdvanced.'<br />'
                //. '$bResetSystem = '.$bResetSystem.'<br />'
                //. '$system_permissions = '.sizeof($system_permissions)
                .'<br />';
            print_r( $aData ); print '</pre>'; flush (); //  ob_flush();;sleep(10); die();
            echo $DebugOLutput = ob_get_clean();
        }
*/

if (!isset($sTemplate)){
    $sTemplate = 'default';
    $sAddonThemePath = $sAddonPath.'/themes/'.$sTemplate;
    $sAddonThemeUrl  = $sAddonUrl.'/themes/'.$sTemplate;
    $oTpl = new Template( $sAddonThemePath );
    $oTpl->set_file('page', 'overview.htt');
} else {
    $sAddonTemplatePath = $sAddonPath.'/templates/'.$sTemplate;
    $sAddonTemplateUrl  = $sAddonUrl.'/templates/'.$sTemplate;
    $oTpl = new Template( $sAddonTemplatePath );
    $oTpl->set_file('page', 'overview.htt');
}
    $oTpl->set_block('page', 'main_block', 'main');
//    $oTpl->debug = true;
//    $oTpl->set_var('FTAN', $admin->getFTAN());
//    $oTpl->set_var($TEXT);
if (!$sFrontend ) {
    if($aData['online_title']) {
    }
}

    unset ($aData['bar']);
    unset ($aData['days']);
    $oTpl->set_var($WS);
    $oTpl->set_var('ADMIN_URL', ADMIN_URL);
    $oTpl->set_var('MODULE_NAME', $sAddonName);
    $oTpl->set_var($aData);

    // Parse template objects output
            $oTpl->parse('main', 'main_block', true);
            $oTpl->pparse('output', 'page');
    if( !$sFrontend ) { ?>
<div class="middle h250">
    <h3><?php echo $WS['LAST24'] ?></h3>
    <table class="tableh250" style="height: 230px; width: 100%; border-collapse: collapse; float: right; ">
        <tbody>
        <tr style="height: 210px; vertical-align: bottom;" >
        <?php
            $max = 1;
            foreach($r['bar'] as $bar) {
                if($bar['data']>$max) $max = $bar['data'];
            }
            foreach($r['bar'] as $bar) {
                $value = $bar['data'];
                $bar_height=round((205/$max)*$value+5);
                if ($bar_height == 0) $bar_height = 1;
                echo "\t\t\t<td style=\"width:19px;\">";
                echo "<div class=\"bar\" style=\"height:".$bar_height."px;\" title=\"".$bar['title']." - $value ".$WS['VISITORS']."\"></div></td>\n";
            }
        ?>
        </tr>
        <tr style="height: 1.225em;">
            <td colspan="6" style="width: 25%;" class="timeline"><?PHP echo date("H:i",mktime(date("H")-23, 0, 0, date("n"), date("j"), date("Y"))+TIMEZONE); ?></td>
            <td colspan="6" style="width: 25%;" class="timeline"><?PHP echo date("H:i",mktime(date("H")-17, 0, 0, date("n"), date("j"), date("Y"))+TIMEZONE); ?></td>
            <td colspan="6" style="width: 25%;" class="timeline"><?PHP echo date("H:i",mktime(date("H")-11, 0, 0, date("n"), date("j"), date("Y"))+TIMEZONE); ?></td>
            <td colspan="6" style="width: 25%;" class="timeline"><?PHP echo date("H:i",mktime(date("H")-5, 0, 0, date("n"), date("j"), date("Y"))+TIMEZONE); ?></td>
        </tr>
        </tbody>
    </table>
</div>
<?php }  ?>

<?php if( !$sFrontend ) { ?>
<div class="middle  h250 <?php echo $sFrontend ?>">
    <h3><?php echo $WS['LAST30'] ?>
        <span>
        <a href="" class="visitors"><?php echo $WS['VISITORS'] ?></a> |
        <a href="" class="pags"><?php echo $WS['PAGES'] ?></a>
    </span>
    </h3>
    <table style="height: 230px; width: 100%; float: right;">
        <tbody>
        <tr id="visits" style="height: 210px; vertical-align: baseline;">
        <?php
            $max = 1;
            foreach($r['days'] as $days) {
                if($days['data']>$max) $max = $days['data'];
            }
            foreach($r['days'] as $days) {
                $value = $days['data'];
                $bar_height=round((195/$max)*$value+5);
                if ($bar_height == 0) $bar_height = 1;
                echo "\t\t\t<td style=\"width:19px;\">";
                echo "<div class=\"bar\" style=\"height:".$bar_height."px;\" title=\"".$days['title'].$days['tooltip']."\"></div></td>\n";
            }
        ?>
        </tr>
        <tr id="pags" style="display:none; height: 210px; vertical-align: baseline;">
        <?php
            $max = 1;
            foreach($r['days'] as $days) {
                if($days['views']>$max) $max = $days['views'];
            }
            foreach($r['days'] as $days) {
                $value = $days['views'];
                $bar_height=round((195/$max)*$value+5);
                if ($bar_height == 0) $bar_height = 1;
                echo "\t\t\t<td style=\"width:19px;\">";
                echo "<div class=\"bar\" style=\"height:".$bar_height."px;\" title=\"".$days['title'].$days['tooltip']."\"></div></td>\n";
            }
        ?>
        </tr>
        <tr style="height: 20px">
            <td colspan="6" class="timeline"><?PHP echo date("j.M",mktime(0, 0, 0, date("n"), date("j")-29, date("Y"))); ?></td>
            <td colspan="6" class="timeline"><?PHP echo date("j.M",mktime(0, 0, 0, date("n"), date("j")-23, date("Y"))); ?></td>
            <td colspan="6" class="timeline"><?PHP echo date("j.M",mktime(0, 0, 0, date("n"), date("j")-17, date("Y"))); ?></td>
            <td colspan="6" class="timeline"><?PHP echo date("j.M",mktime(0, 0, 0, date("n"), date("j")-11, date("Y"))); ?></td>
            <td colspan="6" class="timeline"><?PHP echo date("j.M",mktime(0, 0, 0, date("n"), date("j")-5, date("Y"))); ?></td>
        </tr>
        </tbody>
    </table>
</div>
</div> <!-- end of block-outer -->
<?php }
