<?php
include_once("autoload.php");
session_start();
if (isset($_POST['login'])) {
    if ((isset($_POST['username'])) && (isset($_POST['pass']))) {
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $user = new UserRepository();
        $response = $user->findByDoubleId($username, $pass);
        if (!$response) {
            header('location:login.php');
            $_SESSION['error'] = "vérifiez vos coordonnées";
        }
        else{
            $_SESSION['username']=$username;
        }
    }
} else {
    header('location:login.php');
}
$title = "Acceuil";
include_once('head.php');
?>

<body>
    <div class="alert alert-success">Bienvenu <?= $username ?></div>
    <a href="logout.php" class="btn btn-secondary">Log out</a>

</body>

</html>