document.addEventListener('DOMContentLoaded', () => {
    // Ambil data saat halaman dimuat
    fetchInventory();

    // Tangani submit form
    document.getElementById('itemForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const itemName = document.getElementById('itemName').value;
        const price = document.getElementById('price').value;
        const qty = document.getElementById('qty').value;

        // Kirim data ke backend
        const response = await fetch('save_data.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ itemName, price, qty }),
        });

        const result = await response.json();
        if (result.success) {
            alert('Item added successfully!');
            fetchInventory(); // Refresh tabel
            document.getElementById('itemForm').reset(); // Reset form
        } else {
            alert('Error adding item!');
        }
    });
});

// Fungsi untuk mengambil dan menampilkan data inventory
async function fetchInventory() {
    const response = await fetch('fetch_data.php');
    const data = await response.json();

    const tbody = document.getElementById('inventoryBody');
    tbody.innerHTML = ''; // Kosongkan tabel

    data.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.id}</td>
            <td>${item.item_name}</td>
            <td>${item.price}</td>
            <td>${item.qty}</td>
            <td>${item.created_at}</td>
        `;
        tbody.appendChild(row);
    });
}