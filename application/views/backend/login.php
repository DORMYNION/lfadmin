<?php
$system_name  = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$header_logo  = $this->frontend_model->get_frontend_general_settings('header_logo');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Creativeitem" />
    <meta name="description" content="<?php echo get_settings('system_name'); ?>" />
    <meta name="author" content="Creativeitem" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link name="favicon" type="image/x-icon" href="<?php echo base_url(); ?>uploads/frontend/<?php echo $header_logo; ?>" rel="shortcut icon" />
    <title>Lifeforte Portal login | <?php echo get_settings('system_name'); ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/frontend/<?php echo $header_logo; ?>" />

    <!-- font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/i-con.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/theme.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/media.css'); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login1/typography.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login1/responsive.css'); ?>" />


    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-icons/entypo/css/entypo.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">
</head>

<body class="layout-column  pace-running pace-done" data-class="" cz-shortcut-listen="true">
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace pace-active">
        <div class="pace-progress" style="transform: translate3d(99.9999%, 0px, 0px);" data-progress-text="99%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>

    <header id="header" class="page-header box-shadow animate fadeInDown sticky bg-white" data-class="bg-white">
        <div class="navbar navbar-expand-lg">
            <a href="http://localhost/" class="navbar-brand">
                <img src="<?php echo base_url('assets/login/logo.png'); ?>" class="brand-logo logo-light" alt="LF Connect Logo">
                <img src="<?php echo base_url('assets/login/logo.png'); ?>" class="brand-logo logo-dark" alt="LF Connect Logo">
            </a>
        </div>
    </header>

    <!-- ############ Content START-->
    <div id="content" class="flex blur-background">
        <div class="page-container create-holder" id="page-container">
            <div class="blur verify-illustration"></div>
            <div id="content-container">
                <div class="page-layout col-md-12">
                    <div class="row vertical-center account-create">
                        <div class="col-md-6 register-illustration">
                            <div class="entry-illustration signup">
                                <img src="<?php echo base_url('assets/login/slide-1'); ?>.jpg">
                            </div>
                        </div>
                        <div class="col-md-6 white-bg">
                            <div class="login-fancy pb-40 clearfix" id="login_area">
                                <h5 class="my-3 text-lg">Welcome to Lifeforte Portal</h5>
                                <p class="text-md mb-4">Sign in by entering the information below</p>
                                <!-- <h3 class="mb-30"><?php echo get_phrase('login'); ?></h3> -->
                                <form action="<?php echo site_url('login/validate_login'); ?>" method="post">
                                    <div class="section-field mb-20">
                                        <label class="mb-10" for="name"><?php echo get_phrase('email'); ?>* </label>
                                        <input id="email" class="web form-control" type="email" placeholder="<?php echo get_phrase('email'); ?>" name="email" required>
                                    </div>
                                    <div class="section-field mb-20">
                                        <label class="mb-10" for="Password"><?php echo get_phrase('password'); ?>* </label>
                                        <input id="Password" class="Password form-control" type="password" placeholder="<?php echo get_phrase('password'); ?>" name="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-full"><?php echo get_phrase('login'); ?></button>
                                </form>

                                <div class="section-field">
                                    <div class="remember-checkbox mb-30">
                                        <a href="#" class="float-right" id="forgot_password_button" onclick="toggleView(this)"><?php echo get_phrase('forgot_password'); ?>?</a>

                                        <?php /*<a href="<?php echo base_url(); ?>" class="float-left">
                                            <i class="entypo-left-open"></i><?php echo get_phrase('back_to_website'); ?></a>*/ ?>
                                    </div>
                                </div>
                            </div>

                            <div class="login-fancy pb-40 clearfix" id="forgot_password_area" style="display: none;">
                                <h3 class="mb-30"><?php echo get_phrase('forgot_password'); ?></h3>
                                <form class="" action="<?php echo site_url('login/reset_password'); ?>" method="post">
                                    <div class="section-field mb-20">
                                        <label class="mb-10" for="name"><?php echo get_phrase('email'); ?>* </label>
                                        <input id="forgot_password_email" class="web form-control" type="email" placeholder="<?php echo get_phrase('email'); ?>" name="email" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><?php echo get_phrase('send_mail'); ?></button>
                                </form>

                                <div class="section-field">
                                    <div class="remember-checkbox mb-30">
                                        <a href="#" class="float-right" id="login_button" onclick="toggleView(this)"><?php echo get_phrase('back_to_login'); ?>?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php /*<div class="col-md-6">
                            <div class="p-6 register-content">
                                <div class="" style="color: #c1c1c1; font-size: 9px">Please log on to use the internet hotspot service<br>
                                </div>
                                <h5 class="mb-3 text-lg">Welcome!</h5>
                                <p class="text-md mb-4">Sign in by entering the information below</p>


                                <form name="sendin" action="http://lf.connect/login" method="post">
                                    <input type="hidden" name="username">
                                    <input type="hidden" name="password">
                                    <input type="hidden" name="dst" value="">
                                    <input type="hidden" name="popup" value="true">
                                </form>

                                <script type="text/javascript" src="<?php echo base_url('assets/login/md5.js'); ?>"></script>
                                <script type="text/javascript">
                                    <!--
                                    function doLogin() {
                                        document.sendin.username.value = document.login.username.value;
                                        document.sendin.password.value = hexMD5('\314' + document.login.password.value + '\076\102\155\102\100\271\163\166\233\135\050\301\216\271\006\114');
                                        document.sendin.submit();
                                        return false;
                                    }
                                    //
                                    -->
                                </script>


                                <form name="login" role="form" action="http://lf.connect/login" method="post" onsubmit="return doLogin()">
                                    <input type="hidden" name="dst" value="">
                                    <input type="hidden" name="popup" value="true">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Enter username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button name="login" type="submit" class="btn btn-primary btn-full mb-4">Sign in</button>
                                </form>

                            </div>
                        </div> */ ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ############ Main END-->
    <!-- ############ Content END-->
    <footer class="mt-0">
        <div class="container">
            <div class="row mt-0 d-flex justify-content-between">
                <a href="http://www.lifeforte.org/" role="link" class="footer-logo">
                    <img src="<?php echo base_url('assets/login/logo.png'); ?>" alt="footer logo" class="show-dark">
                    <img src="<?php echo base_url('assets/login/logo.png'); ?>" alt="footer logo" class="show-light">
                </a>
                <ul class="nav pl-5">
                    <!-- <li class="nav-link">
              <a href="#">Mission &amp; Vision</a>
            </li> -->
                    <li class="nav-link">
                        <a href="http://lf.connect/support.html">Support</a>
                    </li>

                    <li class="nav-link">
                        <a href="#">Terms of Use</a>
                    </li>
                    <li class="nav-link">
                        <a href="#">Privacy Policy</a>
                    </li>
                </ul>
                <ul class="nav social-media justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.facebook.com/lifeforteschool/">
                            <svg xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" width="21px" height="16px" viewBox="0 0 21 40" version="1.1">
                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                <title>transcorp-facebook.1</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Sign-in" transform="translate(-158.000000, -278.000000)" fill="#fff" fill-rule="nonzero">
                                        <g id="transcorp-facebook.1" transform="translate(158.142857, 278.000000)">
                                            <path d="M4.62542343,22.105 L4.62542343,40 L13.383294,40 L13.383294,22.19 L19.3618863,22.19 L20.8093749,14.765 L13.4461737,14.765 L13.4461737,9.31875 C13.4461737,8.56625 13.8498606,7.56125 15.0760129,7.56125 L19.3317043,7.56125 L19.3317043,0 L11.3849803,0 C8.64217229,0 4.59524114,3.35625 4.59524114,6.925 L4.59524114,14.55375 L0,14.55375 L0,22.07375 L4.62542343,22.105 Z" id="Fill-1"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://twitter.com/">
                            <svg xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" width="48px" height="40px" viewBox="0 0 48 40" version="1.1">
                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                <title>transcorp-twitter.1</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Sign-in" transform="translate(-399.000000, -278.000000)" fill="#ffffff" fill-rule="nonzero">
                                        <g id="transcorp-twitter.1" transform="translate(399.000000, 278.000000)">
                                            <path d="M47.2727273,4.73583018 C45.5339771,5.53872182 43.6652273,6.08167345 41.7019316,6.32623236 C43.7051135,5.07575164 45.2429545,3.09774655 45.9668182,0.739829091 C44.0936364,1.89648545 42.0165909,2.73629164 39.8080684,3.19003309 C38.0397727,1.22740909 35.5180684,0 32.7289771,0 C27.3723862,0 23.0306818,4.52203345 23.0306818,10.0976698 C23.0306818,10.8897945 23.1148865,11.6603862 23.2818182,12.4002153 C15.2203407,11.977236 8.07477273,7.95816364 3.29136364,1.848804 C2.45670436,3.34076764 1.978068,5.07575164 1.978068,6.92609382 C1.978068,10.4299007 3.69022727,13.5199571 6.29170473,15.3303084 C4.70215927,15.2780127 3.20715927,14.8242713 1.89977273,14.0675229 C1.89829527,14.1090516 1.89829527,14.1521189 1.89829527,14.1936476 C1.89829527,19.0863647 5.24136364,23.1684996 9.67909091,24.0959778 C8.86511382,24.3266938 8.00829564,24.4497425 7.12340909,24.4497425 C6.49852291,24.4497425 5.89136364,24.38668 5.29897745,24.269784 C6.5325,28.2811658 10.1148862,31.2004924 14.3590909,31.282012 C11.0396593,33.9906175 6.8575,35.6040913 2.31340909,35.6040913 C1.53045455,35.6040913 0.759318182,35.557948 0,35.4625855 C4.29147709,38.3280782 9.38954545,40 14.8657953,40 C32.7068182,40 42.4612498,24.6127818 42.4612498,11.2697069 C42.4612498,10.8313465 42.4523862,10.3960625 42.4331818,9.96231636 C44.3285229,8.53956764 45.9727273,6.75997855 47.2727273,4.73583018" id="Fill-4"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://ng.linkedin.com/">
                            <svg xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" width="36px" height="16px" viewBox="0 0 36 36" version="1.1">
                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                <title>transcorp-linkedin</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Sign-in" transform="translate(-490.000000, -280.000000)" fill="#fff" fill-rule="nonzero">
                                        <g id="transcorp-linkedin" transform="translate(487.000000, 278.000000)">
                                            <path d="M15.6868836,21.0046573 C15.6868836,17.9535741 15.5875331,15.4038927 15.4881822,13.2027033 L21.998572,13.2027033 L22.3457149,16.6046492 L22.4941564,16.6046492 C23.4794811,15.0032454 25.896624,12.6538876 29.9407796,12.6538876 C34.8720785,12.6538876 38.5714291,16.0048636 38.5714291,23.207032 L38.5714291,37.6623385 L31.0745458,37.6623385 L31.0745458,24.1078957 C31.0745458,20.9572434 29.9875331,18.8058386 27.2758447,18.8058386 C25.2058447,18.8058386 23.9738967,20.255518 23.4303902,21.6565981 C23.2328578,22.1568145 23.1837669,22.8561693 23.1837669,23.5567093 L23.1837669,37.6623385 L15.6868836,37.6623385 L15.6868836,21.0046573 Z M3.70519527,37.659968 L11.2020785,37.659968 L11.2020785,13.2027033 L3.70519527,13.2027033 L3.70519527,37.659968 Z M11.446364,6.39999684 C11.446364,8.49924636 9.916364,10.2002193 7.40220836,10.2002193 C5.03532509,10.2002193 3.50649418,8.49924636 3.50649418,6.39999684 C3.50649418,4.24977735 5.08558509,2.59740364 7.50155891,2.59740364 C9.916364,2.59740364 11.3972731,4.24977735 11.446364,6.39999684 Z" id="Fill-14"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.youtube.com/">
                            <svg xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" width="57px" height="16px" viewBox="0 0 57 40" version="1.1">
                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                <title>youtube-symbol</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Sign-in" transform="translate(-301.000000, -278.000000)" fill-rule="nonzero">
                                        <g id="youtube-symbol" transform="translate(301.000000, 278.000000)">
                                            <path d="M55.6538776,33.6236735 C54.9632653,36.6195918 52.5126531,38.8293878 49.5632653,39.1583673 C42.5779592,39.9395918 35.5085714,39.9436735 28.4677551,39.9395918 C21.4269388,39.9436735 14.3559184,39.9395918 7.36897959,39.1583673 C4.41959184,38.8293878 1.97061224,36.6195918 1.28163265,33.6236735 C0.299591837,29.3559184 0.299591837,24.6987755 0.299591837,20.3061224 C0.299591837,15.9134694 0.311020408,11.2546939 1.29306122,6.98857143 C1.98204082,3.99265306 4.43102041,1.78204082 7.38040816,1.4522449 C14.3673469,0.671836735 21.4383673,0.667755102 28.4791837,0.671836735 C35.5183673,0.667755102 42.5893878,0.671836735 49.5738776,1.4522449 C52.524898,1.78204082 54.9755102,3.99183673 55.6644898,6.98857143 C56.6465306,11.2555102 56.6383673,15.9134694 56.6383673,20.3061224 C56.6383673,24.6987755 56.6359184,29.3567347 55.6538776,33.6236735 Z" id="Shape" fill="#fff"></path>
                                            <path d="M21.1991837,29.0506122 C27.1861224,25.9461224 33.1208163,22.8702041 39.1102041,19.7640816 C33.1028571,16.6293878 27.1697959,13.5355102 21.1991837,10.4195918 C21.1991837,16.6514286 21.1991837,22.8195918 21.1991837,29.0506122 Z" id="Shape" fill="#000"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.instagram.com/lifeforte_intl/">
                            <svg xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" width="40px" height="16px" viewBox="0 0 40 40" version="1.1">
                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                <title>transcorp-instagram.2</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Sign-in" transform="translate(-221.000000, -278.000000)" fill="#fff" fill-rule="nonzero">
                                        <g id="transcorp-instagram.2" transform="translate(221.000000, 278.000000)">
                                            <path d="M20,0 C14.56875,0 13.8875,0.02375 11.75375,0.12 C9.625,0.2175 8.17125,0.55625 6.9,1.05 C5.58375,1.56125 4.46875,2.245 3.3575,3.3575 C2.245,4.46875 1.56125,5.58375 1.05,6.9 C0.555,8.17125 0.2175,9.625 0.12,11.75375 C0.0225,13.8875 0,14.56875 0,20 C0,25.4325 0.0225,26.11375 0.12,28.24625 C0.2175,30.375 0.555,31.82875 1.05,33.10125 C1.56125,34.41625 2.245,35.53125 3.3575,36.64375 C4.46875,37.755 5.58375,38.43875 6.9,38.95 C8.17125,39.445 9.625,39.7825 11.75375,39.88 C13.8875,39.9775 14.56875,40 20,40 C25.43125,40 26.1125,39.9775 28.24625,39.88 C30.375,39.7825 31.82875,39.445 33.1,38.95 C34.41625,38.43875 35.53125,37.755 36.6425,36.64375 C37.755,35.53125 38.43875,34.41625 38.95,33.10125 C39.445,31.82875 39.7825,30.375 39.88,28.24625 C39.9775,26.11375 40,25.4325 40,20 C40,14.56875 39.9775,13.8875 39.88,11.75375 C39.7825,9.625 39.445,8.17125 38.95,6.9 C38.43875,5.58375 37.755,4.46875 36.6425,3.3575 C35.53125,2.245 34.41625,1.56125 33.1,1.05 C31.82875,0.55625 30.375,0.2175 28.24625,0.12 C26.1125,0.02375 25.43125,0 20,0 M20,3.60375 C25.34,3.60375 25.9725,3.62375 28.08125,3.72 C30.03125,3.80875 31.09125,4.135 31.79625,4.40875 C32.72875,4.77125 33.395,5.205 34.095,5.905 C34.795,6.605 35.22875,7.27125 35.59125,8.20375 C35.865,8.90875 36.19125,9.96875 36.28,11.91875 C36.37625,14.0275 36.39625,14.66 36.39625,20 C36.39625,25.34 36.37625,25.9725 36.28,28.08125 C36.19125,30.03125 35.865,31.09125 35.59125,31.79625 C35.22875,32.72875 34.795,33.395 34.095,34.095 C33.395,34.795 32.72875,35.22875 31.79625,35.59125 C31.09125,35.865 30.03125,36.19125 28.08125,36.28 C25.9725,36.37625 25.34,36.39625 20,36.39625 C14.66,36.39625 14.0275,36.37625 11.91875,36.28 C9.96875,36.19125 8.90875,35.865 8.20375,35.59125 C7.27125,35.22875 6.605,34.795 5.905,34.095 C5.205,33.395 4.77125,32.72875 4.40875,31.79625 C4.135,31.09125 3.80875,30.03125 3.72,28.08125 C3.62375,25.9725 3.60375,25.34 3.60375,20 C3.60375,14.66 3.62375,14.0275 3.72,11.91875 C3.80875,9.96875 4.135,8.90875 4.40875,8.20375 C4.77125,7.27125 5.205,6.605 5.905,5.905 C6.605,5.205 7.27125,4.77125 8.20375,4.40875 C8.90875,4.135 9.96875,3.80875 11.91875,3.72 C14.0275,3.62375 14.66,3.60375 20,3.60375" id="Fill-6"></path>
                                            <path d="M20,26.4912067 C16.4155307,26.4912067 13.5090068,23.5848597 13.5090068,20.0006085 C13.5090068,16.4151403 16.4155307,13.5087933 20,13.5087933 C23.5844693,13.5087933 26.4909932,16.4151403 26.4909932,20.0006085 C26.4909932,23.5848597 23.5844693,26.4912067 20,26.4912067 M20,10 C14.476631,10 10,14.4775756 10,20.0006085 C10,25.5236415 14.476631,30 20,30 C25.523369,30 30,25.5236415 30,20.0006085 C30,14.4775756 25.523369,10 20,10" id="Fill-9"></path>
                                            <path d="M33.75,10 C33.75,11.3802083 32.6302082,12.5 31.25,12.5 C29.8697918,12.5 28.75,11.3802083 28.75,10 C28.75,8.61848957 29.8697918,7.5 31.25,7.5 C32.6302082,7.5 33.75,8.61848957 33.75,10" id="Fill-11"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg></a>
                    </li>
                </ul>

            </div>
            <div class="row m-0 p-0">
                <div class="col-md-12">
                    <p class="m-0 p-0 text-center copyright-text">© 2019 LF Connect. All rights reserved</p>
                </div>
            </div>
        </div>
    </footer>




    <!-- ############ LAYOUT END-->


    <!-- jquery -->
    <script src="<?php echo base_url('assets/login1/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/toastr.js'); ?>"></script>
    <script type="text/javascript">
        function toggleView(elem) {
            if (elem.id === 'forgot_password_button') {
                $('#login_area').hide();
                $('#forgot_password_area').show();
            } else if (elem.id === 'login_button') {
                $('#login_area').show();
                $('#forgot_password_area').hide();
            }
        }
    </script>
    <!-- SHOW TOASTR NOTIFIVATION -->
    <?php if ($this->session->flashdata('flash_message') != "") : ?>

        <script type="text/javascript">
            toastr.success('<?php echo $this->session->flashdata("flash_message"); ?>');
        </script>

    <?php endif; ?>

    <?php if ($this->session->flashdata('error_message') != "") : ?>

        <script type="text/javascript">
            toastr.error('<?php echo $this->session->flashdata("error_message"); ?>');
        </script>

    <?php endif; ?>


    <script src="<?php echo base_url('assets/login/jquery_003.js'); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/login/popper.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login/bootstrap.js'); ?>"></script>
    <!-- ajax page -->
    <script src="<?php echo base_url('assets/login/pace.js'); ?>"></script>

    <script src="<?php echo base_url('assets/login/ajax.js'); ?>"></script>
    <!-- lazyload plugin -->
    <script src="<?php echo base_url('assets/login/lazyload.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login/lazyload_002.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login/plugin.js'); ?>"></script>
    <!-- theme -->
    <script src="<?php echo base_url('assets/login/theme.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login/custom.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login/mqttws31.js'); ?>" type="text/javascript"></script>

    <script src="<?php echo base_url('assets/login/knockout-min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login/jquery_002.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login/underscore-min.js'); ?>"></script>



</body>

</html>