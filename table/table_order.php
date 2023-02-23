<div class="card">
  <div class="table-responsive">
    <h3 class=" text-center text-danger">ຂໍ້ມູນການຂາຍສິນຄ້າ</h3>
    <table class="table align-items-center mb-0" id="table_orders_sell">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ສິນຄ້າ</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ຄົນຂາຍ</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ຄົນຊື່</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ບໍລິສັດຮັບສົ່ງ</th>
          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ວັນທີ່ຂາຍ ແລະ ລົງຂາຍ</th>
          <th class="text-secondary opacity-7"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($rows_order as $data_orders) { ?>
        <tr>
          <td>
            <div class="d-flex px-2 py-1">
              <div>
                <img src="../web/assets/img/gallery/<?php echo $data_orders['im_image'] ?>" class="avatar avatar-sm me-3">
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?php echo $data_orders['im_cause'] ?></h6>
                <p class="text-xs text-secondary mb-0"><?php echo $data_orders['type_name'] ." / ". $data_orders['mer_name'] ?></p>
                <p class="text-xs text-secondary mb-0"><?php echo number_format($data_orders['im_sprice']) . " KIP"?></p>
              </div>
            </div>
          </td>
          <td>
          <div>
                <img src="../upload/<?php echo $data_orders['image'] ?>" class="avatar avatar-sm me-3">
              </div>
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?php echo $data_orders['fname'] . " ". $data_orders['lname'] ?></h6>
                <p class="text-xs text-secondary mb-0"><?php echo $data_orders['email'] ?></p>
              </div>
          </td>
          <td class="align-middle text-center text-sm">
              <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-xs"><?php echo $data_orders['u_fname'] . " ". $data_orders['u_lname'] ?></h6>
                <p class="text-xs text-secondary mb-0"><?php echo $data_orders['u_email'] ?></p>
                <p class="text-xs text-secondary mb-0"><?php echo $data_orders['u_Tel'] ?></p>
              </div>
          </td>

          <td class="align-middle text-center">
            <p class="text-secondary text-xs font-weight-bold"><?php echo $data_orders['tp_name']?></p>
          </td>
          
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold"><?php echo $data_orders['o_date'] ." / ". $data_orders['im_date']?></span>
          </td>
          <td class="align-middle">
            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
              Edit
            </a>
          </td>
        </tr>
            <?php } ?>
      </tbody>
    </table>
  </div>
</div>