<?php

require '../../Connected/connected.php';
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['fname']) && isset($_POST['dis_user_sell'])) {
    $image = $_FILES['file']['name'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pro_user_sell = $_POST['pro_user_sell'];
    $dis_user_sell = $_POST['dis_user_sell'];
    $password = $_POST['password'];
    $vill = $_POST['vill'];
    $us_cause = $_POST['us_cause'];
    $check = getimagesize($_FILES['file']['tmp_name']);
    if ($check) {
        $location = "../../upload/";
        $filesImage = $location . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $filesImage);
        $passwordMD5 = md5($password);
        $stmt = $conn->prepare("INSERT INTO user_sell(fname,lname,image, weighing, email, password, us_staus, together,us_vill,stust, us_cause, province_pro_id, district_dis_id) 
        VALUES(:fname,:lname,:image, curdate(), :email, :password, 'user_sell', 0, :us_vill,1, :us_cause,:province_pro_id, :district_dis_id)");
        $stmt->bindParam(':fname',$fname, PDO::PARAM_STR);
        $stmt->bindParam(':lname',$lname, PDO::PARAM_STR);
        $stmt->bindParam(':image',$image, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $passwordMD5, PDO::PARAM_STR);
        $stmt->bindParam(':us_vill', $vill, PDO::PARAM_STR);
        $stmt->bindParam(':us_cause', $us_cause, PDO::PARAM_STR);
        $stmt->bindParam(':province_pro_id', $pro_user_sell, PDO::PARAM_INT);
        $stmt->bindParam(':district_dis_id', $dis_user_sell, PDO::PARAM_STR);
        $stmt->execute();
        echo json_encode(2);
    } else {
        echo json_encode(1);
    }
}

if (isset($_POST['type_type_id']) && isset($_POST['us_id'])) {
    
    $chekc_image_prod = getimagesize($_FILES['file']['tmp_name']);
    if ($chekc_image_prod) {
        $loImage = "../../web/assets/img/gallery/";
        $fileImage = $loImage . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $fileImage);
        $stmt_import = $conn->prepare("INSERT INTO import(im_image, im_sprice, im_date, im_time,on_or_off, im_cause, merchandise_mer_id, type_type_id, user_sell_us_id) 
        VALUES (:image, :im_sprice, curdate(), curtime(),'on', :im_cause, :mer_id, :type_id, :us_id)");
        $stmt_import->bindParam(':image', $_FILES['file']['name'], PDO::PARAM_STR);
        $stmt_import->bindParam(':im_sprice', $_POST['im_sprice'], PDO::PARAM_INT);
        $stmt_import->bindParam(':im_cause', $_POST['im_cause'], PDO::PARAM_STR);
        $stmt_import->bindParam(':mer_id', $_POST['merchandise_mer_id'], PDO::PARAM_INT);
        $stmt_import->bindParam(':type_id', $_POST['type_type_id'], PDO::PARAM_INT);
        $stmt_import->bindParam(':us_id', $_POST['us_id'], PDO::PARAM_INT);
        $stmt_import->execute();
        echo json_encode(2);
        } else {
        echo json_encode(1);
    }
}


?>