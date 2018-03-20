<?php
require_once "../../config.php";
require_once('../dao/IV_DAO.php');

use \Tsugi\Core\LTIX;
use \IV\DAO\IV_DAO;

$LAUNCH = LTIX::requireData();

$p = $CFG->dbprefix;

$IV_DAO = new IV_DAO($PDOX, $p);

if (isset($_SESSION["videoId"])) {

    $userId = $USER->id;
    $videoId = $_SESSION["videoId"];

    echo $IV_DAO->markStudentAsFinished($videoId, $userId);
}