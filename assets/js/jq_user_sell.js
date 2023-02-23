$(document).ready(function () {
  $('#table_users_sell').DataTable();

   // !     ບັນທືກຂໍ້ມູນຜູ້ຂາຍສິນຄ້າ
    $('#form_user_sell').on('submit',function(e) {
                e.preventDefault();
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var email = $('#email').val();
                var pro_user_sell = $('#pro_user_sell').val();
                var dis_user_sell = $('#dis_user_sell').val();
                var password = $('#password').val();
                var vill = $('#vill').val();
                var C_password = $('#C_password').val()

                var fd = new FormData();
                var files = $('#file')[0].files;
                if (fname == '') {
                  Swal.fire({
                    icon : 'warning',
                    title : 'ກະລຸນາປ້ອນຊື່',
                    confirmButtonText : 'ຕົກລົງ',
                    confirmButtonColor : '#cb0c9f'
                })
                } else if (lname == '') {
                  Swal.fire({
                    icon : 'warning',
                    title : 'ກະລຸນາປ້ອນນາມສະກຸນ',
                    confirmButtonText : 'ຕົກລົງ',
                    confirmButtonColor : '#cb0c9f'
                })
                } else if (email == '') {
                  Swal.fire({
                    icon : 'warning',
                    title : 'ກະລຸນາປ້ອນອີເມວ',
                    confirmButtonText : 'ຕົກລົງ',
                    confirmButtonColor : '#cb0c9f'
                })
                } else if (pro_user_sell == '') {
                  Swal.fire({
                    icon : 'warning',
                    title : 'ກະລຸນາເລືອກແຂວງ',
                    confirmButtonText : 'ຕົກລົງ',
                    confirmButtonColor : '#cb0c9f'
                })
                } else if (dis_user_sell == '') {
                  Swal.fire({
                    icon : 'warning',
                    title : 'ກະລຸນາເລືອກເມືອງ',
                    confirmButtonText : 'ຕົກລົງ',
                    confirmButtonColor : '#cb0c9f'
                })
                } else if (password == '') {
                  Swal.fire({
                    icon : 'warning',
                    title : 'ກະລຸນາປ້ອນລະຫັດຜ່ານ',
                    confirmButtonText : 'ຕົກລົງ',
                    confirmButtonColor : '#cb0c9f'
                })
                } else if (C_password == '') {
                  Swal.fire({
                    icon : 'warning',
                    title : 'ກະລຸນາຢືນຢັນລະຫັດຜ່ານ',
                    confirmButtonText : 'ຕົກລົງ',
                    confirmButtonColor : '#cb0c9f'
                })
                } else if (C_password != password){
                  Swal.fire({
                    icon : 'warning',
                    title : 'ລະຫັດຜ່ານບໍ່ຕົງກັນ',
                    confirmButtonText : 'ຕົກລົງ',
                    confirmButtonColor : '#cb0c9f'
                })
                } else if (vill == '') {
                  Swal.fire({
                    icon : 'warning',
                    title : 'ກະລຸນາປ້ອນບ້ານ',
                    confirmButtonText : 'ຕົກລົງ',
                    confirmButtonColor : '#cb0c9f'
                })
                } else {
                  if(files.length > 0 ){
                    fd.append('file', $('input[name=file]')[0].files[0]);
                    fd.append('fname', $('input[name=fname]').val());
                    fd.append('lname', $('input[name=lname]').val());
                    fd.append('email', $('input[name=email]').val());
                    fd.append('pro_user_sell', $('select[name=pro_user_sell]').val());
                    fd.append('dis_user_sell', $('select[name=dis_user_sell]').val());
                    fd.append('password', $('input[name=password]').val());
                    fd.append('vill', $('input[name=vill]').val());
                    fd.append('us_cause', $('textarea[name=us_cause]').val());

                    // todo ເຊັກຂໍ້ມູນທີ່ຊ້ຳກັນລະຫວ່າງ email and password
                    $.ajax({
                      type: "post",
                      url: "../assets/url/select.php",
                      data: {
                        email :email,
                        password : password
                      },
                      success: function (response) {
                          var check = JSON.parse(response);
                            if (check >= 1) {
                              Swal.fire({
                                icon : 'error',
                                title : 'ຂໍອະໄພບໍ່ສາມບັນທືກຂໍ້ມູນໄດ້',
                                text : 'ເນືອຈາກວ່າທ່ານມີຂໍ້ມູນນີ້ຢູ່ໃນລະບົບແລ້ວ',
                                confirmButtonText : 'ຕົກລົງ',
                                confirmButtonColor : '#cb0c9f'
                            })
                            } else {
                              $.ajax({
                                url: '../assets/url/upload.php',
                                 type: 'post',
                                 data: fd,
                                 contentType: false,
                                 processData: false,
                                 success: function(response){
                                  var dataJson = JSON.parse(response)
                                  if (dataJson == 1) {
                                    Swal.fire({
                                      icon : 'warning',
                                      title : 'ກະລຸນາປ້ອນຮູບພາບເທົ່ານັ້ນ',
                                      confirmButtonText : 'ຕົກລົງ',
                                      confirmButtonColor : '#cb0c9f'
                                  })
                                  } else {
                                    Swal.fire({
                                      icon : 'success',
                                      title : 'ບັນທືກຂໍ້ມູນສຳເລັດ',
                                      showConfirmButton:false,
                                      timer: 1500
                                  })
                                  setTimeout(()=>{
                                      location.reload()
                                  },1500)
                                  }
                                 },
                              });
                            }
                      }
                    });
                 }else{
                  Swal.fire({
                    icon : 'warning',
                    title : 'ກະລຸນາປ້ອນຮູບພາບເພືອລະບຸກຕົວທ່ານ',
                    confirmButtonText : 'ຕົກລົງ',
                    confirmButtonColor : '#cb0c9f'
                })
                 }
                }
})

// todo ສະແດງຮູບແບບຂອງໜ້າຟອມ
$('#file').change(function(){
    const file = this.files[0];
    let timerInterval
Swal.fire({
  title: 'ກຳລັງສະແດງຮູບພາບ',
  html: 'ກຳລັງຄຳນວນ <b></b> ວິນາທີ.',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  if (file){
    let reader = new FileReader();
    reader.onload = function(event){
      console.log(event.target.result);
      $('#img').attr('src', event.target.result);
    }
    reader.readAsDataURL(file);
  }
})
  });

//   todo   ດືງຂໍ້ມູນເມືອງ
  $('#pro_user_sell').change(function() {
    $('#dis_user_sell').html(`<option value="" selected hidden>ເລືອກເມືອງ</option>`).prop('disabled', false)
        var pro_id = $(this).val();
        $.ajax({
            type: "post",
            url: "../assets/url/select.php",
            data: {pro_id_users_sell : pro_id},
            success: function (response) {
                var data_dis = JSON.parse(response)
                $.each(data_dis, function (index, value) { 
                     $('#dis_user_sell').append(`<option value="${value.dis_id}">${value.dis_name}</option>`).prop('disabled', false)
                });
            }
        });
  })



  // !ລົບຂໍ້ມູນຄົນຂາຍ
  $('.btn_user_sell_delete').click(function(e){
    e.preventDefault();
    var delete_id = $(this).attr('id');
    Swal.fire({
      title: 'ທ່ານຢືນຢັນທີ່ຈະລົບຂໍ້ມູນ ນີ້ ຫຼຶ ບໍ?',
      text: "ຖ້າທ່ານຢືນຢັນກະລຸນາກົດທີ່ປຸ່ມຢືນຢັນ",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#cb0c9f',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ຢືນຢັນ',
      cancelButtonText : 'ຍົກເລີກ'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "post",
          url: "../assets/url/delete.php",
          data: {us_id : delete_id},
          success: function (response) {
              if (response <= '1') {
                Swal.fire({
                  icon : 'success',
                  title : 'ລົບຂໍ້ມູນສຳເລັດແລ້ວ',
                  showConfirmButton : false,
                  timer : 1500
              })
              setTimeout(() => {
                  location.reload()
              },1500)
              } else {
                Swal.fire({
                  icon : "error",
                  title : "ບໍ່ສາມາດລົບຂໍ້ມູນໄດ້",
                  text : "ເກີດຂໍ້ຜິດພາດ",
                  confirmButtonText : 'ຕົກລົງ',
                  confirmButtonColor : '#cb0c9f'
              })
              }
          }
        });
      }})
  })

  // todo     ແກ້ໄຂຂໍ້ມູນຄົນຂາຍ
  $('.btn_user_sell_edmit').click(function(e) {
    e.preventDefault();
    var edmit_id = $(this).attr('id');
    $.ajax({
      type: "post",
      url: "../assets/url/select.php",
      data: {us_id : edmit_id},
      success: function (response) {
        var data_us_sell = JSON.parse(response);
        $.each(data_us_sell, function (indexIn, value) { 
            $('#us_id').val(value.us_id);
            $('#edmit_image').attr('src', '../upload/'+value.image);
            $('#edmit_fname').val(value.fname)
            $('#edmit_lname').val(value.lname)
            $('#edmit_email').val(value.email)
            $('#edmit_pro_user_sell').append(`<option selected hidden value="${value.pro_id}">${value.pro_name}</option>`)
            $('#edmit_dis_user_sell').append(`<option selected hidden value="${value.dis_id}">${value.dis_name}</option>`)
            $('#edmit_vill').val(value.us_vill)
            $('#edmit_us_cause').val(value.us_cause)
            
            // todo ສົ່ງຂໍ້ມູນເພືອໄປແກ້ໄຂ້
            $('#form_user_sell_edmit').on('submit', function(e) {
              e.preventDefault()
              var us_id = $('#us_id').val();
              var fname = $('#edmit_fname').val();
              var lname = $('#edmit_lname').val();
              var email = $('#edmit_email').val();
              var pro_user_sell = $('#edmit_pro_user_sell').val();
              var dis_user_sell = $('#edmit_dis_user_sell').val();
              var vill = $('#edmit_vill').val();
              var us_cause = $('#edmit_us_cause').val();
              if (fname == '') {
                Swal.fire({
                  icon : 'warning',
                  title : 'ກລຸນາປ້ອນຊື່ຂອງທ່ານ',
                  confirmButtonText : 'ຕົກລົງ',
                  confirmButtonColor : '#cb0c9f'
              })
              } else if (lname == '') {
                Swal.fire({
                  icon : 'warning',
                  title : 'ກລຸນາປ້ອນນາມສະກຸນຂອງທ່ານ',
                  confirmButtonText : 'ຕົກລົງ',
                  confirmButtonColor : '#cb0c9f'
              })
              } else if (email == '') {
                Swal.fire({
                  icon : 'warning',
                  title : 'ກລຸນາປ້ອນອີເມວ',
                  confirmButtonText : 'ຕົກລົງ',
                  confirmButtonColor : '#cb0c9f'
              })
              } else if (pro_user_sell == '') {
                Swal.fire({
                  icon : 'warning',
                  title : 'ກລຸນາປ້ອນເລືອກແຂວງ',
                  confirmButtonText : 'ຕົກລົງ',
                  confirmButtonColor : '#cb0c9f'
              })
              } else if (dis_user_sell == '') {
                Swal.fire({
                  icon : 'warning',
                  title : 'ກລຸນາປ້ອນເລືອກເມືອງ',
                  confirmButtonText : 'ຕົກລົງ',
                  confirmButtonColor : '#cb0c9f'
              })
              } else if (vill == '') {
                Swal.fire({
                  icon : 'warning',
                  title : 'ກລຸນາປ້ອນຊື່ບ້ານ',
                  confirmButtonText : 'ຕົກລົງ',
                  confirmButtonColor : '#cb0c9f'
              })
              } else {
                  if (email != value.email) {
                    $.ajax({
                      type: "post",
                      url: "../assets/url/select.php",
                      data: {email_us_chkc : email},
                      success: function (response) {
                        var data_us = JSON.parse(response);
                        if (data_us >= 1) {
                          Swal.fire({
                            icon : 'error',
                            title : "ສາມາດແກ້ໄຂ້ຂໍ້ມູນໄດ້",
                            text : 'ເນືອງຈາກວ່າມີຂໍ້ມູນນີ້ຢູ່ໃນລະບົບແລ້ວ',
                            confirmButtonText : 'ຕົກລົງ',
                            confirmButtonColor : '#cb0c9f'
                          })
                        } else {
                          Swal.fire({
                            title: 'ທ່ານຢືນຢັນທີ່ຈະແກ້ໄຂຂໍ້ມູນ ນີ້ ຫຼຶ ບໍ?',
                            text: "ຖ້າທ່ານຢືນຢັນກະລຸນາກົດທີ່ປຸ່ມຢືນຢັນ",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#cb0c9f',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'ຢືນຢັນ',
                            cancelButtonText : 'ຍົກເລີກ'
                          }).then((result) => {
                            if (result.isConfirmed) {
                              $.ajax({
                                type: "post",
                                url: "../assets/url/update.php",
                                data: $('#form_user_sell_edmit').serialize(),
                                success: function (response) {
                                  console.log(response)
                                }
                              });
                            }
                          })
                          
                        }
                      }
                    });
                  } else {
                    Swal.fire({
                      title: 'ທ່ານຢືນຢັນທີ່ຈະແກ້ໄຂຂໍ້ມູນ ນີ້ ຫຼຶ ບໍ?',
                      text: "ຖ້າທ່ານຢືນຢັນກະລຸນາກົດທີ່ປຸ່ມຢືນຢັນ",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#cb0c9f',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'ຢືນຢັນ',
                      cancelButtonText : 'ຍົກເລີກ'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        $.ajax({
                          type: "post",
                          url: "../assets/url/update.php",
                          data: $('#form_user_sell_edmit').serialize(),
                          success: function (response) {
                            Swal.file({
                              icon : 'success',
                              title : 'ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ',
                              showConfirmButton : false,
                              timer : 1500
                            })
                            setTimeout(()=>{
                              location.reload()
                            },1500)
                          }
                        });
                      }
                    })
                  }
              }
            })
           
          })
      }
    });
  })

})