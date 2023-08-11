<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('dashboard/bootstrap.min.css')}}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{asset('dashboard/style.css')}}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('dashboard/responsive.css')}}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{asset('dashboard/bootstrap-select.css')}}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('dashboard/perfect-scrollbar.css')}}" />
    <!--[if lt IE 9]>


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{URL::asset('dashboard/style.css')}}"/>

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /*------------------------------------------------------------------
    File Name: responsive.css
    Template Name: Pluto - Responsive HTML5 Template
    Created By: html.design
    Envato Profile: https://themeforest.net/user/htmldotdesign
    Website: https://html.design
    Version: 1.0
-------------------------------------------------------------------*/


        /*-----------------------------------
          sidebar small only desktop
        -----------------------------------*/
        @media (min-width: 1200px) {
            /*-- small sidebar --*/
            #sidebar.active {
                min-width: 90px;
                max-width: 90px;
                text-align: center;
            }
            #sidebar.active .sidebar-header h3,
            #sidebar.active .CTAs {
                display: none;
            }
            #sidebar.active .sidebar-header strong {
                display: block;
            }
            #sidebar.active ul li a {
                padding: 10px 0;
                float: left;
                width: 100%;
                text-align: center;
            }
            #sidebar.active ul li a i {
                width: 100%;
                text-align: center;
                margin: 0 0 5px 0;
                font-size: 24px;
            }
            #sidebar.active ul ul a {
                padding: 10px !important;
            }
            #sidebar.active .dropdown-toggle::after {
                display: none;
            }
            nav#sidebar.active .logo_big {
                text-align: center;
                padding: 8px 0 7px;
            }
            #sidebar.active .logo_big img {
                height: 45px;
            }
            #sidebar.active .logo_section {
                padding: 0;
                margin-bottom: 10px;
                background: #fff;
                width: 100%;
            }
            #sidebar.active ul.components {
                padding: 0;
            }
            #sidebar.active .logo_big {
                display: none;
            }
            .logo_icon {
                display: none;
            }
            #sidebar.active .logo_icon {
                display: block;
            }
            #sidebar.active .logo_big img {
                height: 45px;
            }
            #sidebar.active h4 {
                display: none;
            }
            #sidebar.active .sidebar_user_info {
                display: none;
            }
            #sidebar.active ul li a span {
                font-size: 13px;
            }
            #sidebar ul li a i {}
        }


        /*-----------------------------------
          end sidebar small only desktop
        -----------------------------------*/

        @media (min-width: 1200px) and (max-width: 1600px) {
            .counter_section {
                display: block;
            }
            .couter_icon {
                display: block;
                width: 100%;
            }
            .couter_icon>div {
                padding-right: 0;
            }
            .counter_no p.total_no {
                text-align: center;
            }
            .counter_no .head_couter {
                text-align: center;
                font-size: 16px;
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .counter_section {
                display: block;
            }
            .couter_icon {
                display: block;
                width: 100%;
            }
            .couter_icon>div {
                padding-right: 0;
            }
            .counter_no p.total_no {
                text-align: center;
            }
            .counter_no .head_couter {
                text-align: center;
                font-size: 16px;
            }
            .dashboard_2 .social_cont ul li {
                padding: 0;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            body {
                overflow-x: hidden;
            }
            .container {
                width: 100%;
                padding: 0 20px;
            }
            .info_people .user_info_cont {
                width: 60%;
                padding-left: 30px;
                padding-top: 0;
            }
            .fw_icon {
                width: 33.33%;
            }
        }

        @media (max-width: 575px) {
            body {
                overflow-x: hidden;
            }
            .container {
                width: 100%;
                padding: 0 20px;
            }
            .padding_infor_info {
                padding: 20px 20px;
            }
            .payment_option li {
                margin-bottom: 10px;
            }
        }

        @media (min-width: 576px) and (max-width: 767px) {
            body {
                overflow-x: hidden;
            }
            .container {
                width: 100%;
                padding: 0 20px;
            }
        }

        @media (max-width: 575px) {
            body {
                overflow-x: hidden;
            }
            .container {
                width: 100%;
                padding: 0 20px;
            }
        }

        @media (max-width: 1199px) {
            * {
                box-sizing: border-box;
            }
            #sidebar {
                min-width: 80px;
                max-width: 80px;
                text-align: center;
                margin-left: -80px !important;
            }
            #sidebar.active {
                margin-left: 0 !important;
            }
            #sidebar .sidebar-header h3,
            #sidebar .CTAs {
                display: none;
            }
            #sidebar .sidebar-header strong {
                display: block;
            }
            /*-- responsive --*/
            #sidebar.active+#content .topbar {
                transition: ease all 0.3s;
            }
            .topbar {
                padding-left: 0;
                min-width: 320px;
            }
            #sidebar.active+#content .topbar {
                padding-left: 0;
                min-width: 320px;
                left: 250px;
            }
            #content {
                padding: 60px 15px 25px 15px;
            }
            #sidebar.active {
                min-width: 250px;
                max-width: 250px;
                text-align: left;
            }
            #sidebar.active+#content {
                padding-left: 0;
                left: 250px;
                position: relative;
                min-width: 320px;
                height: auto;
                transition: ease all 0.3s;
            }
            .right_topbar .icon_info ul.user_profile_dd {
                display: none;
            }
            .right_topbar {
                float: right;
                padding: 0;
                margin: 5px 15px 5px 0;
            }
            .sidebar_toggle {
                padding: 14px 22px 13px;
            }
            .logo_section img {
                height: 38px;
                padding: 0;
                margin: 12px 0 0 15px;
            }
            .icon_info ul li {
                width: 30px;
            }
            .icon_info ul li a {
                font-size: 16px;
            }
            .logo_section img.logo_icon {
                display: none;
            }
        }

        @media (max-width: 350px) {
            .icon_info ul li {
                margin: 15px 0 0 0;
            }
        }

        @media (max-width: 767px) {
            .counter_section {
                padding: 30px 25px;
            }
            .counter_no {
                padding: 0;
            }
            .counter_no .head_couter {
                font-size: 16px;
            }
            #testimonial_slider.carousel .carousel-control {
                top: -35px;
            }
            .content.testimonial {
                margin-top: 50px;
            }
            #testimonial_slider.carousel .testimonial {
                font-size: 13px;
                line-height: normal;
            }
            .progress_bar {
                padding: 15px 25px 50px 25px;
            }
            .dash_head {
                padding: 30px 30px 25px;
            }
            .task_list li {
                padding: 20px 30px;
            }
            .task_list li a {
                color: #99abb4;
                font-size: 15px;
                line-height: normal;
                margin-bottom: 10px;
                float: left;
                width: 100%;
            }
            .msg_list_main ul li {
                display: block;
            }
            .msg_list_main ul li>span:nth-child(1) {
                margin-right: 20px;
                margin-bottom: 10px;
            }
            /*----- widgets page css -----*/
            .info_people {
                padding: 25px;
                display: block;
            }
            .info_people .p_info_img {
                width: 100%;
                text-align: center;
            }
            .info_people .p_info_img img {
                width: 90px;
            }
            .info_people .user_info_cont {
                width: 100%;
                padding-left: 0;
                padding-top: 25px;
                text-align: center;
            }
            .calendar {
                overflow: auto;
            }
            /** accordian css **/
            .tab_style3 .tabbar {
                display: block;
            }
            .tab_style3 #v-pills-tabContent {
                width: 100%;
                padding-left: 0;
                padding-right: 0;
                padding-top: 25px;
            }
            .pagination.button_section {
                display: block;
            }
            .pagination.button_section .btn-group {
                margin: 5px 0 0;
            }
            .fw_icon {
                width: 50%;
            }
            /**-- email page --**/
            .mail-box {
                float: left;
                width: 100%;
            }
            .mail-box .sm-side {
                width: 100%;
                float: left;
            }
            .mail-box .lg-side {
                background: none repeat scroll 0 0 #fff;
                border-radius: 0 4px 4px 0;
                width: 100%;
                float: left;
                overflow: auto;
            }
            aside.lg-side .inbox-body {
                min-width: 565px;
                padding-left: 0;
                padding-right: 0;
            }
            .table.table-striped.projects {
                min-width: 780px;
            }
            /** login page **/
            .full_height {
                height: auto;
            }
            .login_section {
                margin-top: 25px;
                margin-bottom: 25px;
            }
            .login_form form .field input {
                max-width: 395px;
                width: 100%;
            }
            .login_form form .field label.label_field {
                text-align: left;
            }
            .login_form form .field {
                display: block;
                margin: 0 0 20px;
                float: left;
                width: 100%;
            }
            .label_field.hidden {
                display: none;
            }
            .login_form form .field .form-check-label {
                float: left;
                width: 100%;
            }
            .forgot {
                float: left;
            }
            .error_page h3 {
                font-size: 36px;
                line-height: 45px;
            }
        }

        @media (max-width: 420px) {
            .model_bt {
                padding: 11px 0 10px;
                width: 100%;
            }
            .fw_icon {
                width: 100%;
            }
            aside .inbox-head .position.search_inbox {
                display: none;
            }
            .contact_inner .left {
                width: 100%;
                float: left;
                padding-right: 0;
                margin-bottom: 20px;
            }
            .contact_inner .right {
                width: 100%;
                float: left;
            }
            .bottom_list .right_button {
                float: right;
                display: flex;
            }
            .bottom_list .right_button button {
                margin: 0 0 0 5px;
            }
            .dis_flex {
                display: block;
                margin: 0;
            }
            .dis_flex .profile_img {
                width: 100%;
                text-align: center;
                margin: 0;
                margin-bottom: 20px;
            }
        }
        /*------------------------------------------------------------------
            File Name: responsive.css
            Template Name: Pluto - Responsive HTML5 Template
            Created By: html.design
            Envato Profile: https://themeforest.net/user/htmldotdesign
            Website: https://html.design
            Version: 1.0
        -------------------------------------------------------------------*/


        /*-----------------------------------
          sidebar small only desktop
        -----------------------------------*/

        @media (min-width: 1200px) {
            /*-- small sidebar --*/
            #sidebar.active {
                min-width: 90px;
                max-width: 90px;
                text-align: center;
            }
            #sidebar.active .sidebar-header h3,
            #sidebar.active .CTAs {
                display: none;
            }
            #sidebar.active .sidebar-header strong {
                display: block;
            }
            #sidebar.active ul li a {
                padding: 10px 0;
                float: left;
                width: 100%;
                text-align: center;
            }
            #sidebar.active ul li a i {
                width: 100%;
                text-align: center;
                margin: 0 0 5px 0;
                font-size: 24px;
            }
            #sidebar.active ul ul a {
                padding: 10px !important;
            }
            #sidebar.active .dropdown-toggle::after {
                display: none;
            }
            nav#sidebar.active .logo_big {
                text-align: center;
                padding: 8px 0 7px;
            }
            #sidebar.active .logo_big img {
                height: 45px;
            }
            #sidebar.active .logo_section {
                padding: 0;
                margin-bottom: 10px;
                background: #fff;
                width: 100%;
            }
            #sidebar.active ul.components {
                padding: 0;
            }
            #sidebar.active .logo_big {
                display: none;
            }
            .logo_icon {
                display: none;
            }
            #sidebar.active .logo_icon {
                display: block;
            }
            #sidebar.active .logo_big img {
                height: 45px;
            }
            #sidebar.active h4 {
                display: none;
            }
            #sidebar.active .sidebar_user_info {
                display: none;
            }
            #sidebar.active ul li a span {
                font-size: 13px;
            }
            #sidebar ul li a i {}
        }


        /*-----------------------------------
          end sidebar small only desktop
        -----------------------------------*/

        @media (min-width: 1200px) and (max-width: 1600px) {
            .counter_section {
                display: block;
            }
            .couter_icon {
                display: block;
                width: 100%;
            }
            .couter_icon>div {
                padding-right: 0;
            }
            .counter_no p.total_no {
                text-align: center;
            }
            .counter_no .head_couter {
                text-align: center;
                font-size: 16px;
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .counter_section {
                display: block;
            }
            .couter_icon {
                display: block;
                width: 100%;
            }
            .couter_icon>div {
                padding-right: 0;
            }
            .counter_no p.total_no {
                text-align: center;
            }
            .counter_no .head_couter {
                text-align: center;
                font-size: 16px;
            }
            .dashboard_2 .social_cont ul li {
                padding: 0;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            body {
                overflow-x: hidden;
            }
            .container {
                width: 100%;
                padding: 0 20px;
            }
            .info_people .user_info_cont {
                width: 60%;
                padding-left: 30px;
                padding-top: 0;
            }
            .fw_icon {
                width: 33.33%;
            }
        }

        @media (max-width: 575px) {
            body {
                overflow-x: hidden;
            }
            .container {
                width: 100%;
                padding: 0 20px;
            }
            .padding_infor_info {
                padding: 20px 20px;
            }
            .payment_option li {
                margin-bottom: 10px;
            }
        }

        @media (min-width: 576px) and (max-width: 767px) {
            body {
                overflow-x: hidden;
            }
            .container {
                width: 100%;
                padding: 0 20px;
            }
        }

        @media (max-width: 575px) {
            body {
                overflow-x: hidden;
            }
            .container {
                width: 100%;
                padding: 0 20px;
            }
        }

        @media (max-width: 1199px) {
            * {
                box-sizing: border-box;
            }
            #sidebar {
                min-width: 80px;
                max-width: 80px;
                text-align: center;
                margin-left: -80px !important;
            }
            #sidebar.active {
                margin-left: 0 !important;
            }
            #sidebar .sidebar-header h3,
            #sidebar .CTAs {
                display: none;
            }
            #sidebar .sidebar-header strong {
                display: block;
            }
            /*-- responsive --*/
            #sidebar.active+#content .topbar {
                transition: ease all 0.3s;
            }
            .topbar {
                padding-left: 0;
                min-width: 320px;
            }
            #sidebar.active+#content .topbar {
                padding-left: 0;
                min-width: 320px;
                left: 250px;
            }
            #content {
                padding: 60px 15px 25px 15px;
            }
            #sidebar.active {
                min-width: 250px;
                max-width: 250px;
                text-align: left;
            }
            #sidebar.active+#content {
                padding-left: 0;
                left: 250px;
                position: relative;
                min-width: 320px;
                height: auto;
                transition: ease all 0.3s;
            }
            .right_topbar .icon_info ul.user_profile_dd {
                display: none;
            }
            .right_topbar {
                float: right;
                padding: 0;
                margin: 5px 15px 5px 0;
            }
            .sidebar_toggle {
                padding: 14px 22px 13px;
            }
            .logo_section img {
                height: 38px;
                padding: 0;
                margin: 12px 0 0 15px;
            }
            .icon_info ul li {
                width: 30px;
            }
            .icon_info ul li a {
                font-size: 16px;
            }
            .logo_section img.logo_icon {
                display: none;
            }
        }

        @media (max-width: 350px) {
            .icon_info ul li {
                margin: 15px 0 0 0;
            }
        }

        @media (max-width: 767px) {
            .counter_section {
                padding: 30px 25px;
            }
            .counter_no {
                padding: 0;
            }
            .counter_no .head_couter {
                font-size: 16px;
            }
            #testimonial_slider.carousel .carousel-control {
                top: -35px;
            }
            .content.testimonial {
                margin-top: 50px;
            }
            #testimonial_slider.carousel .testimonial {
                font-size: 13px;
                line-height: normal;
            }
            .progress_bar {
                padding: 15px 25px 50px 25px;
            }
            .dash_head {
                padding: 30px 30px 25px;
            }
            .task_list li {
                padding: 20px 30px;
            }
            .task_list li a {
                color: #99abb4;
                font-size: 15px;
                line-height: normal;
                margin-bottom: 10px;
                float: left;
                width: 100%;
            }
            .msg_list_main ul li {
                display: block;
            }
            .msg_list_main ul li>span:nth-child(1) {
                margin-right: 20px;
                margin-bottom: 10px;
            }
            /*----- widgets page css -----*/
            .info_people {
                padding: 25px;
                display: block;
            }
            .info_people .p_info_img {
                width: 100%;
                text-align: center;
            }
            .info_people .p_info_img img {
                width: 90px;
            }
            .info_people .user_info_cont {
                width: 100%;
                padding-left: 0;
                padding-top: 25px;
                text-align: center;
            }
            .calendar {
                overflow: auto;
            }
            /** accordian css **/
            .tab_style3 .tabbar {
                display: block;
            }
            .tab_style3 #v-pills-tabContent {
                width: 100%;
                padding-left: 0;
                padding-right: 0;
                padding-top: 25px;
            }
            .pagination.button_section {
                display: block;
            }
            .pagination.button_section .btn-group {
                margin: 5px 0 0;
            }
            .fw_icon {
                width: 50%;
            }
            /**-- email page --**/
            .mail-box {
                float: left;
                width: 100%;
            }
            .mail-box .sm-side {
                width: 100%;
                float: left;
            }
            .mail-box .lg-side {
                background: none repeat scroll 0 0 #fff;
                border-radius: 0 4px 4px 0;
                width: 100%;
                float: left;
                overflow: auto;
            }
            aside.lg-side .inbox-body {
                min-width: 565px;
                padding-left: 0;
                padding-right: 0;
            }
            .table.table-striped.projects {
                min-width: 780px;
            }
            /** login page **/
            .full_height {
                height: auto;
            }
            .login_section {
                margin-top: 25px;
                margin-bottom: 25px;
            }
            .login_form form .field input {
                max-width: 395px;
                width: 100%;
            }
            .login_form form .field label.label_field {
                text-align: left;
            }
            .login_form form .field {
                display: block;
                margin: 0 0 20px;
                float: left;
                width: 100%;
            }
            .label_field.hidden {
                display: none;
            }
            .login_form form .field .form-check-label {
                float: left;
                width: 100%;
            }
            .forgot {
                float: left;
            }
            .error_page h3 {
                font-size: 36px;
                line-height: 45px;
            }
        }

        @media (max-width: 420px) {
            .model_bt {
                padding: 11px 0 10px;
                width: 100%;
            }
            .fw_icon {
                width: 100%;
            }
            aside .inbox-head .position.search_inbox {
                display: none;
            }
            .contact_inner .left {
                width: 100%;
                float: left;
                padding-right: 0;
                margin-bottom: 20px;
            }
            .contact_inner .right {
                width: 100%;
                float: left;
            }
            .bottom_list .right_button {
                float: right;
                display: flex;
            }
            .bottom_list .right_button button {
                margin: 0 0 0 5px;
            }
            .dis_flex {
                display: block;
                margin: 0;
            }
            .dis_flex .profile_img {
                width: 100%;
                text-align: center;
                margin: 0;
                margin-bottom: 20px;
            }
        }

    </style>
</head>
<body class="dashboard dashboard_1">
<div class="full_container">
    <div class="inner_container">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar_blog_2">
                <h4>Filmler</h4>
                <ul class="">
                    <li>
                        <a href="{{route('admin.movies')}}"><span>Bütün Filmler</span></a>
                    </li>
                </ul>
                <h4>Yönetmenler</h4>
                <ul class="">
                    <li>
                        <a href="{{route('admin.directors')}}"><span>Bütün Yönetmenler</span></a>
                    </li>
                    <li>
                        <a href="{{route('admin.director.create')}}"><span>Yönetmen Ekle</span></a>
                    </li>
                </ul>
                <ul class="">
                    <h4>Diğer Ayarlar</h4>
                    <li>
                        <a href="{{route('admin.categories.index')}}"><span>Kategoriler</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- end sidebar -->
        <!-- right content -->
        <div id="content">
            <!-- topbar -->
            <div class="topbar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fas fa-bars"></i></button>
                        <div class="logo_section m-3">
                            <a href="{{route('admin.home')}}"><i class="fas fa-2x fa-home"></i></a>
                        </div>
                        <div class="logo_section m-3">
                            <a href="{{route('admin.logout')}}" class=""><i class="fa-solid fa-2x fa-right-from-bracket"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
