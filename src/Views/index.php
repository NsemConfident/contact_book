<?php include __DIR__ . '/../views/partials/header.php'; ?>

<div class="container my-5">
    <h2>List of Contacts</h2>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>NAME</th>
                <th>PHONE NUMBER</th>
                <th>EMAIL</th>
                <th>CATEGORY</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td>
                        <a class="btn btn-primary" href="index.php?action=edit&id=<?php echo $row['id']; ?>">Edit</a>
                        <a class="btn btn-danger" href="index.php?action=delete&id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>

    </table>

</div>

<?php include __DIR__ . '/partials/footer.php'; ?>