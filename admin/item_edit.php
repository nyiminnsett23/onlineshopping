<?php

include ("confs/config.php");
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM all_items WHERE id=$id");
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background-image:linear-gradient(to right, rgb(116, 235, 213), rgb(172, 182, 229));
            color: #495057;
        }

        h1 {
            color: #007bff;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        label {
            font-weight: bold;
        }

        input,
        textarea,
        select {
            margin-bottom: 15px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            padding: 5px;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        input[type="submit"],
        a.back {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            background-color: #007bff;
            color: #ffffff;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        a.back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mt-5 text-center text-primary font-monospace">Edit Item</h1>
    <form action="item_update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="title">Item Name</label>
        <input type="text" name="title" id="title" value="<?php echo $row['title'] ?>" class="form-control">

        <label for="brand">Brand</label>
        <input type="text" name="brand" id="brand" value="<?php echo $row['brand'] ?>" class="form-control">

        <label for="review">Review</label>
        <textarea name="review" id="review" class="form-control"><?php echo $row['review'] ?></textarea>

        <label for="price">Price</label>
        <input type="text" name="price" id="price" value="<?php echo $row['price'] ?>" class="form-control">

        <label for="categories">Category</label>
        <select name="category_id" id="categories" class="form-select">
            <option value="0">--Choose--</option>
            <?php
            $categories = mysqli_query($conn, "SELECT id,name FROM categories");
            while ($cat = mysqli_fetch_assoc($categories)) {
                ?>
                <option value="<?php echo $cat['id'] ?>" <?php if ($cat['id'] == $row['category_id']) echo "selected" ?>>
                    <?php echo $cat['name']; ?>
                </option>
            <?php } ?>
        </select>

        <br><br>
        <img src="images/<?php echo $row['photo'] ?>" height="150" alt="">
        <label for="photo">Change Images</label>
        <input type="file" name="photo" id="photo" class="form-control">

        <div class="mt-3">
            <input type="submit" value="Update Item" class="btn btn-primary">
            <a href="item_list.php" class="btn btn-secondary back">Back</a>
        </div>
    </form>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
