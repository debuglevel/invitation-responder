<?php
$config["mail_from"] = "test@invalid.invalid";
$config["mail_to"] = "test@invalid.invalid";

function build_subject() {
    return "Invitation Response";
}

function build_message($token, $attendence) {

$accept = $attendence == "Accept" ? "True" : "False";
$reject = $attendence == "Reject" ? "True" : "False";

    $str = <<<EOD

Invitation Response

Token: $token
Attendence: $attendence
Accept: $accept
Reject: $reject

EOD;

    return $str;
}