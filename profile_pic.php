<?php
require_once 'header.php';
require_once 'classes/includes/appvars.php';
//echo Session::get(Config::get('session/session_name'));

if (Input::exists()) {

    if (Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'profile_pic' => array(
                'format' => true
            )
        ));

        if ($validation->passed()) {
            $user = new User();

            // Move the file to the target upload folder
            $target = GW_UPLOADPATH . basename(Input::get('profile_pic'));
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target)) {
                try {
                    $user->create(array(
                        'user_id' => Session::get(Config::get('session/session_name')),
                        'profile_pic' => Input::get('profile_pic')
                    ));

                    //Flash and redirect
                    Session::flash('success', 'Photo uploaded successfully');
                    Redirect::to('home.php');

                } catch (Exception $e) {
                    die($e->getMessage());
                }
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
                <h4 style="text-align: center;">ADD PHOTO</h4>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="" method="post">
                    <div class="form-group">
                        <input type="file" name="profile_pic" id="profile_pic"  class="form-control">
                    </div>
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    <input type="submit"  value="REGISTER" class="btn btn-block btn-success">
                </form>
            </div>
        </div>
    </div>
<?php require_once 'footer.php'; ?>