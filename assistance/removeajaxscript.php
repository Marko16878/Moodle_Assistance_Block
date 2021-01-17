<?php

define('AJAX_SCRIPT', true);
require_once('../../config.php');

require_login(null, false, null, false, true);
require_sesskey();

//Do your thing here
global $DB;

$studentid = $_POST['studentid'];
$DB->delete_records('block_assistance',array('studentid'=>$studentid));

$result = true;
echo $OUTPUT->header();
echo json_encode(array('result' => $result));