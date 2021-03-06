<?php
/**
 *
 * ThinkUp/tests/all_integration_tests.php
 *
 * Copyright (c) 2009-2011 Gina Trapani
 *
 * LICENSE:
 *
 * This file is part of ThinkUp (http://thinkupapp.com).
 *
 * ThinkUp is free software: you can redistribute it and/or modify it under the terms of the GNU General Public
 * License as published by the Free Software Foundation, either version 2 of the License, or (at your option) any
 * later version.
 *
 * ThinkUp is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with ThinkUp.  If not, see
 * <http://www.gnu.org/licenses/>.
 *
 *
 * @author Gina Trapani <ginatrapani[at]gmail[dot]com>
 * @license http://www.gnu.org/licenses/gpl.html
 * @copyright 2009-2011 Gina Trapani
 */
include 'init.tests.php';
require_once THINKUP_ROOT_PATH.'webapp/_lib/extlib/simpletest/autorun.php';
require_once THINKUP_ROOT_PATH.'webapp/_lib/extlib/simpletest/web_tester.php';
require_once THINKUP_ROOT_PATH.'webapp/_lib/extlib/simpletest/mock_objects.php';

/* INTEGRATION TESTS */
$web_tests = new TestSuite('Integration tests');
$web_tests->add(new WebTestOfApplicationSettings());
$web_tests->add(new WebTestOfCaptchaImage());
$web_tests->add(new WebTestOfChangePassword());
$web_tests->add(new WebTestOfCrawlerRun());
$web_tests->add(new WebTestOfCSRFToken());
$web_tests->add(new WebTestOfDashboard());
$web_tests->add(new WebTestOfDeleteInstance());
$web_tests->add(new WebTestOfLogin());
$web_tests->add(new WebTestOfPostDetailPage());
$web_tests->add(new WebTestOfRegistration());
$web_tests->add(new WebTestOfTwitterDashboard());

$tr = new TextReporter();
$web_tests->run( $tr );
if (isset($RUNNING_ALL_TESTS) && $RUNNING_ALL_TESTS) {
    $TOTAL_PASSES = $TOTAL_PASSES + $tr->getPassCount();
    $TOTAL_FAILURES = $TOTAL_FAILURES + $tr->getFailCount();
}