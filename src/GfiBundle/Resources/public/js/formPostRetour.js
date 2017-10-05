$(document).ready(function () {

    $('form[name="gfibundle_customer"]').on('submit', function(e) {
        e.preventDefault();
        spinnerAction('spinner');
        var s = new FormData(this);
        var formName = 'gfibundle_customer';
        postForm(formName, s, function (data) {
            if (data['success']) {
                clearDiv('spinner');
                resetFormulaire(formName);
                addMessage(data['message'], 'alert-success');
            } else {
                clearDiv('spinner');
                addMessage(data['message'], 'alert-danger');
            }
        });
    });

    $('form[name="gfibundle_contactcustomer"]').on('submit', function(e) {
        e.preventDefault();
        spinnerAction('spinner');
        var s = new FormData(this);
        var formName = 'gfibundle_contactcustomer';
        postForm(formName, s, function (data) {
            if (data['success']) {
                clearDiv('spinner');
                resetFormulaire(formName);
                addMessage(data['message'], 'alert-success');
            } else {
                clearDiv('spinner');
                addMessage(data['message'], 'alert-danger');
            }
        });
    });

    $('form[name="gfibundle_customercard"]').on('submit', function(e) {
        e.preventDefault();
        spinnerAction('spinner');
        var s = new FormData(this);
        var formName = 'gfibundle_customercard';
        postForm(formName, s, function (data) {
            if (data['success']) {
                $('html, body').animate({scrollTop:0}, 'slow');
                clearDiv('spinner');
                addMessage(data['message'], 'alert-success');
            } else {
                clearDiv('spinner');
                addMessage(data['message'], 'alert-danger');
            }
        });
    });

    $('form[name="gfibundle_comment"]').on('submit', function(e) {
        e.preventDefault();
        spinnerAction('spinner');
        var s = new FormData(this);
        var formName = 'gfibundle_comment';
        postForm(formName, s, function (data) {
            if (data['success']) {
                resetFormulaire(formName);
                $('html, body').animate({scrollTop:0}, 'slow');
                clearDiv('spinner');
                addMessage(data['message'], 'alert-success');
            } else {
                clearDiv('spinner');
                addMessage(data['message'], 'alert-danger');
            }
        });
    });

    $('form[name="gfibundle_statushistory"]').on('submit', function(e) {
        e.preventDefault();
        spinnerAction('spinner');
        var s = new FormData(this);
        var formName = 'gfibundle_statushistory';
        postForm(formName, s, function (data) {
            if (data['success']) {
                $('html, body').animate({scrollTop:0}, 'slow');
                clearDiv('spinner');
                addMessage(data['message'], 'alert-success');
            } else {
                clearDiv('spinner');
                addMessage(data['message'], 'alert-danger');
            }
        });
    });

    $('form[name="fos_user_registration"]').on('submit', function(e) {
        e.preventDefault();
        spinnerAction('spinner');
        var s = new FormData(this);
        var formName = 'fos_user_registration';
        postForm(formName, s, function (data) {
            if (data['success']) {
                $('html, body').animate({scrollTop:0}, 'slow');
                clearDiv('spinner');
                addMessage(data['message'], 'alert-success');
            } else {
                clearDiv('spinner');
                addMessage(data['message'], 'alert-danger');
            }
        });
    });

    $('.deleteItem').on('click', function () {
        var url = $(this).attr('data-url');
        var id_item = $(this).attr('data-id');
        spinnerAction('spinner');
        $.ajax({
            url: url,
            type: 'POST',
            dataType: "json",
            success: function (json) {
                if (json.success) {
                    clearDiv('spinner');
                    addMessage(json['message'], 'alert-success');
                    $('.item-' + id_item).remove();
                }
                else {
                    clearDiv('spinner');
                    addMessage(data['message'], 'alert-danger');
                }
            },
            error: function(erreur) {
                console.log(erreur);
            }
        });
    });

});

function spinnerAction(div) {
    div = $('.' + div);
    div.html('<i class="fa fa-spinner3"></i>');
}

function clearDiv(div) {
    div = $('.' + div);
    div.html('');
}

function closeMessage() {
    $('.message-dynamique').hide();
}

function addMessage(message, type) {
    closeMessage();

    var icone = '<i class="fa fa-info-circle"></i> ';
    if (type == "alert-success") {
        icone = '<i class="fa fa-check-circle"></i> ';
    } else if (type == "alert-danger") {
        icone = '<i class="fa fa-times-circle"></i> ';
    }

    $('.message-dynamique')
        .addClass(type)
        .html(icone + message)
        .fadeIn()
    ;
}

function resetFormulaire(formName) {
    var form = $('form[name="' + formName +'"]');
    $(':input',form)
        .not(':button, :submit, :reset, :hidden')
        .val('')
        .removeAttr('checked')
        .removeAttr('selected');
}