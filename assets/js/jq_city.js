$(document).ready(function() {
    $('#example').DataTable();
    $('#Table_dis').DataTable();


// !    ລົບຂໍ້ມູນແຂວງ
    $('.btn_delete').click(function() {
        var delete_id = $(this).attr('id')
        Swal.fire({
            title: 'ທ່ານຢືນຢັນການລົບຂໍ້ມູນ ນີ້ ຫຼຶບໍ?',
            text: "ຖ້າທ່ານຢືນຢັນກະລຸນາກົດທີ່ກຸ່ມ ຢືນຢັນ!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#cb0c9f',
            cancelButtonColor: '#ea0606',
            confirmButtonText: 'ຢືນຢັນ!',
            cancelButtonText : 'ຍົກເລີກ'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "../assets/url/delete.php",
                    data: {pro_id : delete_id},
                    success: function () {
                        Swal.fire({
                            icon : 'success',
                            title : 'ລົບຂໍ້ມູນສຳເລັດແລ້ວ',
                            showConfirmButton : false,
                            timer : 1500
                        })
                        setTimeout(() => {
                            location.reload()
                        },1500)
                    }
                });
            }
          })
    })

    // todo ຄົ້ນຫາຕົວແກ້ແຂ້ແຂວງ
    $('.btn_edmit').click(function() {
        var edmit_id = $(this).attr('id');
        $.ajax({
            type: "post",
            url: "../assets/url/select.php",
            data: {pro_id : edmit_id},
            success: function (response) {
                var jsondata = JSON.parse(response);
                $.each(jsondata, function (index, value) { 
                     $('#pro_id').val(value.pro_id)
                     $('#pro_name').val(value.pro_name)
                     $('#pro_cause').val(value.pro_cause)

                     // todo     ສົ່ງຂໍ້ມູນເເພືອແກ້ໄຂ ແລະ ມີການເຊັກການຊ້ຳກັນ
                $('#pro_insert').click(function (e) { 
                    e.preventDefault();
                    var pro_id = $('#pro_id').val()
                    var pro_name = $('#pro_name').val()
                    var pro_cause = $('#pro_cause').val()
                    if (pro_name != value.pro_name) {
                        $.ajax({
                            type: "post",
                            url: "../assets/url/select.php",
                            data: {pro_name_check : pro_name},
                            success: function (response) {
                                var check_data = JSON.parse(response);
                                if (check_data >=1){
                                    Swal.fire({
                                        icon : "error",
                                        title : "ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້",
                                        text : "ເນືອງຈາກທ່ານໄດ້ມີແຂວງນີ້ຢູ່ໃນລະບົບແລ້ວ",
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
                                        data: {
                                            pro_id : pro_id,
                                            pro_name : pro_name,
                                            pro_cause : pro_cause
                                        },
                                        success: function (response) {
                                            Swal.fire({
                                                icon : 'success',
                                                title : 'ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ',
                                                showConfirmButton : false,
                                                timer : 1500
                                            })
                                            setTimeout(() => {
                                                location.reload()
                                            })
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
                            data: {
                                pro_id : pro_id,
                                pro_name : pro_name,
                                pro_cause : pro_cause
                            },
                            success: function (response) {
                                Swal.fire({
                                    icon : 'success',
                                    title : 'ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ',
                                    showConfirmButton : false,
                                    timer : 1500
                                })
                                setTimeout(() => {
                                    location.reload()
                                })
                            }
                        });
                            }
                          })
                    }
                });
                });            
            }
        });
    })

    // !        ບັນທືກຂໍ້ມູນແຂວງ
    $('#add_pro').click(function (e) {
        e.preventDefault();
        $('#pro_send').click(function(){
            var pro_name = $('#pro_name_insert').val();
            var pro_cause = $('#pro_cause_insert').val()
            if (pro_name == '') {
                Swal.fire({
                    icon : 'warning',
                    title : 'ກລຸນາປ້ອນຊື່ແຂວງ',
                    confirmButtonText : 'ຕົກລົງ',
                    confirmButtonColor : '#cb0c9f'
                })
            } else {
                $.ajax({
                    type: "post",
                    url: "../assets/url/select.php",
                    data: {pro_name_check : pro_name},
                    success: function (data) {
                        var jsondata = JSON.parse(data)
                        if (jsondata >= 1) {
                            Swal.fire({
                                icon : 'error',
                                title : 'ຂໍອະໄພບໍ່ສາມບັນທືກຂໍ້ມູນໄດ້',
                                text : 'ເນືອຈາກວ່າທ່ານມີຂໍ້ມູນນີ້ຢູ່ໃນລະບົບແລ້ວ',
                                confirmButtonText : 'ຕົກລົງ',
                                confirmButtonColor : '#cb0c9f'
                            })
                        } else {
                    $.ajax({
                        type: "post",
                        url: "../assets/url/insert.php",
                        data: {
                            pro_name : pro_name,
                            pro_cause : pro_cause
                        },
                        error : function(err) {
                            console.log(err)
                        },
                        success: function (response) {
                            Swal.fire({
                                icon : 'success',
                                title : 'ບັນທືກຂໍ້ມູນສຳເລັດແລ້ວ',
                                showConfirmButton : false,
                                timer : 1500
                            })
                            setTimeout(() => {
                                location.reload()
                            },1500)
                        }
                    });
                        }
                    }
                });
            }
        })
    });

    // ?    ບັນທືກຂໍ້ມູນເມືອງ

        $('#dis_send').click(function(e) {
            e.preventDefault();
           var dis_name = $('#dis_name_insert').val();
           var pro_id = $('#pro_id_insert_dis').val();
           var dis_cause = $('#dis_cause_insert').val();
           if (dis_name == '') {
            Swal.fire({
                icon : 'warning',
                title : 'ລະກຸນາປ້ອນຊື່ເມືອງ',
                confirmButtonText: 'ຕົກລົງ',
                confirmButtonColor : '#cb0c9f'
            })
           } else if (pro_id == '') {
            Swal.fire({
                icon : 'warning',
                title : 'ລະກຸນາເລືອກແຂວງ',
                confirmButtonText: 'ຕົກລົງ',
                confirmButtonColor : '#cb0c9f'
            })
           } else {
            $.ajax({
                type: "post",
                url: "../assets/url/select.php",
                data: {
                    dis_name : dis_name,
                    province_pro_id : pro_id
                },
                error : function(err) {
                    console.log(err)
                },
                success: function (response) {
                    var check_data_dis = JSON.parse(response)   
                    if (check_data_dis >= 1) {
                        Swal.fire({
                            icon : 'error',
                            title : 'ຂໍອະໄພບໍ່ສາມບັນທືກຂໍ້ມູນໄດ້',
                            text : 'ເນືອຈາກວ່າທ່ານມີຂໍ້ມູນນີ້ຢູ່ໃນລະບົບແລ້ວ',
                            confirmButtonText : 'ຕົກລົງ',
                            confirmButtonColor : '#cb0c9f'
                        })
                    } else {
                        $.ajax({
                            type: "post",
                            url: "../assets/url/insert.php",
                            data: {
                                pro_id : pro_id,
                                dis_name : dis_name,
                                dis_cause : dis_cause
                            },
                            error : function(err) {
                                console.log(err)
                            },
                            success: function (response) {
                                Swal.fire({
                                    icon : 'success',
                                    title : 'ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ',
                                    showConfirmButton : false,
                                    timer : 1500
                                })
                                setTimeout(() => {
                                    location.reload()
                                },1500)
                            }
                        });
                    }
                }
            });
           }
        })


        // !        ລົບຂໍ້ມູນການເມືອງ
        $('.btn_dis_delete').click(function(e){
            e.preventDefault()
            var delete_id = $(this).attr('id')
        Swal.fire({
            title: 'ທ່ານຢືນຢັນການລົບຂໍ້ມູນ ນີ້ ຫຼຶບໍ?',
            text: "ຖ້າທ່ານຢືນຢັນກະລຸນາກົດທີ່ກຸ່ມ ຢືນຢັນ!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#cb0c9f',
            cancelButtonColor: '#ea0606',
            confirmButtonText: 'ຢືນຢັນ!',
            cancelButtonText : 'ຍົກເລີກ'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "../assets/url/delete.php",
                    data: {dis_id : delete_id},
                    success: function () {
                        Swal.fire({
                            icon : 'success',
                            title : 'ລົບຂໍ້ມູນສຳເລັດແລ້ວ',
                            showConfirmButton : false,
                            timer : 1500
                        })
                        setTimeout(() => {
                            location.reload()
                        },1500)
                    }
                });
            }
          })
        })

        // todo     ແກ້ໄຂ້ຂໍ້ມູນເມືອງ
        $('.dis_edmit').click(function(e) {
            var edmit_id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "../assets/url/select.php",
                data: {
                    dis_id : edmit_id
                },
                success: function (response) {
                  var data = JSON.parse(response)
                    $.each(data, function (index, value) {
                         $('#dis_id').val(value.dis_id)
                         $('#dis_name').val(value.dis_name)
                         $('#dis_cause').val(value.dis_cause)
                         $('#pro_id_dis').append(`<option hidden value="${value.pro_id}">${value.pro_name}</option>`);

                         $('#dis_update_send').click(function(e) {
                            e.preventDefault();
                            var dis_id = $('#dis_id').val();
                            var dis_name = $('#dis_name').val();
                            var dis_cause = $('#dis_cause').val();
                            var pro_id_dis = $('#pro_id_dis').val();
                                if (dis_name != value.dis_name || pro_id_dis != value.pro_id) {
                                        $.ajax({
                                            type: "post",
                                            url: "../assets/url/select.php",
                                            data: {
                                                dis_name : dis_name,
                                                province_pro_id : pro_id_dis,
                                            },
                                            success: function (response) {
                                              var jsondata = JSON.parse(response);
                                              if (jsondata >= 1) {
                                                Swal.fire({
                                                    icon : "error",
                                                    title : "ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້",
                                                    text : "ເນືອງຈາກທ່ານໄດ້ມີແຂວງນີ້ຢູ່ໃນລະບົບແລ້ວ",
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
                                                    data: {
                                                        dis_id : dis_id,
                                                        dis_name : dis_name,
                                                        dis_cause : dis_cause,
                                                        pro_id_dis : pro_id_dis
                                                    },
                                                    success: function (response) {
                                                        Swal.fire({
                                                            icon : 'success',
                                                            title : 'ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ',
                                                            showConfirmButton : false,
                                                            timer : 1500
                                                        })
                                                        setTimeout(() => {
                                                            location.reload()
                                                        })
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
                                        data: {
                                            dis_id : dis_id,
                                            dis_name : dis_name,
                                            dis_cause : dis_cause,
                                            pro_id_dis : pro_id_dis
                                        },
                                        success: function (response) {
                                            Swal.fire({
                                                icon : 'success',
                                                title : 'ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ',
                                                showConfirmButton : false,
                                                timer : 1500
                                            })
                                            setTimeout(() => {
                                                location.reload()
                                            })
                                        }
                                    });
                                        }
                                      })
                                }
                         })
                    });
                }
            });
        })
});