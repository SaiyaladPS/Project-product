<?php
    require '../../Connected/connected.php';


    // todo ປະເພດສິນຄ້າ
    if (isset($_POST['uid'])) {
        $sql_type = "SELECT * FROM type";
        $stmt = $conn->query($sql_type);
        $ros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($ros as $rows) {
            $arr[] = array(
                "type_id" => $rows['type_id'],
                "type_name" => $rows['type_name'],
                "type_cause" => $rows['type_cause']
            );
        }
       echo json_encode($arr);
    }

    // todo ສະພາບສິນຄ້າ
    if (isset($_POST['merchandise'])) {
        $sql_merchandise = "SELECT * FROM merchandise";
        $stmt_mer = $conn->query($sql_merchandise);
        $ros_mer = $stmt_mer->fetchAll(PDO::FETCH_ASSOC);
        foreach($ros_mer as $rows_mer) {
            $arr_mer[] = array(
                "mer_id" => $rows_mer['mer_id'],
                "mer_name" => $rows_mer['mer_name'],
                "mer_cause" => $rows_mer['mer_cause'],
            );
        }
        echo json_encode($arr_mer);
    }

    // todo ຄົ້ນຫາຕົວແກ້ໄຂ້ ປະເພດສິນຄ້າ
    if (isset($_POST['edmit_id'])) {
        $edmit_type = $conn->prepare("SELECT * FROM type WHERE type_id = :type_id");
        $edmit_type->bindParam(':type_id', $_POST['edmit_id'], PDO::PARAM_INT);
        $edmit_type->execute();
        $ros_type = $edmit_type->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($ros_type);
    }

    // todo ເຊັກຂໍ້ມູນທີ່ຊ້ຳກັນ ຂອງປະເພດສິນຄ້າ ຂອງການແກ້ໄຂ ແລະ ການບັນທືກ
    if (isset($_POST['check_name'])) {
        $check_type = $conn->prepare("SELECT * FROM type WHERE type_name = :type_name");
        $check_type->bindParam(':type_name', $_POST['check_name'], PDO::PARAM_STR);
        $check_type->execute();
        $numrow = $check_type->rowCount();
        echo json_encode($numrow);
    }

    // todo ຄົນຫາແກ້ໄຂ ສະພາບສິນຄ້າ
    if (isset($_POST['mer_id'])) {
        $stmt_mer_edmit = $conn->prepare("SELECT * FROM merchandise WHERE mer_id = :mer_id ");
        $stmt_mer_edmit->bindParam(':mer_id', $_POST['mer_id'], PDO::PARAM_INT);
        $stmt_mer_edmit->execute();
        $ros_mer_edmit = $stmt_mer_edmit->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($ros_mer_edmit);
    }

    // todo ເຊັກຂໍ້ມູນທີ່ຊ້ຳກັນ ຂອງສະພາບສິນຄ້າ ຂອງການແກ້ໄຂ ແລະ ການບັນທືກ
    if (isset($_POST['mer_name'])) {
        $stmt_mer_name = $conn->prepare("SELECT * FROM merchandise WHERE mer_name = :mer_name");
        $stmt_mer_name->bindParam(':mer_name', $_POST['mer_name'], PDO::PARAM_STR);
        $stmt_mer_name->execute();
        $numrow_mer = $stmt_mer_name->rowCount();
        echo json_encode($numrow_mer);
    }

    // todo ຄົ້າຫາຕົວແກ້ໄຂຂໍ້ມູນແຂວງ
    if (isset($_POST['pro_id'])) {
        $stmt_pro = $conn->prepare("SELECT * FROM province WHERE pro_id = :pro_id");
        $stmt_pro->bindParam(':pro_id', $_POST['pro_id'], PDO::PARAM_INT);
        $stmt_pro->execute();
        $ros_pro = $stmt_pro->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($ros_pro);
    }

    // todo ຄົ້ນຫາການແກ້ໄຂຂໍ້ມູນທີ່ຊ້ຳກັນ ຂອງ ແຂວງ
    if (isset($_POST['pro_name_check'])) {
        $stmt_pro_check = $conn->prepare("SELECT * FROM province WHERE pro_name = :pro_name");
        $stmt_pro_check->bindParam(':pro_name', $_POST['pro_name_check'], PDO::PARAM_STR);
        $stmt_pro_check->execute();
        $numrow_pro_check = $stmt_pro_check->rowCount();
        echo json_encode($numrow_pro_check);
    }

    // todo  ເຊັກຂໍ້ມູນທີ່ຊ້ຳກັນຂອງ ຂອງ ເມືອງ
    if (isset($_POST['dis_name']) && isset($_POST['province_pro_id'])){
        $stmt_dis = $conn->prepare("SELECT * FROM district WHERE dis_name = :dis_name AND province_pro_id = :pro_id");
        $stmt_dis->bindParam(':dis_name', $_POST['dis_name'], PDO::PARAM_STR);
        $stmt_dis->bindParam(':pro_id', $_POST['province_pro_id'], PDO::PARAM_INT);
        $stmt_dis->execute();
        $numrow_dis = $stmt_dis->rowCount();
        echo json_encode($numrow_dis);
    }

    // todo ຄົ້ນຫາຂໍ້ມູນເມືອງ ທີ່ມີການສົ່ງໄອດີມາເພືອນຳໄປແກ້ໄຂ
    if (isset($_POST['dis_id'])) {
        $stmt_dis_edmit = $conn->prepare("SELECT * FROM district INNER JOIN province ON district.province_pro_id = province.pro_id WHERE dis_id = :dis_id");
        $stmt_dis_edmit->bindParam(':dis_id', $_POST['dis_id'], PDO::PARAM_STR);
        $stmt_dis_edmit->execute();
        $ros_rows = $stmt_dis_edmit->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($ros_rows);
    }

    // todo     ຄົ້ນຫາຂໍ້ມູນເມືອງຂອງແຂວງທີ່ເລືອກ
    if(isset($_POST['pro_id_users_sell'])) {
        $stmt_pro_dis = $conn->prepare("SELECT * FROM district WHERE  province_pro_id = :pro_id");
        $stmt_pro_dis->bindParam(':pro_id', $_POST['pro_id_users_sell'], PDO::PARAM_INT);
        $stmt_pro_dis->execute();
        $row_dis = $stmt_pro_dis->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode( $row_dis);
    }

    // todo     ເຊັກຂໍ້ມູນຊ້ຳກັນຂອງ ຄົນຂາຍ
    if (isset($_POST['password']) && isset($_POST['email'])) {
        $passMD5 = md5($_POST['password']);
        $stmt_user_sell = $conn->prepare("SELECT * FROM user_sell WHERE password = :password AND email = :email");
        $stmt_user_sell->bindParam(':password', $passMD5, PDO::PARAM_STR);
        $stmt_user_sell->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt_user_sell->execute();
        $row_user_sell = $stmt_user_sell->rowCount();
        echo json_encode($row_user_sell);
    }

    // todo     ເຊັກຂໍ້ມູນຊ້ຳກັນຂອງ ຄົນຂາຍ
    if (isset($_POST['password_user_sell']) && isset($_POST['email_user_sell'])) {
        $passMD5 = md5($_POST['password_user_sell']);
        $stmt_user_sell = $conn->prepare("SELECT * FROM user_sell WHERE password = :password AND email = :email");
        $stmt_user_sell->bindParam(':password', $passMD5, PDO::PARAM_STR);
        $stmt_user_sell->bindParam(':email', $_POST['email_user_sell'], PDO::PARAM_STR);
        $stmt_user_sell->execute();
        $row_user_sell = $stmt_user_sell->rowCount();
        echo json_encode($row_user_sell);
    }
    // todo     ເຊັກຂໍ້ມູນທີ່ຊ້ຳກັນຂອງຄົນຂອງຕົວແກ້ໄຂ້
    if (isset($_POST['email_us_chkc'])) {
        $stmt_user_sell = $conn->prepare("SELECT * FROM user_sell WHERE  email = :email");
        $stmt_user_sell->bindParam(':email', $_POST['email_us_chkc'], PDO::PARAM_STR);
        $stmt_user_sell->execute();
        $row_user_sell = $stmt_user_sell->rowCount();
        echo json_encode($row_user_sell);
    }
    

    // todo     ຄົນຫາຂໍ້ມູນຄົ້ນຂາຍເພືອໄປແກ້ໄຂ
    if(isset($_POST['us_id'])) {
        $stmt_us_sell = $conn->prepare("SELECT * FROM user_sell INNER JOIN province ON user_sell.province_pro_id = province.pro_id INNER JOIN district ON user_sell.district_dis_id = district.dis_id WHERE user_sell.us_id = :us_id");
        $stmt_us_sell->bindParam(':us_id', $_POST['us_id'], PDO::PARAM_INT);
        $stmt_us_sell->execute();
        $rows_us_sell = $stmt_us_sell->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows_us_sell);
    }

    session_start();
    // todo     ເຊັກການສະໜັກເຂົ້າສູ່ລະບົບ
    if (isset($_POST['check_password']) && isset($_POST['check_email'])) {
        $email = $_POST['check_email'];
        $password_us = $_POST['check_password'];
        $passwordMD5_us = md5($password_us);
        $us_sell_check = $conn->prepare("SELECT * FROM user_sell WHERE email = :email AND password = :password");
        $us_sell_check->bindParam(':email', $email, PDO::PARAM_STR);
        $us_sell_check->bindParam(':password', $passwordMD5_us, PDO::PARAM_STR);
        $us_sell_check->execute();
        $rows_us_check = $us_sell_check->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows_us_check as $data_us) {
            if ($data_us['us_staus'] == 'user_sell'){
                $_SESSION['us_id'] = $data_us['us_id'];
                $_SESSION['email'] = $data_us['email'];
                $_SESSION['password'] = $data_us['password'];
                $arr[] = array(
                    "number" => 2,
                );
                } else {
                    $arr[] = array(
                        "number" => 1,
                    );
                }
            }
            echo json_encode($arr);
        
    }

    // todo     ເຊັກການເຂົ້າລະບົບຂອງຄົນຂາຍ
    if (isset($_POST['us_sell_pass']) && isset($_POST['us_sell_email'])) {
        $pass_check_MD5 = md5($_POST['us_sell_pass']);
        $stmt_check_sell = $conn->prepare("SELECT * FROM user_sell WHERE email = :email AND password = :password");
        $stmt_check_sell->bindParam(':email', $_POST['us_sell_email'], PDO::PARAM_STR);
        $stmt_check_sell->bindParam(':password', $pass_check_MD5, PDO::PARAM_STR);
        $stmt_check_sell->execute();
        $row_check_sell = $stmt_check_sell->rowCount();
        echo json_encode($row_check_sell);
    }

    // todo ຮູບພາບສິນຄ້າທີ່ມີການກົດຊື້
    if (isset($_POST['image_prod'])) {
        $stmt_image = $conn->prepare("SELECT im_image,im_id FROM import WHERE im_id = :im_id");
        $stmt_image->bindParam(':im_id', $_POST['image_prod'], PDO::PARAM_INT);
        $stmt_image->execute();
        $row_image = $stmt_image->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row_image);
    }

    // todo ເຊັກຄ່າຊ້ຳກັນຂ້ອງ user ທີສັ່ງຊື່
    if (isset($_POST['email_check_u']) && isset($_POST['u_Tel_check'])) {
       $stmt_check_email = $conn->prepare("SELECT * FROM users WHERE u_email = :u_email AND u_Tel = :u_Tel");
       $stmt_check_email->bindParam(':u_email', $_POST['email_check_u'], PDO::PARAM_STR);
       $stmt_check_email->bindParam(':u_Tel', $_POST['u_Tel_check'], PDO::PARAM_STR);
       $stmt_check_email->execute();
       $row_user = $stmt_check_email->rowCount();
       echo json_encode($row_user);
    }

    // todo ຊອກຫາຂໍ້ມູນຂອງຄົນທີ່ ມີເບີ ແລະ ອີເມວຕາມນີ້
    if (isset($_POST['check_user_email']) && isset($_POST['check_user_Tel'])) {
        $stmt_check_2 = $conn->prepare("SELECT * FROM users WHERE u_email = :usl_email AND u_Tel = :usl_Tel");
        $stmt_check_2->bindParam(':usl_email', $_POST['check_user_email'] , PDO::PARAM_STR);
        $stmt_check_2->bindParam(':usl_Tel', $_POST['check_user_Tel'], PDO::PARAM_STR);
        $stmt_check_2->execute();
        $fetch_check_2 = $stmt_check_2->fetch(PDO::FETCH_ASSOC);
        echo json_encode($fetch_check_2);
    }

    // todo ຄົນຫາລາຄາສິນຄ້າທີ່ກົດຊື່
    if (isset($_POST['select_prod_id'])) {
        $stmt_sp = $conn->prepare("SELECT * FROM import WHERE im_id = :im_id_check");
        $stmt_sp->bindParam(':im_id_check', $_POST['select_prod_id'], PDO::PARAM_INT);
        $stmt_sp->execute();
        $rows_sp = $stmt_sp->fetch(PDO::FETCH_ASSOC);
        echo json_encode($rows_sp);
    }

    // todo ກວດສອບຂໍ້ມູນການເຂົ້າເຖິງຜູ້ບໍລິຫານ
    if(isset($_POST['admin_check_u']) && isset($_POST['admin_check_pass'])) {
        $pass_am_md5 = md5($_POST['admin_check_pass']);
        $stmt_admin = $conn->prepare("SELECT * FROM admin WHERE admin_password = :am_pass AND admin_email = :am_email");
        $stmt_admin->bindParam(':am_email', $_POST['admin_check_u'], PDO::PARAM_STR);
        $stmt_admin->bindParam(':am_pass', $pass_am_md5, PDO::PARAM_STR);
        $stmt_admin->execute();
        $rows_admin = $stmt_admin->rowCount();
        echo json_encode($rows_admin);
        if ($stmt_admin) {
            $stmt_admin_2 = $conn->prepare("SELECT * FROM admin WHERE admin_password = :am_pass_2 AND admin_email = :am_email_2");
            $stmt_admin_2->bindParam(':am_email_2', $_POST['admin_check_u'], PDO::PARAM_STR);
            $stmt_admin_2->bindParam(':am_pass_2', $pass_am_md5, PDO::PARAM_STR);
            $stmt_admin_2->execute();
            $fetch_admin = $stmt_admin_2->fetch(PDO::FETCH_ASSOC);
                $_SESSION['admin_id'] = $fetch_admin['admin_id'];
                $_SESSION['admin_pass'] = $fetch_admin['admin_email'];
        }
    }
?>  