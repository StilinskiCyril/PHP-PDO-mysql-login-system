<?php
require_once 'header.php';
if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $db = DB::getInstance();
        $insert = $db->insert('feedback',array(
            'user_id' => Session::get(Config::get('session/session_name')),
            'subject' => Input::get('subject'),
            'message' => Input::get('message')
        ));

        Redirect::to('home.php');
    }
}
if (Session::exists('home')){
    echo '<p>' . Session::flash('home') . '</p>';
}
//echo Session::get(Config::get('session/session_name'));
$user = new User();

    if (!$user->isLoggedIn()){
        echo '<p>You need to <a href="index.php">LOGIN</a> in or <a href="register.php">REGISTER</a></p>';
    } else {
        echo '   
  <div class="nav1">
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
                        <a class="nav-link" href="profile.php?user='. escape($user->data()->username).'">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact us</a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav -pull-right">
                <li class="nav-item">
                    <a href="logout.php"><button class="btn btn-outline-danger">LOGOUT('. escape($user->data()->username).')</button></a>
                </li>
            </ul>
        </nav>
    </div>';
    }
    ?>

    <div class="container-fluid">
<h3 class="textIntro" style="font-size: 2em;">WELCOME <?php echo  escape($user->data()->username)?> , ITS OUR HONOUR TO SERVE YOU
..WEBSITE LAUNCHING SOON</h3>

        <!-- carousel -->
        <style>
            /* Make the image fully responsive */
            .carousel-inner img {
                width: 100%;
                height: 100%;
                padding: 50px;
            }
        </style>
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/shop3.jpg" alt="Los Angeles" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3>STILINSKI</h3>
                        <p>We Ensure Customer Satisfaction!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/shop1.jpg" alt="Chicago" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3>STILINSKI</h3>
                        <p>Welcome All!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/shop2.jpg" alt="New York" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3>STILINSKI</h3>
                        <p>Thank You!</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

        <!-- the team -->
        <section class="team py-5" id="team">
                    <h2>Team Members</h2>
                    <p class="heading-bottom mb-5">Meet Our Team Professionals</p>
                <div class="row team-grids">
                    <div class="col-lg-3 col-sm-6 w3_agileits-team1">
                        <img class="img-fluid" src="images/stilinski.jpg" alt="">
                        <div class="team-info">
                            <h5 class="">Cyril Aguvasu</h5>
                            <p>Software Developer</p>
                            <div class="social-icons">
                                <ul>
                                    <li>
                                        <a href="#"><img src="https://img.icons8.com/color/48/000000/twitter.png"></a>
                                    </li>
                                    <li class="mx-1">
                                        <a href="#"><img src="https://img.icons8.com/cute-clipart/48/000000/instagram-new.png"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="https://img.icons8.com/color/48/000000/gmail.png"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-sm-0 mt-5 w3_agileits-team1">
                        <img class="img-fluid" src="images/user.png" alt="">
                        <div class="team-info">
                            <h5 class="">Blanton</h5>
                            <p>Technical Support</p>
                            <div class="social-icons">
                                <ul>
                                    <li>
                                        <a href="#"><img src="https://img.icons8.com/color/48/000000/twitter.png"></a>
                                    </li>
                                    <li class="mx-1">
                                        <a href="#"><img src="https://img.icons8.com/cute-clipart/48/000000/instagram-new.png"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="https://img.icons8.com/color/48/000000/gmail.png"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-lg-0 mt-5 w3_agileits-team1">
                        <img class="img-fluid" src="images/user.png" alt="">
                        <div class="team-info">
                            <h5 class=""> Bass</h5>
                            <p> General Manager</p>
                            <div class="social-icons">
                                <ul>
                                    <li>
                                        <a href="#"><img src="https://img.icons8.com/color/48/000000/twitter.png"></a>
                                    </li>
                                    <li class="mx-1">
                                        <a href="#"><img src="https://img.icons8.com/cute-clipart/48/000000/instagram-new.png"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="https://img.icons8.com/color/48/000000/gmail.png"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mt-lg-0 mt-5 w3_agileits-team1">
                        <img class="img-fluid" src="images/shee.jpg" alt="">
                        <div class="team-info">
                            <h5 class=""> Sharon Gakii</h5>
                            <p>Lorem ipsum</p>
                            <div class="social-icons">
                                <ul>
                                    <li>
                                        <a href="#"><img src="https://img.icons8.com/color/48/000000/twitter.png"></a>
                                    </li>
                                    <li class="mx-1">
                                        <a href="#"><img src="https://img.icons8.com/cute-clipart/48/000000/instagram-new.png"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="https://img.icons8.com/color/48/000000/gmail.png"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
</section>
<!--team -->

<!-- contact -->
<div class="contact py-5" id="contact">
    <div class="py-3">
        <div class="head_part">
            <h3 class="heading" style="text-align: center">GET IN TOUCH</h3>
            <p class="heading-bottom mb-5">Location</p>
        </div>
        <div class="row agile-contact-form">
            <div class="col-md-6 contact-form-left">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3464.355005280573!2d35.248152225916215!3d0.5469851749230928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x178100d1ca86abff%3A0xb74a21f90eb70745!2sMoi%20University%20West%20Campus!5e1!3m2!1sen!2ske!4v1570189170008!5m2!1sen!2ske" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
            <div class="col-md-6 mt-md-0 mt-5 contact-form-right">
                <div class="agileinfo-contact-form-grid">
                    <form action="" method="post">
                        <input type="text" name="subject" id="subject" placeholder="Subject" required="">
                        <textarea name="message" id="message" placeholder="Message" required=""></textarea>
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="SUBMIT">
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div></div>
<!-- //contact -->
<?php require_once 'footer.php';?>
