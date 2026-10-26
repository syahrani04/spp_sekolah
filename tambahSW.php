<?php
include 'koneksi.php';

// Memulai output buffering
ob_start();

include 'header.php';

if (isset($_POST['tambah'])) {
    $nis = $_POST['nis'];
    $namasiswa = $_POST['namasiswa'];
    $kelas = $_POST['kelas'];
    $tahunajaran = $_POST['tahunajaran'];
    $biaya = $_POST['biaya'];
    $awaltempo = $_POST['jatuhtempo'];

    $bulanIndo = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ];

    if ($nis == '' || $namasiswa == '' || $kelas == '') {
        echo "Form belum lengkap";
    } else {
        $simpan = mysqli_query($konek, "INSERT INTO siswa(nis, namasiswa, kelas, tahunajaran, biaya) VALUES('$nis', '$namasiswa', '$kelas', '$tahunajaran', '$biaya')");

        if (!$simpan) {
            echo "<script>alert('Data gagal disimpan');</script>";
        } else {
            $ds = mysqli_fetch_array(mysqli_query($konek, "SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1"));
            $idsiswa = $ds['idsiswa'];

            for ($i = 0; $i < 12; $i++) {
                $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));
                $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))] . " " . date('Y', strtotime($jatuhtempo));

                $add = mysqli_query($konek, "INSERT INTO spp(idsiswa, jatuhtempo, bulan, jumlah) VALUES ('$idsiswa', '$jatuhtempo', '$bulan', '$biaya')");
            }

            header('Location: datasiswa.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="page-header">
        <h2>TAMBAH DATA SISWA</h2>
    </div>
    <form action="" method="post">
        <table class="table">
            <tr>
                <td>NIS</td>
                <td><input class="form-control" type="text" name="nis" placeholder="Masukan Nomor Induk Siswa" required></td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td><input class="form-control" type="text" name="namasiswa" placeholder="Masukan Nama Siswa" maxlength="40" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>
                    <select class="form-control" name="kelas" required>
                        <option value="">-pilih kelas-</option>
                        <?php
                        $data = mysqli_query($konek, "SELECT * FROM walikelas ORDER BY kelas ASC");
                        while ($dta = mysqli_fetch_assoc($data)) {
                            echo "<option value='{$dta['kelas']}'>{$dta['kelas']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tahun Ajaran</td>
                <td><input class="form-control" type="text" name="tahunajaran" value="2018/2019"></td>
            </tr>
            <tr>
                <td>Biaya</td>
                <td><input class="form-control" type="text" name="biaya" value="250000"></td>
            </tr>
            <tr>
                <td>Jatuh Tempo</td>
                <td><input class="form-control" type="text" name="jatuhtempo" value="2018-10-10"></td>
            </tr>
            <tr>
                <td></td>
                <td><button class="btn btn-success" type="submit" name="tambah">SIMPAN DATA</button></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php
// Menyelesaikan output buffering
ob_end_flush();
?>
<br><br>
