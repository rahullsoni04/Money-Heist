<?php
require_once 'connection.php';
session_start();
$id = $_POST['id'];
$sql = "SELECT * FROM `characters` WHERE `id`=$id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
?>
<div class="col-sm-6">
    <div class="owl-carousel" id="first">
        <?php
        $sql1 = "SELECT * FROM `char_img` WHERE `char_id`=$id";
        $query1 = mysqli_query($conn, $sql1);
        ?>
        <img class="charimg"  src="characters image/corousel2/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>">
        <?php
        if (mysqli_num_rows($query1) > 0) {
            while ($rows = mysqli_fetch_assoc($query1)) {
        ?>
                <img class="charimg" src="characters image/charmulti/<?php echo $rows['image']; ?>" alt="<?php echo $rows['image']; ?>">
        <?php }
        }  ?>

    </div>
</div>
<div class="col-sm-6 content-char">
    <h1 class="nameOfChar"><?php echo $row['name']; ?></br><span class="header-red">AKA</span></br><?php echo $row['fictional_name']; ?></h1>
    <p class="contentOfChar"><?php echo $row['description']; ?>?</p>
</div>

<script>
    $('#first').owlCarousel({
        loop: true,
        nav: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 3000,
    });
</script>