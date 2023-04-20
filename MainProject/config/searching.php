<?php

include_once '../config/connect.php';

if (isset($_POST['submit'])){
    echo $_POST['search'];
    $data = $_POST['search'];
    $query = mysqli_query($connect,"SELECT * FROM products WHERE name LIKE '$data'");
while($row = mysqli_fetch_assoc($query)){
    ?>
    <div class="wrapper">
        <div class="name"><? echo $row['name']?></div>
        <div class="price"><? echo $row['price']?></div>
        <div class="description"><? echo $row['description']?></div>
    </div>
    <?php
}
}?>