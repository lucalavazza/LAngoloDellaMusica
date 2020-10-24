$(document).ready(function () {

    $('.formRemove').ajaxForm({
        success: function () {
            var params = this.data.split('&');
            var idForm = "";
            for(var par in params) {
                if(params[par].indexOf("removeWishlist") !== -1) {
                    var elParams = params[par].split("=");
                    idForm = elParams[1];
                    break;
                }
            }
            $("#formRemove"+idForm).replaceWith("<p style='color:#c44835;font-weight:bold;margin:auto'>Rimosso dalla wishlist</p>");
        }
    });

    $('.formAdd').ajaxForm({
        success: function () {
            var params = this.data.split('&');
            var idForm = "";
            for(var par in params) {
                if(params[par].indexOf("addWishlist") !== -1) {
                    var elParams = params[par].split("=");
                    idForm = elParams[1];
                    break;
                }
            }
            $("#formAdd"+idForm).replaceWith("<p style='color:#458045;font-weight:bold;margin:auto'>Aggiunto alla wishlist</p>");
        }
    });

});
