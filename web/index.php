<?php
session_start();
    require '../Connected/connected.php';
    // todo ປະເພດສິນຄ້າ
    $stmt_type = $conn->prepare("SELECT * FROM type");
    $stmt_type->execute();
    $row_type = $stmt_type->fetchAll(PDO::FETCH_ASSOC);

        // todot    ດືງຂໍ້ມູນສິນຄ້າ
        $stmt_prod = $conn->prepare("SELECT * FROM import INNER JOIN merchandise ON import.merchandise_mer_id = merchandise.mer_id INNER JOIN type ON import.type_type_id = type.type_id INNER JOIN user_sell ON import.user_sell_us_id = user_sell.us_id WHERE import.on_or_off = 'on'");
        $stmt_prod->execute();
        $rows_prod = $stmt_prod->fetchAll(PDO::FETCH_ASSOC);

        // todo     ດືງຂໍ້ມູນແຂວງ
        $stmt_pro = $conn->prepare("SELECT * FROM province");
        $stmt_pro->execute();
        $rows_pro = $stmt_pro->fetchAll(PDO::FETCH_ASSOC);

        // todo     ບໍລິສັດຂົນສົ່ງ
        $stmt_tp = $conn->prepare("SELECT * FROM transportation");
        $stmt_tp->execute();
        $rows_tp = $stmt_tp->fetchAll(PDO::FETCH_ASSOC);
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

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Lao+Looped:wght@100&display=swap');

    * {
        font-family: 'Noto Sans Lao', sans-serif;
    }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center  me-auto me-lg-0">
                <img src="../logo/logo222.png" alt="">
                <h1>JSPH</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#services"><span>ໜ້າຫຼັກ</span></a></li>
                    <li><a href="services.html"><span>ກ່ຽວກັບ</span></a></li>
                    <li class="dropdown"><a href="#"><span>ສິນຄ້າ</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <?php foreach($row_type as $data) { ?>
                            <li><a href=""><span><?php echo $data['type_name']; ?></span></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li><a href="../pages/sign-up.php"><span>ສະໜັກເປັນສະມາຊິກການຂາຍ</span></a></li>
                    <li><a href="contact.html"><span>ຜູ້ພັດທະນາ</span></a></li>​
                    <li><a href="../pages/sign-in.php"><span class="badge bg-gradient-warning">ເຂົ້າສູ່ລະບົບ</span></a>
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

    <!-- //!    Modal -->
    <?php require 'Modal/Modal.php' ?>

    <main id="main" data-aos="fade" data-aos-delay="1500" style="margin-top: 120px">

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container-fluid">

                <div class="row gy-4 justify-content-center">
                    <h1 class="text-info text-center">ສິນຄ້າທັງໝົດ</h1>
                    <?php foreach ($rows_prod as $data_pro) { ?>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <p>ສະພາບສິນຄ້າ:​<?php echo $data_pro['mer_name'] ?></p>
                        <div class="gallery-item h-50">
                            <img src="assets/img/gallery/<?php echo $data_pro['im_image'] ?>" class="img-fluid" alt="">
                            <div class="gallery-links d-flex align-items-center justify-content-center">
                                <a href="assets/img/gallery/<?php echo $data_pro['im_image'] ?>"
                                    title="<?php echo $data_pro['im_cause'] ?>" class="glightbox preview-link"><i
                                        class="bi bi-arrows-angle-expand"></i></a>
                                <a href="" id="<?php echo $data_pro['im_id'] ?>" data-bs-toggle="modal"
                                    data-bs-target="#orders" class="details-link btn_sp"><i
                                        class="bi bi-bag-check-fill"></i></a>
                            </div>

                        </div>
                        <a href="../pages/profile.php?id=<?php echo $data_pro['us_id'] ?>"
                            class="logo d-flex align-items-center  me-auto me-lg-0">
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
                <?php foreach($row_type as $type) { ?>
                <?php $type_name = $type['type_name'] ?>
                <?php $stmt_type_all = $conn->prepare("SELECT * FROM import INNER JOIN merchandise ON import.merchandise_mer_id = merchandise.mer_id INNER JOIN type ON import.type_type_id = type.type_id INNER JOIN user_sell ON import.user_sell_us_id = user_sell.us_id WHERE import.on_or_off = 'on' AND type.type_name = :type_name");
                    $stmt_type_all->bindParam(':type_name', $type_name, PDO::PARAM_STR);
                    $stmt_type_all->execute();
                    $ros_type = $stmt_type_all->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                <!-- //todo ຫົວຂໍ້ປະເພດສິນຄ້າ -->
                <hr class=" bg-white">
                <h1 class="text-center text-info" id="<?php echo $type['type_name'] ?>"><?php echo $type['type_name'] ?>
                </h1>
                <div class="row gy-4 justify-content-center">
                    <?php foreach ($ros_type as $type_all) { ?>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <p>ສະພາບສິນຄ້າ:​<?php echo $type_all['mer_name'] ?></p>
                        <div class="gallery-item h-50">
                            <img src="assets/img/gallery/<?php echo $type_all['im_image'] ?>" class="img-fluid" alt="">
                            <div class="gallery-links d-flex align-items-center justify-content-center">
                                <a href="assets/img/gallery/<?php echo $type_all['im_image'] ?>"
                                    title="<?php echo $type_all['im_cause'] ?>" class="glightbox preview-link"><i
                                        class="bi bi-arrows-angle-expand"></i></a>
                                <a href="" id="<?php echo $type_all['im_id'] ?>" data-bs-toggle="modal"
                                    data-bs-target="#orders" class="details-link btn_sp"><i
                                        class="bi bi-bag-check-fill"></i></a>
                            </div>

                        </div>
                        <a href="../pages/profile.php?id=<?php echo $type_all['us_id'] ?>"
                            class="logo d-flex align-items-center  me-auto me-lg-0">
                            <img src="../upload/<?php echo $type_all['image'] ?>" style="width: 50px;height : 50px"
                                class="rounded-circle" alt="">
                            <p style="display: block;" class="text-info d-block">
                                <?php echo $type_all['fname']. " ". $type_all['lname'] ?></p>
                        </a>
                        <div>ລາຄາ : <b class="text-danger">
                                <?php echo number_format($type_all['im_sprice']). " ກີບ" ?></b></div>
                    </div><!-- End Gallery Item -->

                    <?php } ?>
                </div>
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

    <!-- sweetalert2  -->
    <script src="../assets/js/sweetalert2.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- jquery -->
    <script src="../assets/js/jquery.js"></script>

    <script>
    $(document).ready(function() {
        // !        ເມືອຜູ້ໃຊ້ມີການກົດທີ່ປຸ່ມຊື່ສິນຄ້າ
        $('.btn_sp').click(function(e) {
            e.preventDefault();
            var id_prod = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "../assets/url/select.php",
                data: {
                    image_prod: id_prod
                },
                success: function(response) {
                    var image = JSON.parse(response);
                    $.each(image, function(index, value) {
                        $('#image_prod').attr(`src`,
                            `assets/img/gallery/${value.im_image}`)
                        $('#im_id').val(value.im_id);
                    });
                }
            });
        })

        // !        ເມືອງມີການເລືອກແຂວງແລ້ວໄປດືງເຂົ້າຂໍູ້ມນມືອງ
        $('#pro').change(function(e) {
            e.preventDefault();
            $('#dis').prop('disabled', false).html(
                `<option selected hidden value="">ເລືອກເມືອງ</option>`)
            var pro_id = $(this).val();
            $.ajax({
                type: "post",
                url: "../assets/url/select.php",
                data: {
                    pro_id_users_sell: pro_id
                },
                success: function(response) {
                    var data_dis = JSON.parse(response);
                    $.each(data_dis, function(index, value) {
                        $('#dis').append(
                            `<option value="${value.dis_id}">${value.dis_name}</option>`
                        )
                    });

                }
            });
        })

        // todo     ເມືອມີການເລືອກບໍ້ລິສັດຂົນສົ່ງ
        $('#tp').change(function(e) {
            e.preventDefault();
            $('#o_pro').prop('disabled', false);
        })

        //  todo    ເມືອມີການເລືອກແຂວງ
        $('#o_pro').change(function(e) {
            $('#o_dis').prop('disabled', false).html('<option value="" hidden selected>ສົ່ງທີ່ເມືອງ</option>');
            var id_prod = $(this).val();
            $.ajax({
                type: "post",
                url: "../assets/url/select.php",
                data: {
                     pro_id_users_sell: id_prod
                },
                success: function (response) {
                    var data_dis = JSON.parse(response);
                    $.each(data_dis, function (indexIn, value) { 
                         $('#o_dis').append(`<option value="${value.dis_id}">${value.dis_name}</option>`)
                    });
                }
            });
        })

        // todo     ບັນທືກຂໍ້ມູນຂອງຄົນສັ່ງຊື່
        $('#form_orders_users').on('submit', function(e) {
            e.preventDefault()
            var im_id = $('#im_id').val()
            var fname = $('.fname').val()
            var lname = $('.lname').val()
            var gender = $('.gender').val()
            var email = $('.email').val()
            var u_Tel = $('.u_Tel').val()
            var pro = $(' #pro').val()
            var dis = $(' #dis').val()
            var u_vill = $('.u_vill').val()
            var tp = $('#tp').val()
            var o_pro = $('#o_pro').val();
            var o_dis = $('#o_dis').val();
            var o_vill = $('.o_vill').val();
            if (fname == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນຊື່ຂອງທ່ານ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (lname == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນນາມສະກຸນ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (gender == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນເພດ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (u_Tel == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນເບີໂທ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (pro == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາເລືອກແຂວງ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (dis == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາເລືອກເມືອງ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (u_vill == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາເລືອກບ້ານ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (email == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນEmail',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (tp == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາເລືອກບໍລິສັດຂົນສົ່ງໃກ້ບ້ານທ່ານ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (o_pro == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາເລືອກແຂວງທີ່ຕ້ອງການຈັດສົ່ງ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (o_dis == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາເລືອກແຂວງທີ່ຕ້ອງການຈັດສົ່ງ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else if (o_vill == ''){
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນສາຂາທີ່ຕ້ອງການຈັດສົ່ງ',
                    confirmButtonText: 'ຕົກລົງ'
                })
            } else {
                $.ajax({
                    type: "post",
                    url: "../assets/url/select.php",
                    data: {
                        email_check_u: email,
                        u_Tel_check: u_Tel,
                    },
                    success: function(data_check) {
                        var data_ck = JSON.parse(data_check);
                        if (data_ck >= 1) {
                            // !ສົ່ງໄປບັນທືກໃນຕາຕະລາງ orders
                            $.ajax({
                                type: "post",
                                url: "../assets/url/select.php",
                                data: {
                                    check_user_email: email,
                                    check_user_Tel: u_Tel,
                                },
                                success: function(response) {
                                    var users_id = JSON.parse(response);
                                    $.ajax({
                                                type: "post",
                                                url: "../assets/url/insert.php",
                                                data: {
                                                    import_id: im_id,
                                                    users_id: users_id.users_id,
                                                    tp_id : tp,
                                                    o_pro : o_pro,
                                                    o_dis : o_dis,
                                                    o_vill : o_vill
                                                },
                                                success: function(response) {
                                                    // !    ໄປເພິ່ມເງີນໃຈກັບຜູ້ຂາຍ ສະປັນຜົນ ໃຫ້ລະບົບ 5%
                                                    $.ajax({
                                                        type: "post",
                                                        url: "../assets/url/select.php",
                                                        data: {select_prod_id : im_id},
                                                        success: function (response) {
                                                            var spcec = JSON.parse(response);
                                                            var im_sp = Math.floor(spcec.im_sprice)
                                                            // ?    ຈຳນວນເງີນຂອງລະບົບທີ່ໄດ້ມາ
                                                            var admin_sp = im_sp * (5/100);
                                                            // ?    ຈຳນວນເງີນຂອງຄົນຂາຍທີ່ໄດ້ມາ
                                                            var users_sell_sp = im_sp - admin_sp;
                                                            // ?    ລະຫັດຂ້ອງ users_sell  ທີ່ຈຳໄປຮັບເງີນ
                                                            var user_sell_id = spcec.user_sell_us_id;
                                                            // !ສົ່ງເງີນໄປໃັຫ້ຄົນຂາຍ
                                                            $.ajax({
                                                                type: "post",
                                                                url: "../assets/url/update.php",
                                                                data: {
                                                                    user_sell_id_tot : user_sell_id,
                                                                    together : users_sell_sp
                                                                },
                                                                success: function (response) {
                                                                    // todo ສົ່ງເງີນໄປເຂົ້າລະບົບ
                                                                    $.ajax({
                                                                        type: "post",
                                                                        url: "../assets/url/insert.php",
                                                                        data: {
                                                                            money : admin_sp,
                                                                            user_sell_id_admin : user_sell_id
                                                                        },
                                                                        success: function (response) {
                                                                            // todo ລົບສິນຄ້າທີ່ຖືກຊື່ອອກຈາກລະບົບ
                                                                            $.ajax({
                                                                                type: "post",
                                                                                url: "../assets/url/update.php",
                                                                                data: {im_id_delete : im_id},
                                                                                success: function (response) {
                                                                                    if (response == '1') {
                                                                                        Swal.fire({
                                                                                            icon : 'success',
                                                                                            title : 'ສັ່ງຊື່ສິນຄ້າສຳລັບແລ້ວ',
                                                                                            text : 'ກຳລັງຈັດສົ່ງສິນຄ້າໃຫ້ທ່ານອາດໃຊ້ເວລາປະມານ 3-4 ວັນ',
                                                                                            confirmButtonText : 'ຕົກລົງ'
                                                                                        })
                                                                                    }
                                                                                }
                                                                            });
                                                                        }
                                                                    });
                                                                }
                                                            });
                                                        }
                                                    });
                                                }
                                            });
                                }
                            });
                        } else {
                            // !    ສົ່ງໄປບັນທືກ    ໃນຕາຕະລາງ usser ແລະ orders
                            $.ajax({
                                type: "post",
                                url: "../assets/url/insert.php",
                                data: $('#form_orders_users').serialize(),
                                success: function() {
                                    // !    ຊອກຫາ users_id 
                                    $.ajax({
                                        type: "post",
                                        url: "../assets/url/select.php",
                                        data: {
                                            check_user_email: email,
                                            check_user_Tel: u_Tel,
                                        },
                                        success: function(response) {
                                            var data_users_id = JSON .parse(response);
                                            // ! ສົ່ງໄປບັນທືກໃນຕາຕະລາງ orders
                                            $.ajax({
                                                type: "post",
                                                url: "../assets/url/insert.php",
                                                data: {
                                                    import_id: im_id,
                                                    users_id: data_users_id.users_id,
                                                    tp_id : tp,
                                                    o_pro : o_pro,
                                                    o_dis : o_dis,
                                                    o_vill : o_vill
                                                },
                                                success: function(response) {
                                                     // !    ໄປເພິ່ມເງີນໃຈກັບຜູ້ຂາຍ ສະປັນຜົນ ໃຫ້ລະບົບ 5%
                                                     $.ajax({
                                                        type: "post",
                                                        url: "../assets/url/select.php",
                                                        data: {select_prod_id : im_id},
                                                        success: function (response) {
                                                            var spcec = JSON.parse(response);
                                                            var im_sp = Math.floor(spcec.im_sprice)
                                                            // ?    ຈຳນວນເງີນຂອງລະບົບທີ່ໄດ້ມາ
                                                            var admin_sp = im_sp * (5/100);
                                                            // ?    ຈຳນວນເງີນຂອງຄົນຂາຍທີ່ໄດ້ມາ
                                                            var users_sell_sp = im_sp - admin_sp;
                                                            // ?    ລະຫັດຂ້ອງ users_sell  ທີ່ຈຳໄປຮັບເງີນ
                                                            var user_sell_id = spcec.user_sell_us_id;
                                                            // !ສົ່ງເງີນໄປໃັຫ້ຄົນຂາຍ
                                                            $.ajax({
                                                                type: "post",
                                                                url: "../assets/url/update.php",
                                                                data: {
                                                                    user_sell_id_tot : user_sell_id,
                                                                    together : users_sell_sp
                                                                },
                                                                success: function (response) {
                                                                    // todo ສົ່ງເງີນໄປເຂົ້າລະບົບ
                                                                    $.ajax({
                                                                        type: "post",
                                                                        url: "../assets/url/insert.php",
                                                                        data: {
                                                                            money : admin_sp,
                                                                            user_sell_id_admin : user_sell_id
                                                                        },
                                                                        success: function (response) {
                                                                            // todo ລົບສິນຄ້າທີ່ຖືກຊື່ອອກຈາກລະບົບ
                                                                            $.ajax({
                                                                                type: "post",
                                                                                url: "../assets/url/update.php",
                                                                                data: {im_id_delete : im_id},
                                                                                success: function (response) {
                                                                                    if (response == '1') {
                                                                                        Swal.fire({
                                                                                            icon : 'success',
                                                                                            title : 'ສັ່ງຊື່ສິນຄ້າສຳລັບແລ້ວ',
                                                                                            text : 'ກຳລັງຈັດສົ່ງສິນຄ້າໃຫ້ທ່ານອາດໃຊ້ເວລາປະມານ 3-4 ວັນ',
                                                                                            confirmButtonText : 'ຕົກລົງ'
                                                                                        })
                                                                                    }
                                                                                }
                                                                            });
                                                                        }
                                                                    });
                                                                }
                                                            });
                                                        }
                                                    });
                                                }
                                            });
                                        }
                                    });
                                }
                            });
                        }
                    }
                });

            }
        })
    });
    </script>

</body>

</html>