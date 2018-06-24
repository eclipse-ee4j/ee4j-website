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
$theme = "quicksilver";
$Nav->addNavSeparator("EE4J", "/ee4j");
$Nav->addCustomNav("PMC Minutes", "/ee4j/minutes", "_self", NULL);
$Nav->addCustomNav("PMC News", "/ee4j/news", "_self", NULL);
$Nav->addCustomNav("Project Status", "/ee4j/status.php", "_self", NULL);
$Nav->addCustomNav("Project Relationships", "/ee4j/relationships.php", "_self", NULL);
$Nav->addCustomNav("EE4J Charter", "https://projects.eclipse.org/projects/ee4j/charter", "_self", NULL);