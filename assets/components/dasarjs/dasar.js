// JavaScript Document
$(document).ready(function () {

    // begin form submit
    $("#dasarform").submit(function (e) {
        e.preventDefault();
        var $body = $('body');
        var dataString = $("#dasarform").serialize();
        var tujuan = $("#dasarform").attr('action');
        $.ajax({
            type: "POST",
            url: tujuan,
            data: dataString,
            beforeSend: function () {
                $body.addClass('loading');
            },
            success: function (msg) {
                $body.removeClass('loading');
                arrmsg = msg.split('|');
                benergak = arrmsg[0];
                tujuan = arrmsg[1];
                pesan = arrmsg[2];

                if (benergak == 1) {
                    alert(pesan);
                    window.location.href = tujuan;
                } else {
                    alert(pesan);
                }

            },
            error: function () {
                alert('Submit Form Gagal');
            },
            complete: function () {
                $body.removeClass('loading');
            }
        });
    });
    // end form submit

    // begin form submit pake ekko lightbox
    $("#dasarform_ekko").submit(function (e) {
        e.preventDefault();
        var $body = $('body');
        var dataString = $("#dasarform_ekko").serialize();
        var tujuan = $("#dasarform_ekko").attr('action');
        $.ajax({
            type: "POST",
            url: tujuan,
            data: dataString,
            beforeSend: function () {
                $body.addClass('loading');
            },
            success: function (msg) {
                $body.removeClass('loading');
                arrmsg = msg.split('|');
                benergak = arrmsg[0];
                tujuan = arrmsg[1];
                pesan = arrmsg[2];

                if (benergak == 1) {
                    var event = new CustomEvent('someEventOrSomething');
                    document.dispatchEvent(event);
                    location.reload();
                } else {
                    alert(pesan);
                }

            },
            error: function () {
                alert('Submit Form Gagal');
            },
            complete: function () {
                $body.removeClass('loading');
            }
        });
    });
    // end form submit pake ekko lightbox

});






//begin modal bootbox untuk hapus data
$(".dasarTable").on('click', '.hapus', function (e) {
    e.preventDefault();
    var targetUrl = $(this).attr("href");

    bootbox.confirm("<span style='color:#990000;font-size:18px;'><strong>Yakin akan hapus data ini? </strong></span>", function (result) {
        if (result) {
            $.ajax({
                type: "GET",
                url: targetUrl,
            }).done(function (msg) {
                arrmsg = msg.split('|');
                benergak = arrmsg[0];
                pesan = arrmsg[1];
                if (benergak == 0) {
                    alert(pesan);
                } else {
                    alert(pesan);
                    location.reload();
                }
            });
        }
    });
});
//end modal bootbox untuk hapus data


$(".dasarTable").on('click', '.confirm', function (e) {
    e.preventDefault();
    var targetUrl = $(this).attr("href");
    var message = $(this).attr("alt");
    bootbox.confirm("<span style='color:#990000;font-size:18px;'><strong>" + message + "</strong></span>", function (result) {
        if (result) {
            $.ajax({
                type: "GET",
                url: targetUrl,
            }).done(function (msg) {
                console.log(msg);
                arrmsg = msg.split('|');
                benergak = arrmsg[0];
                pesan = arrmsg[1];
                url = arrmsg[2];
                if (benergak == 0) {
                    alert(pesan);
                } else {
                    alert(pesan);
                    if (url) {
                        location.replace(url);
                    } else {
                        location.reload();
                    }

                }
            });
        }
    });
});

// konfirmasi
$(document).on('click', '.konfirmasi', function (e) {
    e.preventDefault();
    var targetUrl = $(this).attr("href");
    bootbox.confirm("<span style='color:#990000;font-size:18px;'><strong>Yakin melakukan ini? </strong></span>", function (result) {
        if (result) {
            $.ajax({
                type: "GET",
                url: targetUrl,
            }).done(function (msg) {
                console.log(msg);
                arrmsg = msg.split('|');
                benergak = arrmsg[0];
                pesan = arrmsg[1];
                url = arrmsg[2];
                if (benergak == 0) {
                    alert(pesan);
                } else {
                    alert(pesan);
                    if (url) {
                        location.replace(url);
                    } else {
                        location.reload();
                    }

                }
            });
        }
    });
});  

//ikutan disini buat AdminLTE
var AdminLTEOptions = {
    //Bootstrap.js tooltip
    enableBSToppltip: true,
    controlSidebarOptions: {
        //Enable slide over content
        slide: false
    }
};
$('#btn-confirm-logout').click(function () {
    $('#confirm-logout').modal({backdrop:'static'});
    return false;
});
$('.btn-ok').click(function () {
    location.href = $('#btn-confirm-logout').attr('href');
    $('#confirm-logout').modal('hide');
})