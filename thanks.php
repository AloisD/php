<?php

$errors = [];
$name = $firstname = $email = $tel = $message = "";

const BR = '<br> <br> <br>';

if (empty($_POST["user_name"])) {
    $errors["nameErr"] = "Name is required";
} else {
    $name = test_input($_POST["user_name"]);
    if (!preg_match("/^[a-zA-Z-' ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$/",$name)) {
        $errors["nameErr"] = "Only letters and white space are allowed for name";
    }
}

if (empty($_POST["user_firstname"])) {
    $errors["firstname"] = "Firstname is required";
} else {
    $firstname = test_input($_POST["user_firstname"]);
    if (!preg_match("/^[a-zA-Z-' ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$/",$firstname)) {
        $errors["firstname"] = "Only letters and white space are allowed for firstname";
    }
}

if (empty($_POST["user_email"])) {
    $errors["emailErr"] = "Email is required";
} else {
    $email = test_input($_POST["user_email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["emailErr"] = "Invalid email format";
    }
}

if (empty($_POST["user_tel"])) {
    $errors["telErr"] = "Phone number is required";
} else {
    $tel = test_input($_POST["user_tel"]);
    if (!preg_match("/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/",$tel)) {
        $errors["telErr"] = "Invalide phone number format";
    }
}

if ($_POST["user_message_subject"] == "Sujet") {
    $errors["subjectErr"] = "Please choose a subject";
}

if (empty($_POST["user_message"])) {
    $errors["messageErr"] = "A message is required";
} else {
    $message = test_input($_POST["user_message"]);
    if (!preg_match("/^[a-zA-Z-' ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$/",$message)) {
        $errors["messageErr"] = "Only letters and white space allowed";
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (empty($errors)) {
    echo "Merci " . $_POST['user_firstname'] . " " . $_POST['user_name'] . " de nous avoir contacté à propos de “". $_POST['user_message_subject'] ."”. Un de nos conseiller vous contactera soit à l’adresse " . $_POST['user_email'] . " ou par téléphone au " . $_POST['user_tel'] . " dans les plus brefs délais pour traiter votre demande : " . $_POST['user_message'];
} else {
    foreach($errors as $error){
        echo $error . "<br>";
    }
}

