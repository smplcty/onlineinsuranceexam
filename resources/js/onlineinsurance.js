window.$ = window.jQuery = require('jquery');


var salesreps = []
var salesrep = {
    id: null,
    name: null,
    commission: 0,
    tax: 0,
    bonus: 0,
}

function fn_reset() {
    salesrep = {
        id: null,
        name: null,
        commission: 0,
        tax: 0,
        bonus: 0,
    }
}

function enableField(isEnable) {
    $('.fi-field').prop('disable', !isEnable);
}

function fn_display_sales_rep_info() {
    $('#fi-id').val(salesrep.id);
    $('#fi-name').val(salesrep.name);
    $('#fi-commission').val(salesrep.commission);
    $('#fi-tax').val(salesrep.tax);
    $('#fi-bonus').val(salesrep.bonus);
    console.log(salesrep);
}

function create_row(id, name) {
    // create row via jquery
    row = $('<tr></tr>')

    col_id = $('<th scope="row"></th>').text(id)
    col_name = $('<td></td>').text(name)
    edit_btn = $('<button type="button" class="btn btn-primary btn-sm" data-target="#modal-salesrep">Edit</button>')
    edit_btn.data('id', id)
    edit_btn.bind('click', function() {
        modal_sales_rep.modal('show');
        salesrep.id = $(this).data('id')
        get_profile()
    })
    delete_btn = $('<button type="button" class="btn btn-danger btn-sm" data-target="#modal-salesrep">Delete</button>')
    delete_btn.data('id', id)
    delete_btn.bind('click', function() {
        id = $(this).data('id')
        if (confirm('Are you sure?')) {
            fn_delete_profile(id)
        }
    })

    col_action = $('<td></td>').append(edit_btn).append(delete_btn)

    row.append(col_id)
    row.append(col_name)
    row.append(col_action)

    $('#table-body-salesrep').append(row)
}

function populate_rows() {
    $('#table-body-salesrep').find('tr').remove()
    for (var key in salesreps) {
        item = salesreps[key]

        create_row(item.id, item.name);
    }
}

function fn_delete_profile(id) {
    $.get('/sales-representative/remove', {
        id: id
    }).done(function(data) {
        if (data.status) {
            salesreps = data.data;

            fn_reset();
            fn_load_sales_reps();
        }

        alert(data.message)
    })
}

function fn_load_sales_reps() {
    $.get('/sales-representative/show', {}).done(function(data) {
        if (data.status) {
            salesreps = data.data;

            populate_rows();
        } else {
            alert('failed');
        }
    })
}

function get_profile() {
    enableField(false);

    id = salesrep.id;

    $.get('/sales-representative/show', {
        id: id
    }).done(function(data) {
        if (data.status) {
            item = data.data;

            salesrep.id = item.id;
            salesrep.name = item.name;
            salesrep.commission = item.commission;
            salesrep.tax = item.tax;
            salesrep.bonus = item.bonus;

            fn_display_sales_rep_info();
        } else {
            alert('failed');
        }

        enableField(true);
    })
}

function fn_collect_form_data() {
    salesrep.name = $('#fi-name').val();
    salesrep.commission = $('#fi-commission').val();
    salesrep.tax = $('#fi-tax').val();
    salesrep.bonus = $('#fi-bonus').val();
}

function fn_save_sales_rep() {
    save_url = salesrep.id ? '/sales-representative/update' : '/sales-representative/store';
    fn_collect_form_data()

    $.get(save_url, {
        id: salesrep.id,
        name: salesrep.name,
        commission: salesrep.commission,
        tax: salesrep.tax,
        // bonus: salesrep.bonus,
    }).done(function(data) {
        if (data.status) {
            fn_reset();
            fn_load_sales_reps();
        } else {
            alert(data.message);
        }
        $('#modal-salesrep').modal('hide')
    })
}

$(document).ready(function() {

    fn_load_sales_reps();

    // Initialize Components
    modal_sales_rep = $('#modal-salesrep').modal({
        keyboard: true,
        show: false,
    }).on('shown.bs.modal', function() {
        console.log('modal shown');
    })

    $('.oi-btn').bind('click', function() {
        modal_sales_rep.modal('show');

        salesrep.id = $(this).data('id');
    })

    $('#button-test').bind('click', function() {
        console.log(salesrep.id);
    })

    // sales Representative
    $('#button-add-sales-rep').on('click', function() {
        fn_reset();
        fn_display_sales_rep_info();
        modal_sales_rep.modal('show');
    })

    $('#button-save-salesrep').on('click', function() {
        fn_save_sales_rep()
    })

    $('#button-refresh-table').on('click', function() {
        fn_reset();
        fn_load_sales_reps();
    })
})