<?php
$con = new mysqli("localhost", "root", "", "db_praktik");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO t_dosen (idDosen, namaDosen, noHP) VALUES (11, 'Dwi Anjani Permata', '081122334455')";
$hasil = $con->query($sql);

if ($hasil === TRUE) {
    echo "Data dosen berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>