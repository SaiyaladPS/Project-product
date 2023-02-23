<?php
    require '../../Connected/connected.php';
    // ! ລົບຂໍ້ມູນປະເພດສິນຄ້າ
    if (isset($_POST['delete_id'])) {
        $sql_type = $conn->prepare("DELETE FROM type WHERE type_id = :type_id");
        $sql_type->bindParam(':type_id', $_POST['delete_id'], PDO::PARAM_INT);
        $sql_type->execute();
    }

    // ! ລົບຂໍ້ມູນສະພາບສິນຄ້າ
    if (isset($_POST['delete_mer'])) {
        $stmt_mer = $conn->prepare("DELETE FROM merchandise WHERE mer_id = :mer_id");
        $stmt_mer->bindParam(':mer_id', $_POST['delete_mer'], PDO::PARAM_STR);
        $stmt_mer->execute();
    }

    // ! ລົບຂໍ້ມູນ ແຂວງ
    if (isset($_POST['pro_id'])) {
        $stmt_pro = $conn->prepare("DELETE FROM province WHERE pro_id = :pro_id");
        $stmt_pro->bindParam(':pro_id', $_POST['pro_id'], PDO::PARAM_STR);
        $stmt_pro->execute();
    }

    // !    ລົບຂໍ້ມູນ ເມືອງ
    if (isset($_POST['dis_id'])) {
        $stmt_dis = $conn->prepare("DELETE FROM district WHERE dis_id = :dis_id");
        $stmt_dis->bindParam(':dis_id', $_POST['dis_id'], PDO::PARAM_STR);
        $stmt_dis->execute();
    }
    
    // !    ລົບຂໍ້ມູນຄົນຂາຍ
    if (isset($_POST['us_id'])) {
        $stmt_us = $conn->prepare("DELETE FROM user_sell WHERE us_id = :us_id");
        $stmt_us->bindParam(':us_id', $_POST['us_id'], PDO::PARAM_STR);
        $stmt_us->execute();
        if ($stmt_us) {
            echo '1';
        } else{
            echo '2';
        }
    }
?>