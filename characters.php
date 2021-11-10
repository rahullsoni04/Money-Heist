<?php
require_once 'connection.php';
$sql = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="characters image/mask.jpg">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/characters.css">

    <title>The Heroes</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM `characters`";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    ?>
    <div class="container text-center">
        <div class="row d-flex align-items-center" id="displayBlock">
            <!-- Set up your HTML -->
            <div class="col-sm-6">
                <div class="owl-carousel" id="first">

                    <?php
                    $id=3;
                    $sql1 = "SELECT * FROM `char_img` WHERE `char_id`=$id";
                    $query1 = mysqli_query($conn, $sql1);
                    while ($rows = mysqli_fetch_assoc($query1)) {
                    ?>
                        <img class="charimg" src="characters image/charmulti/<?php echo $rows['image']; ?>" alt="">
                    <?php } ?>
                </div>

            </div>
            <div class="col-sm-6 content-char">
                <h1 class="nameOfChar"><?php echo $row['name']; ?></br><span class="header-red">AKA</span></br><?php echo $row['fictional_name']; ?></h1>
                <p class="contentOfChar"><?php echo $row['description']; ?>?</p>
            </div>
        </div>
    </div>

    <div class="spacer" style="height:100px"></div>
    <div class="container-fluid text-center">
        <div class="owl-carousel" id="second">
            <?php
            $sql = "SELECT * FROM `characters`";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <div class="char-card" id="<?php echo $row['id']; ?>">
                    <img class="char-inner" id="<?php echo $row['id'] . $row['id'] . $row['id']; ?>" src="characters image/corousel2/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>">
                    <img class="char-hower-img" id="<?php echo $row['id'] . $row['id']; ?>" src="characters image/charmulti/characters.jpg" alt="<?php echo $row['image']; ?>">
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#first').owlCarousel({
                loop: true,
                nav: true,
                autoplay:true,
                autoplayTimeout:3000,
                items: 1,
            });
            $('#second').owlCarousel({
                loop: false,
                nav: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 4,
                        nav: true,
                        loop: false
                    }
                }
            });

            $('.char-hower-img').ready(function() {
                $('.char-hower-img').hide(1000);
                //document.getElementsByClassName("char-hower-img").style.display = "none";

            });
            $('.char-card').on({
                click: function() {
                    console.log("you clicked me", this);
                    var id = $(this).attr("id");
                    var jqxhr = $.post("data.php", {
                            id: id
                        }, function(data) {
                            // alert("success");
                            //alert(data);
                            $("#displayBlock").html(data);
                            //$(".charimg").show();
                        })
                        .fail(function() {
                            alert("unable to  proceed the post request");
                        });
                },
                mouseenter: function() {
                    console.log("your mouse entered here");
                    var id = $(this).attr("id");
                    $("#" + id + id + id).hide();
                    //document.getElementById(id+id).style.display = "block";
                    $("#" + id + id).show();
                },
                mouseleave: function() {
                    console.log("your mouse leaves from here");
                    var id = $(this).attr("id");
                    $("#" + id + id).hide();
                    //document.getElementById(id+id).style.display = "block";
                    $("#" + id + id + id).show();
                },
            });

        });
    </script>
</body>

</html>