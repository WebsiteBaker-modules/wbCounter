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

$module_description = 'Statistiken der Website. Dieses Add-on ist ein Fork von <a href="http://www.dev4me.nl/">Ruud Eisinga - Dev4me</a>! Angepasst für WB ab 2.8.3 SP7';

$WS = array (
        "module_description"  => $module_description,
        "PLEASEWAIT"    => "Bitte warten..",
        "MENU1"            => "Übersicht",
        "MENU2"            => "Besucher",
        "MENU3"            => "History",
        "MENU4"            => "Hilfe",
        "GENERAL"        => "Besucherstatistik",
        "LAST24"        => "Letzte 24 Stunden",
        "LAST30"        => "Letzte 30 Tage",
        "TOTALS"        => "Gesamt",
        "TODAY"            => "Heute",
        "LIVE"            => "Live",
        "YESTERDAY"        => "Gestern",
        "MISC"            => "Verschiedenes",
        "AVERAGES"        => "Durchschnitt",
        "TOTALVISITORS"    => "Besucher",
        "TOTALPAGES"    => "Seiten",
        "TODAYVISITORS"    => "Besucher",
        "TODAYPAGES"    => "Seiten",
        "TODAYBOTS"        => "Suchmaschinen Robots",
        "YESTERVISITORS"    => "Besucher",
        "YESTERPAGES"    => "Seiten",
        "YESTERDAYBOTS"    => "Suchmaschinen Robots",
        "CURRENTONLINE"    => "Zur Zeit online",
        "BOUNCES"        => "Besuche in den letzten 48 Stunden",
        "AVGPAGESVISIT"    => "Seiten pro Besuch",
        "AVG7VISITS"    => "Besucher pro Tag - 7 Tage",
        "AVG30VISITS"    => "Besucher pro Tag - 30 Tage",
        "REFTOP10"        => "Top 10 - Referers",
        "PAGETOP10"        => "Top 10 - Seiten",
        "KEYSTOP10"        => "Top 10 - Kennw&ouml;rter",
        "LANGTOP10"        => "Top 10 - Sprache",
        "NUMBER"        => "Nr.",
        "PERCENT"        => "Prozent",
        "REFERER"        => "Referer",
        "PAGES"            => "Seite",
        "KEYWORDS"        => "Kennwörter",
        "LANGUAGES"        => "Sprache",
        "HISTORY"        => "History",
        "TOTALSINCE"    => "Total seit",
        "SELECTED"        => "Gewähltes Datum",
        "VISITORS"        => "Besucher",
        "PAGES"            => "Seiten",
        "REQUESTS"        => "Zugriffe",
        "AVGDAY"        => "Tagesdurchschnitt",
        "YEAR"            => "Jahr",
    /* ./counter.php */
        'total_visitors:' => 'Besucher gesamt:',
        'visitors_today:' => 'Besucher heute:',
        'visitors_yesterday:' => 'Besucher gestern:',
        'visitors_per_day:' => 'Besucher pro Tag:',
        'max_visitors_per_day:' => 'Max. Besucher pro Tag:',
        'max_visitors_per_day_date:' => 'Datum max. Besucher pro Tag:',
        'visitors_currently_online:' => 'gerade online:',
        'max_visitors_online:' => 'max. online:',
        'max_visitors_online_date:' => 'Datum max. online:',
        'total_page_views:' => 'Seitenaufrufe gesamt:',
        'page_views_today:' => 'Seitenaufrufe heute:',
        'page_views_yesterday:' => 'Seitenaufrufe gestern:',
        'max_page_views_per_day:' => 'Max. Seitenaufrufe pro Tag:',
        'max_page_views_per_day_date:' => 'Datum max. Seitenaufrufe pro Tag:',
        'page_views_per_day:' => 'Seitenaufrufe pro Tag:',
        'page_views_per_visitor:' => 'Seitenaufrufe pro Besucher:',
        'page_views_this_page:' => 'Seitenaufrufe diese Seite:',
        'page_views_of_current_visitor:' => 'Eigene Seitenaufrufe:',
        'javascript_activated:' => 'JavaScript aktiviert:',
        'deactivated' => '<i>deaktiviert</i>',
        'counter_start:' => 'Counterstart:',
        'statistics' => 'Statistiken',
);

$code2lang = array(
        'ar'=>'Arabisch',
        'bn'=>'Bengalisch',
        'bg'=>'Bulgarisch',
        'zh'=>'Chinesisch',
        'cs'=>'Tchechisch',
        'da'=>'D&auml;nisch',
        'en'=>'Englisch',
        'et'=>'Estonisch',
        'fi'=>'Finnisch',
        'fr'=>'Franz%ouml;sisch',
        'de'=>'Deutsch',
        'el'=>'Griechisch',
        'hi'=>'Hindi',
        'id'=>'Indonesisch',
        'it'=>'Italienisch',
        'ja'=>'Japanisch',
        'kg'=>'Koreanisch',
        'nb'=>'Norwegisch',
        'nl'=>'Niederl&auml;ndisch',
        'pl'=>'Polnisch',
        'pt'=>'Portugisisch',
        'ro'=>'Rom&auml;nisch',
        'ru'=>'Russisch',
        'sr'=>'Serbisch',
        'sk'=>'Slovakisch',
        'es'=>'Spanisch',
        'sv'=>'Schwedisch',
        'th'=>'Thai',
        'tr'=>'Türkisch',
        ''=>'');

$help = array(
        'installhead'  => 'Installation und Einrichtung',
        'installbody'  => 'Um den Zähler in deine Webseite einzubinden, füge nachfolgene Codezeile in dein(e) Template(s) irgendwo im Head Abschnitt',
        'viewbody'     => 'Um den Zähler auf deiner Webseite anzuzeigen',
        'viewbody1'    => 'füge nachfolgenen CSS Link in dein(e) Template(s) in den Head Bereich ein',
        'viewbody2'    => 'füge nachfolgenen Aufruf in dein(e) Template(s) in den Body Bereich ein, wo der Counter sichtbar sein soll',
        'viewbody3'    => 'oder erstelle eine versteckte Seite mit dem Page Modul wbCounterView und füge deinen Counter als Droplet [[SectionPicker?sid=123]]r in dein(e) Template(s) in den Body Bereich ein, wo der Counter sichtbar sein soll',
        'refererhead'  => 'Referer-Informationen in WB 2.8.3 und neuer',
        'refererbody'  => 'Für die WebsiteBaker Versionen 2.8.3 und neuer ist es notwendig, unten stehene Codezeile in die Datei <strong>config.php</strong> im WB-Hauptverzeichnis unmittelbar vor dieser Zeile hier einzufügen:  <i>require_once(WB_PATH.\'/framework/initialize.php\');</i>',
        'refererinfo'  => 'nicht mehr notwendig in WebsiteBaker 2.8.3 SP5 r1644 und 2.8.4',
        'jqueryhead'   => 'JQuery-Probleme',
        'jquerybody'   => 'In älteren WebsiteBaker-Admin-Themes (Version 2.8.1 und 2.7) wird JQuery nicht korrekt im Head-Bereich der Datei eingebunden.<br/>
                            Dies kann durch das Verschieben der Code-Zeilen, die mit &lt;script&gt; beginnen von der Datei footer.htt zur Datei header.htt korrigiert werden.<br/>
                            Beide Dateien findest du in im Ordner /templates/{dein_theme}/templates.<br/><br/>
                            <strong>Hinweis:</strong> Das Modul kann keine Statistiken zeigen, wenn JQuery nicht korrekt initialisiert wird.',
        'donate'       => 'Dieses Modul wurde von Dev4me programmiert und der WebsiteBaker-Community frei zur Verfügung gestellt.<br/>Wenn Ihnen dieses Modul gefällt, würden wir uns über eine kleine Spende via PayPal freuen.'
);


