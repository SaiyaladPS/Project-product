<?php
require '../Connected/connected.php';
$stmt_pro = $conn->prepare("SELECT * FROM province");
$stmt_pro->execute();
$row_pro = $stmt_pro->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../logo/logo222.png">
    <link rel="icon" type="image/png" href="../logo/logo222.png">
    <title>
        JSPH | ສະໜັກເພືອຂາຍສິນຄ້າ
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Lao+Looped:wght@100&display=swap');

    * {
        font-family: 'Noto Sans Lao', sans-serif;
    }
    </style>
</head>

<body class="">
    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
        <div class="container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../web/index.php">
                JSPH
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>

        </div>
    </nav>
    <!-- End Navbar -->
    <main class="main-content  mt-0">
        <section class="min-vh-100 mb-8">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
                style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <h1 class="text-white mb-2 mt-5">ຍິນດີຕອນຮັບ!</h1>
                            <p class="text-lead text-white">ສະໜັກບັນຊີຂອງທ່ານເພືອເຂົ້າສູ່ການຂາຍສິນຄ້າຂອງທ່ານ</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <div class="col-xl-4 col-lg-5 col-md-7 w-80 mx-auto">
                        <div class="card z-index-0">
                            <div class="card-header text-center pt-4">
                                <h5>ສະໜັກບັນຊີ</h5>
                            </div>
                            <div class="row px-xl-5 px-sm-4 px-3">
                                <div class="col-3 ms-auto px-1">
                                    <a class="btn btn-outline-light w-100" href="javascript:;">
                                        <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink32">
                                            <g id="Artboard" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="facebook-3" transform="translate(3.000000, 3.000000)"
                                                    fill-rule="nonzero">
                                                    <circle fill="#3C5A9A" cx="29.5091719" cy="29.4927506"
                                                        r="29.4882047"></circle>
                                                    <path
                                                        d="M39.0974944,9.05587273 L32.5651312,9.05587273 C28.6886088,9.05587273 24.3768224,10.6862851 24.3768224,16.3054653 C24.395747,18.2634019 24.3768224,20.1385313 24.3768224,22.2488655 L19.8922122,22.2488655 L19.8922122,29.3852113 L24.5156022,29.3852113 L24.5156022,49.9295284 L33.0113092,49.9295284 L33.0113092,29.2496356 L38.6187742,29.2496356 L39.1261316,22.2288395 L32.8649196,22.2288395 C32.8649196,22.2288395 32.8789377,19.1056932 32.8649196,18.1987181 C32.8649196,15.9781412 35.1755132,16.1053059 35.3144932,16.1053059 C36.4140178,16.1053059 38.5518876,16.1085101 39.1006986,16.1053059 L39.1006986,9.05587273 L39.0974944,9.05587273 L39.0974944,9.05587273 Z"
                                                        id="Path" fill="#FFFFFF"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                                <div class="col-3 px-1">
                                    <a class="btn btn-outline-light w-100" href="javascript:;">
                                        <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Artboard" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="apple-black" transform="translate(7.000000, 0.564551)"
                                                    fill="#000000" fill-rule="nonzero">
                                                    <path
                                                        d="M40.9233048,32.8428307 C41.0078713,42.0741676 48.9124247,45.146088 49,45.1851909 C48.9331634,45.4017274 47.7369821,49.5628653 44.835501,53.8610269 C42.3271952,57.5771105 39.7241148,61.2793611 35.6233362,61.356042 C31.5939073,61.431307 30.2982233,58.9340578 25.6914424,58.9340578 C21.0860585,58.9340578 19.6464932,61.27947 15.8321878,61.4314159 C11.8738936,61.5833617 8.85958554,57.4131833 6.33064852,53.7107148 C1.16284874,46.1373849 -2.78641926,32.3103122 2.51645059,22.9768066 C5.15080028,18.3417501 9.85858819,15.4066355 14.9684701,15.3313705 C18.8554146,15.2562145 22.5241194,17.9820905 24.9003639,17.9820905 C27.275104,17.9820905 31.733383,14.7039812 36.4203248,15.1854154 C38.3824403,15.2681959 43.8902255,15.9888223 47.4267616,21.2362369 C47.1417927,21.4153043 40.8549638,25.1251794 40.9233048,32.8428307 M33.3504628,10.1750144 C35.4519466,7.59650964 36.8663676,4.00699306 36.4804992,0.435448578 C33.4513624,0.558856931 29.7884601,2.48154382 27.6157341,5.05863265 C25.6685547,7.34076135 23.9632549,10.9934525 24.4233742,14.4943068 C27.7996959,14.7590956 31.2488715,12.7551531 33.3504628,10.1750144"
                                                        id="Shape"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                                <div class="col-3 me-auto px-1">
                                    <a class="btn btn-outline-light w-100" href="javascript:;">
                                        <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Artboard" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="google-icon" transform="translate(3.000000, 2.000000)"
                                                    fill-rule="nonzero">
                                                    <path
                                                        d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267"
                                                        id="Path" fill="#4285F4"></path>
                                                    <path
                                                        d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667"
                                                        id="Path" fill="#34A853"></path>
                                                    <path
                                                        d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782"
                                                        id="Path" fill="#FBBC05"></path>
                                                    <path
                                                        d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769"
                                                        id="Path" fill="#EB4335"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mt-2 position-relative text-center">
                                    <p
                                        class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                                        ຫຼື
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form text-left" id="form_user_sell">
                                    <div class='preview text-center'>
                                        <h3 class=" text-center">ຮູບພາບຂອງທ່ານ</h3>
                                        <img src="../upload/585e4beacb11b227491c3399.png" id="img"
                                            class="avatar  w-25 h-25">
                                    </div>
                                    <div>
                                        <input type="file" id="file" name="file" />
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">ຊື່</span>
                                                    <input type="text" class="form-control" name="fname" id="fname"
                                                        placeholder="" aria-label="$gmail.com"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">@gmail.com</span>
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="" aria-label="$gmail.com"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ເລືອກແຂວງ</label>
                                                <select class="form-control" name="pro_user_sell" id="pro_user_sell">
                                                    <option value="" selected hidden>ເລືອກແຂວງ</option>
                                                    <?php foreach($row_pro as $data_pro) { ?>
                                                    <option value="<?php echo $data_pro['pro_id'] ?>">
                                                        <?php echo $data_pro['pro_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">ເລືອກເມືອງ</label>
                                                <select class="form-control" name="dis_user_sell" id="dis_user_sell"
                                                    disabled>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">ນາມສະກຸນ</span>
                                                    <input type="text" class="form-control" name="lname" id="lname"
                                                        placeholder="" aria-label="$gmail.com"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">ລະຫັດຜ່ານ</span>
                                                    <input type="password" name="password" id="password"
                                                        class="form-control" placeholder="Username"
                                                        aria-label="*********" aria-describedby="basic-addon1">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text"
                                                        id="basic-addon1">ຢືນຢັນລະຫັດຜ່ານ</span>
                                                    <input type="password" id="C_password" class="form-control"
                                                        placeholder="Username" aria-label="*********"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">ບ້ານ</span>
                                                    <input type="text" id="vill" name="vill" class="form-control"
                                                        placeholder="Username" aria-label="$gmail.com"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-text">ໜາຍເຫດ</span>
                                                    <textarea class="form-control" id="us_cause" name="us_cause"
                                                        aria-label="With textarea"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-info text-left">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                            checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            ຂ້ອຍຍອມຮັບ <a href="javascript:;"
                                                class="text-dark font-weight-bolder">ເງືອນໄຂທັ້ງໝົດ</a>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-gradient-dark w-100 my-4 mb-2">ບັນທືກ</button>
                                    </div>
                                    <p class="text-sm mt-3 mb-0">ທ່ານມີບັນຊີແລ້ວ ຫຼຶ ບໍ? <a href="../pages/sign-in.php"
                                            class="text-dark font-weight-bolder">ເຂົ້າສູ່ລະບົບ</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <footer class="footer py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-4 mx-auto text-center">
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Company
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            About Us
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Team
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Products
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Blog
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Pricing
                        </a>
                    </div>
                    <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-dribbble"></span>
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-twitter"></span>
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-instagram"></span>
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-pinterest"></span>
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-github"></span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 mx-auto text-center mt-1">
                        <p class="mb-0 text-secondary">
                            Copyright © <script>
                            document.write(new Date().getFullYear())
                            </script> Soft by Creative Tim.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
    <!-- Sweetaler -->
    <script src="../assets/js/sweetalert2.js"></script>
    <!-- jquery -->
    <script src="../assets/js/jquery.js"></script>
    <script>
    $(document).ready(function() {
        // !     ບັນທືກຂໍ້ມູນຜູ້ຂາຍສິນຄ້າ
        $('#form_user_sell').on('submit', function(e) {
            e.preventDefault();
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var email = $('#email').val();
            var pro_user_sell = $('#pro_user_sell').val();
            var dis_user_sell = $('#dis_user_sell').val();
            var password = $('#password').val();
            var vill = $('#vill').val();
            var C_password = $('#C_password').val()

            var fd = new FormData();
            var files = $('#file')[0].files;
            if (fname == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນຊື່',
                    confirmButtonText: 'ຕົກລົງ',
                    confirmButtonColor: '#cb0c9f'
                })
            } else if (lname == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນນາມສະກຸນ',
                    confirmButtonText: 'ຕົກລົງ',
                    confirmButtonColor: '#cb0c9f'
                })
            } else if (email == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນອີເມວ',
                    confirmButtonText: 'ຕົກລົງ',
                    confirmButtonColor: '#cb0c9f'
                })
            } else if (pro_user_sell == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາເລືອກແຂວງ',
                    confirmButtonText: 'ຕົກລົງ',
                    confirmButtonColor: '#cb0c9f'
                })
            } else if (dis_user_sell == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາເລືອກເມືອງ',
                    confirmButtonText: 'ຕົກລົງ',
                    confirmButtonColor: '#cb0c9f'
                })
            } else if (password == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນລະຫັດຜ່ານ',
                    confirmButtonText: 'ຕົກລົງ',
                    confirmButtonColor: '#cb0c9f'
                })
            } else if (C_password == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາຢືນຢັນລະຫັດຜ່ານ',
                    confirmButtonText: 'ຕົກລົງ',
                    confirmButtonColor: '#cb0c9f'
                })
            } else if (C_password != password) {
                Swal.fire({
                    icon: 'warning',
                    title: 'ລະຫັດຜ່ານບໍ່ຕົງກັນ',
                    confirmButtonText: 'ຕົກລົງ',
                    confirmButtonColor: '#cb0c9f'
                })
            } else if (vill == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນບ້ານ',
                    confirmButtonText: 'ຕົກລົງ',
                    confirmButtonColor: '#cb0c9f'
                })
            } else {
                if (files.length > 0) {
                    fd.append('file', $('input[name=file]')[0].files[0]);
                    fd.append('fname', $('input[name=fname]').val());
                    fd.append('lname', $('input[name=lname]').val());
                    fd.append('email', $('input[name=email]').val());
                    fd.append('pro_user_sell', $('select[name=pro_user_sell]').val());
                    fd.append('dis_user_sell', $('select[name=dis_user_sell]').val());
                    fd.append('password', $('input[name=password]').val());
                    fd.append('vill', $('input[name=vill]').val());
                    fd.append('us_cause', $('textarea[name=us_cause]').val());

                    // todo ເຊັກຂໍ້ມູນທີ່ຊ້ຳກັນລະຫວ່າງ email and password
                    $.ajax({
                        type: "post",
                        url: "../assets/url/select.php",
                        data: {
                            email_user_sell: email,
                            password_user_sell: password
                        },
                        success: function(response) {
                            var check = JSON.parse(response);
                            if (check >= 1) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'ຂໍອະໄພບໍ່ສາມາດບັນທືກຂໍ້ມູນໄດ້',
                                    text: 'ເນືອຈາກວ່າທ່ານມີຂໍ້ມູນນີ້ຢູ່ໃນລະບົບແລ້ວ',
                                    confirmButtonText: 'ຕົກລົງ',
                                    confirmButtonColor: '#cb0c9f'
                                })
                            } else {
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
                                                title: 'ບັນທືກຂໍ້ມູນສຳເລັດ',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                            setTimeout(() => {
                                                $.ajax({
                                                    type: "post",
                                                    url: "../assets/url/select.php",
                                                    data: {
                                                        check_email: email,
                                                        check_password: password
                                                    },
                                                    success: function(response) {
                                                      var check = JSON.parse(response)
                                                      if (check == 1) {
                                                                        Swal.fire({
                                                                icon: 'warning',
                                                                title: 'ຂໍ້ອາໄພເກີດຂໍ້ຜິດພາດຂື້ນ',
                                                                text : 'ເນືອງຈາກບັນຊີຂອງທ່ານອາດຖືກຜູ້ຮັກສາລະບົບຫຍຸດໃຊ້ງານໃນການຂາຍ',
                                                                confirmButtonText: 'ຕົກລົງ',
                                                                confirmButtonColor: '#cb0c9f'
                                                            })
                                                      } else{
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'ທ່ານໄດ້ສະໜັກເປັນຝ່າຍຂາຍສຳເລັດແລ້ວ',
                                                            showConfirmButton: false,
                                                            timer: 1500
                                                        })
                                                        setTimeout(() => {
                                                          location = '../web/index_sell.php';
                                                        },1500);
                                                    }
                                                  }
                                                });
                                            }, 1500)
                                        }
                                    },
                                });
                            }
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'ກະລຸນາປ້ອນຮູບພາບເພືອລະບຸກຕົວທ່ານ',
                        confirmButtonText: 'ຕົກລົງ',
                        confirmButtonColor: '#cb0c9f'
                    })
                }
            }
        })


        // todo ສະແດງຮູບແບບຂອງໜ້າຟອມ
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

        //   todo   ດືງຂໍ້ມູນເມືອງ
        $('#pro_user_sell').change(function() {
            $('#dis_user_sell').html(`<option value="" selected hidden>ເລືອກເມືອງ</option>`).prop(
                'disabled', false)
            var pro_id = $(this).val();
            $.ajax({
                type: "post",
                url: "../assets/url/select.php",
                data: {
                    pro_id_users_sell: pro_id
                },
                success: function(response) {
                    var data_dis = JSON.parse(response)
                    $.each(data_dis, function(index, value) {
                        $('#dis_user_sell').append(
                            `<option value="${value.dis_id}">${value.dis_name}</option>`
                        ).prop('disabled', false)
                    });
                }
            });
        })
    })
    </script>
</body>

</html>