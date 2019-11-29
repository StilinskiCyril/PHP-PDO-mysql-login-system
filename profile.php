<?php
require_once 'header.php';

if (!$username = Input::get('user')){
    Redirect::to('index.php');
} else {
    $user = new User($username);
    if (!$user->exists()){
        Redirect::to(404);
    } else {
        $data = $user->data();
    }
    ?>


    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- The links in the navgation bar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="https://www.instagram.com/_stilinskicyril/">
                <img src="images/cyril.png" alt="logo" style="width:60px;">
            </a>
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Homepage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="update.php">Update profile</a>
                </li>
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="profile_pic.php">Add profile picture</a>-->
<!--                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact us</a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
                <a href="logout.php"><button class="btn btn-outline-danger">LOGOUT(<?php echo escape($user->data()->username);?>)</button></a>
            </li>
        </ul>
    </nav>

        <div class="container-fluid">
            <table class="table table-bordered table-hover">
                <tr>
                    <td>Username</td>
                    <td>Phone</td>
                    <td>Email</td>
                </tr>
                <tr>
                    <th><?php echo escape($data->username); ?></th>
                    <th><?php echo escape($data->phone);?></th>
                    <th><?php echo escape($data->email);?></th>
                </tr>
            </table>
        </div>
    <?php
    require_once 'footer.php';
}
