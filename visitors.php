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

$stats = new wbstats();
$r = $stats->getVisitors();
//print_r($r);
    $sAddonName = (@$sAddonName?:basename(__DIR__));
    $sAddonPath = WB_PATH.'/modules/'.$sAddonName;
    $sAddonUrl  = WB_URL.'/modules/'.$sAddonName;
    if (is_readable($sAddonPath.'/languages/EN.php')) {require($sAddonPath.'/languages/EN.php');}
    if (is_readable($sAddonPath.'/languages/'.LANGUAGE.'.php')) {require($sAddonPath.'/languages/'.LANGUAGE.'.php');}

?>
<div class="middle h265">
    <h3><?php echo $WS['REFTOP10'] ?></h3>
    <table style="width: 100%; border-collapse: collapse; ">
        <tbody>
        <tr>
            <td style="width: 30px"><strong><?php echo $WS['NUMBER'] ?></strong></td>
            <td style="width: 280px;"><strong><?php echo $WS['REFERER'] ?></strong></td>
            <td style="width: 120px;"><strong><?php echo $WS['PERCENT'] ?></strong></td>
        </tr>
        <?php if(isset($r['referer']))
            foreach($r['referer'] as $key => $data) { ?>
        <tr>
            <td><?php echo $key ?></td>
            <td><span class="expand" title="<?php echo $data['name'] ?>"><?php echo $data['short'] ?></span></td>
            <td ><div class="vbar" style="width:<?php echo $data['width'] ?>px; white-space: nowrap;" title="<?php echo $data['views'] ?> <?php echo $WS['VISITORS'] ?>" >&nbsp;<?php echo $data['percent'] ?>%</div></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<div class="middle h265">
    <h3><?php echo $WS['PAGETOP10'] ?></h3>
    <table style="width: 100%; border-collapse: collapse; ">
        <tbody>
        <tr>
            <td style="width: 30px;"><strong><?php echo $WS['NUMBER'] ?></strong></td>
            <td style="width: 280px;"><strong><?php echo $WS['PAGES'] ?></strong></td>
            <td style="width: 120px;"><strong><?php echo $WS['PERCENT'] ?></strong></td>
        </tr>
        <?php if(isset($r['pages'])) foreach($r['pages'] as $key => $data) { ?>
        <tr>
            <td><?php echo $key ?></td>
            <td><span class="expand" title="<?php echo $data['name'] ?>"><?php echo $data['short'] ?></span></td>
            <td ><div class="vbar" style="width:<?php echo $data['width'] ?>px; white-space: nowrap;" title="<?php echo $data['views'] ?> <?php echo $WS['REQUESTS'] ?>" >&nbsp;<?php echo $data['percent'] ?>%</div></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<div style="clear:both"></div>
<div class="middle h265">
    <h3><?php echo $WS['KEYSTOP10'] ?></h3>
    <table style="width: 100%; border-collapse: collapse; ">
        <tbody>
        <tr>
            <td style="width: 30px;"><strong><?php echo $WS['NUMBER'] ?></strong></td>
            <td style="width: 280px;"><strong><?php echo $WS['KEYWORDS'] ?></strong></td>
            <td style="width: 120px;"><strong><?php echo $WS['PERCENT'] ?></strong></td>
        </tr>
        <?php if(isset($r['keyword'])) foreach($r['keyword'] as $key => $data) { ?>
        <tr>
            <td><?php echo $key ?></td>
            <td><span class="expand" title="<?php echo $data['name'] ?>"><?php echo $data['short'] ?></span></td>
            <td ><div class="vbar" style="width:<?php echo $data['width'] ?>px; white-space: nowrap;" title="<?php echo $data['views'] ?> <?php echo $WS['VISITORS'] ?>" >&nbsp;<?php echo $data['percent'] ?>%</div></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<div class="middle h265">
    <h3><?php echo $WS['LANGTOP10'] ?></h3>
    <table style="width: 100%; border-collapse: collapse; ">
        <tbody>
        <tr>
            <td style="width: 30px;"><strong><?php echo $WS['NUMBER'] ?></strong></td>
            <td style="width: 280px"><strong><?php echo $WS['LANGUAGES'] ?></strong></td>
            <td style="width: 120px"><strong><?php echo $WS['PERCENT'] ?></strong></td>
        </tr>
        <?php if(isset($r['language'])) foreach($r['language'] as $key => $data) { ?>
        <tr>
            <td><?php echo $key ?></td>
            <td><span class="expand" title="<?php echo $data['name'] ?>"><?php echo $data['short'] ?></span></td>
            <td ><div class="vbar" style="width:<?php echo $data['width'] ?>px; white-space: nowrap;" title="<?php echo $data['views'] ?> <?php echo $WS['VISITORS'] ?>" >&nbsp;<?php echo $data['percent'] ?>%</div></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<div style="clear:both"></div>
</div>
