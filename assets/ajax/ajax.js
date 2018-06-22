$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
    }
});

$('.quantity').on('keyup', function (e) {

    if ($(this).val() % 1 === 0) {
        $currentValue = parseInt($(this).val());
        if (e.keyCode === 38) {
            $(this).val($currentValue + 1);
        }
        else if (e.keyCode === 40) {
            if ($currentValue - 1 !== 0) {
                $(this).val($currentValue - 1);
            }
        }
        else if ($(this).val() === "0") {
            $('.alert-danger').removeClass('hidden');
            setTimeout(function () {
                $('.alert-danger').addClass('hidden');
            }, 3000);
            $(this).val(50);

        }
    }
    else {
        $('.alert-danger').removeClass('hidden');
        $('.alert-success').addClass('hidden');
        setTimeout(function () {
            $('.alert-danger').addClass('hidden');
        }, 3000);
        $(this).val(50);
    }
});
$('.account_number').on('keyup', function (e) {

    if ($(this).val() % 1 === 0) {
        $currentValue = parseInt($(this).val());
        if (e.keyCode === 38) {
            $(this).val($currentValue + 1);
        }
        else if (e.keyCode === 40) {
            if ($currentValue - 1 !== 0) {
                $(this).val($currentValue - 1);
            }
        }
        else if ($(this).val() === "0") {
            $('.alert-danger').removeClass('hidden');
            setTimeout(function () {
                $('.alert-danger').addClass('hidden');
            }, 5000);

        } else if ($(this).val().length > 11) {
            $('.length').removeClass('hidden');
            setTimeout(function () {
                $('.length').addClass('hidden');
            }, 5000);
        }
    }
    else {
        $('.alert-danger').removeClass('hidden');
        $('.alert-success').addClass('hidden');
        setTimeout(function () {
            $('.alert-danger').addClass('hidden');
        }, 5000);
        $(this).val(12345678910);
    }
});
$('#deposit').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: 'home.php?deposit',
        method: 'post',
        data: $('#depositForm').serialize(),
        dataType: 'text',
        success: function (data) {
            if ($('#amount').val() === "" || $('#amount').val() === "0") {
                $('.alert-danger').removeClass('hidden');
                $('.alert-success').addClass('hidden');
                setTimeout(function () {
                    $('.alert-danger').addClass('hidden');
                }, 5000);
                setTimeout(function () {
                    $('.alert-danger').addClass('hidden');
                }, 5000);
            } else {
                $('.alert-danger').addClass('hidden');
                $('.alert-success').removeClass('hidden');
                setTimeout(function () {
                    $('.alert-success').addClass('hidden');
                }, 5000);
            }
        }
    });
});
$('#withdraw').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: 'home.php?withdraw',
        method: 'post',
        data: $('#withdrawForm').serialize(),
        dataType: 'text',
        success: function (data) {
            if ($('#amount').val() === "" || $('#amount').val() === "0") {
                $('.alert-danger').removeClass('hidden');
                $('.alert-success').addClass('hidden');
                setTimeout(function () {
                    $('.alert-danger').addClass('hidden');
                }, 5000);

            } else {
                $('.alert-danger').addClass('hidden');
                $('.alert-success').removeClass('hidden');
                setTimeout(function () {
                    $('.alert-success').addClass('hidden');
                }, 5000);
            }

        }
    });
});
$('#transfer').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: 'home.php?money-transfer',
        method: 'post',
        data: $('#transferForm').serialize(),
        dataType: 'text',
        success: function (data) {
            if ($('#receiver_id').val() === "" || $('#amount').val() === "" || $('#receiver_id').val() === "0" || $('#amount').val() === "") {
                $('.alert-danger').removeClass('hidden');
                $('.alert-success').addClass('hidden');
                setTimeout(function () {
                    $('.alert-danger').addClass('hidden');
                }, 5000);
            } else {
                $('.alert-danger').addClass('hidden');
                $('.alert-success').removeClass('hidden');
                setTimeout(function () {
                    $('.alert-success').addClass('hidden');
                }, 5000);
            }

        }
    });
});
$('#emp').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: 'home.php?add-employee',
        method: 'post',
        data: $('#empForm').serialize(),
        dataType: 'text',
        success: function (data) {
            if ($('#user_name').val() === "" || $('#email').val() === "" || $('#password').val() === "" || $('#national_id').val() === "" || $('#birthday').val() === "" || $('#address').val() === "" || $('#gender').val() === "" || $('#phone').val() === "" || $('#auth').val() === "" || $('#thumb').val() === "") {
                $('.alert-danger').removeClass('hidden');
                $('.alert-success').addClass('hidden');
                setTimeout(function () {
                    $('.alert-danger').addClass('hidden');
                }, 5000);
            } else {
                $('.alert-danger').addClass('hidden');
                $('.alert-success').removeClass('hidden');
                setTimeout(function () {
                    $('.alert-success').addClass('hidden');
                }, 5000);
            }

        }
    });
});
$('#client').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: 'home.php?new-client',
        method: 'post',
        data: $('#clientForm').serialize(),
        dataType: 'text',
        success: function (data) {
            if ($('#full_name').val() === "" || $('#national_id').val() === "" || $('#birthday').val() === "" || $('#address').val() === "" || $('#gender').val() === "" || $('#phone').val() === "" || $('#email').val() === "" || $('#thumb').val() === "") {
                $('.alert-danger').removeClass('hidden');
                $('.alert-success').addClass('hidden');
                setTimeout(function () {
                    $('.alert-danger').addClass('hidden');
                }, 5000);
            } else {
                $('.alert-danger').addClass('hidden');
                $('.alert-success').removeClass('hidden');
                setTimeout(function () {
                    $('.alert-success').addClass('hidden');
                }, 5000);
            }

        }
    });
});


$('.yes-print-receipt').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/ajax/print_receipt.php?print_receipt',
        method: 'post',
        dataType: 'text',
        success: function (data) { 
            $( ".receipt-paper__header" ).empty();
            $( ".receipt-paper__header" ).append(  data  );
        }
    });
});