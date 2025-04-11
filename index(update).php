<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Diskon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ffb3d9, #add8e6); 
            display: flex; justify-content: center; align-items: center;
            height: 100vh; margin: 0;
        }
        .container {
            background: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px 30px; width: 100%; max-width: 400px; text-align: center;
        }
        h1 { color: #600645; }
        input, button {
            width: 100%; padding: 10px; margin: 10px 0; font-size: 16px;
            border-radius: 5px; outline: none;
        }
        input {
            border: 2px solid #5377ec;
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
        }
        button {
            background: #ff6fa1; color: #fff; border: none; cursor: pointer;
            transition: 0.3s;
        }
        button:hover { background: #ffaf85; }
        .result, .error {
            margin-top: 20px; padding: 15px; border-radius: 5px;
            font-weight: bold;
        }
        .result { background: #ffe4ec; color: #333; }
        .error { background: #ffcccc; color: red; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Penghitung Diskon</h1>
        <form method="post">
            <input type="text" name="harga" placeholder="Harga awal (Rp)" required oninput="formatRibuan(this)">
            <input type="number" name="diskon" placeholder="Diskon (%)" required min="0" max="100">
            <button type="submit" name="hitung">Hitung</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hitung'])) {
            $harga = str_replace('.', '', $_POST['harga']);
            $diskon = $_POST['diskon'];
            if ($diskon > 100) {
                echo "<div class='error'>Diskon tidak boleh lebih dari 100%.</div>";
            } else {
                $total = ($diskon / 100) * $harga;
                $akhir = $harga - $total;
                echo "<div class='result'>Total diskon: Rp " . number_format($total, 0, ',', '.') .
                     "<br>Harga setelah diskon: Rp " . number_format($akhir, 0, ',', '.') . "</div>";
            }
        }
        ?>
    </div>
    <script>
        function formatRibuan(input) {
            input.value = new Intl.NumberFormat('id-ID').format(input.value.replace(/\D/g, ''));
        }
    </script>
</body>
</html>
