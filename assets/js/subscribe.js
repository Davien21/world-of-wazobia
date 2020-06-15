let base_locale = window.location.href;
let base_dir = base_locale.substring(0, base_locale.lastIndexOf('/'))
function refresh_subscribe_modal () {
    $('a#sub-link')[0].href = '#';
    $('#subscription_data .modal-title').removeClass('text-warning wow-pink');
}
 $(".desc-modal.modal-btn").click(function(event) {
    refresh_subscribe_modal ();
    let title = $(this).find('h5').text();
    $('#subscription_data .modal-title').text(title)
    handle_sub_type (title);
    let modal_body = $(this).find('.desc-modal-content'); 
    modal_body = modal_body.clone();
    modal_body.removeClass('d-none');
    $('#subscription_data .modal-body').html(modal_body);
    $('#subscription_data').modal({
      show: true
    })
});
function handle_sub_type (title) {
    let type;
    if (title.includes('Guider')) {
        $('#subscription_data .modal-title').addClass('text-warning');
        type = 'guider'
    }else if (title.includes('Mentorship')) {
        $('#subscription_data .modal-title').addClass('wow-pink');
        type = 'mentorship'
    }else if (title.includes('Basic')) {
        type = 'basic'
    }else if (title.includes('Premium')) {
        type = 'premium'
    }else if (title.includes('Call')) {
        type = 'call'
    }else if (title.includes('Standard')) {
        type = 'standard'
    }
    $('a#sub-link')[0].href =`${base_dir}/register.php?type=${type}`;
}
