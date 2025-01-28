<?php
include 'includes/config.php';

$name = "Admin";
$email = "admin2@salon.pl";
$plain_password = "admin123"; 
$role = "admin";

// Sprawdź czy hasło zostało zahashowane
$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
if ($hashed_password === false) {
    die("Błąd przy hashowaniu hasła!");
}

try {
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $hashed_password, $role]);
    echo "Użytkownik utworzony pomyślnie!";
} catch(PDOException $e) {
    die("Błąd przy tworzeniu użytkownika: " . $e->getMessage());
}
?>