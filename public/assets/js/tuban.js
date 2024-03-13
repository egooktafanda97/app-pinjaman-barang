function sukses($data) {
    if ($data == "tambah") {
        swal({
            title: 'Success!',
            type: 'success',
            text: 'Data successfully added',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-light',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    } else if ($data == "edit") {
        swal({
            title: 'Success!',
            type: 'success',
            text: 'Data successfully edited',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-light',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    } else if ($data == "hapus") {
        swal({
            title: 'Success!',
            type: 'success',
            text: 'Data successfully deleted',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-light',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    } else if ($data == "terima") {
        swal({
            title: 'Success!',
            type: 'success',
            text: 'Data successfully approved',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-light',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    } else if ($data == "tolak") {
        swal({
            title: 'Success!',
            type: 'success',
            text: 'Data successfully rejected',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-light',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }else if ($data == "proses") {
        swal({
            title: 'Success!',
            type: 'success',
            text: 'Data has been processed successfully',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-light',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }else if ($data == "login") {
        swal({
            title: 'Login Successfully!',
            type: 'success',
            text: 'Please wait...',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-light',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }else if ($data == "block") {
        swal({
            title: 'Blocked Successfully!',
            type: 'success',
            text: 'You were successfully blocking user',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-light',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }else if ($data == "unblock") {
        swal({
            title: 'Unblocked Successfully!',
            type: 'success',
            text: 'You were successfully unblocking user',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-light',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }else if ($data == "editpass") {
        swal({
            title: 'Success!',
            type: 'success',
            text: 'Password has been changed',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-light',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }

}

function gagal($data) {
    if ($data == "tambah") {
        swal({
            title: 'Failed!',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'Process failed, please try again',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    } else if ($data == "edit") {
        swal({
            title: 'Failed!',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'Process failed, please try again',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    } else if ($data == "hapus") {
        swal({
            title: 'Failed!',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'Process failed, please try again',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    } else if ($data == "terima") {
        swal({
            title: 'Failed!',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'Process failed, please try again',
            background: '#fff url(../../global/images/backgrounds/seamless.png) repeat'
        });
    } else if ($data == "tolak") {
        swal({
            title: 'Failed!',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'Process failed, please try again',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }else if ($data == "proses") {
        swal({
            title: 'Failed!',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'Process failed, please try again',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }else if ($data == "login") {
        swal({
            title: 'Login Failed!',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'Your username and password  dont match',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }else if ($data == "block") {
        swal({
            title: 'Failed',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'Process failed, please try again',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }else if ($data == "unblock") {
        swal({
            title: 'Failed',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'Process failed, please try again',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }else if ($data == "editpass") {
        swal({
            title: 'Failed',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'Process failed, please try again',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }else if ($data == "tambahuserada") {
        swal({
            title: 'Failed',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'The username you entered is already registered',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }else if ($data == "edituserada") {
        swal({
            title: 'Failed!',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'Process failed, please try again',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }
}




function login($data) {
    if ($data == "salah") {
        swal({
            title: 'Failed!',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'Your username and password  dont match.',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    } else if ($data == "blocked") {
        swal({
            title: 'Failed!',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'Your account is blocked, contact the Administrator.',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    }  else if ($data == "gagal") {
        swal({
            title: 'Failed!',
            type: 'error',
            cancelButtonClass: 'btn btn-light',
            confirmButtonClass: 'btn btn-danger',
            text: 'Process failed, please try again',
            background: '#fff url(../global/images/backgrounds/seamless.png) repeat'
        });
    } 
}








$(document).ready(function() {
	$('.pickadate-wasem2').pickadate({
		selectYears: true,
        selectMonths: true,
        monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        weekdaysShort: ['', '', '', '', '', '', ''],
        today: 'Hari ini',
        clear: 'Reset',
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy-mm-dd',
        selectYears: 150
	});
	
	$('.pickadate_english').pickadate({
		selectYears: true,
        selectMonths: true,
        weekdaysShort: ['', '', '', '', '', '', ''],
        today: 'Today',
        clear: 'Reset',
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy-mm-dd',
        selectYears: 150
	});
	
	$('.tanggal_firex').pickadate({
		selectYears: true,
        selectMonths: true,
        monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        weekdaysShort: ['', '', '', '', '', '', ''],
        today: 'Hari ini',
        clear: 'Reset',
        format: 'dd/mm/yyyy',
        formatSubmit: 'yyyy-mm-dd',
        selectYears: 99
	});
	
	
	$('.tanggalrange_firex').daterangepicker({
		applyClass: 'bg-slate-600',
		cancelClass: 'btn-light',
		showDropdowns: true,
		locale: {
			applyLabel: 'Terapkan',
			cancelLabel: 'Batal',
			startLabel: 'Tgl. Mulai :',
			endLabel: 'Tgl. Selesai :',
			daysOfWeek: ['Ahad', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum','Sab'],
			monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sept', 'Okt', 'Nov', 'Des'],
			format: 'DD/MM/YYYY'
		}
	});
	
	$('.tanggalrange_firex_left').daterangepicker({
		applyClass: 'bg-slate-600',
		cancelClass: 'btn-light',
		showDropdowns: true,
		locale: {
			applyLabel: 'Terapkan',
			cancelLabel: 'Batal',
			startLabel: 'Tgl. Mulai :',
			endLabel: 'Tgl. Selesai :',
			daysOfWeek: ['Ahad', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum','Sab'],
			monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sept', 'Okt', 'Nov', 'Des'],
			format: 'DD/MM/YYYY'
		},
		opens: 'left'
	});
	
	$('.tanggaltimerange_firex_left').daterangepicker({
		applyClass: 'bg-slate-600',
		cancelClass: 'btn-light',
		timePicker: true,
		showDropdowns: true,
		locale: {
			applyLabel: 'Terapkan',
			cancelLabel: 'Batal',
			startLabel: 'Tgl. Mulai :',
			endLabel: 'Tgl. Selesai :',
			daysOfWeek: ['Ahad', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum','Sab'],
			monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sept', 'Okt', 'Nov', 'Des'],
			format: 'DD/MM/YYYY HH:mm'
		},
		opens: 'left'
	});
	
	$('.tanggaltimerange_firex_right').daterangepicker({
		applyClass: 'bg-slate-600',
		cancelClass: 'btn-light',
		timePicker: true,
		showDropdowns: true,
		locale: {
			applyLabel: 'Terapkan',
			cancelLabel: 'Batal',
			startLabel: 'Tgl. Mulai :',
			endLabel: 'Tgl. Selesai :',
			daysOfWeek: ['Ahad', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum','Sab'],
			monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sept', 'Okt', 'Nov', 'Des'],
			format: 'DD/MM/YYYY HH:mm'
		},
		opens: 'right'
	});
	
	$('.check_firex').uniform();
	
	
	$('#waktu_firex1').AnyTime_picker({
		format: '%H:%i'
    });
    
    $('#waktu_firex2').AnyTime_picker({
		format: '%H:%i'
    });
        
    $('.waktu_firex').AnyTime_picker({
		format: '%H:%i'
    });
		
    $('.pickatime').pickatime();
	
	
	


});


	select2({
    casesensitive: false
});



function rupiah(angka, prefix){
	var number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
 
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

$(document).ready(function(){
    $(".preloader").fadeOut();
});

