<?php
    include("confs/config.php");
    $id=$_GET['id'];
    $sql="DElETE FROM categories WHERE id=$id";
    mysqli_query($conn,$sql);
    header("location:cat_list.php");