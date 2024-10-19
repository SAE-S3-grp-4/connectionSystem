<?php
// Vérifier si l'utilisateur est connecté
//if (!isset($_SESSION['user'])) {
//    header('Location: login.php');
//    exit();
//}
require 'scripts/bdd.php';
session_start();

$pdo = connectBDD();

if (isset($_SESSION['user'])) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
    $stmt->execute(['id' => $_SESSION['user']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<p>Vous êtes connecté en tant que ' . htmlspecialchars($user['nom']) . '.</p>';
    echo '<a href="logout.php"><button>Logout</button></a>';
} else {
    echo '<p>Vous n\'êtes pas connecté.</p>';
    echo '<a href="login.php"><button>Login</button></a>';
}

?>