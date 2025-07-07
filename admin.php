<?php
include "db.php";
$result = $conn->query("SELECT * FROM posts ORDER BY id DESC");
?>

<h2>All Posts</h2>
<a href="create.php">+ New Post</a><br><br>
<table border="1" cellpadding="10">
<tr>
    <th>ID</th><th>Title</th><th>Image</th><th>Actions</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['title'] ?></td>
    <td><img src="uploads/<?= $row['image'] ?>" width="100"></td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
