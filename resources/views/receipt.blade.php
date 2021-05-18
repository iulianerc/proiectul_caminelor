<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF generate</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 13px;
            line-height: 1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .center {
            text-align: center;
        }

        #receipt_data tr td {
            width: 50%;
            text-align: center;
            vertical-align: top;
        }

        #logo_table tr td {
            width: 33.33%;
            text-align: center;
            padding-bottom: 60px;
            vertical-align: top;
        }

        #services {
            margin-top: 30px;
        }
        #services tr th:nth-child(2),
        #services tr th:nth-child(3) {
            width: 130px !important;
        }
        #services tr th,
        #services tr td {
            border: solid 1px;
            padding: 10px 5px;
        }

        #services tr th:nth-child(2),
        #services tr td:nth-child(2),
        #services tr th:nth-child(3),
        #services tr td:nth-child(3){
            text-align: right !important;
        }
        #issued_by {
            position: absolute;
            bottom: 0;
            right: 0;
        }
    </style>
</head>
<body>
<table id="logo_table">
    <tr>
        <td>Eliberarea carnetului ATA</td>
        <td style="position: relative">
            <div style="position: absolute; top: -40px;"><img src="{{$url}}" alt="CCI-ATA Logo" height="100"></div>
        </td>
        <td>Camera de Comerț și Industrie a Republicii Moldova</td>
    </tr>
</table>
<div class="center">
    <b>CONT DE PLATĂ</b><br><br>
</div>
<table id="receipt_data">
    <tr>
        <td>Numărul cererii: <b>{{$order_number}}</b></td>
        <td>
            Numărul contului de plată: <b>{{$number}}</b><br>
            Data: <b>{{$date}}</b>
        </td>
    </tr>
    <tr>
        <td style="height: 30px;"></td>
    </tr>
    <tr>
        <td>Plătitor</td>
        <td>Beneficiar</td>
    </tr>
    <tr>
        <td style="height: 10px;"></td>
    </tr>
    <tr>
        <td>
            <b>{{$client_name}}</b>
        </td>
        <td>
            <b>{{$cci_info['name']}}</b>
        </td>
    </tr>
    <tr>
        <td>Cod fiscal: <b>{{$client_idno}}</b></td>
        <td>
            Cod fiscal: <b>{{$cci_info['idno']}}</b> <br>
            IBAN: <b>{{$cci_info['iban']}}</b> <br>
            <b>{{$cci_info['bank_name']}}</b>
        </td>
    </tr>
</table>

{{--                Services            --}}

<table id="services">
    <tr>
        <th colspan="3">
            Servicii acordate
        </th>
    </tr>
    <tr>
        <th style="text-align:left;">Scopul plății</th>
        <th>Suma fără TVA, MDL</th>
        <th>Suma cu TVA, MDL</th>
    </tr>
    <tr>
        <td>Eliberarea carnetului ATA {{$isContinuation ? '(suplinire)' : ''}}</td>
        <td>{{$services['totals']}}</td>
        <td>{{$services['totals'] * 1.2}}</td>
    </tr>
    <tr>
        <td>Suma garanției</td>
        <td>{{$guaranty_sum}}</td>
        <td>{{$guaranty_sum}}</td>
    </tr>
    <tr>
        <td style="text-align: right;">TOTAL</td>
        <td>{{$services['totals'] + $guaranty_sum}}</td>
        <td>{{$services['totals'] * 1.2 + $guaranty_sum}}</td>
    </tr>
</table>
<br>
Suma cu litere: {{$number_equivalent}}
<div id="issued_by">Cont eliberat de: <b>{{$issued_by}}</b></div>
</body>
</html>
