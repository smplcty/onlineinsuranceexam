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
    </style>
</head>
<body>
    <div stylr="max-width: 800px; margin: auto;">
        <!-- <img src="{{ asset('images/Logo-mini.png') }}" alt="" style="max-height: 50px; "> -->
        <table class="gray">
            <tbody>
                <tr>
                    <td>Sales Representative: No: 123423 <span>Andy Andy Andy</span></td>
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
                    <td>
                        <ul>
                            <li><strong>Labell1</strong> xxxxxx</li>
                            <li><strong>Labell1</strong> xxxxxx</li>
                            <li><strong>Labell1</strong> xxxxxx</li>
                            <li><strong>Labell1</strong> xxxxxx</li>
                            <li><strong>Labell1</strong> xxxxxx</li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>

        <h3>Buyer Invoice</h3>
        <table>
            <thead class="gray">
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Debit</th>
                    <th>Credit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>10/10/2010</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, accusamus laudantium illum autem vero labore et tenetur consequatur vitae repellat ab, enim quidem. Iste magnam voluptate enim, at eaque doloremque.</td>
                    <td></td>
                    <td>$400.00</td>
                </tr>
                <tr>
                    <td>10/10/2010</td>
                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, accusamus laudantium illum autem vero labore et tenetur consequatur vitae repellat ab, enim quidem. Iste magnam voluptate enim, at eaque doloremque.</td>
                    <td></td>
                    <td>$400.00</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>$0.00</td>
                    <td>$400.00</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: right;">Total</td>
                    <td>$0.00</td>
                    <td>$400.00</td>
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