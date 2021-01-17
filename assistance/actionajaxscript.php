<?php

define('AJAX_SCRIPT', true);
require_once('../../config.php');

require_login(null, false, null, false, true);
require_sesskey();

//Do your thing here
global $DB;
global $USER;
$userrecord = new stdClass();
$userrecord->studentname = $USER->firstname . ' ' . $USER->lastname;
$userrecord->studentid = $USER->idnumber;
$DB->insert_record('block_assistance',$userrecord);

$result = true;
echo $OUTPUT->header();
echo json_encode(array('result' => $result));