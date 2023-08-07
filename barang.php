<!DOCTYPE html>
<html>
<head>
  <title>Online Shop</title>
  <style>
    /* Tambahkan gaya CSS sesuai kebutuhan Anda */
  </style>
</head>
<body>
  <h1>Online Shop</h1>
  
  <?php
    // Konfigurasi database
    $db_host = "localhost";
    $db_user = "username";
    $db_pass = "password";
    $db_name = "nama_database";

    // Koneksi ke database
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (!$conn) {
      die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Query untuk mendapatkan data barang dari tabel "barang"
    $sql = "SELECT * FROM barang";
    $result = mysqli_query($conn, $sql);

    // Periksa apakah ada data barang
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        // Tampilkan data barang dalam bentuk kartu
        echo '<div class="product-card">';
        echo '<img src="' . $row["foto"] . '" alt="' . $row["nama"] . '" />';
        echo '<h2>' . $row["nama"] . '</h2>';
        echo '<p>Ukuran: ' . $row["ukuran"] . '</p>';
        echo '<p>Harga: Rp ' . number_format($row["harga"], 2, ',', '.') . '</p>';
        echo '<p>' . $row["deskripsi"] . '</p>';
        echo '</div>';
      }
    } else {
      echo "Tidak ada data barang.";
    }

    // Tutup koneksi ke database
    mysqli_close($conn);
  ?>

</body>
</html>
