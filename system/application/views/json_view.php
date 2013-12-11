<?php
//
// Added by William Kasel September 19, 2013
//
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
json_encode($output);