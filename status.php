<?php
/*******************************************************************************
 * Copyright (c) Eclipse Foundation and others.
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

require_once ('_projectCommon.php');

$pageTitle = "EE4J Project Bootstrapping Status";
$pageKeywords = "EE4J";
$pageAuthor = "Wayne Beaton";

// FIXME Workaround because I can't get Asciidoctor to generate embeddable HTML
function getBodyContent($path)
{
    $DOMDocument = new DOMDocument();
    $DOMDocument->loadHTMLFile($path);
    $body = $DOMDocument->getElementsByTagName('body')->item(0);
    $content = "";
    foreach ($body->childNodes as $childNode) {
        $content .= $DOMDocument->saveHTML($childNode);
    }
    return $content;
}

ob_start();
?>

<div id="midcolumn">
<?php print getBodyContent(dirname(__FILE__) . '/generated/status.html'); ?>
</div>

<?php
$html = ob_get_clean();

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

