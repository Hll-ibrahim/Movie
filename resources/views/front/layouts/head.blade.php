<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous"
    />
    <title>Anasayfa</title>
    <style>
        #main-footer {
            position: relative;
            bottom: 0;
            width: 100%;
            height: 10rem;
            background-color: #111;
            color: #fff;
        }
        .jumbotron {
            padding-top: 7rem;
        }
    </style>
</head>
<body>
<nav
    class="navbar fixed-top bg-dark navbar-dark navbar-expand-sm"
    style="border-bottom: 0.1em solid white; opacity: 0.8"
>
    <div class="container">
        <a href="#" class="navbar-brand">Logo</a>

        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navMenu"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{route('index')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Services</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="jumbotron bg-dark jumbotron-dark padding text-white">
    <div class="container">
        <div class="col-lg-6">
            <h1 class="display-4"><i>Title of a longer featured blog spot</i></h1>
            <p class="lead my-3">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi,
                iure! Lorem
            </p>
            <p class="lead mb-0">
                <a href="#" class="text-white"><strong>Read more..</strong></a>
            </p>
        </div>
    </div>
</header>

<main class="container">
    <div class="row">
        <div class="col-lg-8 pr-5">
            <div class="row">
