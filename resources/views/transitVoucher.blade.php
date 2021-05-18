<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF generate</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 10px;
        }

        th {
            font-weight: normal;
        }

        .upper {
            text-transform: uppercase;
        }

        .null_padding, .null_padding_table tr td {
            padding: 0 !important;
        }

        .td_null_border tr td {
            border: none !important;
        }

        .text_center {
            text-align: center !important;
        }

        #titles td {
            font-size: 14px;
        }

        #table_container {
            position: absolute;
            top: 55px;
            left: 30px;
            right: 0;
        }

        #table_left_header__en,
        #table_left_header__ro {
            position: absolute;
            text-transform: uppercase;
            top: -1.5px;
            font-size: 14px;
            border: 3px solid;
            line-height: 0.9;
            background-color: rgb(200, 200, 200);
            text-align: center;
        }

        #table_left_header__ro {
            left: -30px;
            padding: 84.5px 7px;
        }

        #table_left_header__en {
            left: -58px;
            padding: 84.5px 7px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        #main_table tr td {
            border: 3px solid;
            font-size: 9px;
            padding: 5px 5px;
            line-height: .9;
            vertical-align: top;
        }

        #main_table tr td:nth-child(2) {
            width: 55%;
        }

        #main_table tr td.countries {
            height: 400px;
            font-size: 10px;
        }

        #valid_date {
            width: 100%;
            margin: 15px 20px 0;
        }

        #valid_date tr td {
            border: none;
            text-align: center;
        }

        #valid_date th {
            border-bottom: 1px dotted;
            padding: 0;
            text-align: center;
            position: relative;
            height: 11px;
        }

        #valid_date th:first-child {
            width: 100px;
        }

        #valid_date th:nth-child(2),
        #valid_date th:last-child {
            width: 80px;
        }

        #valid_date th b {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 14px;
            font-weight: bolder;
        }

        .letter {
            position: relative;
            padding-left: 15px;
            width: 100%;
        }

        .letter div:first-child {
            position: absolute;
            top: 0;
            left: 0;
            font-weight: bold;
        }

        .stamp_block {
            position: absolute;
            width: 220px;
            height: 27px;
            border: 1px solid;
            right: 20px;
            top: 5px;
        }

        .stamp_block div {
            position: relative;
            top: 5px;
            left: 5px;
            font-size: 16px;
            text-align: center;
            letter-spacing: 7px;
            color: lightskyblue;
        }

        #second_stamp,
        #first_stamp {
            position: absolute;
            width: 60px;
            height: 60px;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            border-radius: 30px;
            border: dotted 1px;
        }
        #first_stamp {
            top: 510px;
            right: 30px;
        }
        #second_stamp {
            top: 727px;
            right: 30px;
        }

        #applicable {
            position: absolute;
            bottom: -17px;
            left: 30px;
        }

        .space_to_write {
            border: 1px;
            border-style: dotted none;
            width: 100%;
            height: 15px;
            margin: 10px 0 5px;
        }

        .single_line {
            border: 1px;
            border-style: none none dotted;
            width: 100%;
            height: 10px;
            margin-bottom: 3px;
        }

        .text {
            font-size: 11px;
            margin-top: 3px;
        }
    </style>
</head>
<body>
<table>
    <tr id="titles">
        <td style="padding-left: 29px;"><b>A.T.A. CARNET</b></td>
        <td style="text-align: right; padding-right: 20px;"><em>CARNET A.T.A.</em></td>
    </tr>
</table>
<div id="table_container">
    <div id="table_left_header__ro"><em>t<br>r<br>a<br>n<br>z<br>i<br>t</em></div>
    <div id="table_left_header__en"><b>t<br>r<br>a<br>n<br>s<br>i<br>t</b></div>
    <table id="main_table">
        <tr>
            <td id="holder" style="height: 100px;">
                <b>A. HOLDER AND ADDRESS</b>/<em>Titular &#351;i Adresa</em><br>
                <div class="text">
                    {{$holder['id']}}<br>
                    {{$holder['name']}}<br>
                    {!!$address!!}
                </div>
            </td>
            <td class="null_padding">
                <table>
                    <tr>
                        <td style="border: 3px; border-style: none none solid none">
                            <div class="letter">
                                <div>G.</div>
                                <b class="upper">FOR ISSUING ASSOCIATION USE</b><em>/ Rezervat asocia&#539;iei
                                    emitente</em><br>
                                <b class="upper">trasit voucher </b><b>No.</b><br>
                                <em class="upper">volet de tranzit </em><em>Nr.</em>          <span
                                    style="font-size: 11px;">........{1}.....................</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="position:relative; border: none; height: 55px; ">
                            <div class="stamp_block">
                                <div>
                                    {{$carnetNumber}}
                                </div>
                            </div>
                            <div class="letter">
                                <div>a)</div>
                                <b>CARNET No. <br></b>
                                <em>Carnet Nr.</em><br>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="height: 55px;">
                <b>B. REPRESENTED BY*</b>/
                <em>Reprezentat de*</em><br>
                <div class="text">
                    {!! $representedBy['name'] ?? $representedBy['all'] !!}
                </div>
            </td>
            <td>
                <div style="padding-left: 7px;">
                    <b>b) ISSUED BY /</b> Eliberat de<br>
                </div>
                <div class="text">
                    {{$issuedBy}}
                </div>
            </td>
        </tr>
        <tr>
            <td style="height: 90px;">
                <div class="letter">
                    <div><b>C. </b></div>
                    <b>INTENDED USE OF GOODS/ </b><em>Utilizarea prev&#259;zut&#259; a m&#259;rfurilor</em><br>
                </div>
                <div class="text">
                    {{$usage}}
                </div>
            </td>
            <td>
                <div class="letter">
                    <div>c)</div>
                    <b>VALID UNTIL/ </b><em>Valabil p&#226;n&#259; la</em>
                </div>
                <table id="valid_date">
                    <tr>
                        <th>{{$validTo['year']}}<b>/</b></th>
                        <th>{{$validTo['month']}}<b>/</b></th>
                        <th>{{$validTo['day']}}</th>
                    </tr>
                    <tr>
                        <td><b>year</b><br><em>anul</em></td>
                        <td><b>month</b><br><em>luna</em></td>
                        <td><b>day(inclusive)</b><br><em>anul(inclusiv)</em></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="null_padding" style="border: none">
                <table>
                    <tr>
                        <td style="height: 90px; border-right-style: none">
                            <b class="upper">d. means of transport*</b><em>/ Mijloc de transport*</em><br>
                            <div class="text">
                                Автотранспорт: {{$transport['name']}} {{$transport['count']}}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 90px; border-right-style: none">
                            <div class="letter">
                                <div>E.</div>
                                <b class="upper">Packaging details</b><b> (Number, kind, Marks, etc.)*/</b><br>
                                <em>Detalii privind ambalajul (num&#259;r, natura, m&#259;rci, etc.)*</em>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-right-style: none; height: 473.7px; padding-right: 15px;">
                            <div class="letter">
                                <div>F.</div>
                                <b class="upper">declaration of dispatch in transit/</b><br>
                                Declara&#539;ie de expediere &#238;n tranzit <br>
                            </div>
                            <br>
                            <br>
                            <div id="declaration">
                                <b>I, duly authorized</b> :/
                                <em>Subsemnatul, deplin autorizat: </em>
                                <br><br>
                                <div class="letter">
                                    <div>a)</div>
                                    <b>declare that i am dispatching to</b>
                                    <em>:/ declar c&#259; expediez la:</em>
                                    <br><br>
                                    <div class="space_to_write"></div>
                                    <b>In compliance with the conditions laid down in the laws and regulations of the
                                        country/ Customs territory of transit, the goods enumerated in the list overleaf
                                        and described in the General List under item No.(s)/</b>
                                    <em>&#238;n condi&#539;iile prev&#259;zute de legile &#351;i reglement&#259;rile
                                        &#539;&#259;rii de tranzit, m&#259;rfurile enumerate &#238;n lista de pe verso
                                        &#351;i reluate &#238;n Lista General&#259; sub Nr. (numerele)</em>
                                    <br><br>
                                    <div class="space_to_write"></div>
                                </div>
                                <div class="letter">
                                    <div>b)</div>
                                    <b>undertake to comply with the laws and regulations of the country/Customs
                                        territory of transit and to produce these goods with seals (if any) intact, and
                                        this Carnet to the Customs Office of destination within the period stipulated by
                                        the Customs/ </b>
                                    <em>m&#259; angajez s&#259; respect legile &#351;i reglement&#259;rile de tranzit
                                        &#351;i s&#259; prezint aceste m&#259;rfuri dac&#259; este cazul cu sigiliile
                                        intacte, ca &#351;i prezentul carnet la biroul vamal de destina&#539;ie &#238;n
                                        termenul fixat de vam&#259;.</em>
                                    <br><br>
                                    <br>
                                </div>
                                <div class="letter">
                                    <div>c)</div>
                                    <b>confirm that the information given is true and complete/</b>
                                    <em>certific ca sincere &#351;i complete informa&#539;iile de pe acest VOLET.</em>
                                    <br><br>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="null_padding" style="border: none">
                <table>
                    <tr>
                        <td style="padding-right: 15px; background-color: rgb(200, 200, 200);">
                            <div style="text-align:center; padding-bottom: 15px;">
                                <b>FOR CUSTOMS USE ONLY</b>/
                                <em>Rezervat v&#259;mii</em>
                            </div>
                            <b class="upper">H. clearance on transit</b>/
                            <em>V&#259;muit la tranzit</em>
                            <div class="letter">
                                <div>a)</div>
                                <b>The goods referred to in the above declaration have been cleared for transit to the
                                    Customs Office at :/</b>
                                <em>M&#259;rfurile care fac obiectul declara&#539;iei sus-men&#539;ionat&#259; au fost v&#259;muite
                                    pentru tranzit &#238;n biroul vamal din:</em>
                                <div class="single_line"></div>
                            </div>
                            <div class="letter">
                                <div>b)</div>
                                <b>Final date for re-exportation/production to Customs*/</b>
                                <em>Data limit&#259; pentru re-export/ prezentarea m&#259;rfurilor la vam&#259;*:</em>
                                <div style="font-size: 7px;">
                                    <b>year       month    day(inclusive)</b><br>
                                    <em>anul         luna         ziua(inclusiv)       .............................../....................../.................................</em>
                                </div>
                            </div>
                            <div class="letter">
                                <div>c)</div>
                                <b>Registered under reference No. */</b>
                                <em>&#206;nregistrat sub Nr.</em>
                                <div class="single_line"></div>
                            </div>
                            <div class="letter">
                                <div>d)</div>
                                <b>Customs seals applied*/</b>
                                <em>Sigilii vamale aplicate*</em>
                                <div class="single_line"></div>
                            </div>
                            <div class="letter">
                                <div>e)</div>
                                <b>This voucher must be forwarded to the Customs Office at*/</b>
                                <em> Prezentul VOLET trebuie transmis biroului vamal din:*</em>
                                <div class="single_line"></div>
                                <br><br>
                            </div>
                            <b>At </b><em>/ La</em>.............................................................................
                            <div class="text_center">
                                <b>Customs office / </b>Biroul vamal <br>
                            </div>
                            <br><br>
                            <table class="td_null_border null_padding_table" style="margin-left: 5px;">
                                <tr>
                                    <td style="margin-left: 130px;">...........<b style="font-size: 14px;">/</b>................<b
                                            style="font-size: 14px;">/</b>...........
                                    </td>
                                    <td style="vertical-align: bottom">
                                        ......................................
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Date (year/month/day)</b><br>
                                        <em>Data (anul/luna/ziua)</em>
                                    </td>
                                    <td>
                                        <b>Signature and Stamp</b><br>
                                        <em>Semn&#259;tura &#351;i &#351;tampila</em>
                                    </td>
                                </tr>
                            </table>
                            <br><br>
                            <div id="first_stamp"></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-right: 15px; background-color: rgb(200, 200, 200);">
                            <div style="text-align:center; padding-bottom: 15px;">
                                <b>Certificate of discharge by the Customs Office at destination</b>
                                <br>
                                <em>Certificat de desc&#259;rcare al biroului de destina&#539;ie</em>
                            </div>
                            <div class="letter">
                                <div>f)</div>
                                <b>The goods referred to in the above declaration have been re-exported/produced*/ </b>
                                <em>M&#259;rfurile care fac obiectul declara&#539;iei sus-men&#539;ionat&#259; au fost reexportate/prezentate*</em>
                                <br><br>
                            </div>
                            <div class="letter">
                                <div>g)</div>
                                <b>Other remarks*:/ </b>
                                <em>Alte men&#539;iuni*:</em>
                                <br><br>
                                <br>
                                <br>
                            </div>
                            <b>At </b><em>/ La</em>.............................................................................
                            <div class="text_center">
                                <b>Customs office / </b>Biroul vamal <br>
                            </div>
                            <br><br>
                            <br>
                            <br>
                            <br>
                            <table class="td_null_border null_padding_table" style="margin-left: 5px;">
                                <tr>
                                    <td style="margin-left: 130px;">...........<b style="font-size: 14px;">/</b>................<b
                                            style="font-size: 14px;">/</b>...........
                                    </td>
                                    <td style="vertical-align: bottom">
                                        ......................................
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Date (year/month/day)</b><br>
                                        <em>Data (anul/luna/ziua)</em>
                                    </td>
                                    <td>
                                        <b>Signature and Stamp</b><br>
                                        <em>Semn&#259;tura &#351;i &#351;tampila</em>
                                    </td>
                                </tr>
                            </table>
                            <br><br>
                            <div id="second_stamp"></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-left-style: none">
                            <br>
                            <b>Place </b>.....................<b> Date (year/month/day)</b> ...........<b
                                style="font-size: 14px;">/</b>................<b style="font-size: 14px;">/</b>...........<br>
                            <em>Locul                        Data (anul/luna/ziua)</em>
                            <br><br>
                            <br>
                            <b>Name</b>..........................................................................................................
                            <em>Numele</em>
                            <br><br>
                            <br>
                            <b>Signature <span style="font-size: 12px;">X</span></b>
                            ...........................................................................................
                            <b><span style="font-size: 12px;">X</span></b>
                            <em>Semn&#259;tura</em>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<div id="applicable">
    *<b>If applicable</b>
    <em>/ * Dac&#259; este cazul</em>
</div>
</body>
</html>
