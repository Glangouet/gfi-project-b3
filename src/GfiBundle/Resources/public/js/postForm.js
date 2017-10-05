function postForm(formName, s, callback) {
    var $this = $('form[name="' + formName + '"]');
    $.ajax({
        url: window.location.pathname,
        type: $this.attr('method'),
        /*data: $this.serialize(),*/
        data: s,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (json) {
            if (json.success) {
                callback(json);
            }
            else {
                if (json.message) alert(json.message);
                if (callback) callback(false);
            }
            if (json.errors) {
                for (error in json.errors) {
                    $("label[for='" + formName +"_" + error + "']").append(json.errors[error][0]);
                }
            }
        },
        error: function(erreur) {
            console.log(erreur);
        }
    });
}
