<?php
    require '../../Connected/connected.php';

    // todo     ບັນທືກຂໍ້ມູນປະເພດສິນຄ້າ
   if (isset($_POST['type_name']) && isset($_POST['type_cause'])) {
    $sql_insert_type = "INSERT INTO type (type_name, type_cause) VALUES(:type_name, :type_cause)";
    $stmt = $conn->prepare($sql_insert_type);
    $stmt->bindParam(':type_name', $_POST['type_name'] , PDO::PARAM_STR);
    $stmt->bindParam(':type_cause', $_POST['type_cause'] , PDO::PARAM_STR);
    $stmt->execute();
   }

//    todo ບັນທືກຂໍ້ມູນສະພາບສິນຄ້າ
if (isset($_POST['mer_name']) && isset($_POST['mer_cause'])) {
    $sql_insert_mer = "INSERT INTO merchandise (mer_name, mer_cause) VALUES(:mer_name, :mer_cause)";
    $stmt_mer = $conn->prepare($sql_insert_mer);
    $stmt_mer->bindParam(':mer_name', $_POST['mer_name'],PDO::PARAM_STR);
    $stmt_mer->bindParam(':mer_cause', $_POST['mer_cause'],PDO::PARAM_STR);
    $stmt_mer->execute();
}

// todo ບັນທືກຂໍ້ມູນແຂວງ
if (isset($_POST['pro_name']) && isset($_POST['pro_cause'])) {
    $pro_insert = "INSERT INTO province (pro_name, pro_cause) VALUES(:pro_name, :pro_cause)";
    $stmt_pro = $conn->prepare($pro_insert);
    $stmt_pro->bindParam(':pro_name', $_POST['pro_name'], PDO::PARAM_STR);
    $stmt_pro->bindParam(':pro_cause', $_POST['pro_cause'], PDO::PARAM_STR);
    $stmt_pro->execute();
}

// todo ບັນທືກຂໍ້ມູນເມືອງ
if (isset($_POST['pro_id']) && isset($_POST['dis_name']) && isset($_POST['dis_cause'])) {
    $stmt_dis = $conn->prepare("INSERT INTO district (dis_name, dis_cause, province_pro_id) VALUES(:dis_name, :dis_cause, :pro_id)");
    $stmt_dis->bindParam(':pro_id', $_POST['pro_id'], PDO::PARAM_INT);
    $stmt_dis->bindParam(':dis_name', $_POST['dis_name'], PDO::PARAM_STR);
    $stmt_dis->bindParam(':dis_cause', $_POST['dis_cause'], PDO::PARAM_STR);
    $stmt_dis->execute();
}

// todo     ບັນທືກຂໍ້ຄົນຊື່ສິນຄ້າ
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['gender']) && isset($_POST['u_Tel']) && isset($_POST['pro']) && isset($_POST['dis']) && isset($_POST['u_vill']) && isset($_POST['email'])) {
    $stmt_users = $conn->prepare("INSERT INTO users(u_fname, u_lname, gender, u_email, u_Tel, u_vill, province_pro_id, district_dis_id) 
    VALUES (:fname, :lname, :gender, :gamil, :u_Tel, :u_vill, :province_pro_id, :district_dis_id)");
    $stmt_users->bindParam(':fname', $_POST['fname'], PDO::PARAM_STR);
    $stmt_users->bindParam(':lname', $_POST['lname'], PDO::PARAM_STR);
    $stmt_users->bindParam(':gender', $_POST['gender'], PDO::PARAM_STR);
    $stmt_users->bindParam(':gamil', $_POST['email'], PDO::PARAM_STR);
    $stmt_users->bindParam(':u_Tel', $_POST['u_Tel'], PDO::PARAM_STR);
    $stmt_users->bindParam(':u_vill', $_POST['u_vill'], PDO::PARAM_STR);
    $stmt_users->bindParam(':province_pro_id', $_POST['pro'], PDO::PARAM_INT);
    $stmt_users->bindParam(':district_dis_id', $_POST['dis'], PDO::PARAM_INT);
    $stmt_users->execute();
}

// todo ບັນທືກຂໍ້ມູນ orders
    if (isset($_POST['import_id']) && isset($_POST['users_id']) && isset($_POST['tp_id']) && isset($_POST['o_pro']) && isset($_POST['o_dis']) && isset($_POST['o_vill'])) {
        $stmt_orders = $conn->prepare("INSERT INTO orders(o_date, o_time, province_pro_id, district_dis_id, o_vill, transpoortation_tp_id, users_users_id, import_im_id) 
        VALUES (curdate(), curtime(),:o_pro, :o_dis, :o_vill, :o_tp, :user_id_orders, :im_id_orders)");
        $stmt_orders->bindParam(':user_id_orders', $_POST['users_id'], PDO::PARAM_INT);
        $stmt_orders->bindParam(':im_id_orders', $_POST['import_id'], PDO::PARAM_INT);
        $stmt_orders->bindParam(':o_pro', $_POST['o_pro'], PDO::PARAM_INT);
        $stmt_orders->bindParam(':o_dis', $_POST['o_dis'], PDO::PARAM_INT);
        $stmt_orders->bindParam(':o_vill', $_POST['o_vill'], PDO::PARAM_STR);
        $stmt_orders->bindParam(':o_tp', $_POST['tp_id'], PDO::PARAM_INT);
        $stmt_orders->execute();
    }

    // todo ບັນທືກເງີນເຂົ້າລະບົບ
    if (isset($_POST['user_sell_id_admin']) && isset($_POST['money'])) {
        $stmt_amdin = $conn->prepare("INSERT INTO arrears (money,arr_date, user_sell_us_id) VALUES(:money, curdate(), :users_admin)");
        $stmt_amdin->bindParam(':money',$_POST['money'], PDO::PARAM_INT);
        $stmt_amdin->bindParam(':users_admin',$_POST['user_sell_id_admin'], PDO::PARAM_INT);
        $stmt_amdin->execute();
    }

?>