<?php
// Pastikan file header.php disertakan
if (file_exists('header.php')) {
    include 'header.php';
} else {
    echo "<div class='alert alert-danger text-center'>File <strong>header.php</strong> tidak ditemukan.</div>";
}

// Inisialisasi pesan error dan sukses
$error_message = '';
$success_message = '';

// Menangani pengiriman email
if (isset($_POST['Kirim'])) {
    $namaanda = trim($_POST['namaanda']);
    $emailanda = trim($_POST['emailanda']);
    $nama_penerima = trim($_POST['nama_penerima']);
    $email_penerima = trim($_POST['email_penerima']);
    $subjek = trim($_POST['subjek']);
    $pesan = trim($_POST['Pesan']);

    // Validasi input kosong
    if (empty($namaanda) || empty($emailanda) || empty($nama_penerima) || empty($email_penerima) || empty($subjek) || empty($pesan)) {
        $error_message = 'Semua kolom harus diisi.';
    } elseif (!filter_var($emailanda, FILTER_VALIDATE_EMAIL)) { // Validasi email pengirim
        $error_message = 'Email Anda tidak valid.';
    } elseif (!filter_var($email_penerima, FILTER_VALIDATE_EMAIL)) { // Validasi email penerima
        $error_message = 'Email penerima tidak valid.';
    } else {
        // Format pesan
        $body = "Nama Anda: $namaanda\n";
        $body .= "Email Anda: $emailanda\n\n";
        $body .= "Pesan:\n$pesan";

        // Header email
        $headers = "From: $emailanda\r\n";
        $headers .= "Reply-To: $emailanda\r\n";
        $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

        // Coba kirim email
        if (mail($email_penerima, $subjek, $body, $headers)) {
            $success_message = 'Email berhasil dikirim ke ' . htmlspecialchars($email_penerima) . '!';
        } else {
            $error_message = 'Terjadi kesalahan saat mengirim email. Pastikan server email dikonfigurasi dengan benar.';
        }
    }
}

// Random motivational quote
$quotes = [
    "Don't wait for opportunity. Create it.",
    "Success is not final, failure is not fatal: It is the courage to continue that counts.",
    "Believe in yourself and all that you are. Know that there is something inside you that is greater than any obstacle.",
    "The future depends on what we do in the present.",
    "It always seems impossible until it's done."
];

$random_quote = $quotes[array_rand($quotes)];
?>

<!-- Custom Styles -->
<style>
    body {
        background: url('img/background1.jpg') no-repeat center center fixed;
        background-size: cover;
    }
    .card {
        margin-top: 30px;
    }
    .quote {
        font-size: 18px;
        font-style: italic;
        color: white;
        margin-top: 20px;
        text-align: center;
    }
    .card-body {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 8px;
    }
    .scroll-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 50%;
        font-size: 18px;
        cursor: pointer;
    }
    .scroll-to-top:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">

    <!-- Email Form Section -->
    <section class="mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Kirim Email kepada Wali Siswa</h4>
            </div>
            <div class="card-body">
                <?php
                // Tampilkan pesan error/sukses
                if (!empty($error_message)) {
                    echo "<div class='alert alert-danger'>$error_message</div>";
                }
                if (!empty($success_message)) {
                    echo "<div class='alert alert-success'>$success_message</div>";
                }
                ?>

                <!-- Email Form -->
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="namaanda" class="form-label">Nama Anda</label>
                        <input type="text" class="form-control" id="namaanda" name="namaanda" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_penerima" class="form-label">Nama Penerima</label>
                        <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" required>
                    </div>
                    <div class="mb-3">
                        <label for="whatsaap_penerima" class="form-label">Email Penerima</label>
                        <input type="email" class="form-control" id="email_penerima" name="email_penerima" required>
                    </div>
                    <div class="mb-3">
                        <label for="subjek" class="form-label">Subjek</label>
                        <input type="text" class="form-control" id="subjek" name="subjek" required>
                    </div>
                    <div class="mb-3">
                        <label for="Pesan" class="form-label">Pesan Anda</label>
                        <textarea id="Pesan" name="Pesan" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="Kirim">KIRIM</button>
                </form>
            </div>
        </div>
    </section>
</div>

<!-- Scroll to Top Button -->
<button onclick="topFunction()" id="scrollBtn" class="scroll-to-top">↑</button>

<!-- Footer -->
<footer class="footer text-center mt-5 bg-dark text-white py-3">
    <p>&copy; Kelompok 6. Ready To Pingsan.</p>
</footer>

<!-- <?php 
// Pastikan file footer.php disertakan jika ada
if (file_exists('footer.php')) {
    include 'footer.php';
} else {
    echo "<div class='text-center text-warning mt-3'>Footer file tidak ditemukan. Pastikan file <strong>footer.php</strong> ada di lokasi yang sesuai.</div>";
}
?> -->

<script>
// Scroll to top functionality
var scrollBtn = document.getElementById("scrollBtn");
window.onscroll = function() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    scrollBtn.style.display = "block";
  } else {
    scrollBtn.style.display = "none";
  }
};

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
