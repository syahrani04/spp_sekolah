<?php
session_start();
if (isset($_SESSION['login'])) {
    header('Location: index.php');
}
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user  = $_POST['username'];
    $pass  = $_POST['password'];
    $p     = md5($pass); // Correct way to hash the password with md5

    if ($user == "" || $p == "") {
        $error = true;
    } else {
        // Ensure the query executes without errors
        $data = $konek->query("SELECT * FROM admin WHERE username = '".$user."' AND password = '".$p."'");

        if ($data) {
            $dt = mysqli_num_rows($data);
            $dta = mysqli_fetch_assoc($data);

            if ($dt > 0) {
                $_SESSION['login'] = TRUE;
                $_SESSION['username'] = $dta['username'];
                $_SESSION['id'] = $dta['idadmin'];
                header('Location: index.php');
            } else {
                echo "
                <script>
                    alert('Username or password is incorrect');
                    document.location.href = 'login.php';
                </script>
                ";
            }
        } else {
            // Handle error with the SQL query
            echo "<script>alert('Database query failed.');</script>";
        }
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HALAMAN LOGIN</title>
    <style>
        .col-md-4col-md-offset-4 {
            margin-top: 20px;
        }
        body {
            background: url('img/bg login.jpg');
            background-size: cover;
        }
    </style>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="text-center login-title">MENU LOGIN</h2>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-warning">
                            <span><b>Warning!</b></span>
                            <h class="text-center">Please enter the correct data</h>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="panel-body">
                    <form action="" method="post">
                        <table class="table">
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td>
                                    <input class="form-control" type="text" name="username" value="admin" placeholder="Masukan Username">
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td>
                                    <input class="form-control" type="Password" name="password" value="admin" placeholder="password">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-success" name="login">LOGIN</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
