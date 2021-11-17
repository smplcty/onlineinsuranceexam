window.$ = window.jQuery = require('jquery');

payroll = {}

payroll = {
    token: null,
    client_panel: $('#section-clients'),
    control_salesreps: $('#payroll-controller-salesrep'),
    control_month: $('#payroll-controller-month'),
    control_year: $('#payroll-controller-year'),
    control_period: $('#payroll-controller-period'),
    control_bonus: $('#payroll-controller-bonus'),
    load_sales_rep: function() {
        $.get('/sales-representative/show', {}).done(function(data) {
            if (data.status) {
                salesreps = data.data;

                payroll.client_panel.find('div').remove()
                payroll.control_salesreps.find('option').remove()

                console.log(salesreps)

                payroll.add_sales_reps('', '-- Sales Representative --')
                for (var key in salesreps) {
                    item = salesreps[key];
                    payroll.add_sales_reps(item.id, item.name)
                }
            } else {
                alert('failed');
            }
        })
    },
    request_token: function() {
        $.get('/token', {}).done(function(data) {
            payroll.token = data;
            console.log(data)
        })
    },
    add_sales_reps: function(id, name) {
        option = $('<option></option>');
        option.val(id);
        option.text((id ? ("[" + id + "] ") : '') + name);
        payroll.control_salesreps.append(option)
    },
    add_client_panel: function(id) {
        panel_container = $('<div></div>').addClass('row p-3 client-panel').data('id', id);
        col_1 = $('<div class="col-8"></div>');
        col_1.append('<label>Client Name</label>')
        col_1.append('<input type="text" class="form-control fi-client-name" placeholder="Client Name">')
        col_2 = $('<div class="col"></div>');
        col_2.append('<label>Commission Amount</label>')
        col_2.append('<input type="number" class="form-control fi-client-comission" placeholder="Commission Amount">')

        panel_container.append(col_1)
        panel_container.append(col_2)
        payroll.client_panel.append(panel_container)
    },
    generate_year: function() {
        maxyear = new Date().getFullYear();
        minyear = maxyear - 20

        for (x = minyear; x <= maxyear; x++) {
            year_option = '<option value="' + x + '">' + x + '</option>'
            payroll.control_year.prepend($(year_option))
        }

        payroll.control_year.val(maxyear)
    },
    create_payroll: function() {
        data = {}
        data.salesreps = payroll.control_salesreps.val()
        data.month = payroll.control_month.val()
        data.year = payroll.control_year.val()
        data.period = payroll.control_period.val()
        data.bonus = payroll.control_bonus.val()

        clients = []

        $('#section-clients > .client-panel').each(function() {
            panel = $(this)
            temp = {
                name: panel.find('.fi-client-name').val(),
                commission: panel.find('.fi-client-comission').val(),
            }
            clients.push(temp)
        })
        data.clients = clients

        // $.ajax({
        //     url: '/payroll/generate_payroll',
        //     type: 'post',
        //     data: {
        //         data: data
        //     },
        //     headers: {
        //         '_token': $('meta[name=csrf-token]').attr('content')
        //     },
        //     dataType: 'json',
        //     success: function(data) {
        //         console.info(data);
        //     }
        // });

        $.get('/payroll/generate_payroll', {
            '_token': $('meta[name=csrf-token]').attr('content'),
            data: data,
        }).done(function(data) {
            $('#modal-payroll').modal('show');

            console.log(data)

            // //Convert the Byte Data to BLOB object.
            // var blob = new Blob([data], { type: "application/octetstream" });

            // fileName = 'onlineinsurance.pdf'

            // //Check the Browser type and download the File.
            // var isIE = false || !!document.documentMode;
            // if (isIE) {
            //     window.navigator.msSaveBlob(blob, fileName);
            // } else {
            //     var url = window.URL || window.webkitURL;
            //     link = url.createObjectURL(blob);
            //     var a = $("<a />");
            //     a.attr("download", fileName);
            //     a.attr("href", link);
            //     $("body").append(a);
            //     a[0].click();
            //     $("body").remove(a);
            // }

            // console.log(data)
            // if (data.status) {
            //     salesreps = data.data;

            //     payroll.client_panel.find('div').remove()
            //     payroll.control_salesreps.find('option').remove()

            //     console.log(salesreps)

            //     payroll.add_sales_reps('', '-- Sales Representative --')
            //     for (var key in salesreps) {
            //         item = salesreps[key];
            //         payroll.add_sales_reps(item.id, item.name)
            //     }
            // } else {
            //     alert('failed');
            // }
        })
    }
}


$(document).ready(function() {
    payroll.request_token();
    payroll.load_sales_rep();
    payroll.generate_year();

    $('#payroll-controller-no-of-clients').on('change', function() {
        client_count = !isNaN($(this).val()) ? $(this).val() : 0

        payroll.client_panel.find('div').remove();

        for (x = 0; x < client_count; x++) {
            payroll.add_client_panel(x)
        }
    });

    $("#payroll-controller-bonus").on("keyup", null, function() {
        var $input = $(this),
            value = $input.val(),
            num = parseFloat(value).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');

        $input.siblings('.add-on').text('$' + num);
    });

    $('#payroll-control-create-button').on('click', function() {
        payroll.create_payroll()
    })
})