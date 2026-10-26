<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Pembayaran SPP">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <title>Halaman Utama</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
        /* Body Styling */
        body {
            font-family: 'Verdana', sans-serif;
            background: linear-gradient(135deg,rgb(63, 144, 198),rgb(44, 135, 210));
            color: #333;
            margin-bottom: 60px;
            transition: background-color 0.5s ease;
        }

        /* Navbar Styling */
        .navbar {
            background: linear-gradient(45deg,hsl(206, 6.70%, 79.40%), rgb (63, 144, 198));
            padding: 15px 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease;
        }

        .navbar:hover {
            background: linear-gradient(45deg,rgb(63, 144, 198),rgb(63, 144, 198));
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 50px;
            width: 50px;
            margin-right: 15px;
            border-radius: 50%; /* Make logo circular */
            transition: transform 0.3s ease;
        }

        .navbar-brand img:hover {
            transform: scale(1.1);
        }

        .navbar-brand span {
            font-size: 1.7rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .navbar-nav {
            list-style: none; /* Remove bullet points from navbar */
        }

        .navbar-nav .nav-item {
            display: inline-block;
        }

        .navbar-nav .nav-link {
            font-size: 18px;
            font-weight: 500;
            color: white !important;
            margin-left: 20px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color:rgb(55, 128, 177) !important;
            text-decoration: underline;
        }

        /* Jumbotron Styling - logo*/
        .jumbotron {
            background: linear-gradient(45deg,rgb(157, 162, 165),rgb(63, 144, 198));
            color: white;
            padding: 60px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            text-align: center;
            transition: transform 0.5s ease;
        }

        .jumbotron:hover {
            transform: scale(1.05);
        }

        .jumbotron h1 {
            font-size: 3.5rem;
            font-weight: bold;
            animation: fadeIn 2s ease-out;
        }

        .jumbotron p {
            font-size: 1.4rem;
            margin-top: 15px;
        }

        .jumbotron .btn {
            background-color: #333;
            padding: 18px 36px;
            border-radius: 30px;
            font-size: 1.2rem;
            color: white;
            text-transform: uppercase;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: background-color 0.4s ease, transform 0.3s ease;
        }

        .jumbotron .btn:hover {
            background-color:rgb(0, 0, 0);
            transform: scale(1.1);
        }

        /* Footer Styling */
        .footer {
            background: linear-gradient(45deg, #2c3e50, #34495e);
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }

        .footer p {
            margin: 0;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .navbar-brand span {
                font-size: 1.3rem;
            }

            .navbar-nav .nav-link {
                font-size: 16px;
                margin-left: 15px;
            }

            .jumbotron h1 {
                font-size: 2.5rem;
            }

            .jumbotron p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">
                <img src="img/BGv1.png" alt="Logo">
                <span>Aplikasi Pembayaran SPP</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dataadmin.php">Data Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="datasiswa.php">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transaksi.php">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container">
        <div class="jumbotron">
            <h1>Selamat Datang di Aplikasi Pembayaran SPP</h1>
            <p>Sistem ini dirancang untuk memudahkan pengelolaan data pembayaran SPP siswa secara online.</p>
            <a class="btn btn-primary btn-lg" href="datasiswa.php" role="button">Lihat Data Siswa</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Kelompok 6. Ready To Pingsan.</p>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
