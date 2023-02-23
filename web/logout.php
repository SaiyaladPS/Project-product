<?php
    session_start();
    require '../Connected/connected.php';
    if (isset($_POST['logout'])) {
        session_destroy();
                       // todo ອັບເດດສະຖານະເປັນກຳລັງໃຊ້ງານ
                       $stmt_check_ststu   = $conn->prepare("UPDATE user_sell SET stust = 0 WHERE us_id = :us_id");
                       $stmt_check_ststu->bindParam(':us_id', $_POST['logout'], PDO::PARAM_INT);
                       $stmt_check_ststu->execute();
    }
    if (isset($_POST['logout_admin'])) {
        session_destroy();
    }
?>