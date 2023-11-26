$(document).ready(function () {

    $('body').on('click', '.open-sidebar', function (e) {
        $('.sidebarApp').toggleClass('active');
    })

    $('body').on('click', '.close', function (e) {
        $('.sidebarApp').toggleClass('active');
    })

})
