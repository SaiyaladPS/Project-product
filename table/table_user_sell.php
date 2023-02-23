<div class="card">
    <div class="table-responsive">
      <button type="button" class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#add_users_sell">ບັນທືກຂໍ້ມູນຄົນຂາຍ</button>
    <table class="table align-items-center mb-0" id="table_users_sell">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ກ່ຽວກັບຄົນຂາຍ</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ທີ່ຢູ່</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ຕຳແໜ່ງ  </th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ຈຳນວນລາຍໄດ້ </th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ສະຖານະ </th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ວັນທີ່ສະໜັກ</th>
          <th class="text-secondary opacity-7"></th>
          <th class="text-secondary opacity-7"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($rows_user_sell as $data_sell) { ?>
        <tr>
          <td>
            <div class="d-flex px-2 py-1">
              <div>
                <img src="../upload/<?php echo $data_sell['image'] ?>" class="avatar avatar-sm me-3">
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?php echo $data_sell['fname']. " ". $data_sell['lname'] ?></h6>
                <p class="text-xs text-secondary mb-0"><?php echo $data_sell['email'] ?></p>
              </div>
            </div>
          </td>
          <td>
            <p class="text-xs font-weight-bold mb-0 d-inline-block">ແຂວງ <?php echo $data_sell['pro_name'] ?></p>
            <p class="text-xs text-secondary mb-0 d-inline-block"><b>ເມືອງ</b> <?php echo $data_sell['dis_name'] ?></p>
            <p class="text-xs text-secondary mb-0 d-inline-block"><b>ບ້ານ</b> <?php echo $data_sell['us_vill'] ?></p>
          </td>
          <td class="align-middle text-center text-sm">
          <span class="badge bg-gradient-primary"><?php if($data_sell['us_staus'] == 'user_sell') {echo "ຄົນຂາຍ"; } ?></span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold"><?php echo $data_sell['together']." Kip" ?></span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold"><?php if ($data_sell['stust'] < $time) {
              echo "<span class='badge bg-gradient-secondary'>ບໍ່ໄດ້ໃຊ້ງານ</span>";
            } else {
              echo " <span class='badge bg-gradient-success'>ໃຊ້ງານຢູ່</span>";
            }?></span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold"><?php echo $data_sell['weighing'] ?></span>
          </td>
          <td class="align-middle">
          <span id="<?php echo $data_sell['us_id'] ?>" class="badge bg-gradient-danger btn btn_user_sell_delete">ລົບ</span>
          </td>
          <td class="align-middle">
          <span id="<?php echo $data_sell['us_id'] ?>" class="badge bg-gradient-warning btn btn_user_sell_edmit"  data-bs-toggle="modal" data-bs-target="#edmit_users_sell">ແກ້ໄຂ</span>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>