<?php
include 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = (int)$_GET['id'];

if ($_POST && isset($_POST['confirm'])) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id=?");
    $stmt->execute([$id]);
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT name FROM users WHERE id=?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Delete User</h2>
        <p>Are you sure you want to delete user: <strong><?= htmlspecialchars($user['name']) ?></strong>?</p>
        <form method="POST">
            <input type="hidden" name="confirm" value="1">
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <a href="index.php" class="btn">Cancel</a>
        </form>
    </div>
</body>
</html>