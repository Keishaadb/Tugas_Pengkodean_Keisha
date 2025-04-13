<?php
include "koneksi.php";
?>

<link rel="stylesheet" href="css/style.css">

<h2>Tambah Peminjaman</h2>
<form method="POST">
  ID Anggota: <input type="text" name="id_anggota"><br>
  ID Buku: <input type="text" name="id_buku"><br>
  ID Petugas: <input type="text" name="id_petugas"><br>
  <input type="submit" value="Pinjam Buku">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_anggota = $_POST['id_anggota'];
  $id_buku = $_POST['id_buku'];
  $id_petugas = $_POST['id_petugas'];
  $tanggal_pinjam = date('Y-m-d');

  // Kurangi stok
  mysqli_query($koneksi, "UPDATE buku SET stok = stok - 1 WHERE id_buku = $id_buku");

  // Tambah peminjaman
  $sql = "INSERT INTO peminjaman (id_anggota, id_buku, id_petugas, tanggal_pinjam)
          VALUES ('$id_anggota', '$id_buku', '$id_petugas', '$tanggal_pinjam')";
  if (mysqli_query($koneksi, $sql)) {
    echo "<p>Peminjaman berhasil ditambahkan.</p>";
  } else {
    echo "<p>Error: " . mysqli_error($koneksi) . "</p>";
  }
}
?>
