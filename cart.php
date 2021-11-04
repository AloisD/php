<?php

session_start();

const BR = '<br> <br>';

if (!isset($_SESSION["user"]) || $_SESSION["user"] == "") {
    $_SESSION["userNotLogged"] = "Please log in before accessing your cart";
    header("Location: login.php");
}

if (empty($_SESSION["cart"])) {
    echo "Your cart is empty";
    echo BR;
    ?> <a href="index.php">Choose some books</a> <?php
} else {
    echo "You ordered: " . join(", ",$_SESSION["cart"]) . ". Thanks for your order ". $_SESSION["user"] . "." . BR;
    ?><a href="index.php">Back to library</a><?php
}