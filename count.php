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

// Add to the top of your template (within the <?php)
// include ( WB_PATH.'/modules/wbstats/count.php');

// Add to the /config.php, just before the initialize line
// $referer = $_SERVER['HTTP_REFERER'];
// only needed < WB 283 SP5

if (!class_exists('wbcount', false)){require __DIR__.'/wbcount.php';}
new wbcount();
