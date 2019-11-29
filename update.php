<?php
require_once 'header.php';
$user = new User();

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
                <a class="nav-link" href="#">About us</a>
            </li>
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


<?php

if (!$user->isLoggedIn()){
    Redirect::to('index.php');
}

if (Input::exists()){
    if (Token::check(Input::get('token'))){

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            ),
            'phone' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            ),
            'email' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            )
        ));
        if ($validation->passed()){

            try {
                $user->update(array(
                    'username' => Input::get('username'),
                    'phone' => Input::get('phone'),
                    'email' => Input::get('email')
                ));

                Session::flash('home', 'Your details have been updated');
                Redirect::to('home.php');

            } catch(Exception $e) {
                die($e->getMessage());
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo '<strong><em><p class="text-danger" style="text-align: center;">'.$error, '</br></p></em></strong>';
            }
        }
    }
}

?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="text-center">PROFILE UPDATE</h4>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="" method="post">
                <div class="form-group">
                    <label for="username">USERNAME:</label>
                    <input type="text" name="username" class="form-control" value="<?php echo escape($user->data()->username);?>">
                </div>
                <div class="form-group">
                    <label for="phone">PHONE:</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo escape($user->data()->phone);?>">
                </div>
                <div class="form-group">
                    <label for="email">EMAIL:</label>
                    <input type="text" name="email" class="form-control" value="<?php echo escape($user->data()->email);?>">
                </div>
<!--                <div class="form-group">-->
<!--                    <input type="file" name="profile_pic">-->
<!--                </div>-->
                <input type="submit" value="UPDATE" class="btn btn-block btn-primary">
                <input type="hidden" name="token" value="<?php echo Token::generate();?>">
            </form>
        </div>
    </div>
</div>
<?php require_once 'footer.php';?>
