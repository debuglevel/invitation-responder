<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Invitation Responder</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="">
<style>
</style>
<script src=""></script>
<body>

<?php
require("config.php");

$token = $_REQUEST["token"];

if (is_null($token))
{
    ?>
    No token provided.
    <?php
}else{
    $attendence = $_REQUEST["attendence"];
    if (!is_null($attendence)) {

        $to      = $config["mail_to"];
        $subject = build_subject();
        $message = build_message($token, $attendence);
        $headers = 'From: '.$config["mail_from"];

        mail($to, $subject, $message, $headers);
    ?>

    Thanks for your response!

    <!--
        Mail Body:
        ----
        <?php
        echo $message;
        ?>
        ----
    -->

    <?php
    }else{
    ?>

    <h1>I want to attend the event:</h1>
    <form action="/index.php" method="post">
    <input type="hidden" name="token" value="<?php echo $token ?>">
    <input type="submit" name="attendence" value="Accept">
    <input type="submit" name="attendence" value="Reject">
    </form>

    <?php
    }
}
?>

</body>
</html>