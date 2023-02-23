$(document).ready(function() {
    function date() {
    var dt = new Date();
    var Hours = dt.getHours() // ຊົວໂມງ
    var Minutes = dt.getMinutes() // ນາທີ່
    var Seconde = dt.getSeconds() // ວິນາທີ
    var De = dt.getDate() // ວັນທີ່
    var day = dt.getDay() // ວັນ
    var Mo = dt.getMonth() // ເດືອນ
    var Yers = dt.getFullYear() // ປີ
    switch (day) {
        case 0 : day = 'ອາທິດ'
            break;
        case 1 : day = 'ຈັນ'
            break;
        case 2 : day = 'ອັງຄານ'
            break;
        case 3 : day = 'ພຸດ'
            break;
        case 4 : day = 'ພະຫັດ'
            break;
        case 5 : day = 'ສຸກ'
            break;
        case 6 : day = 'ເສົາ'
            break;           
    }
    var time = `${day}   ${De} / ${Mo+1} / ${Yers}     ${Hours} : ${Minutes} : ${Seconde}`;
        $('#Date_And_time').text(time);
    }
    date()
    setInterval( date ,1000);
})