<?php
$con = new mysqli("localhost", "root", "", "db_praktik");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$queries = [
    "t_login" => "CREATE TABLE IF NOT EXISTS t_login (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(50) NOT NULL,
        email VARCHAR(50),
        tgl_registrasi TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )",
    "t_dosen" => "CREATE TABLE IF NOT EXISTS t_dosen (
        idDosen INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        namaDosen VARCHAR(50) NOT NULL,
        noHP VARCHAR(25) NOT NULL
    )",
    "t_mahasiswa" => "CREATE TABLE IF NOT EXISTS t_mahasiswa (
        npm INT PRIMARY KEY,
        namaMhs VARCHAR(50) NOT NULL,
        prodi VARCHAR(25) NOT NULL,
        alamat VARCHAR(70) NOT NULL,
        noHP VARCHAR(25) NOT NULL
    )",
    "t_matakuliah" => "CREATE TABLE IF NOT EXISTS t_matakuliah (
        kodeMK INT PRIMARY KEY,
        namaMK VARCHAR(70) NOT NULL,
        sks INT NOT NULL
    )"
];

$hasil = [];
foreach ($queries as $nama => $q) {
    $result = $con->query($q);
    if ($result === TRUE) {
        $hasil[] = ["nama" => $nama, "status" => "Tabel $nama berhasil dibuat (atau sudah ada)"];
    } else {
        $hasil[] = ["nama" => $nama, "status" => "Tabel $nama gagal dibuat: " . $con->error];
    }
}

// menutup koneksi
$con->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tabel - SIAKAD Modul 12</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="theme-dosen text-slate-700 antialiased flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-lg">
        <div class="glass rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 bg-gradient-to-r from-blue-50/80 to-white/80 flex items-center gap-3">
                <a href="index.php" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-blue-600 transition btn-press">
                    <i class="fas fa-arrow-left text-sm"></i>
                </a>
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Pembuatan Tabel</h2>
                    <p class="text-xs text-slate-500">Otomatis membuat tabel database sesuai modul</p>
                </div>
            </div>

            <div class="p-6 space-y-4">
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-circle-info text-blue-500 mt-0.5"></i>
                        <div class="text-sm text-blue-700">
                            <p class="font-semibold mb-1">Informasi</p>
                            <p class="text-xs leading-relaxed">File ini membuat semua tabel sesuai skema modul praktikum 12. Jika tabel sudah ada, sistem akan melewati pembuatan.</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <?php foreach ($hasil as $item): ?>
                    <div class="flex items-center gap-3 p-4 bg-white border border-slate-200 rounded-xl">
                        <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600">
                            <i class="fas fa-table"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-semibold text-slate-800"><?php echo htmlspecialchars($item['nama']); ?></h3>
                            <p class="text-xs text-slate-500"><?php echo htmlspecialchars($item['status']); ?></p>
                        </div>
                        <?php if (strpos($item['status'], 'gagal') !== false): ?>
                            <i class="fas fa-times-circle text-rose-500"></i>
                        <?php else: ?>
                            <i class="fas fa-check-circle text-emerald-500"></i>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="pt-2">
                    <a href="index.php" class="block w-full text-center bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-3 rounded-xl transition-all shadow-lg shadow-blue-500/25 btn-press">
                        <i class="fas fa-home mr-2"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>