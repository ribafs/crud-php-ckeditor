<?php
require 'process.php';

if (!isset($_GET["id"])) {
    header("location: index.php");
}

$id = $_GET['id'];

$edit = query("SELECT * FROM article WHERE id = '$id'")[0];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["edit"])) {
        if (edit($_POST) > 0) {
            header("Location: index.php");
        } else {
            echo mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <style>
        label,
        button {
            display: block;
        }

        input {
            width: 100%;
            margin-bottom: 15px;
            height: 20px;
        }

        button {
            width: 100%;
            height: 40px;
            background-color: green;
            color: white;
        }
    </style>
    <script src="ckeditor/ckeditor.js"></script>
</head>

<body>

    <div class="container">
        <a href="index.php">Back to Home</a>
        <h1>Edit Product</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="hidden" name="old-picture" value="<?= $edit['picture']; ?>">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Title" value="<?= $edit['title']; ?>" required>
            <label for="description">Description</label>
            <textarea style="width: 100%;" rows="4" name="description" id="description" placeholder="Description" required><?= $edit['description']; ?></textarea>
            <label for="picture">Picture (If needed)</label>
            <input type="file" accept="image/*" name="gambar" id="gambar" placeholder="gambar">
            <labehl for="ckeditor">Content</labehl>
            <textarea class="ckeditor" name="content" id="ckeditor" placeholder="Content" required><?= $edit['content']; ?></textarea>
            <button type="submit" name="edit" style="margin-top: 10px;">Edit</button>
        </form>
    </div>

</body>

</html>
