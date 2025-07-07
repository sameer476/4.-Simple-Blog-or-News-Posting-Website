<?php
include "db.php";
$id = $_GET['id'];

$data = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title   = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";
    $conn->query($sql);

    header("Location: admin.php");
}
?>

<h2>Edit Post</h2>
<form method="post">
    Title: <input type="text" name="title" value="<?= $data['title'] ?>"><br><br>
    Content:<br>
    <textarea name="content" rows="5"><?= $data['content'] ?></textarea><br><br>
    <button type="submit">Update</button>
</form>
