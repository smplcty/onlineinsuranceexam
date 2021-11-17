<!DOCTYPE html>
<html>
<head>
    <title>Payroll</title>
    <style>
        body{
            /* background-color:#E0E0E0; */
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
        td,th{
            vertical-align: top;
            padding: 5px;
        }
        p{
            padding: 0;
        }
        .gray{
            background-color: #E0E0E0;
        }
        .pad-10{
            padding: 10px;
        }
        .text-right{text-align: right;}
        .text-left{text-align: left;}
        table{
            border: 1px solid #000000;
            width: 100%;
        }
        ul{
            list-style: none;
            margin: 0;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>
    <div stylr="max-width: 800px; margin: auto;">
        <!-- <img src="{{ asset('images/Logo-mini.png') }}" alt="" style="max-height: 50px; "> -->
        <table class="gray">
            <tbody>
                <tr>
                    <td>Sales Representative: No: {{ $sr_info->id }} | <span>{{ $sr_info->name }}</span></td>
                    <td class="text-right">10/10/2010-10/10/2010</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table>
            <tbody>
                <tr>
                    <td>Product On:</td>
                    <td>10/01/09<br>Sumit Monga<br>Lorem ipsum dolor sit amet<br>Lorem ipsum dolor sit amet</td>
                    <td>
                        <u>Produced by</u><br>Lorem ipsum dolor sit amet<br>Lorem ipsum dolor sit amet<br>Lorem ipsum dolor sit amet<br>Lorem ipsum dolor sit amet
                    </td>
                    <td width="100">
                        <ul>
                            <li class="width: 100%; text-align: right;"><strong>Commission %</strong></li>
                            <li class="width: 100%; text-align: right;"><strong>Tax</strong> <</li>
                        </ul>
                    </td>
                    <td width="100">
                        <ul>
                            <li>{{ $sr_info->commission }}%</li>
                            <li>{{ $sr_info->tax }}%</li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>

        <h3>Buyer Invoice</h3>
        <table>
            <thead class="gray">
                <tr>
                    <th width="100">Date</th>
                    <th>Description</th>
                    <th width="100">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td style="text-align: center;">{{ $client['date'] }}</td>
                        <td>{{ $client['description'] }}</td>
                        <td style="text-align: right;">{{ $client['commission_formatted'] }}</td>
                    </tr>
                @endforeach
                <tr style="border-top: 1px solid #4F4F4F;">
                    <td></td>
                    <td style="text-align: right;">Total</td>
                    <td style="text-align: right;">{{ $total_formatted }}</td>
                </tr>
            </tbody>
        </table>
        <br/>
        <table>
            <tbody>
                <tr>
                    <td></td>
                    <td width="100">
                        <ul>
                            <li></li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>