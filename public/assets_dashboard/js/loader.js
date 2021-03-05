// Loaders
var loader = '<div class="loading"><div class="loader"></div></div>';
function addLoader(selector = 'body') {
    if(selector !== 'body'){
        $(selector).css({
            position : 'relative'
        });
    }

    $(selector).append(loader);
}
function removeLoader() {
    $('.loading').hide(200).remove();
}
