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
$moduleName = basename(__DIR__);
  ?>
<script type="text/javascript">
function AutoRefresh( t ) {
    setTimeout("location.reload(true);", t);
}
//AutoRefresh(5*60000);
$('.visitors').live("click", function(e) {
    e.preventDefault();
    $('tr#pags').hide();
    $('tr#visits').show();
});
$('.pags').live("click",function(e) {
    e.preventDefault();
    $('tr#visits').hide();
    $('tr#pags').show();
});

</script>
<script src="<?php echo WB_URL ?>/modules/<?php echo $moduleName; ?>/themes/default/js/jquery.poshytip.js"></script>
<div id="loading" class="box" style="display:none;"><?php echo $WS['PLEASEWAIT'] ?></div>
<div id="wbc-container">
<div class="sysmenu">
  <a class=" w3-blue-wb w3-round-small w3-hover-green w3-medium w3-padding-4" href="<?php echo $module_overview_link  ?>"><?php echo $WS['MENU1'] ?></a>
  <a class=" w3-blue-wb w3-round-small w3-hover-green w3-medium w3-padding-4" href="<?php echo $module_visitors_link  ?>"><?php echo $WS['MENU2'] ?></a>
  <a class=" w3-blue-wb w3-round-small w3-hover-green w3-medium w3-padding-4" href="<?php echo $module_history_link  ?>"><?php echo $WS['MENU3'] ?></a>
  <a style="float:right" href="<?php echo $module_help_link  ?>"><?php echo $WS['MENU4'] ?></a>
</div>