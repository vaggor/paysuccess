<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.codedthemes.com/gradient-able/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Oct 2019 20:08:43 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>PaySuccess </title>


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

<link rel="stylesheet" type="text/css" href="../files/assets/icon/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="../files/assets/css/jquery.mCustomScrollbar.css">

<link rel="stylesheet" href="../files/assets/pages/chart/radial/css/radial.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="../files/assets/css/style.css"> -->

<?php 
$dashbord = array('dashbord');
$form = array('checkout','newUser','editUser');
$table = array('index','add_credit_history','pending_applications','approved_applications','completed_applications','view_detail','leader_change_status','list_enabled','id_types','marital_status','loan_purposes','living_conditions','export_pdf','currencies','locations','add_property_in_possesion','add_guarantors');
if(in_array($this->request->getParam('action'), $dashbord)){
	echo $this->Html->css(array('bower_components/bootstrap/css/bootstrap.min','icon/themify-icons/themify-icons','icon/font-awesome/css/font-awesome.min','jquery.mCustomScrollbar','pages/chart/radial/css/radial','style','custom'));
}
elseif(in_array($this->request->getParam('action'), $form)){
	echo $this->Html->css(array('bower_components/bootstrap/css/bootstrap.min','icon/themify-icons/themify-icons','iicon/icofont/css/icofont','icon/font-awesome/css/font-awesome.min','pages/advance-elements/css/bootstrap-datetimepicker','bower_components/bootstrap-daterangepicker/css/daterangepicker','bower_components/datedropper/css/datedropper.min','bower_components/spectrum/css/spectrum','bower_components/jquery-minicolors/css/jquery.minicolors','style','jquery.mCustomScrollbar'));
}
elseif(in_array($this->request->getParam('action'), $table)){
	echo $this->Html->css(array('bower_components/bootstrap/css/bootstrap.min','icon/themify-icons/themify-icons','icon/font-awesome/css/font-awesome.min','bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min','pages/data-table/css/buttons.dataTables.min','bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min','style','jquery.mCustomScrollbar','custom'));
}
 ?>
</head>
<body>

<div class="theme-loader">
<div class="loader-track">
<div class="loader-bar"></div>
</div>
</div>

<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">
<?php echo $this->element('header'); ?>

<div id="sidebar" class="users p-chat-user showChat">
<div class="had-container">
<div class="card card_main p-fixed users-main">
<div class="user-box">
<div class="chat-search-box">
<a class="back_friendlist">
<i class="fa fa-chevron-left"></i>
</a>
<div class="right-icon-control">
<input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
<div class="form-icon">
<i class="fa fa-search"></i>
</div>
</div>
</div>
<div class="main-friend-list">
<div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
<a class="media-left" href="#!">
<!-- <img class="media-object img-radius img-radius" src="../files/assets/images/avatar-3.jpg" alt="Generic placeholder image "> -->
<?php echo $this->Html->image('images/avatar-3.jpg',array('alt'=>'Generic placeholder image','class'=>'d-flex align-self-center img-radius')); ?>
<div class="live-status bg-success"></div>
</a>
<div class="media-body">
<div class="f-13 chat-header">Josephin Doe</div>
</div>
</div>
<div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
<a class="media-left" href="#!">
<!-- <img class="media-object img-radius" src="../files/assets/images/avatar-2.jpg" alt="Generic placeholder image"> -->
<?php echo $this->Html->image('images/avatar-2.jpg',array('alt'=>'Generic placeholder image','class'=>'d-flex align-self-center img-radius')); ?>
<div class="live-status bg-success"></div>
</a>
<div class="media-body">
<div class="f-13 chat-header">Lary Doe</div>
</div>
</div>
<div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
<a class="media-left" href="#!">
<!-- <img class="media-object img-radius" src="../files/assets/images/avatar-4.jpg" alt="Generic placeholder image"> -->
<?php echo $this->Html->image('images/avatar-4.jpg',array('alt'=>'Generic placeholder image','class'=>'d-flex align-self-center img-radius')); ?>
<div class="live-status bg-success"></div>
</a>
<div class="media-body">
<div class="f-13 chat-header">Alice</div>
</div>
</div>
<div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
 <a class="media-left" href="#!">
<!-- <img class="media-object img-radius" src="../files/assets/images/avatar-3.jpg" alt="Generic placeholder image"> -->
<?php echo $this->Html->image('images/avatar-3.jpg',array('alt'=>'Generic placeholder image','class'=>'d-flex align-self-center img-radius')); ?>
<div class="live-status bg-success"></div>
</a>
<div class="media-body">
<div class="f-13 chat-header">Alia</div>
</div>
</div>
<div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
<a class="media-left" href="#!">
<!-- <img class="media-object img-radius" src="../files/assets/images/avatar-2.jpg" alt="Generic placeholder image"> -->
<?php echo $this->Html->image('images/avatar-2.jpg',array('alt'=>'Generic placeholder image','class'=>'d-flex align-self-center img-radius')); ?>
<div class="live-status bg-success"></div>
</a>
<div class="media-body">
<div class="f-13 chat-header">Suzen</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="showChat_inner">
<div class="media chat-inner-header">
<a class="back_chatBox">
<i class="fa fa-chevron-left"></i> Josephin Doe
</a>
</div>
<div class="media chat-messages">
<a class="media-left photo-table" href="#!">
<!-- <img class="media-object img-radius img-radius m-t-5" src="../files/assets/images/avatar-3.jpg" alt="Generic placeholder image"> -->
<?php echo $this->Html->image('images/avatar-3.jpg',array('alt'=>'Generic placeholder image','class'=>'d-flex align-self-center img-radius')); ?>
</a>
<div class="media-body chat-menu-content">
<div class="">
<p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
<p class="chat-time">8:20 a.m.</p>
</div>
</div>
</div>
<div class="media chat-messages">
<div class="media-body chat-menu-reply">
<div class="">
<p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
<p class="chat-time">8:20 a.m.</p>
</div>
</div>
<div class="media-right photo-table">
<a href="#!">
<!-- <img class="media-object img-radius img-radius m-t-5" src="../files/assets/images/avatar-4.jpg" alt="Generic placeholder image"> -->
<?php echo $this->Html->image('images/avatar-4.jpg',array('alt'=>'Generic placeholder image','class'=>'d-flex align-self-center img-radius')); ?>
</a>
</div>
</div>
<div class="chat-reply-box p-b-20">
<div class="right-icon-control">
<input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
<div class="form-icon">
<i class="fa fa-paper-plane"></i>
</div>
</div>
</div>
</div>

<div class="pcoded-main-container">
<div class="pcoded-wrapper">
<?php echo $this->element('menu'); ?>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<?= $this->fetch('content') ?>
</div>
</div>
</div>
</div>
</div>
</div>


<!--[if lt IE 10]><![endif]-->



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
<script src="../files/assets/pages/widget/excanvas.js"></script>

<script src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script src="../files/bower_components/modernizr/js/modernizr.js"></script>

<script src="../files/assets/js/SmoothScroll.js"></script>
<script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

<script src="../files/bower_components/chart.js/js/Chart.js"></script>
<script src="../files/assets/pages/widget/amchart/amcharts.js"></script>
<script src="../files/assets/pages/widget/amchart/serial.js"></script>
<script src="../files/assets/pages/widget/amchart/light.js"></script>

<script src="../files/assets/js/pcoded.min.js"></script>
<script src="../files/assets/js/vertical/vertical-layout.min.js"></script>


<script src="../files/assets/pages/dashboard/custom-dashboard.js"></script>
<script src="../files/assets/js/script.js"></script>!-->

<?php
//echo $this->Html->script('paystack');
if(in_array($this->request->getParam('action'), $dashbord)){
	echo $this->Html->script(array('bower_components/jquery/js/jquery.min','bower_components/jquery-ui/js/jquery-ui.min','bower_components/popper.js/js/popper.min','bower_components/bootstrap/js/bootstrap.min','pages/widget/excanvas','bower_components/jquery-slimscroll/js/jquery.slimscroll','bower_components/modernizr/js/modernizr','SmoothScroll','jquery.mCustomScrollbar.concat.min','bower_components/chart.js/js/Chart','pages/widget/amchart/amcharts','pages/widget/amchart/serial','pages/widget/amchart/light','pcoded.min','vertical/vertical-layout.min','pages/dashboard/custom-dashboard','script'));
}
elseif(in_array($this->request->getParam('action'), $form)){
	echo $this->Html->script(array('bower_components/jquery/js/jquery.min','bower_components/jquery-ui/js/jquery-ui.min','bower_components/popper.js/js/popper.min','bower_components/bootstrap/js/bootstrap.min','bower_components/jquery-slimscroll/js/jquery.slimscroll','pages/advance-elements/moment-with-locales.min','bower_components/modernizr/js/modernizr','bower_components/modernizr/js/css-scrollbars','pcoded.min','vertical/vertical-layout.min','jquery.mCustomScrollbar.concat.min','script'));
}
elseif(in_array($this->request->getParam('action'), $table)){
	echo $this->Html->script(array('bower_components/jquery/js/jquery.min','bower_components/jquery-ui/js/jquery-ui.min','bower_components/popper.js/js/popper.min','bower_components/bootstrap/js/bootstrap.min'));

	echo $this->Html->script(array('bower_components/jquery-slimscroll/js/jquery.slimscroll'));

	echo $this->Html->script(array('bower_components/modernizr/js/modernizr','bower_components/modernizr/js/css-scrollbars'));

	echo $this->Html->script(array('bower_components/datatables.net/js/jquery.dataTables.min','bower_components/datatables.net-buttons/js/dataTables.buttons.min','pages/data-table/js/jszip.min','pages/data-table/js/pdfmake.min','pages/data-table/js/vfs_fonts','bower_components/datatables.net-buttons/js/buttons.print.min','bower_components/datatables.net-buttons/js/buttons.html5.min','bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min','bower_components/datatables.net-responsive/js/dataTables.responsive.min','bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min'));

	echo $this->Html->script(array('pages/data-table/js/data-table-custom','pcoded.min','vertical/vertical-layout.min','jquery.mCustomScrollbar.concat.min','script'));
}
echo $this->Html->script(array('custom'));
?>
</body>

</html>
