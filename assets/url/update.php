<?php
    require '../../Connected/connected.php';
    //todo  ແກ້ໄຂປະເພດສິນຄ້າ
    if (isset($_POST['type_name']) && isset($_POST['type_id']) && isset($_POST['type_cause'])) {
        $update_type = $conn->prepare("UPDATE type SET type_name = :type_name, type_cause = :type_cause WHERE type_id = :type_id");
        $update_type->bindParam(':type_name', $_POST['type_name'], PDO::PARAM_STR);
        $update_type->bindParam(':type_id', $_POST['type_id'], PDO::PARAM_INT);
        $update_type->bindParam(':type_cause', $_POST['type_cause'], PDO::PARAM_STR);
        $update_type->execute();
    }

    // todo ແກ້ໄຂສະພາບສິນຄ້າ
    if (isset($_POST['mer_id']) && isset($_POST['mer_name']) && isset($_POST['mer_cause'])) {
        $stmt_mer = $conn->prepare("UPDATE merchandise SET mer_name = :mer_name, mer_cause = :mer_cause WHERE mer_id = :mer_id");
        $stmt_mer->bindParam(':mer_id', $_POST['mer_id'], PDO::PARAM_INT);
        $stmt_mer->bindParam(':mer_name', $_POST['mer_name'], PDO::PARAM_STR);
        $stmt_mer->bindParam(':mer_cause', $_POST['mer_cause'], PDO::PARAM_STR);
        $stmt_mer->execute();
    }

    // todo ແກ້ໄຂແຂວງ
    if (isset($_POST['pro_id']) && isset($_POST['pro_name']) && isset($_POST['pro_cause'])) {
        $stmt_pro = $conn->prepare("UPDATE province SET pro_name = :pro_name, pro_cause = :pro_cause WHERE pro_id = :pro_id");
        $stmt_pro->bindParam(':pro_id', $_POST['pro_id'], PDO::PARAM_INT);
        $stmt_pro->bindParam(':pro_name', $_POST['pro_name'], PDO::PARAM_STR);
        $stmt_pro->bindParam(':pro_cause', $_POST['pro_cause'],PDO::PARAM_STR);
        $stmt_pro->execute();
    }

    // todo ແກ້ໄຂເມືອງ
    if (isset($_POST['dis_id']) && isset($_POST['dis_name']) && isset($_POST['dis_cause'])  && isset($_POST['pro_id_dis'])) {
        $stmt_dis = $conn->prepare("UPDATE district SET dis_name = :dis_name, dis_cause = :dis_cause, province_pro_id = :pro_id WHERE dis_id = :dis_id");
        $stmt_dis->bindParam(':dis_id', $_POST['dis_id'], PDO::PARAM_INT);
        $stmt_dis->bindParam(':dis_name', $_POST['dis_name'], PDO::PARAM_STR);
        $stmt_dis->bindParam(':dis_cause', $_POST['dis_cause'], PDO::PARAM_STR);
        $stmt_dis->bindParam(':pro_id', $_POST['pro_id_dis'], PDO::PARAM_INT);
        $stmt_dis->execute();
    }

    // todo     ແກ້ໄຂ້ຂໍ້ມູນ ຄົນຂາຍ
    if (isset($_POST['us_id']) && isset($_POST['edmit_fname']) && isset($_POST['edmit_email']) && isset($_POST['edmit_pro_user_sell']) && isset($_POST['edmit_dis_user_sell']) && isset($_POST['edmit_lname']) && isset($_POST['edmit_vill']) && isset($_POST['edmit_us_cause'])) {
        $stmt_user_sell = $conn->prepare("UPDATE user_sell SET fname= :fname, lname = :lname, email = :email, district_dis_id = :dis_id, province_pro_id = :pro_id ,us_vill = :vill_name, us_cause = :us_cause WHERE us_id = :us_id");
        $stmt_user_sell->bindParam(':us_id', $_POST['us_id'], PDO::PARAM_INT);
        $stmt_user_sell->bindParam(':fname', $_POST['edmit_fname'], PDO::PARAM_STR);
        $stmt_user_sell->bindParam(':lname', $_POST['edmit_lname'], PDO::PARAM_STR);
        $stmt_user_sell->bindParam(':email', $_POST['edmit_email'], PDO::PARAM_STR);
        $stmt_user_sell->bindParam(':vill_name', $_POST['edmit_vill'], PDO::PARAM_STR);
        $stmt_user_sell->bindParam(':dis_id', $_POST['edmit_dis_user_sell'], PDO::PARAM_INT);
        $stmt_user_sell->bindParam(':pro_id', $_POST['edmit_pro_user_sell'], PDO::PARAM_STR);
        $stmt_user_sell->bindParam(':us_cause', $_POST['edmit_us_cause'], PDO::PARAM_STR);
        $stmt_user_sell->execute();
    }

    // todo ແກ້ໄຂ້ສະຖານະການໂພດ
    if (isset($_POST['im_id']) && isset($_POST['on_ro_off'])) {
        $stmt_update = $conn->prepare("UPDATE import SET on_or_off = :on_ro_off WHERE im_id = :im_id");
        $stmt_update->bindParam(':im_id', $_POST['im_id'], PDO::PARAM_INT);
        $stmt_update->bindParam(':on_ro_off', $_POST['on_ro_off'], PDO::PARAM_STR);
        $stmt_update->execute();
        if ($stmt_update) {
            echo json_encode(1);
        } else {
            echo json_encode(2);
        }
    }


           // todo     ອັບເດດສະຖານນະແບບຍິງເວລາ
           if (isset($_POST['us_id_time'])) {
            $time = time()+10;
            $stmt_time_ststu = $conn->prepare("UPDATE user_sell SET stust = :time WHERE us_id = :us_id");
           $stmt_time_ststu->bindParam(':time', $time, PDO::PARAM_INT);
           $stmt_time_ststu->bindParam(':us_id', $_POST['us_id_time'], PDO::PARAM_INT);
           $stmt_time_ststu->execute();
           }

        //    todo      ອັບເດດຄັງເງີນຂອງຄົນຂາຍ
        if (isset($_POST['user_sell_id_tot']) && isset($_POST['together'])) {
            $stmt_user_sp = $conn->prepare("UPDATE user_sell SET together = together + :together WHERE us_id = :us_id_mo");
            $stmt_user_sp->bindParam(':together', $_POST['together'], PDO::PARAM_INT);
            $stmt_user_sp->bindParam(':us_id_mo', $_POST['user_sell_id_tot'], PDO::PARAM_INT);
            $stmt_user_sp->execute();
        }

        // todo ປິດສິນຄ້າທີ່ມີການຊື່ແລ້ວ
        if (isset($_POST['im_id_delete'])) {
            $stmt_prod_up = $conn->prepare("UPDATE import SET orders_sell = 'sell' WHERE im_id = :im_id_delete");
            $stmt_prod_up->bindParam(':im_id_delete', $_POST['im_id_delete'],PDO::PARAM_INT);
            $stmt_prod_up->execute();
            if ($stmt_prod_up) {
                echo '1';
            } else {
                echo '2';
            }
        }
        
           
?>