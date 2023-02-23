<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><span class=' text-dark'>ໂພດຂາຍສິນຄ້າຂອງ ທ່ານ</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_import" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="us_id" id="us_id">
                    <div class='preview text-center'>
                        <img src="../logo/logo222.png" id="img" class="avatar  w-50 h-50">
                    </div>
                    <div>
                        <input type="file" id="file" name="file" />
                    </div>

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group mb-2">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">ລາຄາ</span>
                                    <input type="number" class="form-control" name="im_sprice" id="im_sprice"
                                        placeholder="" aria-label="$gmail.com" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <select class="form-select form-select-sm mb-4" aria-label=".form-select-sm example"
                                id="type_type_id" name="type_type_id">
                                <option selected hidden value="">ເລືອກປະເພດສິນຄ້າ</option>
                                <?php foreach($row_type as $data_type) { ?>
                                <option value="<?php echo $data_type['type_id'] ?>">
                                    <?php echo $data_type['type_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-6">



                            <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                id="merchandise_mer_id" name="merchandise_mer_id">
                                <option selected hidden value="">ເລືອກສະພາບສິນຄ້າ</option>
                                <?php foreach($rows_mer as $data_mer) { ?>
                                <option value="<?php echo $data_mer['mer_id'] ?>"><?php echo $data_mer['mer_name'] ?>
                                </option>
                                <?php } ?>
                            </select>

                        </div>

                        <div class="form-group mb-2">
                            <div class="input-group">
                                <span class="input-group-text">ອະທິບາຍ</span>
                                <textarea class="form-control" id="im_cause" name="im_cause"
                                    aria-label="With textarea"></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
                <button type="submit" class="btn btn-primary">ໂພດ</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- //!        ຟອມຂາຍສິນຄ້າ -->

<!-- Modal -->
<div class="modal fade" id="orders" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="orders" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content w-100">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="orders">ສັ່ງຊື່ສິນຄ້າ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  id="form_orders_users">
                <div class="modal-body">
                    <img src="" id="image_prod" class="rounded mx-auto d-block w-50 h-50" alt="...">
                    <div class="container mt-2">
                        <div class="row g-2">
                            <div class="col-6">
                                    <!-- //!        ລະຫັດສິນຄ້າທີ່ users ກົດຊື້ (im_id) -->
                                    <input type="hidden" name="im_id" id="im_id">
                                <div class="form-floating mb-2 text-dark">
                                    <input type="text" name="fname" class="form-control fname" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">ຊື່</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input gender" type="radio" name="gender" value="F"
                                        id="defaultCheck1">
                                    <label class="form-check-label text-dark" for="defaultCheck1">
                                        ເພດຍິງ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input gender" type="radio" name="gender" value="M"
                                        id="defaultCheck1">
                                    <label class="form-check-label text-dark" for="defaultCheck1">
                                        ເພດຊາຍ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input gender" type="radio" name="gender" value="A"
                                        id="defaultCheck1">
                                    <label class="form-check-label text-dark" for="defaultCheck1">
                                        ອືນໆ
                                    </label>
                                </div>

                            </div>

                            <div class="col-6">

                                <div class="form-floating mb-2 text-dark">
                                    <input type="text" class="form-control lname" name="lname" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">ນາມສະກຸນ</label>
                                </div>
    
                            <div class="form-floating text-dark">
                                    <input type="number" class="form-control u_Tel" name="u_Tel" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">ເບີໂທ</label>
                                </div>
                            </div>
                            <div class="col-6">
                                               
                            <div class="form-floating text-dark mb-2">
                                    <input type="email" class="form-control email" name="email" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Email</label>
                                </div>
                                
                            <select class="form-select mb-2" id="pro" name="pro" aria-label="Default select example">
                                <option selected hidden value="">ເລືອກແຂວງ</option>
                                <?php foreach($rows_pro as $data_pro){ ?>
                                <option value="<?php echo $data_pro['pro_id'] ?>"><?php echo $data_pro['pro_name'] ?></option>
                                <?php } ?>
                            </select>

                                <select class="form-select mb-2" id="dis" name="dis" disabled aria-label="Default select example">
                                <option selected hidden value="">ເລືອກເມືອງ</option>
                            </select>
                            <div class="form-floating text-dark">
                                    <input type="text" class="form-control u_vill" name="u_vill" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">ບ້ານ</label>
                                </div>
                          
                            </div>
                            <div class="col-6">
                                <select class="form-select mb-2 tp" id="tp" name="tp" aria-label="Default select example">
                                <option selected hidden>ບໍລິສັດຂົນສົ່ງ</option>
                                <?php foreach($rows_tp as $data_tp){ ?>
                                <option value="<?php echo $data_tp['tp_id'] ?>"><?php echo $data_tp['tp_name'] ?></option>
                                <?php } ?>
                            </select>
                            <select class="form-select mb-2 o_pro" id="o_pro" disabled name="o_pro" aria-label="Default select example">
                                <option selected hidden>ສົ່ງທີ່ແຂວງ</option>
                                <?php foreach($rows_pro as $data_o_pro){ ?>
                                <option value="<?php echo $data_o_pro['pro_id'] ?>"><?php echo $data_o_pro['pro_name'] ?></option>
                                <?php } ?>
                            </select>

                            <select class="form-select mb-2 o_dis" id="o_dis" name="o_dis" disabled aria-label="Default select example">
                                <option selected hidden>ສົ່ງທີ່ເມືອງ</option>
                             
                            </select>

                            <div class="form-floating text-dark">
                                    <input type="text" class="form-control o_vill" name="o_vill" id="floatingInput"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">ສາຂາ</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
                    <button type="submit" class="btn btn-danger" style="background: rgb(194,2,2);
background: linear-gradient(350deg, rgba(194,2,2,1) 29%, rgba(246,2,2,1) 71%);">ຊຳລະຜ່ານ <img src="../upload/BCEL ONE2.png" width="40" height="40" class="rounded" alt=""></button>
   
                </div>
            </form>
        </div>
    </div>
</div>