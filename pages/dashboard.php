<?php
session_start();
require '../Connected/connected.php';
if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_pass'])) {
    // !  ຄັງເງີນໃນລະບົບ
$stmt_arr = $conn->prepare("SELECT SUM(money) as money FROM arrears");
$stmt_arr->execute();
$rows_arr = $stmt_arr->fetch(PDO::FETCH_ASSOC);

// !  ຈຳນວນສິນຄ້າທີ່ຍັງຂາຍ
$stmt_impotr = $conn->prepare("SELECT * FROM import WHERE on_or_off = 'on'");
$stmt_impotr->execute();
$rows_impotr = $stmt_impotr->rowCount();
// !  ຈຳນວນສິນຄ້າຂາຍອອກ ແລະ ຈຳນວນເງີນ
$stmt_orders = $conn->prepare("SELECT * FROM orders");
$stmt_orders->execute();
$rows_orders = $stmt_orders->rowCount();

// !  ລ່ວມຈຳນວນເງີນທີ່ຂາຍອອກ
$stmt_orders_sp = $conn->prepare("SELECT SUM(import.im_sprice) as ps FROM orders INNER JOIN import ON orders.import_im_id = import.im_id");
$stmt_orders_sp->execute();
$rows_orders_ps = $stmt_orders_sp->fetch(PDO::FETCH_ASSOC);

// !  ຈຳນວນພະລັກງານຂາຍ
$sql_users_sell = "SELECT * FROM user_sell";
$stmt_users_sell = $conn->prepare($sql_users_sell);
$stmt_users_sell->execute();
$rows_users_sel = $stmt_users_sell->rowCount();
// // !  ຈຳເງີນຂອງຄົນທີ່ເຮັດລາຍໄດ້ສູງສຸດ
$stmt_users_sell_ps = $conn->prepare("SELECT MAX(together) as money_max , fname, lname FROM user_sell");
$stmt_users_sell_ps->execute();
$rows_users_ps = $stmt_users_sell_ps->fetch(PDO::FETCH_ASSOC);

// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 1
$stmt_one = $conn->prepare("SELECT SUM(money) as money_one FROM arrears WHERE arr_date BETWEEN '2023-01-01' AND '2023-01-31'");
$stmt_one->execute();
$stmt_row = $stmt_one->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 2
$stmt_2 = $conn->prepare("SELECT SUM(money) as money_2 FROM arrears WHERE arr_date BETWEEN '2023-02-01' AND '2023-02-31'");
$stmt_2->execute();
$rows_2 = $stmt_2->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 3
$stmt_3 = $conn->prepare("SELECT SUM(money) as money_3 FROM arrears WHERE arr_date BETWEEN '2023-03-01' AND '2023-03-31'");
$stmt_3->execute();
$rows_3 = $stmt_3->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 4
$stmt_4 = $conn->prepare("SELECT SUM(money) as money_4 FROM arrears WHERE arr_date BETWEEN '2023-04-01' AND '2023-04-31'");
$stmt_4->execute();
$rows_4 = $stmt_4->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 5
$stmt_5 = $conn->prepare("SELECT SUM(money) as money_5 FROM arrears WHERE arr_date BETWEEN '2023-05-01' AND '2023-05-31'");
$stmt_5->execute();
$rows_5 = $stmt_5->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 6
$stmt_6 = $conn->prepare("SELECT SUM(money) as money_6 FROM arrears WHERE arr_date BETWEEN '2023-06-01' AND '2023-06-31'");
$stmt_6->execute();
$rows_6 = $stmt_6->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 7
$stmt_7 = $conn->prepare("SELECT SUM(money) as money_7 FROM arrears WHERE arr_date BETWEEN '2023-07-01' AND '2023-07-31'");
$stmt_7->execute();
$rows_7 = $stmt_7->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 8
$stmt_8 = $conn->prepare("SELECT SUM(money) as money_8 FROM arrears WHERE arr_date BETWEEN '2023-08-01' AND '2023-08-31'");
$stmt_8->execute();
$rows_8 = $stmt_8->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 9
$stmt_9 = $conn->prepare("SELECT SUM(money) as money_9 FROM arrears WHERE arr_date BETWEEN '2023-09-01' AND '2023-09-31'");
$stmt_9->execute();
$rows_9 = $stmt_9->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 10
$stmt_10 = $conn->prepare("SELECT SUM(money) as money_10 FROM arrears WHERE arr_date BETWEEN '2023-10-01' AND '2023-10-31'");
$stmt_10->execute();
$rows_10 = $stmt_10->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 11
$stmt_11 = $conn->prepare("SELECT SUM(money) as money_11 FROM arrears WHERE arr_date BETWEEN '2023-11-01' AND '2023-11-31'");
$stmt_11->execute();
$rows_11 = $stmt_11->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 12
$stmt_12 = $conn->prepare("SELECT SUM(money) as money_12 FROM arrears WHERE arr_date BETWEEN '2023-12-01' AND '2023-12-31'");
$stmt_12->execute();
$rows_12 = $stmt_12->fetch(PDO::FETCH_ASSOC);


// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 1
$stmt_orders_1 = $conn->prepare("SELECT SUM(import.im_sprice) as sp_1 FROM orders INNER JOIN import ON orders.import_im_id = import.im_id WHERE orders.o_date BETWEEN '2023-01-01' AND '2023-01-31'");
$stmt_orders_1->execute();
$stmt_rows_1 = $stmt_orders_1->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 2
$stmt_orders_2 = $conn->prepare("SELECT SUM(import.im_sprice) as sp_2 FROM orders INNER JOIN import ON orders.import_im_id = import.im_id WHERE orders.o_date BETWEEN '2023-02-01' AND '2023-02-31'");
$stmt_orders_2->execute();
$stmt_rows_2 = $stmt_orders_2->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 3
$stmt_orders_3 = $conn->prepare("SELECT SUM(import.im_sprice) as sp_3 FROM orders INNER JOIN import ON orders.import_im_id = import.im_id WHERE orders.o_date BETWEEN '2023-03-01' AND '2023-03-31'");
$stmt_orders_3->execute();
$stmt_rows_3 = $stmt_orders_3->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 4
$stmt_orders_4 = $conn->prepare("SELECT SUM(import.im_sprice) as sp_4 FROM orders INNER JOIN import ON orders.import_im_id = import.im_id WHERE orders.o_date BETWEEN '2023-04-01' AND '2023-04-31'");
$stmt_orders_4->execute();
$stmt_rows_4 = $stmt_orders_4->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 5
$stmt_orders_5 = $conn->prepare("SELECT SUM(import.im_sprice) as sp_5 FROM orders INNER JOIN import ON orders.import_im_id = import.im_id WHERE orders.o_date BETWEEN '2023-05-01' AND '2023-05-31'");
$stmt_orders_5->execute();
$stmt_rows_5 = $stmt_orders_5->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 6
$stmt_orders_6 = $conn->prepare("SELECT SUM(import.im_sprice) as sp_6 FROM orders INNER JOIN import ON orders.import_im_id = import.im_id WHERE orders.o_date BETWEEN '2023-06-01' AND '2023-06-31'");
$stmt_orders_6->execute();
$stmt_rows_6 = $stmt_orders_6->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 7
$stmt_orders_7 = $conn->prepare("SELECT SUM(import.im_sprice) as sp_7 FROM orders INNER JOIN import ON orders.import_im_id = import.im_id WHERE orders.o_date BETWEEN '2023-07-01' AND '2023-07-31'");
$stmt_orders_7->execute();
$stmt_rows_7 = $stmt_orders_7->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 8
$stmt_orders_8 = $conn->prepare("SELECT SUM(import.im_sprice) as sp_8 FROM orders INNER JOIN import ON orders.import_im_id = import.im_id WHERE orders.o_date BETWEEN '2023-08-01' AND '2023-08-31'");
$stmt_orders_8->execute();
$stmt_rows_8 = $stmt_orders_8->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 9
$stmt_orders_9 = $conn->prepare("SELECT SUM(import.im_sprice) as sp_9 FROM orders INNER JOIN import ON orders.import_im_id = import.im_id WHERE orders.o_date BETWEEN '2023-09-01' AND '2023-09-31'");
$stmt_orders_9->execute();
$stmt_rows_9 = $stmt_orders_9->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 10
$stmt_orders_10 = $conn->prepare("SELECT SUM(import.im_sprice) as sp_10 FROM orders INNER JOIN import ON orders.import_im_id = import.im_id WHERE orders.o_date BETWEEN '2023-10-01' AND '2023-10-31'");
$stmt_orders_10->execute();
$stmt_rows_10 = $stmt_orders_10->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 11
$stmt_orders_11 = $conn->prepare("SELECT SUM(import.im_sprice) as sp_11 FROM orders INNER JOIN import ON orders.import_im_id = import.im_id WHERE orders.o_date BETWEEN '2023-11-01' AND '2023-11-31'");
$stmt_orders_11->execute();
$stmt_rows_11 = $stmt_orders_11->fetch(PDO::FETCH_ASSOC);
// !  ຈຳນວນເງີນຂອງລະບັບສະເພາະເດືອນ 12
$stmt_orders_12 = $conn->prepare("SELECT SUM(import.im_sprice) as sp_12 FROM orders INNER JOIN import ON orders.import_im_id = import.im_id WHERE orders.o_date BETWEEN '2023-12-01' AND '2023-12-31'");
$stmt_orders_12->execute();
$stmt_rows_12 = $stmt_orders_12->fetch(PDO::FETCH_ASSOC);
} else {
  header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../logo/logo222.png">
  <link rel="icon" type="image/png" href="../logo/logo222.png">
  <title>
    JSPH | ລາຍງານຜົນ
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/fontawesome.css">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
     <!-- //* fonts -->
     <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Lao+Looped:wght@100&display=swap');

    * {
        font-family: 'Noto Sans Lao', sans-serif;
    }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="../logo/logo222.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-success">JSPH</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  active" href="../pages/dashboard.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">ລາຍງານຜົນ</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../pages/tables.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>office</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g id="office" transform="translate(153.000000, 2.000000)">
                        <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                        <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">ຕາຕະລາງ</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../pages/city.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>credit-card</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">ທີ່ຢູ່</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../pages/user_sell.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>box-3d-50</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(603.000000, 0.000000)">
                        <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                        <path class="color-background opacity-6" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"></path>
                        <path class="color-background opacity-6" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">ຄົນຂາຍ</span>
          </a>
        </li>
       
            
          </a>
        </li>
     
   
      
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">ລາຍງານຜົນ</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">ລາຍງານຜົນ</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">ລາຍງານຜົນ</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <div id="Date_And_time" class="btn btn-outline-primary btn-sm mb-0 me-3"></div>
            </li>

            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">ລັງເງີນໃນລະບົບ</p>
                    <h5 class="font-weight-bolder mb-0">
                      K <?php echo number_format( $rows_arr['money'])  ?>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">ຈຳນວນສິນຄ້າທີ່ຍັງຂາຍ</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php echo number_format($rows_impotr) ?>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-archive-2"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">ຈຳນວນຄົນຂາຍ</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php echo number_format($rows_users_sel) ?> ຄົນ<br>
                      <span class="text-success text-sm font-weight-bolder">ລາຍໄດ້ສູ່ງສຸດ <?php echo " / " . $rows_users_ps['fname'] . " " . $rows_users_ps['lname'] . " " .  number_format($rows_users_ps['money_max']) ?></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-circle-08" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">ສິນຄ້າທີ່ຂາຍອອກ</p>
                    <h5 class="font-weight-bolder mb-0">
                      K <?php echo number_format($rows_orders_ps['ps']) ?>
                      <span class="text-success text-sm font-weight-bolder"> ຈຳນວນຂາຍ <?php echo number_format($rows_orders) ?></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
     
        </div>
        <div class="col-lg-5">
         
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-5 mb-lg-0 mb-4">
          <div class="card z-index-2">
            <div class="card-body p-3">
              <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
              <h6 class="ms-2 mt-4 mb-0"> Active Users </h6>
              <p class="text-sm ms-2"> (<span class="font-weight-bolder">+23%</span>) than last week </p>
              <div class="container border-radius-lg">
                <div class="row">
                  <div class="col-3 py-3 ps-0">
                    <div class="d-flex mb-2">
                      <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="10px" height="10px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>document</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(154.000000, 300.000000)">
                                  <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                  <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <p class="text-xs mt-1 mb-0 font-weight-bold">Users</p>
                    </div>
                    <h4 class="font-weight-bolder">36K</h4>
                    <div class="progress w-75">
                      <div class="progress-bar bg-dark w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-3 py-3 ps-0">
                    <div class="d-flex mb-2">
                      <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-info text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="10px" height="10px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>spaceship</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(4.000000, 301.000000)">
                                  <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                                  <path class="color-background" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                                  <path class="color-background" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z" opacity="0.598539807"></path>
                                  <path class="color-background" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z" opacity="0.598539807"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <p class="text-xs mt-1 mb-0 font-weight-bold">Clicks</p>
                    </div>
                    <h4 class="font-weight-bolder">2m</h4>
                    <div class="progress w-75">
                      <div class="progress-bar bg-dark w-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-3 py-3 ps-0">
                    <div class="d-flex mb-2">
                      <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-warning text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="10px" height="10px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <p class="text-xs mt-1 mb-0 font-weight-bold">Sales</p>
                    </div>
                    <h4 class="font-weight-bolder">435$</h4>
                    <div class="progress w-75">
                      <div class="progress-bar bg-dark w-30" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-3 py-3 ps-0">
                    <div class="d-flex mb-2">
                      <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-danger text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="10px" height="10px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>settings</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(304.000000, 151.000000)">
                                  <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                                  <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                                  <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <p class="text-xs mt-1 mb-0 font-weight-bold">Items</p>
                    </div>
                    <h4 class="font-weight-bolder">43</h4>
                    <div class="progress w-75">
                      <div class="progress-bar bg-dark w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="card z-index-2">
            <div class="card-header pb-0">
              <h6>ລາຍໄດ້ດ້ວຍລວ່ມ</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">ຈຳນວນສິນຄ້າຂາຍອອກ <?php echo number_format( $rows_orders) ?> ໃນປີ</span> 2023
              </p>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row my-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          
        </div>
        <div class="col-lg-4 col-md-6">
 
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">

        <div class="w-100 text-center">
          <a class="github-button" href="" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["ມັງກອນ", "ກຸມພາ", "ມີນາ", "ເມສາ", "ພຶດສະພາ", "", "ມິຖຸນາ", "ກໍລະກົດ", "ສິງຫາ","ຕຸລາ","ພະຈິກ","ທັນວາ"],
        datasets: [{
          label: "ລາຍໄດ້",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [<?php echo $stmt_row['money_one'] ?>,<?php echo $rows_2['money_2'] ?> ,<?php echo $rows_3['money_3'] ?> ,<?php echo $rows_4['money_4'] ?> ,<?php echo $rows_5['money_5'] ?> , <?php echo $rows_6['money_6'] ?>,<?php echo $rows_7['money_7'] ?> ,<?php echo $rows_8['money_8'] ?> ,<?php echo $rows_9['money_9'] ?> ,<?php echo $rows_10['money_10'] ?> ,<?php echo $rows_11['money_11'] ?> ,<?php echo $rows_12['money_12'] ?> ],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["ມັງກອນ", "ກຸມພາ", "ມີນາ", "ເມສາ", "ພຶດສະພາ", "", "ມິຖຸນາ", "ກໍລະກົດ", "ສິງຫາ","ຕຸລາ","ພະຈິກ","ທັນວາ"],
        datasets: [{
            label: "ສິນຄ້າຂາຍອອກ",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [<?php echo $stmt_rows_1['sp_1'] ?>,<?php echo $stmt_rows_2['sp_2'] ?>,<?php echo $stmt_rows_3['sp_3'] ?>,<?php echo $stmt_rows_4['sp_4'] ?>,<?php echo $stmt_rows_5['sp_5'] ?>,<?php echo $stmt_rows_6['sp_6'] ?>,<?php echo $stmt_rows_7['sp_7'] ?>,<?php echo $stmt_rows_8['sp_8'] ?>,<?php echo $stmt_rows_9['sp_9'] ?>,<?php echo $stmt_rows_10['sp_10'] ?>,<?php echo $stmt_rows_11['sp_11'] ?>,<?php echo $stmt_rows_12['sp_12'] ?>],
            maxBarThickness: 6

          },
          {
            label: "ລາຍໄດ້ລະບົບ",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [<?php echo $stmt_row['money_one'] ?>,<?php echo $rows_2['money_2'] ?> ,<?php echo $rows_3['money_3'] ?> ,<?php echo $rows_4['money_4'] ?> ,<?php echo $rows_5['money_5'] ?> , <?php echo $rows_6['money_6'] ?>,<?php echo $rows_7['money_7'] ?> ,<?php echo $rows_8['money_8'] ?> ,<?php echo $rows_9['money_9'] ?> ,<?php echo $rows_10['money_10'] ?> ,<?php echo $rows_11['money_11'] ?> ,<?php echo $rows_12['money_12'] ?> ],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
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
  <!-- jquery -->
  <script src="../assets/js/jquery.js"></script>
  <script src="../assets/js/dateandtime.js"></script>
</body>

</html>