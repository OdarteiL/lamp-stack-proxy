<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <h1>User Management System</h1>
    </div>
    
    <div class="container">
        <div class="header">
            <h2>All Users</h2>
            <a href="create.php" class="btn btn-success">Add New User</a>
        </div>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>

                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                try {
                    $stmt = $pdo->query("SELECT * FROM users");

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch()) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>

                                <td>{$row['created_at']}</td>
                                <td class='actions'>
                                    <a href='update.php?id={$row['id']}' class='btn'>Edit</a>
                                    <a href='delete.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No users found.</td></tr>";
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='6'>Error: " . $e->getMessage() . "</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
