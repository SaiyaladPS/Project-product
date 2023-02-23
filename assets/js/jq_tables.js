$(document).ready(function () {
    $('#Table_prod').DataTable()
    // ! ຂໍ ມູນ ສະພາບສິນຄ້າ
    $('#btn_merchandise').click(function (e) { 
        // ! ຕົວສະແດງການຄລິກ
        $('*').removeClass('btn-primary');
        $(this).addClass('btn-primary');

        $('.row').slideDown(500);
        

        // !ກົດກົດໃນສ່ວນຂ້ອງ ເປິດແລະປິດໃຫ້ຂ້າຍ


        // todo ປ່ຽນຕາຕະລາງ
        $('#title_tables').text("ຕາຕະລາງສະພາບສິນຄ້າ")

        $('.table_type').html('');
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "../assets/url/select.php",
            data: {merchandise : 1},
            success: function (response) {
                let timerInterval
                            Swal.fire({
                            title: 'Auto close alert!',
                            html: 'I will close in <b></b> milliseconds.',
                            timer: 500,
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
                            })
                setTimeout(() => {
                    $('#btn_add').html(`<button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#insert_mer">ບັນທືກຂໍ້ມູນ</button> `)
                var jsondata = JSON.parse(response)
                var hader = `<thead>
                <tr>
                    <th
                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        ລະຫັດສະພາບສິນຄ້າ</th>
                    <th
                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        ສະພາບສິນຄ້າ</th>
                    <th
                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        ໜາຍເຫດ</th>
                    <th class="text-secondary opacity-7"></th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>`
            $('.table_type').append(hader)
            $.each(jsondata, function (key, value) {
                 var body = `
                 <tr>
                     <td>
                         <div class="d-flex px-2 py-1">
                             <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 font-weight-bold text-sm">${value.mer_id}</h6>
                             </div>
                         </div>
                     </td>
                     <td>
                         <h6 class="text-xs font-weight-bold mb-0">${value.mer_name}</h6>
                     </td>
                     <td class="align-middle text-center text-sm">
                     <h6 class="text-xs font-weight-bold mb-0">${value.mer_cause}</h6>
                     </td>
                     <td class="align-middle">
                     <span id="${value.mer_id}" class="badge bg-gradient-warning btn btn-mer-edmit" data-bs-toggle="modal" data-bs-target="#update_mer">ແກ້ໄຂ</span>
                     </td>
                     <td class="align-middle">
                     <span type='button' id="${value.mer_id}" class="badge bg-gradient-danger btn btn_mer_delete">ລົບ</span>
                     </td>
                 </tr>`;
             $('.table_type').append(body);
            });
              // ! ລົບຂໍ້ມຸນສະພາບສິນຄ້າ
              $('.btn_mer_delete').on('click', function(e) {
                e.preventDefault()
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
                        var delete_mer = $(this).attr('id')
                        $.ajax({
                            type: "post",
                            url: "../assets/url/delete.php",
                            data: {delete_mer : delete_mer},
                            success: function (response) {
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
                // todo ໄປຄົ້ນຫາຂໍ້ມູນທີ່ຕ້ອງການແກ້ໄຂ ຂອງສະພາບສິນຄ້າ
            $('.btn-mer-edmit').on('click', function(e) {
                e.preventDefault()
                var edmit_mer_id = $(this).attr('id');
                $.ajax({
                    type: "post",
                    url: "../assets/url/select.php",
                    data: {mer_id : edmit_mer_id},
                    success: function (response) {
                        var jsondata = JSON.parse(response);
                        $.each(jsondata, function(index, value) {
                            $('#edmit_mer_id').val(value.mer_id); 
                            $('#edmit_mer_name').val(value.mer_name); 
                            $('#edmit_mer_cause').val(value.mer_cause); 
                            // todo ສົ່ງຂໍ້ມູນໄປແກ້ໄຂ
                            $('#mer_edmit').click(function(){
                                // todo ຂໍ້ມູນທີ່ຊຳກັນໃນການແກ້ໄຂສະພາບສິນຄ້າ
                                var check_mer_name =  $('#edmit_mer_name').val()
                                var mer_id = $('#edmit_mer_id').val()
                                var mer_cause = $('#edmit_mer_cause').val()
                                // todo ຖ້າວ່າຊື່ສະພາບສິນຄ້າມີການປ່ຽນກໍໃຫ້ແກ້ໄຂຕົວໃຫມ່
                                if (check_mer_name != value.mer_name) {
                                    $.ajax({
                                        type: "post",
                                        url: "../assets/url/select.php",
                                        data: {mer_name : check_mer_name},
                                        success: function (response) {
                                            var numrow = JSON.parse(response);
                                            // todo ຖ້າວ່າຊື່ສະພາບສິນຄ້າມີການປ່ຽນແປງ ແລະ ມີ ຫຼຶ ບໍ່ມີສະພາບສິນຄ້າຢູ່ໃນລະບົບ
                                            if (numrow >= 1) {
                                                Swal.fire({
                                                    icon : 'warning',
                                                    title : 'ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້',
                                                    text : 'ເນືອງຈາກວ່າທ່ານໄດ້ມີຂໍ້ມູນປະເພດສິນຄ້ານີ້ຢູ່ໃນລະບົບແລ້ວ',
                                                    confirmButtonText : 'ຕົກລົງ',
                                                    confirmButtonColor : '#cb0c9f'
                                                })
                                            } else {
                                                // todo ຖ້າວ່າບໍ່ມີກໍໃຫ້ແກ້ໄຂ
                                                Swal.fire({
                                                    title: 'ທ່ານຢືນຢັນການແກ້ໄຂຂໍ້ມູນ ນີ້ ຫຼຶບໍ?',
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
                                                            url: "../assets/url/update.php",
                                                            data: {
                                                                mer_id : mer_id,
                                                                mer_name : check_mer_name,
                                                                mer_cause : mer_cause,
                                                            },
                                                            success: function (response) {
                                                                Swal.fire({
                                                                    icon : 'success',
                                                                    title : 'ແກ້ໄຂ້ຂໍ້ມູນສຳເລັດແລ້ວ',
                                                                    showConfirmButton : false,
                                                                    timer : 1500
                                                                })
                                                                setTimeout(() => {
                                                                    location.reload()
                                                                }, 1500);
                                                            }
                                                        });
                                                    }
                                                  })
                                            }
                                        }
                                    });
                                } else {
                                    // todo ຖ້າວ່າຊື່ສະພາບສິນຄາ້ບໍ່ມີການປຽນແປງກໍໃຫ້ບັນທືກ ແລະ ແກ້ໄຂ
                                    Swal.fire({
                                        title: 'ທ່ານຢືນຢັນການແກ້ໄຂຂໍ້ມູນ ນີ້ ຫຼຶບໍ?',
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
                                                url: "../assets/url/update.php",
                                                data: {
                                                    mer_id : mer_id,
                                                    mer_name : check_mer_name,
                                                    mer_cause : mer_cause,
                                                },
                                                success: function (response) {
                                                    Swal.fire({
                                                        icon : 'success',
                                                        title : 'ແກ້ໄຂ້ຂໍ້ມູນສຳເລັດແລ້ວ',
                                                        showConfirmButton : false,
                                                        timer : 1500
                                                    })
                                                    setTimeout(() => {
                                                        location.reload()
                                                    }, 1500);
                                                }
                                            });
                                        }
                                      })
                                }
                            })
                        })

                    }
                });
            })

                },500)
                
            }
            
        });
    });

    $('#btn_type').click(function() {
        let timerInterval
        Swal.fire({
        title: 'Auto close alert!',
        html: 'I will close in <b></b> milliseconds.',
        timer: 500,
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
        })
        $('.row').slideDown(500);
        // ! ຕົວສະແດງການຄລິກ
        $('*').removeClass('btn-primary');
        $(this).addClass('btn-primary');

        $('.table_type').html('')
        // todo ປ່ຽນຕາຕະລາງ
        $('#title_tables').text("ຕາຕະລາງປະເພດສິນຄ້າ")
        // ! ຂໍຂໍ້ມູນປະເພດສິນຄ້າ
    $.ajax({
        type: "post",
        url: "../assets/url/select.php",
        data: {uid : 1},
        success: function (response) {
            setTimeout(() => {
                $('#btn_add').html(`<button type="button" class="btn bg-gradient-warning"  data-bs-toggle="modal" data-bs-target="#insert_type">ບັນທືກຂໍ້ມູນ</button>`)
            var jsondata = JSON.parse(response)
            var hader = `<thead>
            <tr>
                <th
                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    ລະຫັດປະເພດສິນຄ້າ</th>
                <th
                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    ປະເພດສິນຄ້າ</th>
                <th
                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    ໜາຍເຫດ</th>
                <th class="text-secondary opacity-7"></th>
                <th class="text-secondary opacity-7"></th>
            </tr>
        </thead>`
        $('.table_type').append(hader)  
            $.each(jsondata, function (key, value) {
                 var body = ` 
                 <tr>
                     <td>
                         <div class="d-flex px-2 py-1">
                             <div class="d-flex flex-column justify-content-center">
                                 <h6 class="mb-0 font-weight-bold text-sm">${value.type_id}</h6>
                             </div>
                         </div>
                     </td>
                     <td>
                         <h6 class="text-xs font-weight-bold mb-0">${value.type_name}</h6>
                     </td>
                     <td class="align-middle text-center text-sm">
                     <h6 class="text-xs font-weight-bold mb-0">${value.type_cause}</h6>
                     </td>
                     <td class="align-middle">
                     <span type="button" id="${value.type_id}" class="badge bg-gradient-warning btn btn_edmit" data-bs-toggle="modal" data-bs-target="#update_type">ແກ້ໄຂ</span>
                     </td>
                     <td class="align-middle">
                     <span class="badge bg-gradient-danger btn btn_delete" id="${value.type_id}">ລົບ</span>
                     </td>
                 </tr>`
             $('.table_type').append(body);
            });
    
                            // ! ລົບຂໍ້ມູນ
                $('.btn_delete').on('click', function (e) {
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
                                data: {
                                    delete_id : delete_id
                                },
                                success: function (response) {
                                    Swal.fire({
                                        icon : 'success',
                                        title : 'ລົບຂໍ້ມູນສຳເລັດ',
                                        showConfirmButton:false,
                                        timer: 1500
                                    })
                                    location.reload()
                                }
                            });
                        }
                      })
                });

                // todo ແກ້ໄຂປະເພດສິນຄ້າ 
                $('.btn_edmit').on('click', function (e) {
                    e.preventDefault()
                   var edmit_id = $(this).attr('id');
                   $.ajax({
                    type: "post",
                    url: "../assets/url/select.php",
                    data: {edmit_id : edmit_id},
                    success: function (response) {
                        var jsondata = JSON.parse(response)
                        $.each(jsondata, function (index, value) { 
                            $('#edmit_type_id').val(value.type_id);
                            $('#edmit_type_name').val(value.type_name);
                            $('#edmit_type_cause').val(value.type_cause);
                            $('#type_edmit').click(function() {
                                   //  todo ແກ້ໄຂຂໍ້ມູນປະເພດສິນຄ້າ
                                var check_name =  $('#edmit_type_name').val()
                                var edmit_type_cause = $('#edmit_type_cause').val()
                                var edmit_type_id = $('#edmit_type_id').val()
                                // todo ຖ້າວ່າ ຂໍ້ມູນບໍ່ເທົ່າກັບຕົວເກົ່າ
                                if (check_name != value.type_name) {
                                    $.ajax({
                                        type: "post",
                                        url: "../assets/url/select.php",
                                        data : {check_name : check_name},
                                        success: function (response) {
                                            // todo ເຊັກການແກ້ໄຂຂໍ້ມູນທີ່ຊ້ຳກັນ
                                            if (response >= 1) {
                                                Swal.fire({
                                                    icon : 'warning',
                                                    title : 'ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້',
                                                    text : 'ເນືອງຈາກວ່າທ່ານໄດ້ມີຂໍ້ມູນປະເພດສິນຄ້ານີ້ຢູ່ໃນລະບົບແລ້ວ',
                                                    confirmButtonText : 'ຕົກລົງ',
                                                    confirmButtonColor : '#cb0c9f'
                                                })
                                            } else {
                                                Swal.fire({
                                                    title: 'ທ່ານຢືນຢັນການແກ້ໄຂຂໍ້ມູນ ນີ້ ຫຼຶບໍ?',
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
                                                    url: "../assets/url/update.php",
                                                    data : {
                                                        type_name : check_name,
                                                        type_id : edmit_type_id,
                                                        type_cause : edmit_type_cause
                                                    },
                                                    success: function (response) {
                                                       Swal.fire({
                                                        icon : 'success',
                                                        title : 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
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
                                            }
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'ທ່ານຢືນຢັນການແກ້ໄຂຂໍ້ມູນ ນີ້ ຫຼຶບໍ?',
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
                                        url: "../assets/url/update.php",
                                        data : {
                                            type_name : check_name,
                                            type_id : edmit_type_id,
                                            type_cause : edmit_type_cause
                                        },
                                        success: function (response) {
                                           Swal.fire({
                                            icon : 'success',
                                            title : 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
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
                                }
                                
                            })
                        });

                 
                        
                    }
                   });
                });


            },500)
        }
    });
    })

    // !    ບັນທືກຂໍ້ມູນປະເພດສິນຄ້າ
    $('#type_insert').click(function(e) {
        e.preventDefault()
        var type_name = $('#type_name')
        var type_cause = $('#type_cause')

        if (type_name.val() == '') {
            Swal.fire({
                icon : 'warning',
                title : 'ກະລຸນາປ້ອນປະເພດສິນຄ້າ',
                confirmButtonText : 'ຕົກລົງ',
                confirmButtonColor : '#cb0c9f'
            })
        } else {
            // todo ໃນການບັນທືກຂໍ້ມູນປະເພດສິນຄ້າ
            $.ajax({
                type: "post",
                url: "../assets/url/select.php",
                data: {
                    check_name : type_name.val(),
                },
                success: function (response) {
                    if (response >= 1) {
                        Swal.fire({
                            icon : 'warning',
                            title : 'ບໍ່ສາມາດບັນທືກຂໍ້ມູນໄດ້',
                            text : 'ເນືອງຈາກວ່າທ່ານໄດ້ມີຂໍ້ມູນປະເພດສິນຄ້ານີ້ຢູ່ໃນລະບົບແລ້ວ',
                            confirmButtonText : 'ຕົກລົງ',
                            confirmButtonColor : '#cb0c9f'
                        })
                    } else {
                        $.ajax({
                            type: "post",
                            url: "../assets/url/insert.php",
                            data: {
                                type_name : type_name.val(),
                                type_cause : type_cause.val()
                            },
                            success: function () {
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
                        });
                    }
                }
            });
        }
    })

    // !        ບັນທືກຂໍ້ມູສະພາບສິນຄ້າ
    $('#mer_insert').click(function(e) {
        e.preventDefault()
        var mer_name = $('#mer_name').val()
        var mer_cause = $('#mer_cause').val()
        if (mer_name == '') {
            Swal.fire({
                icon : 'warning',
                title : 'ກະລຸນາປ້ອນຂໍ້ມູນສະພາບສິນຄ້າ',
                confirmButtonText : 'ຕົກລົງ',
                confirmButtonColor : '#cb0c9f'
            })
        } else {
            $.ajax({
                type: "post",
                url: "../assets/url/insert.php",
                data: {
                    mer_name : mer_name,
                    mer_cause : mer_cause
                },
                success: function (response) {
                    Swal.fire({
                        icon : 'success',
                        title : 'ບັນທືກຂໍ້ມູນສຳເລັດ',
                        showConfirmButton:false,
                        timer: 1500
                    })
                    location.reload()
                }
            });
        }
    })

});