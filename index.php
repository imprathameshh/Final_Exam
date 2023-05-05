<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("link.php"); ?>
</head>

<body>
    <div class="header-wrap">
    <div class="container d-flex">
        <div class="header-logo">
            <img src="images/logo.png" alt="">
        </div>
        <div class="header-btn d-flex">
            <div class="add-blog-btn">
        <a class="btn btn-primary" href="blog-form.php" role="button">Add Blog</a>
        </div>
        <?php
        $link = $link_text ="";
        if($_SESSION['login']>0){
            $link = "logout.php";
            $link_text = "Logout";
        }
        else{
            $link = "login.php";
            $link_text = "Login";
        }
        ?>
        <a class="btn btn-primary" href="<?php echo $link?>" role="button"><?php echo $link_text?></a>
        </div>
    </div>
</div>


    <div class="api-wrap">
        <div class="container">
            <div class="api-wrap-column">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper" id="results">

                    </div>
                </div>
                <div class="api-wrap__left">
                <div class="arrow d-flex">
                    <div class="prev-arrow">
                <div class="prev">
                <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.56142 11.7614L0.244697 6.57614C-0.0815625 6.25795 -0.0815626 5.74206 0.244697 5.42386L5.56142 0.238643C5.88768 -0.0795484 6.41666 -0.0795484 6.74292 0.238643C7.06918 0.556834 7.06918 1.07272 6.74292 1.39091L2.85238 5.18522L22 5.18522L22 6.81478L2.85238 6.81478L6.74292 10.6091C7.06918 10.9273 7.06918 11.4432 6.74292 11.7614C6.41666 12.0795 5.88769 12.0795 5.56142 11.7614Z" fill="white"/>
                </svg>
                    </div>
                    </div>
                    <div class="next">
                    <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.4386 0.238643L21.7553 5.42386C22.0816 5.74206 22.0816 6.25795 21.7553 6.57614L16.4386 11.7614C16.1123 12.0795 15.5833 12.0795 15.2571 11.7614C14.9308 11.4432 14.9308 10.9273 15.2571 10.6091L19.1476 6.81478L0 6.81478L0 5.18522L19.1476 5.18522L15.2571 1.39092C14.9308 1.07272 14.9308 0.556835 15.2571 0.238643C15.5833 -0.0795478 16.1123 -0.0795478 16.4386 0.238643Z" fill="white"/>
                    </svg>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".next",
                prevEl: ".prev",
            },
        });
    </script>
</body>

</html>