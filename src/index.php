<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Invitation Responder</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
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
    <input type="submit" name="attendence" value="Accept" class="btn btn-lg btn-success">
    <input type="submit" name="attendence" value="Reject" class="btn btn-lg btn-danger">
    </form>

    <?php
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>