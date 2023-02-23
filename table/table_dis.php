<button type="button" class="btn btn-outline-success" id="add_dis" data-bs-toggle="modal"
                        data-bs-target="#add_dis">ບັນທືກຂໍ້ມູນເມືອງ</button>
                    <table id="Table_dis" class="table align-items-center mb-0" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    ລະຫັດເມືອງ
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    ຊື່ເມືອງ</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    ຊື່ແຂວງ</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    ໜາຍເຫດ</th>
                                <th class="text-secondary opacity-7"></th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows_dis as $data_dis) { ?>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs text-primary"><?php echo $data_dis['dis_id'] ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h4 class="text-xs font-weight-bold mb-0"><?php echo $data_dis['dis_name'] ?></h4>
                                </td>
                                <td>
                                    <h4 class="text-xs font-weight-bold text-center mb-0"><?php echo $data_dis['pro_name'] ?></h4>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <h4 class="badge badge-sm text-primary"><?php echo $data_dis['dis_cause'] ?></h4>
                                </td>
                                <td class="align-middle">
                                    <span id="<?php echo $data_dis['dis_id'] ?>"
                                        class="badge badge-pill badge-md bg-gradient-danger btn btn_dis_delete">ລົບຂໍ້ມູນ</span>
                                </td>
                                <td class="align-middle">
                                    <span id="<?php echo $data_dis['dis_id'] ?>"
                                        class="badge badge-pill badge-md bg-gradient-warning btn dis_edmit"
                                        data-bs-toggle="modal" data-bs-target="#update_dis_emdit">ແກ້ໄຂຂໍ້ມູນ</span>
                                </td>
                            </tr>
                            <?php } ?>
                    </table>