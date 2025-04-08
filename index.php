<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Diskon</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Penghitung Diskon</h1>
        <form method="post">
            <label for="harga">Harga awal (Rp)</label>
            <input type="text" id="harga" name="harga" placeholder="Masukkan harga" required oninput="formatRibuan(this)">

            <label for="diskon">Persentase Diskon (%)</label>
            <input type="number" id="diskon" name="diskon" placeholder="Masukkan diskon" required min="0" max="100">

            <button type="submit" name="hitung">Hitung</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hitung'])) {
            // Menghapus titik dari input harga sebelum dikonversi ke angka
            $harga = str_replace('.', '', $_POST['harga']);
            $diskon = $_POST['diskon'];

            if ($diskon > 100) {
                echo 
                " <script>
                alert('hh');
                </script>
                ";
            } else {
                $total_diskon = ($diskon / 100) * $harga;
                $harga_setelah_diskon = $harga - $total_diskon;

                echo "<div class='result'>";
                echo "Total diskon: Rp " . number_format($total_diskon, 0, ',', '.') . "<br>";
                echo "Harga setelah diskon: Rp " . number_format($harga_setelah_diskon, 0, ',', '.');
                echo "</div>";
            }
        }
        ?>
    </div>

    <script>
        function formatRibuan(input) {
            let value = input.value.replace(/\D/g, ''); // Hapus semua karakter kecuali angka
            input.value = new Intl.NumberFormat('id-ID').format(value);
        }
    </script>
</body>
</html>