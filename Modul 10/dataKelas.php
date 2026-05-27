<?php
require_once ('kelas/Mahasiswa.php');

$mhs1 = new mahasiswa(nama: "Mayra Ruhandini");   
$mhs1->setNIM("253307003");                 
$mhs1->setJurusan("Teknologi Informasi");
$mhs1->setKelas("TI - 2A");
$mhs1->setUmur(20);

$mhs2 = new mahasiswa(nama: "Mendysia Anggita Putri");
$mhs2->setNIM("253307004");
$mhs2->setJurusan("Teknologgi Informasi");
$mhs2->setKelas("TI - 2A");
$mhs2->setUmur(19);

$mhs3 = new mahasiswa(nama: "Reva Adinta Nasyiah");
$mhs3->setNIM("253307010");
$mhs3->setJurusan("Teknologi Informasi");
$mhs3->setKelas("TI - 2A");
$mhs3->setUmur(19);

$daftar = [$mhs1, $mhs2, $mhs3];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Praktikum 10 — Data Kelas</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
</head>
<body>

<div class="page-header">
  <p class="breadcrumb">Praktikum 10 / <span>OOP PHP — Inheritance</span></p>
  <h1>Data Kelas Mahasiswa</h1>
  <p>Class <code>mahasiswa</code> merupakan turunan (extends) dari class <code>Manusia</code>.</p>
</div>

<div class="container">

  <div class="card" style="margin-bottom:1rem">
    <div class="card-header">
      <h3>Daftar Mahasiswa</h3>
      <span class="tag">class mahasiswa extends Manusia</span>
    </div>
    <div class="card-body" style="padding:0">
      <table class="data-table">
        <thead>
          <tr>
            <th style="width:40px; padding:16px 14px; text-align:center;">#</th>
            <th style="min-width:160px; padding:16px 20px; white-space:nowrap;">Nama</th>
            <th style="min-width:110px; padding:16px 20px; white-space:nowrap;">NIM</th>
            <th style="min-width:170px; padding:16px 20px; white-space:nowrap;">NIK (warisan)</th>
            <th style="min-width:150px; padding:16px 20px;">Jurusan</th>
            <th style="min-width:90px; padding:16px 20px; white-space:nowrap;">Kelas</th>
            <th style="min-width:80px; padding:16px 20px; white-space:nowrap; padding-right:24px;">Umur</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($daftar as $i => $m): ?>
          <tr>
            <td style="color:var(--muted); padding:18px 14px; text-align:center;"><?= $i + 1 ?></td>
            <td style="padding:18px 20px; white-space:nowrap;"><strong><?= htmlspecialchars($m->getNama()) ?></strong></td>
            <td style="padding:18px 20px; white-space:nowrap;"><span class="badge badge-blue"><?= htmlspecialchars($m->getNIM()) ?></span></td>
            <td style="font-size:12px; color:var(--muted); padding:18px 20px; white-space:nowrap;"><?= $m->getNIK() ?></td>
            <td style="padding:18px 20px;"><?= htmlspecialchars($m->getJurusan()) ?></td>
            <td style="padding:18px 20px; white-space:nowrap;"><?= htmlspecialchars($m->getKelas()) ?></td>
            <td style="padding:18px 20px; white-space:nowrap; padding-right:24px;"><?= htmlspecialchars($m->getUmur()) ?> th</td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="note-box">
    <h4>Konsep Inheritance</h4>
    <p>
      Class <code>mahasiswa</code> mewarisi semua properti dan method dari class <code>Manusia</code>
      (<code>$name</code>, <code>$nik</code>, <code>$umur</code>, beserta getter/setter-nya).
      Constructor <code>mahasiswa</code> memanggil <code>$this->setNama($nama)</code> — fungsi
      yang sudah didefinisikan di kelas induk — sehingga tidak perlu mendefinisikannya ulang.
      Kolom NIK berasal dari method <code>getNIK()</code> yang diwarisi dari <code>Manusia</code>.
    </p>
  </div>

</div>
</body>
</html>
