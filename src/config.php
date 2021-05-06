<?php
$config["mail_from"] = "test@invalid.invalid";
$config["mail_to"] = "test@invalid.invalid";

function build_subject() {
    return "Invitation Response";
}

function build_message($token, $attendence) {
    return "Token: $token\r\nTeilnahme: $attendence";
}