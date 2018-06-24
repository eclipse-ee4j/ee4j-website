<?php
/*******************************************************************************
 * Copyright (c) 2017 Eclipse Foundation and others.
 * 
 * This program and the accompanying materials are made available under the
 * terms of the Eclipse Public License v. 2.0 which is available at
 * http://www.eclipse.org/legal/epl-2.0.
 * 
 * SPDX-License-Identifier: EPL-2.0
 *******************************************************************************/
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");

$App = new App();
$Nav = new Nav();
$Menu = new Menu();

require_once ('../_projectCommon.php');

$pageKeywords = "EE4J";
$pageAuthor = "Wayne Beaton";

// FIXME Workaround because I can't get Asciidoctor to generate embeddable HTML
function getBodyContent($path) {
    $DOMDocument = new DOMDocument();
    $DOMDocument->loadHTMLFile($path);
    $body = $DOMDocument->getElementsByTagName('body')->item(0);
    $content = "";
    foreach ($body->childNodes as $childNode) {
        $content .= $DOMDocument->saveHTML($childNode);
    }
    return $content;
}

function getMinutesRoot() {
    return dirname(__FILE__) . '/../generated/minutes';
}

function getMinutesDates() {
    global $App;
    $dates = array();
    foreach (scandir(getMinutesRoot()) as $file) {
        if ($file == '.') continue;
        if ($file == '..') continue;
        $date = pathinfo($file, PATHINFO_FILENAME);
        $dates[$date] = $App->getFormattedDate(strtotime($date));
    }
    
    krsort($dates);
    return $dates;
}

$dates = getMinutesDates();

if ($raw = @$_GET['date']) {
    if (array_key_exists($raw, $dates)) {
        $date = $raw;
    }
}

if (!isset($date)) {
    $date = key($dates);
}

$pageTitle = "EE4J PMC Meeting Minutes " . $dates[$date];

ob_start();
?>

<div id="midcolumn">
<?php print getBodyContent(getMinutesRoot() . "/{$date}.html"); ?>
</div>
<div id="rightcolumn">
	<div class="sideitem">
		<h6>Meeting minutes</h6>
		<ul>
		<?php 
		  foreach($dates as $key => $value) {
		      print "<li><a href=\"?date={$key}\">$value</li>";
		  }
		?>
		</ul>
		
	</div>
</div>
<?php
$html = ob_get_clean();

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

