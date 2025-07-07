<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title   = $_POST['title'];
    $content = $_POST['content'];

    $image = $_FILES['image']['name'];
    $tmp   = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "uploads/$image");

    $sql = "INSERT INTO posts (title, content, image) VALUES ('$title', '$content', '$image')";
    $conn->query($sql);

    header("Location: admin.php");
}
?>

<h2>Create New Post</h2>
<form method="post" enctype="multipart/form-data">
    Title: <input type="text" name="title" required><br><br>
    Content:<br>
    <textarea name="content" rows="5" required></textarea><br><br>
    Image: <input type="file" name="image" required><br><br>
    <button type="submit">Post</button>
</form>
