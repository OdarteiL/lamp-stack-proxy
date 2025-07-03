<?php
include 'db.php';

$id = $_GET['id'];

if ($_POST) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET username=?, name=?, email=?, password=? WHERE id=?");
        $stmt->execute([$username, $name, $email, $password, $id]);
    } else {
        $stmt = $pdo->prepare("UPDATE users SET username=?, name=?, email=? WHERE id=?");
        $stmt->execute([$username, $name, $email, $id]);
    }
    
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
$stmt->execute([$id]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Update User</h2>
        <form method="POST">
            <input type="text" name="username" value="<?= $user['username'] ?>" required>
            <input type="text" name="name" value="<?= $user['name'] ?>" required>
            <input type="email" name="email" value="<?= $user['email'] ?>" required>
            <input type="password" name="password" placeholder="New Password (leave blank to keep current)">
            <button type="submit">Update User</button>
        </form>
        <a href="index.php">Back to Users</a>
    </div>
</body>
</html>