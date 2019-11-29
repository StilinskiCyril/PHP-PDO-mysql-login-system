<?php
require_once 'header.php';
if (Input::exists()) {
    if (Token::check(Input::get('token'))){

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true),
        ));

        if ($validation->passed()){
            $user = new User();

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if ($login){
//                Session::flash('success', '<div class="alert alert-success"><p>Login success</p></div>');
                Redirect::to('home.php');
            } else {
                echo '<strong><em><p class="text-danger" style="text-align: center;">Sorry, logging in failed.</p></em></strong>';
            }
        } else {
            foreach ($validation->errors() as $error){
                echo '<strong><em><p class="text-danger" style="text-align: center;">'.$error, '</br></p></em></strong>';
            }
        }
    }
}
?>
    <div class="container" xmlns="http://www.w3.org/1999/html">
            <div class="card mt-5" style=" background:rgba(0, 0, 0, 0.20);">
                <div class="card-header">
                    <h3 class="text-center" style="color: white;"><em><strong>LOGIN PAGE</strong></em></h3>
                </div>
                <div class="card-body">
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <label for="username"><em><strong>USERNAME:</strong></em></label>
                            <input type="text" name="username" id="username" class="form-control" required>
                            <p class="error"></p>
                        </div>
                        <div class="form-group">
                            <label for="password"><em><strong>PASSWORD:</strong></em></label>
                            <input type="password" name="password" id="password" class="form-control" required>
                            <p class="error"></p>
                        </div>
                        <div class="form-group">
                            <label for="checkboxpassword">
                                <input type="checkbox" onclick="myFunction()" style="color: white;"><em><strong>Show Password</strong></em>
                        </div>
                        <div class="form-group">
                            <label for="remember">
                                <input type="checkbox" name="remember" id="remember" style="color: white;"><em><strong>Remember Me</strong></em>
                            </label>
                        </div>
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                        <input type="submit" value="LOGIN" class="btn btn-block btn-primary">
                    </form>
                </div>
                <div class="card-footer">
                    <a href="register.php"><button class="btn btn-danger btn-block">REGISTER</button></a>
                </div>
            </div>
    </div>
<?php require_once 'footer.php'; ?>