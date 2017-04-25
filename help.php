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
    $sAddonPath = WB_PATH.'/modules/'.$sAddonName;
    $sAddonUrl  = WB_URL.'/modules/'.$sAddonName;
    $sHighLighterUrl = WB_URL.'/modules/SyntaxHighlighter';
    $sHighLighterDir = WB_PATH.'/modules/SyntaxHighlighter';
    $oTrans = Translate::getInstance();
    $oTrans->enableAddon('modules\\'.$sAddonName);
?>
<div class="full w3-container" style="height:auto;">
    <h2><?php echo $oTrans->WS_module_description; ?></h2>
    <h3 class="w3-header-blue-wb"><?php echo $oTrans->help_installhead; ?></h3>
    <p><?php echo $oTrans->help_installbody; ?></p>
    <div>
    <pre class="code brush: php; ruler: true;toolbar:false;wrap-lines:false; ">
    &lt;/head&gt;
    &lt;?php if (is_readable( WB_PATH.'/modules/wbCounter/count.php' )) {include(WB_PATH.'/modules/wbCounter/count.php');} ?&gt;
    &lt;body&gt;
    </pre>
    <p><?php echo $oTrans->help_viewbody; ?></p>
    </div>
    <div>
    <p><?php echo $oTrans->help_viewbody1; ?></p>
    <pre class="code brush: php; ruler: true;toolbar:false;wrap-lines:false;">
    &lt;link rel="stylesheet" type="text/css" href="&lt;?php echo WB_URL; ?&gt;/modules/wbCounter/frontend.css" media="screen" /&gt;
    </pre>
    <p><?php echo $oTrans->help_viewbody2; ?></p>
    <pre class="code brush: php; ruler: true;toolbar:false;wrap-lines:false; ">
    &lt;?php if (function_exists('wbCounter')){ ?&gt;
            &lt;div&gt;
                 &lt;?php echo wbCounter();?&gt;
            &lt;/div&gt;
    &lt;?php } ?&gt;
    </pre>
    </div>
    <div>
    <p><?php echo $oTrans->help_viewdroplet; ?></p>
    <pre class="code brush: php; ruler: true;toolbar:false;wrap-lines:false; ">
    &lt;?php if (function_exists('wbCounter')){ ?&gt;
            &lt;div&gt;
                [[WbCount]]
            &lt;/div&gt;
    &lt;?php } ?&gt;
    </pre>
    </div>

    <?php if (defined('WB_VERSION') && version_compare(WB_VERSION,'2.8.3','<')) { ?>
    <h3><?php echo $oTrans->help_refererhead; ?></h3>
    <?php echo $oTrans->help_refererbody; ?>
    <pre class="code brush: php; ruler: true;toolbar:false;wrap-lines:false; ">
    $referer = $_SERVER['HTTP_REFERER'];</pre>
    <h4><?php echo $oTrans->help_refererinfo; ?></h4>
    <?php } ?>

    <?php if (!defined('WB_VERSION') || version_compare(WB_VERSION,'2.8.3','<')) { ?>
    <h3><?php echo $oTrans->help_jqueryhead; ?></h3>
    <?php echo $oTrans->help_jquerybody; ?>
    <?php } ?>

    <hr />
    <div><a href="http://www.dev4me.nl" target="_blank"><img src="<?php echo WB_URL ?>/modules/WbCounter/logo.png" style="width: 20%;" alt="" /></a></div>
    <?php echo $oTrans->help_donate; ?>
    <div style="clear:both"></div>
</div>
<?php if (file_exists($sHighLighterDir)) { ?>
    <script type="text/javascript">
    <!--
        var HighLighterCss   = "<?php echo $sHighLighterUrl; ?>/styles/shCoreDefault.css";
        if (typeof LoadOnFly==='undefined'){
            $.insert(HighLighterCss);
        } else {
            LoadOnFly('head', HighLighterCss);
        }
    -->
    </script>
    <script type="text/javascript" src="<?php echo $sHighLighterUrl; ?>/scripts/shCore.js"></script>
    <script type="text/javascript" src="<?php echo $sHighLighterUrl; ?>/scripts/shBrushPhp.js"></script>
    <script type="text/javascript">SyntaxHighlighter.all();</script>
<?php } ?>
</div>
