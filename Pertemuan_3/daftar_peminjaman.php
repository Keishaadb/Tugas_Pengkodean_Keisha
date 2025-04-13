<?php
include "koneksi.php";
?>

<link rel="stylesheet" href="css/style.css">

<h2>Daftar Peminjaman</h2>

<table border="1" cellpadding="10">
  <tr>
    <th>ID</th>
    <th>Anggota</th>
    <th>Buku</th>
    <th>Petugas</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
  </tr>

  <?php
  $sql = "SELECT p.id_pinjam, a.nama AS anggota, b.judul AS buku, t.nama AS petugas, 
                 p.tanggal_pinjam, p.tanggal_kembali
          FROM peminjaman p
          JOIN anggota a ON p.id_anggota = a.id_anggota
          JOIN buku b ON p.id_buku = b.id_buku
          JOIN petugas t ON p.id_petugas = t.id_petugas";
  $result = mysqli_query($koneksi, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['id_pinjam']}</td>
            <td>{$row['anggota']}</td>
            <td>{$row['buku']}</td>
            <td>{$row['petugas']}</td>
            <td>{$row['tanggal_pinjam']}</td>
            <td>{$row['tanggal_kembali'] ?? '-'}</td>
          </tr>";
  }
  ?>
</table>
