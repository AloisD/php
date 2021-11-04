<?php

require_once 'connec.php';

session_start();

const BR = '<br> <br>';

// Create connection to database
$pdo = new \PDO(DSN, USER, PASS, [
    PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC
]);

$errors = [];
$firstname = $lastname = "";

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(); 

if (empty($_POST['firstname']) || empty($_POST['lastname'])) {
    $errors["emptyError"] = "Please fill both fields";
} elseif (strlen($_POST['firstname']) > 45 || strlen($_POST['firstname']) > 45) {
    $errors["lengthError"] = "Please use 45 characters or less";
} else {
    $firstname = test_input($_POST['firstname']);
    $lastname = test_input($_POST['lastname']);
    if (!preg_match("/^[a-zA-Z-' ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$/",$firstname) || !preg_match("/^[a-zA-Z-' ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$/",$lastname)) {
        $errors["incorrectError"] = "Only letters and white space are allowed";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (empty($errors)) {
    if (isset($_POST['firstname'], $_POST['lastname'])) {
        $query = $pdo->prepare('INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)');
        $query->execute([
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname']
        ]);
        header('Location: index.php');
    }
} else {
    foreach($errors as $error){
        echo $error . "<br>";
    }
}

?>

<ul>
    <?php foreach($friends as $friend): ?>
    <li><?php echo $friend['firstname'] . ' ' . $friend['lastname']; ?></li>
    <?php endforeach ?>
</ul>


<form action="" method="post">
    <div>
        <label for="firstname">Firstname:</label>
        <input type="text" id="firstname" name="firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>">
    </div>
    <div>
        <label for="lastname">Lastname:</label>
        <input type="text" id="lastname" name="lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>">
    </div>
    <div class="button">
        <button type="submit">Add to friends</button>
    </div>
</form>