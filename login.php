<?php

session_start();

// $_SESSION["cart"] isn't considered as an array if not initialized
$_SESSION["cart"] = array();

if (isset($_POST['user'])) {
    $_SESSION['user'] = $_POST['user'];
    header("Location: index.php");
}

if (isset($_SESSION['userNotLogged'])) {
    echo $_SESSION['userNotLogged'];
} else if (isset($_SESSION['userIncorrect'])) {
    echo $_SESSION['userIncorrect'];
} else if (isset($_SESSION['userEmpty'])) {
    echo $_SESSION['userEmpty'];
}

?>

<form action="login.php" method="post">
    <div>
        <label for="user">Name:</label>
        <input type="text" id="user" name="user" value="<?php if(isset($_POST['user'])) echo $_POST['user']; ?>">
    </div>
    <div class="button">
        <button type="submit">Log in</button>
    </div>
</form>