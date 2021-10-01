<?php
if (isset($_POST['firstname']))
    $name = $_POST['firstname'];
if (isset($_POST['lastname']))
    $name = $_POST['lastname'];
if (isset($_POST['email']))
    $email = $_POST['email'];
if (isset($_POST['PhoneNumer']))
    $email = $_POST['PhoneNumer'];
if (isset($_POST['message']))
    $message = $_POST['message'];


$content = "From: $firstname \n Email: $email \n Message: $message";
$recipient = "yifat.tshuva@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
echo "Email sent!";