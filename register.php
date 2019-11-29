<?php
require_once 'header.php';

//check if the form was submitted
if (Input::exists()) {

    if (Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'unique' => 'users'
            ),
            'email' => array(
                'unique' => 'users'
            ),
            'phone' => array(
                'unique' => 'users'
            )
        ));

        if ($validation->passed()) {
            $user = new User();
            try {
                $user->create(array(
                    'username' => Input::get('username'),
                    'email' => Input::get('email'),
                    'phone' => Input::get('phone'),
                    'password' => Hash::make(Input::get('password'))
                ));

                //Flash and redirect
                Session::flash('success', 'You have been successfully registered and can now login!');
                Redirect::to('index.php');

            } catch (Exception $e) {
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
        <div class="card mt-5" style=" background:rgba(0, 0, 0, 0.20);">
            <div class="card-header">
                <h3 class="text-center" style="color: white;"><em><strong>SIGN UP PAGE</strong></em></h3>
            </div>
            <div class="card-body">
                <form action="" method="post" onsubmit=" return Validate_form()">
                    <div class="form-group">
                        <label for="username"><em><strong>USERNAME:</strong></em></label>
                        <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username'))?>" class="form-control">
                        <p class="error"></p>
                    </div>
                    <div class="form-group">
                        <label for="email"><em><strong>EMAIL ADDRESS:</strong></em></label>
                        <input type="text" name="email" id="email" value="<?php echo escape(Input::get('email'))?>" class="form-control">
                        <p class="error"></p>
                    </div>
                    <div class="form-group">
                        <label for="phone"><em><strong>PHONE NO:</strong></em></label>
                        <input type="text" name="phone" id="phone" value="<?php echo escape(Input::get('phone'))?>" class="form-control">
                        <p class="error"></p>
                    </div>
                    <div class="form-group">
                        <label for="password"><em><strong>PASSWORD:</strong></em></label>
                        <input type="password" name="password" id="password" class="form-control">
                        <p class="error"></p>
                    </div>
                    <div class="form-group">
                        <label for="repeat_password"><em><strong>PASSWORD CONFIRMATION:</strong></em></label>
                        <input type="password" name="repeat_password" id="repeatPass" class="form-control">
                        <p class="error"></p>
                    </div>
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <input type="submit"  value="REGISTER" class="btn btn-block btn-danger">
                </form>
            </div>
            <div class="card-footer">
                <a href="index.php"><button class="btn btn-primary btn-block">LOGIN</button></a>
            </div>
        </div>
    </div>
<?php require_once 'footer.php'; ?>