<!DOCTYPE html>
<html lang="en">

<title>PaySuccess App </title>


<!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!--<meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
<meta name="author" content="codedthemes" />!-->

<link rel="icon" href="http://html.codedthemes.com/gradient-able/files/assets/images/favicon.ico" type="image/x-icon">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">

<!-- <link rel="stylesheet" type="text/css" href="../files/bower_components/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../files/assets/icon/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="../files/assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="../files/assets/icon/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="../files/assets/css/style.css"> -->
<?php echo $this->Html->css(array('bower_components/bootstrap/css/bootstrap.min','icon/themify-icons/themify-icons','icon/icofont/css/icofont','icon/font-awesome/css/font-awesome.min','style','custom')); ?>
</head>
<body class="fix-menu">

<div class="theme-loader">
<div class="loader-track">
<div class="loader-bar"></div>
</div>
</div>

<section class="login p-fixed d-flex text-center bg-primary common-img-bg">

<div class="container">
<div class="row">
<div class="col-sm-12">

<div class="login-card card-block auth-body mr-auto ml-auto">
<!-- <form class="md-float-material"> -->
<?php echo $this->Form->create(Null, array('url'=>'/users/login','class'=>'md-float-material','autocomplete'=>'off'));  ?>
<div class="text-center">
<!-- <img src="../files/assets/images/logo.png" alt="logo.png"> -->
</div>
<?= $this->Flash->render() ?>
<div class="auth-box">
<div class="row m-b-20">
<div class="col-md-12">
<h3 class="text-left txt-primary">Sign In</h3>
</div>
</div>
<hr />
<div class="input-group">
<!-- <input type="email" class="form-control" placeholder="Your Email Address"> -->
<?php echo $this->Form->control('email', array('type'=>'text','label'=>false,'class'=>'form-control','placeholder'=>'Your email address','templates' => ['inputContainer' => '{{content}}'],'required'=>true)); ?>
<span class="md-line"></span>
</div>

<div class="input-group">
<!-- <input type="password" class="form-control" placeholder="Password"> -->
<?php echo $this->Form->control('password', array('type'=>'password','label'=>false,'class'=>'form-control','placeholder'=>'Password','templates' => ['inputContainer' => '{{content}}'],'required')); ?>
<span class="md-line"></span>
</div>

<!-- <div class="row m-t-25 text-left">
<div class="col-12">
<div class="checkbox-fade fade-in-primary d-">
<label>
<input type="checkbox" value="">
<span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
<span class="text-inverse">Remember me</span>
</label>
</div>
<div class="forgot-phone text-right f-right">
<a href="auth-reset-password.html" class="text-right f-w-600 text-inverse"> Forgot Password?</a>
</div>
</div>
</div> -->
<div class="row m-t-30">
<div class="col-md-12">
<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button>
</div>
</div>
<hr />

</div>
</div>
</form>

</div>

</div>

</div>

</div>

</section>


<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->


<!-- <script src="../files/bower_components/jquery/js/jquery.min.js"></script>
<script src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script src="../files/bower_components/popper.js/js/popper.min.js"></script>
<script src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script src="../files/bower_components/modernizr/js/modernizr.js"></script>
<script src="../files/bower_components/modernizr/js/css-scrollbars.js"></script>

<script src="../files/bower_components/i18next/js/i18next.min.js"></script>
<script src="../files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script src="../files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script src="../files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script src="../files/assets/js/common-pages.js"></script> -->

<?php echo $this->Html->script(array('bower_components/jquery/js/jquery.min','bower_components/jquery-ui/js/jquery-ui.min','bower_components/popper.js/js/popper.min','bower_components/bootstrap/js/bootstrap.min')); ?>

<?php echo $this->Html->script(array('bower_components/jquery-slimscroll/js/jquery.slimscroll',)); ?>

<?php echo $this->Html->script(array('bower_components/modernizr/js/modernizr','bower_components/modernizr/js/css-scrollbars')); ?>

<?php echo $this->Html->script(array('bower_components/i18next/js/i18next.min','bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min','bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min','bower_components/jquery-i18next/js/jquery-i18next.min','common-pages')); ?>
</body>


</html>
