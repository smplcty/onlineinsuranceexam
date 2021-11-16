$(document).ready(function() {
    $('.oi-btn').click(function() {
        console.log('edit clicked')
        $('#modal-salesrep').on('shown.bs.modal', function() {
            console.log('showing modal dialog')
        })
    })
})