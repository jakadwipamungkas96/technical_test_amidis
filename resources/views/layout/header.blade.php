<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jasamedika Test Laravel</title>

    <script src="https://use.fontawesome.com/e57207fa50.js"></script>
    
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
    <!-- Data Tabel -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="https://jasamedika.co.id/wp-content/uploads/2017/05/master-logo-jm-web.png" width="180" height="50" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if(auth()->user()->is_admin == 1)
                <li class="nav-item active">
                    <a class="nav-link" href="/kelurahan">Kelurahan</span></a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="/pasien">Pasien</a>
                </li>
            </ul>
        </div>
        <form class="form-inline my-2 my-lg-0" action="/logout" method="get">
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                    <small>Welcome, {{ auth()->user()->name }}</small>
                </button>
                <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
                    <small>Login sebagai: <b>{{ auth()->user()->is_admin == 1 ? 'Admin' : 'Operator' }}</b></small><br>
                    <button type="submit" class="btn btn-link" style="text-decoration: none !important;">
                        Logout
                    </button>
                </div>
            </div>
        </form>
    </nav>

    <div class="container-fluid p-5">
        @yield('content')
    </div>

@extends('layout.footer')