<?php
include_once("autoload.php");
session_start();
if (isset($_SESSION['user'])) {
    header('location:home.php');
}
if (isset($_POST['signup'])) {
    if ((isset($_POST['username'])) && (isset($_POST['pass']))) {
        $username = $_POST['user'];
        $pass = $_POST['password'];
        $user = new UserRepository();
        $response = $user->add($username, $pass);
        if (!$response) {
            header('location:inscription.php');
        }
    }
}

$title = "Login";
include_once('head.php');

?>

<body>
    <div class="container">
        <form action="acceuil.php" method="post">
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
            <?php }
            unset($_SESSION['error']);
            ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Logn in</button>
        </form>
        <a href="inscription.php" class="btn btn-info">Inscrivez-vous</a>
    </div>

</body>

</html>