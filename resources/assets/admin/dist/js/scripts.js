$(document).ready(function (){
	$("#example1").DataTable();
	$(".select2").select2();
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd/mm/yy'
    });
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });

    $("#exampleInputMobil").inputmask("+7 (999) 999-99-99");
    $("#exampleInputOffice").inputmask("+7 (999) 999-99-99");
    // $("#exampleInputEmail").inputmask("_____@_.");
});

$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
