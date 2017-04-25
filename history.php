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

$time=time();
if (isset($_GET["m"]) && is_numeric($_GET["m"]) && $_GET["m"] >= 1 && $_GET["m"] <= 12 ) {$show_month = $_GET["m"];}
else {$show_month=date("n",$time);}
if (isset($_GET["y"]) && is_numeric($_GET["y"]) && $_GET["y"] >= 2010 && $_GET["y"] <= 2100 ) {$show_year = $_GET["y"];}
else {$show_year=date("Y",$time);}

$stats = new wbstats();
$r = $stats->getHistory($show_month,$show_year);
//print_r($r);
    $sAddonName = (@$sAddonName?:basename(__DIR__));
    $sAddonPath = WB_PATH.'/modules/'.$sAddonName;
    $sAddonUrl  = WB_URL.'/modules/'.$sAddonName;
    if (is_readable($sAddonPath.'/languages/EN.php')) {require($sAddonPath.'/languages/EN.php');}
    if (is_readable($sAddonPath.'/languages/'.LANGUAGE.'.php')) {require($sAddonPath.'/languages/'.LANGUAGE.'.php');}

?>
  <div class="middle">
    <h3><?php echo $WS['HISTORY'] ?></h3>
    <table style="width: 100%; border-collapse: collapse; ">
      <tbody>
        <tr style="vertical-align: top;">
          <td colspan="4"><strong><?php echo $WS['TOTALSINCE'] ?> <?PHP echo $r['since'];?></strong></td>
        </tr>
          <tr style="vertical-align: top;">
          <td style="width: 30%;"><?php echo $WS['VISITORS'] ?></td>
          <td style="width: 20%;"><?PHP echo $r['visitors']; ?></td>
          <td style="width: 30%;"><?php echo $WS['PAGES'] ?></td>
          <td style="width: 20%;"><?PHP echo $r['visits']; ?></td>
        </tr>
        <tr style="vertical-align: top;">
          <td style="width: 30%;"><?php echo $WS['AVGDAY'] ?></td>
          <td style="width: 20%;"><?PHP echo $r['average']; ?></td>
          <td style="width: 30%;">&nbsp;</td>
          <td style="width: 20%;">&nbsp;</td>
        </tr>
      </tbody>
    </table>
    <br />
    <table style="width: 100%; border-collapse: collapse; ">
      <tbody>
        <tr style="vertical-align: top;">
          <td colspan="4"><strong><?php echo $WS['SELECTED'] ?>: <?PHP echo date("Y-m",mktime(0, 0, 0, $show_month, 1, $show_year)); ?></strong></td>
        </tr>
        <tr style="vertical-align: top;">
            <td style="width: 30%;"><?php echo $WS['VISITORS'] ?></td>
            <td style="width: 20%;"><?PHP echo $r['mvisitors']; ?></td>
            <td style="width: 30%;"><?php echo $WS['PAGES'] ?></td>
            <td style="width: 20%;"><?PHP echo $r['mvisits']; ?></td>
        </tr>
        <tr style="vertical-align: top;">
            <td style="width: 30%;"><?php echo $WS['AVGDAY'] ?></td>
            <td style="width: 20%;"><?PHP echo $r['maverage']; ?></td>
            <td style="width: 30%;">&nbsp;</td>
            <td style="width: 20%;">&nbsp;</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="middle">
    <h3>
    <?php
    echo $WS['YEAR']." ".date("Y",mktime(0, 0, 0, $show_month, 1, $show_year));
    $back_month=date("n",mktime(0, 0, 0, $show_month, 1, $show_year-1));
    $back_year=date("Y",mktime(0, 0, 0, $show_month, 1, $show_year-1));
    $next_month=date("n",mktime(0, 0, 0, $show_month, 1, $show_year+1));
    $next_year=date("Y",mktime(0, 0, 0, $show_month, 1, $show_year+1));
    echo "<span>".PHP_EOL
    . "<a href=\"$module_history_link&m=$back_month&y=$back_year\">&lt;</a>&nbsp;".PHP_EOL
    . "<a href=\"$module_history_link&m=$next_month&y=$next_year\">&gt;</a>".PHP_EOL
    . "</span>".PHP_EOL;
    ?>
    </h3>
    <table style="width: 100%; height: 200px; border-collapse: collapse; ">
      <tbody>
        <tr style="height: 180; vertical-align: bottom;">
        <?php
        $i = 1;
        foreach($r['month'] as $key => $data) {
            $value = (int)$data['data'];
            if ($r['max_month'] > 0) {$bar_height=round((175/$r['max_month'])*$value+5);} else $bar_height = 5;
            echo "<td style=\"width: 38px;\">";
            echo "<a href=\"$module_history_link&m=$key&y=$show_year\">";
            echo "<div class=\"bar\" data-month=\"".$i."\" style=\"height:".$bar_height."px;\" title=\"".$data['title']." - $value ".$WS['VISITORS']."\"></div>";
            echo "</a></td>\n";
            $i++;
        }
        ?>
        </tr>
        <tr style="height: 20px;">
          <td colspan="3" style="width: 25%;" class="timeline"><?PHP echo date("M.Y",mktime(0, 0, 0, 1, 1, $show_year)); ?></td>
          <td colspan="3" style="width: 25%;" class="timeline"><?PHP echo date("M.Y",mktime(0, 0, 0, 4, 1, $show_year)); ?></td>
          <td colspan="3" style="width: 25%;" class="timeline"><?PHP echo date("M.Y",mktime(0, 0, 0, 7, 1, $show_year)); ?></td>
          <td colspan="3" style="width: 25%;" class="timeline"><?PHP echo date("M.Y",mktime(0, 0, 0, 10, 1, $show_year)); ?></td>
        </tr>
      </tbody>
    </table>
  </div>

  <div style="clear:both"></div>

  <div class="full">
    <h3>
    <?php
    echo date("F Y",mktime(0, 0, 0, $show_month, 1, $show_year));
    $back_month=date("n",mktime(0, 0, 0, $show_month-1, 1, $show_year));
    $back_year=date("Y",mktime(0, 0, 0, $show_month-1, 1, $show_year));
    $next_month=date("n",mktime(0, 0, 0, $show_month+1, 1, $show_year));
    $next_year=date("Y",mktime(0, 0, 0, $show_month+1, 1, $show_year));
    echo "<span>".PHP_EOL
    . "<a href=\"$module_history_link&m=$back_month&y=$back_year\">&lt;</a>&nbsp;".PHP_EOL
    . "<a href=\"$module_history_link&m=$next_month&y=$next_year\">&gt;</a>".PHP_EOL
    . "</span>".PHP_EOL;
   ?>
    </h3>
    <table style="width: 100%; height: 230px; border-collapse: collapse; ">
      <tbody>
        <tr style="height: 210px; vertical-align: bottom;">
        <?php
        $max = 1;
        foreach($r['days'] as $data) {
            if($data['data']>$max) $max = $data['data'];
        }
        $i = 1;
        $maxDays  = cal_days_in_month(CAL_GREGORIAN, $show_month, $show_year);
        $leapYear = date('L', mktime(0, 0, 0, 7, $show_month, $show_year));
/*
print '<pre  class="mod-pre rounded">function <span>'.__FUNCTION__.'( '.''.' );</span>  filename: <span>'.basename(__FILE__).'</span>  line: '.__LINE__.' -> <br />';
print_r( $leapYear ); print '</pre>'; flush (); //  ob_flush();;sleep(10); die();
*/
        $iColspanAdd = 31-$maxDays;
        switch ($maxDays):
            case 28:
            case 29:
            $iLastColspan = 4+$leapYear;
            break;
        default:
            $iLastColspan = 7-$iColspanAdd;;
            break;
        endswitch;
        foreach($r['days'] as $key => $data) {
            $value = (int)$data['data'];
            if ($max > 0) {$bar_height=round((195/$max)*$value+5);} else $bar_height = 5;
            echo "<td style=\"width: 30px;\">";
            echo "<div class=\"bar\" data-day=\"".$i."\" style=\"height:".$bar_height."px;\" title=\"".$data['title'].$data['tooltip']."\"></div>";
            echo "</td>\n";
            $i++;
            }
        ?>
        </tr>
        <tr style="height: 20px;">
          <td colspan="6" class="timeline"><?PHP echo date("j.M",mktime(0, 0, 0, $show_month, 1, $show_year)); ?></td>
          <td colspan="6" class="timeline"><?PHP echo date("j.M",mktime(0, 0, 0, $show_month, 7, $show_year)); ?></td>
          <td colspan="6" class="timeline"><?PHP echo date("j.M",mktime(0, 0, 0, $show_month, 13, $show_year)); ?></td>
          <td colspan="6" class="timeline"><?PHP echo date("j.M",mktime(0, 0, 0, $show_month, 19, $show_year)); ?></td>
          <td colspan="<?PHP echo $iLastColspan;?>" class="timeline"><?PHP echo date("j.M",mktime(0, 0, 0, $show_month, 25, $show_year)); ?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div style="clear:both"></div>
</div>
