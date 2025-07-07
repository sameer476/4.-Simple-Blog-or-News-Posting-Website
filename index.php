<?php
include "db.php";

$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$result = $conn->query("SELECT * FROM posts ORDER BY id DESC LIMIT $start, $limit");
$total = $conn->query("SELECT COUNT(*) as total FROM posts")->fetch_assoc()['total'];
$pages = ceil($total / $limit);
?>

<h2>Blog Posts</h2>
<?php while($row = $result->fetch_assoc()): ?>
<div style="border:1px solid gray; padding:10px; margin-bottom:10px;">
    <h3><?= $row['title'] ?></h3>
    <img src="uploads/<?= $row['image'] ?>" width="200"><br>
    <p><?= substr($row['content'], 0, 150) ?>...</p>
</div>
<?php endwhile; ?>

<!-- Pagination -->
<div>
    <?php for ($i = 1; $i <= $pages; $i++): ?>
        <a href="?page=<?= $i ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>
