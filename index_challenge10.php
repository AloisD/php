<?php

session_start();

const BR = '<br> <br>';

// login check variable
$user = "";

// databas connection variables
$servername = "localhost";
$username = "root";
$password = "";
$database = "library_db";
$port = "3306";

// Create connection to database
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection to database
if ($conn->connect_error) {
  die("Connection to database failed: " . $conn->connect_error);
}
echo "Connected successfully to database";
echo BR;


// Check if login, if not save error messages and redirect to login.php
if (empty($_SESSION["user"])) {
    $_SESSION["userEmpty"] = "Name is required";
    header("Location: login.php");
} else {
    $user = test_input($_SESSION["user"]);
    if (!preg_match("/^[a-zA-Z-' ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]*$/",$user)) {
        $_SESSION["userIncorrect"] = "Only letters and white space are allowed for name";
        header("Location: login.php");
    }
}

// Check if use name is valid
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// says hi to user
if (isset($_SESSION['user'])) {
    ?> Hello <?php echo $_SESSION['user'].BR; ?>
    <a href="logout.php">Log out</a> <?php
} else {
    header("Location: index.php");
}
?>

<h1>Library</h1>
<h2>Here are our books</h2>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<table>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Publisher</th>
        <th>Buy</th>
    </tr>

<?php

$query = "SELECT title, author.name as author, genre.name as genre, publisher.name as publisher FROM book JOIN author ON author = author.id JOIN genre ON genre = genre.id JOIN publisher ON publisher = publisher.id";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {?>
        <tr>
            <td><?php echo $row["title"]; ?></td>
            <td><?php echo $row["author"]; ?></td>
            <td><?php echo $row["genre"]; ?></td>
            <td><?php echo $row["publisher"]; ?></td>
            <td>
                <form action="" method="post"> <?php
                    if (in_array($row["title"], $_SESSION["cart"])) { ?>
                        <button disabled>Already in your cart</button> <?php
                    } else { ?>
                    <button name="cart" value="<?php echo $row["title"]; ?>" type="submit">Add to cart</button> <?php
                    } ?>
                </form>
            </td>
        </tr>

    <?php }}
?>
</table>
<br>

<?php

if (isset($_POST["cart"])) {
    array_push($_SESSION["cart"], $_POST["cart"]);
}
?>

<br>
<a href="cart.php">See my cart</a>