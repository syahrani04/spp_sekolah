<?php 
session_start();
if (isset($_SESSION['login'])) {
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Pembayaran SPP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 20px;
        }
        .container {
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
            color: #444;
        }
        .print {
            margin-top: 10px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }
        .print:hover {
            background-color: #0056b3;
        }
        @media print {
            .print {
                display: none;
            }
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <h3>Sistem Kelola <br/><b>Laporan Pembayaran SPP</b></h3>
    <hr/>
    <?php 
    $nis = mysqli_real_escape_string($konek, $_GET['nis']);
    $id = mysqli_real_escape_string($konek, $_GET['id']);
    $siswa = $konek->query("SELECT * FROM siswa WHERE nis='$nis'");
    $sw = mysqli_fetch_assoc($siswa);
    ?>
    <table>
        <tr>
            <td>Nama Siswa</td>
            <td>:</td>
            <td><?= htmlspecialchars($sw['namasiswa']); ?></td>
        </tr>
        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><?= htmlspecialchars($sw['nis']); ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?= htmlspecialchars($sw['kelas']); ?></td>
        </tr>
    </table>
    <hr/>
    <table>
        <tr>
            <th>No</th>
            <th>ID Siswa</th>
            <th>No. Bayar</th>
            <th>Pembayaran Bulan</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
        </tr>
        <?php 
        $spp = $konek->query("SELECT spp.*, siswa.nis, siswa.namasiswa, siswa.kelas
                              FROM spp 
                              INNER JOIN siswa ON spp.idsiswa = siswa.idsiswa
                              WHERE idspp ='$id'
                              ORDER BY nobayar ASC");
        $i = 1;
        while ($dta = mysqli_fetch_array($spp)) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= htmlspecialchars($dta['idsiswa']); ?></td>
            <td><?= htmlspecialchars($dta['nobayar']); ?></td>
            <td><?= htmlspecialchars($dta['bulan']); ?></td>
            <td><?= number_format($dta['jumlah'], 0, ',', '.'); ?></td>
            <td><?= htmlspecialchars($dta['ket']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <div style="margin-top: 20px;">
        <p>Bekasi, <?= date('d/m/Y'); ?><br/>
        Admin,<br/><br/><br/>
        <b>__________________________</b></p>
    </div>
    <a href="#" onclick="window.print();" class="print">CETAK</a>
</div>
</body>
</html>
<?php 
} else {
    header("Location: login.php");
    exit;
}
?>
