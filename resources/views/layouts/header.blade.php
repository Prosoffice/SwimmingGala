<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('css/font-face.css" rel="stylesheet')}}" media="all">
    <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" media="all">

    {{--    Toast--}}
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">
</head>
<body  class="animsition">
@auth
<?php $role_id = auth()->user()->role_id; ?>
@endauth
<div class="page-wrapper">
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="index.html">
                        <img src="images/icon/logo.png" alt="CoolAdmin" />
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="{{ URL::TO("dashboard") }}">
                <h3>Swimming Gala </h3>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">

                @if($role_id==1) {{-- SuperAdmin --}}
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{ URL::TO("dashboard") }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ URL::TO("admin/squads") }}">
                                <i class="fas fa-chart-bar"></i>Squads</a>
                        </li>
                        <li>
                            <a href="{{ URL::TO("admin/parents") }}">
                                <i class="fas fa-users"></i>Parents</a>
                        </li>
                        <li>
                            <a href="{{ URL::TO("admin/coaches") }}">
                                <i class="fas fa-users"></i>Coaches</a>
                        </li>

                        <li>
                            <a href="{{ URL::TO("galas") }}">
                                <i class="fas fa-check-square"></i>Galas</a>
                        </li>

                        <li>
                            <a href="{{ URL::TO("events") }}">
                                <i class="fas fa-calendar-alt"></i>Events</a>
                        </li><br><br><br>

                        <li>
                            <a href="{{ URL::TO("logout") }}">
                                <i class="fas fa-sign-out-alt"></i>Signout</a>
                        </li>
                    
                        
                        
                    </ul>
                @elseif($role_id==2) {{-- Parent --}}
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{ URL::TO("dashboard") }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ URL::TO("update-information") }}?isParent={{ true }}">
                                <i class="fas fa-users"></i>Child info</a>
                        </li>
                        <li>
                            <a href="{{ URL::TO("info") }}?isParent={{ true }}">
                                <i class="fas fa-users"></i>Parent Info</a>
                        </li>
                        <li>
                            <a href="{{ URL::TO("squad-swimmers") }}?isParent={{ true }}">
                                <i class="fas fa-chart-bar"></i>Child Squad</a>
                        </li>

                        <li>
                            <a href="{{ URL::TO("events") }}?isParent={{ true }}">
                                <i class="fas fa-calendar-alt"></i>Child Events</a>
                        </li><br><br><br>

                        <li>
                            <a href="{{ URL::TO("logout") }}">
                                <i class="fas fa-sign-out-alt"></i>Signout</a>
                        </li>
                    
                        
                        
                    </ul>
                @elseif($role_id==3) {{-- Swimmer --}}
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{ URL::TO("dashboard") }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ URL::TO("squad-swimmers") }}?isSwimmer={{ true }}">
                                <i class="fas fa-chart-bar"></i>My Squad</a>
                        </li>
                        <li>
                            <a href="{{ URL::TO("info") }}?isSwimmer={{ true }}">
                                <i class="fas fa-users"></i>My Parents</a>
                        </li>

                        <li>
                            <a href="{{ URL::TO("galas") }}?isSwimmer={{ true }}">
                                <i class="fas fa-check-square"></i>Galas</a>
                        </li>

                        <li>
                            <a href="{{ URL::TO("events") }}?isSwimmer={{ true }}">
                                <i class="fas fa-calendar-alt"></i>Events</a>
                        </li><br><br><br>

                        <li>
                            <a href="{{ URL::TO("logout") }}">
                                <i class="fas fa-sign-out-alt"></i>Signout</a>
                        </li>
                    
                        
                        
                    </ul>
                @elseif($role_id==4) {{-- Coach --}}
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{ URL::TO("dashboard") }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ URL::TO("squad-swimmers") }}?isCoach={{ true }}">
                                <i class="fas fa-chart-bar"></i>Squad</a>
                        </li>

                        <li>
                            <a href="{{ URL::TO("info") }}?isCoach={{ true }}">
                                <i class="fas fa-users"></i>My Info</a>
                        </li>

                        <li>
                            <a href="{{ URL::TO("galas") }}?isCoach={{ true }}">
                                <i class="fas fa-check-square"></i>Galas</a>
                        </li>

                        <li>
                            <a href="{{ URL::TO("events") }}?isCoach={{ true }}">
                                <i class="fas fa-calendar-alt"></i>Events</a>
                        </li><br><br><br>

                        <li>
                            <a href="{{ URL::TO("logout") }}">
                                <i class="fas fa-sign-out-alt"></i>Signout</a>
                        </li>
                    
                        
                        
                    </ul>
                @endif
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                
                        <div class="header-button">
                            
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    @if($role_id==3)
                                    <div class="image">
                                        <img src="{{ asset('img/avatar.png') }}" alt="My profile" />
                                    </div>
                                    @endif
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">Account</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="{{ URL::TO('update-information') }}">
                                                    <i class="zmdi zmdi-account"></i>Account</a>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="#">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header><br><br><br><br>
