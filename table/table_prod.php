<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
            <h3 class=" text-center text-danger">ຂໍ້ມູນສິນຄ້າ</h3>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0" id="Table_prod">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    ສິນຄ້າ</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    ລາຄາ</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    ຜູ້ຂາຍ</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                    ວັນທີ່ລົງຂາຍ</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    ສະຖານະສິນຄ້າ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows_prod as $data_prod){?>
                            <tr>
                                <td>
                                    <div class="d-flex px-2">
                                        <div>
                                            <img src="../web/assets/img/gallery/<?php echo $data_prod['im_image'] ?>"
                                                class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                        </div>
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm"><?php echo $data_prod['mer_name'] ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">
                                        <?php echo number_format($data_prod['im_sprice'] ) . " Kip"?></p>
                                </td>
                                <td>
                                    <div class="d-flex px-2">
                                        <div>
                                            <img src="../upload/<?php echo $data_prod['image'] ?>"
                                                class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                        </div>
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">
                                                <?php echo $data_prod['fname']. ' '. $data_prod['lname'] ?></h6>
                                            <p class="mb-0 text-xs"><b>email: </b><?php echo $data_prod['email'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span
                                            class="me-2 text-xs font-weight-bold"><?php echo $data_prod['im_date']?></span>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="form-check form-switch">
                                            <?php if ($data_prod['on_or_off'] == 'on') {  ?>
                                                <input class="form-check-input check_on_off" checked type="checkbox" id="<?php echo $data_prod['im_id'] ?>">
                                                <?php } else if($data_prod['on_or_off'] == 'off'){ ?>
                                                    <input class="form-check-input check_on_off" type="checkbox" id="<?php echo $data_prod['im_id'] ?>">
                                                    <?php } ?>
                                            <p class="form-check-label staut" id="" for="flexSwitchCheckDefault"></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <button class="btn btn-link text-secondary mb-0">
                                        <i class="fa fa-ellipsis-v text-xs"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>