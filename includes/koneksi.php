<?php
$host = "aws-1-ap-northeast-2.pooler.supabase.com";
$port = "5432";
$db   = "postgres";
$user = "postgres";
$pass = "@Caesarvior27";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
