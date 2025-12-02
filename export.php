<?php
include 'conection.php';

$conn = connect("localhost", "root", "", "student");

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data_export.csv');

$output = fopen("php://output", "w");

// عنوان ستون‌ها
fputcsv($output, ['f_name', 'l_name', 'fa_name', 'n_code', 'user_name', 'username','password_hash']);

$result = mysqli_query($conn, "SELECT * FROM stude");

while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

fclose($output);
exit;
?>