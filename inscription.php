<?php
session_start();
var_dump($_SESSION);
if (isset($_SESSION['username'])) {
    header('location:acceuil.php');
}
$title = "Inscription";
include_once('head.php');

?>

<body>
    <div class="container">
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="user" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" name="signup" class="btn btn-primary">Sign up</button>
        </form>
        <a href="inscription.php" class="btn btn-info">Inscrivez-vous</a>
    </div>
</body>

</html>