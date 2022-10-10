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
                    <li>
                        <a href="{{route('admin.movie.create')}}"><span>Film Ekle</span></a>
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
                        <a href="{{route('admin.categories')}}"><span>Bütün Kategoriler</span></a>
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
                            <a href="https://www.instagram.com/hll_ibrahim0/"><i class="fa-brands fa-2x fa-instagram"></i></a>
                        </div>
                        <div class="logo_section m-3">
                            <a href="https://github.com/Hll-ibrahim"><i class="fa-brands fa-2x fa-github"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
