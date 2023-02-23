<?php
    session_start();
    require '../Connected/connected.php';
    // todo ປະເພດສິນຄ້າ
    $stmt_type = $conn->prepare("SELECT * FROM type");
    $stmt_type->execute();
    $row_type = $stmt_type->fetchAll(PDO::FETCH_ASSOC);
    // todot    ສະພາບສິນຄ້າ
    $stmt_mer = $conn->prepare("SELECT * FROM merchandise");
    $stmt_mer->execute();
    $rows_mer = $stmt_mer->fetchAll(PDO::FETCH_ASSOC);
    // todot    ດືງຂໍ້ມູນສິນຄ້າ
    $stmt_prod = $conn->prepare("SELECT * FROM import INNER JOIN merchandise ON import.merchandise_mer_id = merchandise.mer_id INNER JOIN type ON import.type_type_id = type.type_id INNER JOIN user_sell ON import.user_sell_us_id = user_sell.us_id WHERE import.on_or_off = 'on'");
    $stmt_prod->execute();
    $rows_prod = $stmt_prod->fetchAll(PDO::FETCH_ASSOC);

    // ກວດເຊັກການລ໋ອກອິນ
    if (isset($_SESSION['email']) && isset($_SESSION['us_id']) && isset($_SESSION['password'])) {
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];
            $stmt_sell = $conn->prepare("SELECT * FROM user_sell WHERE email = :email AND password = :password");
            $stmt_sell->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt_sell->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt_sell->execute();
            $rows_sell = $stmt_sell->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>JSPH</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../logo/logo222.png" rel="icon">
    <link href="../logo/logo222.png" rel="apple-touch-icon">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Lao+Looped:wght@100&display=swap');

    * {
        font-family: 'Noto Sans Lao', sans-serif;
    }
    </style>
    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>

    <!-- //!        Modal -->
    <?php require 'Modal/Modal.php' ?>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center  me-auto me-lg-0">
                <img src="../logo/logo222.png" alt="">
                <h1>JSPH</h1>
            </a>
            <a class="logo d-flex align-items-center  me-auto me-lg-0 ">
                <img src="../upload/<?php echo $rows_sell['image'] ?>" class="rounded-circle border border-info" alt="">
                <h6><span class=""><?php echo $rows_sell['fname'] . " ". $rows_sell['lname'] ?></span></h6>
            </a>

            <nav id="navbar" class="navbar">

                <ul>
                    <li><a href="services.html"><span>ໜ້າຫຼັກ</span></a></li>
                    <li><a href="services.html"><span>ກ່ຽວກັບ</span></a></li>
                    <li class="dropdown"><a href="#"><span>ສິນຄ້າ</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <?php foreach($row_type as $data) { ?>
                            <li><a href="gallery.html"><span><?php echo $data['type_name'] ?></span></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li><span class="mf-3 btn text-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            ໂພດຂາຍສິນຄ້າ</span></li>
                    <li><a href="contact.html"><span>ຜູ້ພັດທະນາ</span></a></li>​
                    <li><a><span id="<?php echo $rows_sell['us_id'] ?>" class="badge fw-bolder fs-6 bg-gradient-warning text-danger btn logout"><span>ອອກຈາກລະບົບ</span></span></a>
                    </li>​
                </ul>
            </nav><!-- .navbar -->

            <div class="header-social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->


    <main id="main" data-aos="fade" data-aos-delay="1500" style="margin-top: 120px;">

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container-fluid">

                <div class="row gy-4 justify-content-center">
                    <?php foreach ($rows_prod as $data_pro) { ?>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <p>ສະພາບສິນຄ້າ:​<?php echo $data_pro['mer_name'] ?></p>
                        <div class="gallery-item h-50 ">
                            <img src="assets/img/gallery/<?php echo $data_pro['im_image'] ?>" class="img-fluid" alt="">
                            <div class="gallery-links d-flex align-items-center justify-content-center">
                                <a href="assets/img/gallery/<?php echo $data_pro['im_image'] ?>"
                                    title="<?php echo $data_pro['im_cause'] ?>" class="glightbox preview-link"><i
                                        class="bi bi-arrows-angle-expand"></i></a>
                                <a href="gallery-single.html" class="details-link"><i
                                        class="bi bi-bag-check-fill"></i></a>
                            </div>

                        </div>
                        <a href="index.html" class="logo d-flex align-items-center  me-auto me-lg-0">
                            <img src="../upload/<?php echo $data_pro['image'] ?>" style="width: 50px;height : 50px"
                                class="rounded-circle" alt="">
                            <p style="display: block;" class="text-info d-block">
                                <?php echo $data_pro['fname']. " ". $data_pro['lname'] ?></p>
                        </a>
                        <div>ລາຄາ : <b class="text-danger">
                                <?php echo number_format($data_pro['im_sprice']). " ກີບ" ?></b></div>
                    </div><!-- End Gallery Item -->

                    <?php } ?>
                </div>


            </div>
        </section><!-- End Gallery Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>PhotoFolio</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader">
        <div class="line"></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <!-- sweetalert -->
    <script src="../assets/js/sweetalert2.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <!-- jquery -->
    <script src="../assets/js/jquery.js"></script>

    <script>
    $(document).ready(function() {
        setInterval(() => {
            $.ajax({
                type: "post",
                url: "../assets/url/update.php",
                data: {
                    us_id_time : <?php echo $_SESSION['us_id'] ?>
                },
                success: function (response) {
                    
                }
            });
        }, 5000);
        // todo ສະແດງຮູບແບບຂອງໜ້າຟອມ
        $('#us_id').val(<?php echo $_SESSION['us_id'] ?>)
        $('#file').change(function() {
            const file = this.files[0];
            let timerInterval
            Swal.fire({
                title: 'ກຳລັງສະແດງຮູບພາບ',
                html: 'ກຳລັງຄຳນວນ <b></b> ວິນາທີ.',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $('#img').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            })
        });

        // todo     ກົດປຸ່ມອອກຈາກລະບົບ
        $('.logout').click(function(e) {
            e.preventDefault();
            var logout = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "logout.php",
                data: {
                    logout: logout
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'ອອກຈາກລະບົບສຳເລັດ',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout(() => {
                        location.reload();
                    }, 1500)
                }
            });
        })

        // todo ນຳເຂົ້າສິນຄ້າ
        $('#form_import').on('submit', function(e) {
            e.preventDefault()
            var im_sprice = $('#im_sprice').val()
            var type_type_id = $('#type_type_id').val()
            var merchandise_mer_id = $('#merchandise_mer_id').val()
            var im_cause = $('#im_cause').val();
            var us_id = $('#us_id').val()
            if (us_id == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'ເກີດຂໍ້ຜິດພາດບາງຢ່າງກະລຸນາລອງໃຫມ່ອີກຄັ້ງ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (im_sprice == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາບົງບອກລາຄາສິນຄ້າຂອງທ່ານ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (type_type_id == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາເລືອກປະເພດສິນຄ້າຂອງທ່ານ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (merchandise_mer_id == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາບົງບອກສະພາບສິນຄ້າຂອງທ່ານ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else {
                var fd = new FormData();
                var files = $('#file')[0].files;
                if (files.length > 0) {
                    fd.append('file', $('input[name=file]')[0].files[0]);
                    fd.append('us_id', $('input[name=us_id]').val());
                    fd.append('im_sprice', $('input[name=im_sprice]').val());
                    fd.append('type_type_id', $('select[name=type_type_id]').val());
                    fd.append('merchandise_mer_id', $('select[name=merchandise_mer_id]').val());
                    fd.append('im_cause', $('textarea[name=im_cause]').val());
                    $.ajax({
                        url: '../assets/url/upload.php',
                        type: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            var dataJson = JSON.parse(response)
                            if (dataJson == 1) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'ກະລຸນາປ້ອນຮູບພາບເທົ່ານັ້ນ',
                                    confirmButtonText: 'ຕົກລົງ',
                                    confirmButtonColor: '#cb0c9f'
                                })
                            } else {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ໂພດຂໍ້ມູນສຳເລັດ',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                setTimeout(() => {
                                    location.reload()
                                }, 1500)
                            }
                        },
                    });
                } else {
                    Swal.file({
                        icon: 'warning',
                        title: 'ປ້ອນຮູບສິນຄ້າຂອງທ່ານກອ່ນ',
                        confirmButtonText: 'ຕົກລົງ'
                    })
                }
            }
        })
    })
    </script>

</body>

</html>