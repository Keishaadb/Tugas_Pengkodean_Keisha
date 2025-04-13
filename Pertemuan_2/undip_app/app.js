function tambahBarang() {
  const kode = document.getElementById("kode").value;
  const nama = document.getElementById("nama").value;
  const jumlah = parseInt(document.getElementById("jumlah").value);
  const harga = parseInt(document.getElementById("harga").value);

  if (!kode || !nama || isNaN(jumlah) || isNaN(harga)) {
    alert("Mohon isi semua kolom dengan benar.");
    return;
  }

  const total = jumlah * harga;

  const tabel = document.getElementById("tabelBarang");
  const row = tabel.insertRow();
  row.innerHTML = `
    <td>${kode}</td>
    <td>${nama}</td>
    <td>${jumlah}</td>
    <td>Rp ${harga.toLocaleString('id-ID')}</td>
    <td>Rp ${total.toLocaleString('id-ID')}</td>
  `;

  // Reset input
  document.getElementById("kode").value = "";
  document.getElementById("nama").value = "";
  document.getElementById("jumlah").value = "";
  document.getElementById("harga").value = "";
}
