<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF generate</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 6px;
            line-height: 0.9;
        }

        .upper {
            text-transform: uppercase !important;
        }

        #tickets_container {
            position: absolute;
            left: 35px;
            right: -20px;
            top: 20px;
            bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table tr td {
            padding: 0;
            vertical-align: top;
        }

        #header {
            margin-bottom: 20px;
            position: absolute;
            top: -10px;
            left: 30px;
            right: -20px;
        }

        #header td {
            vertical-align: center;
        }

        #header table tr td {
            width: 50%;
        }

        #if_applicable {
            position: absolute;
            bottom: 20px;
            left: 80px;
            font-size: 9px;
        }

        #footer {
            position: absolute;
            bottom: -10px;
            text-align: center;
            width: 100%;
            font-size: 15px;
        }

        #carnet_nr {
            height: 30px;
            width: 190px;
            border: 1px solid;
            position: absolute;
            right: 0;
            top: -10px;
        }

        #left_description {
            width: 900px;
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            transform: rotate(-90deg);
            transform-origin: top left;
            position: absolute;
            bottom: 80px;
            left: -15px;
            text-align: center;
            white-space: nowrap;
            font-size: 13px;
        }

        #transit {
            margin-left: 57px;
            border: 3px solid;
            position: relative;
            height: 230px;
            background-color: rgb(200, 200, 200);
        }

        #transit_ro,
        #transit_en {
            border: 1px solid;
            position: absolute;
            width: 28px;
            vertical-align: center;
            text-align: center;
            font-size: 9px;
            top: -3px;
            line-height: 1.4;
            background-color: rgb(200, 200, 200);
        }

        #transit_ro {
            padding: 27.3px 0;
            left: -31px;
        }

        #transit_en {
            padding: 27.3px 0;
            left: -61px;
        }

        .counterfoil {
            position: absolute;
            left: -61px;
            top: 165px;
            width: 56px;
            height: 66px;
            border: 1px solid;
            padding-left: 2px;
            font-size: 8px !important;
            text-align: center;
        }

        .letter {
            position: relative;
            padding: 0 15px 0 30px;
        }

        .letter div:first-child {
            position: absolute;
            left: 15px;
            top: 0;
            font-weight: bold;
        }

        .space_to_write {
            height: 15px;
            border-bottom: 1px dotted;
            width: 100%;
            margin-top: 20px;
        }

        .single_line {
            display: inline-block;
            border-bottom: 1px dotted;
        }

        .date {
            width: 220px;
            border: solid 1.5px;
            padding: 10px;
            position: absolute;
            top: -7px;
            right: 20px;
            font-size: 7px;
        }

        #date_place_office_table tr td{
            border: 1px;
            border-style: solid none;
        }
        #date_place_office_table tr td div.letter {
            vertical-align: bottom;
        }
        #date_place_office_table tr td{
            padding-bottom: 2px;
        }

        #date_place_office_table tr td:first-child {
            width: 40%;
        }

        #date_place_office_table tr td:nth-child(2) {
            width: 25%;
            border-style: solid;
        }

        #date_place_office_table tr td:nth-child(3) {
            width: 35%;
        }
        .date_place_office {
            text-align: center;
            padding-top: 24.5px;
        }

        .date_place_office div:first-child {
            border-bottom: dotted 1px;
            height: 7px;
            width: 70px;
            vertical-align: bottom;
            margin: 0 auto 3px;
            text-align: left;
        }

        .stamp {
            position: absolute;
            top: 10px;
            right: 10px;
            height: 36px;
            width: 36px;
            border: 1px dotted;
            border-radius: 18px;
        }
    </style>
</head>
<body>
<div id="header">
    <table>
        <tr>
            <td style="font-size: 12px;">
                <b>A.T.A. CARNET / </b>
                <em>CARNET A.T.A.</em>
            </td>
            <td style="position:relative; font-size: 10px;">
                <b>CARNET No./ </b>
                <em>Carnet Nr.</em>
                <div id="carnet_nr"></div>
            </td>
        </tr>
    </table>
</div>
<div id="left_description">
    <b style="text-transform: uppercase">for use customs of country/ customs territory of transit</b><br>
    <em>Rezervat biroului vamal / teritoriului vamal de import temporar</em>
</div>
<div id="tickets_container">
    @for($i = 0; $i < 4; $i++)
        <div class="ticket" id="transit">
            <div class="ticket_type">
                <div id="transit_ro" class="upper">
                    <em>
                        t<br>r<br>a<br>n<br>z<br>i<br>t
                    </em>
                </div>
                <div id="transit_en" class="upper">
                    <b>
                        t<br>r<br>a<br>n<br>s<br>i<br>t
                    </b>
                </div>
            </div>
            <div class="counterfoil">
                <b> counterfoil/ No./</b>
                <em>Nr. <br> cotorului</em>
            </div>
            <div style="padding-left: 15px;">
                <b>Clearence for trasnit / </b>
                <em>V&#259;muit pentru trazit</em>
            </div>
            <div class="letter" >
                <div style="top: 0;">1.</div>
                <b>The goods described in the General List under item No.(s)</b><span class="single_line"
                                                                                      style="width: 50%"></span>
                <br>
                <em>M&#259;rfurile enumerate &#238;n Lista General&#259; sub Nr. (numerele)</em><br>
                <b>have been despatched in trasit to the Customs Office at *</b><span class="single_line"
                                                                                      style="width: 50%;"></span><br>
                <em>au fost expediate &#238;n tranzit c&#259;tre biroul vamal din</em>
            </div> {{--1--}}
            <div class="letter" >
                <div style="top: 0;">2.</div>
                <b>Final date for re-exportation/production to the Customs of goods*/</b><br>
                <em>Data limit&#259; pentru re-export / prezentarea m&#259;rfurilor &#238;n vam&#259;*</em>
                <div class="date">
                    <b>year    </b>/<b>    month    </b>/<b>    day</b>
                                      /        / <br>
                    <em>anul    </em>/<em>      luna        </em>/<em>     ziua</em>
                                     /        /
                </div>
            </div>{{--2--}}
            <div class="letter" >
                <div style="top: 0;">3.</div>
                <b>Registered under reference No.*/</b>
                <em>&#206;nregistrat sub Nr.*</em>
                <div class="space_to_write" style="border-top: none; margin: 0; width: 55%;"></div>
            </div>{{--3--}}
            <table>
                <tr>
                    <td style="padding-top: 5px;">
                        <table id="date_place_office_table">
                            <tr>
                                <td style="border-top: 1px solid;">
                                    <div class="letter">
                                        <div>4.</div>
                                    </div>
                                    <div class="date_place_office">
                                        <div></div>
                                        <b>Customs Office</b><br>
                                        <em>Biroul vamal</em>
                                    </div>
                                </td>
                                <td>
                                    <div class="letter">
                                        <div>5.</div>
                                    </div>
                                    <div class="date_place_office">
                                        <div></div>
                                        <b>Place</b><br>
                                        <em>Locul</em>
                                    </div>
                                </td>
                                <td>
                                    <div class="letter">
                                        <div>6.</div>
                                    </div>
                                    <div class="date_place_office">
                                        <div>          /          /</div>
                                        <b>Date (year.month/day)</b><br>
                                        <em>Data (anul/luna/ziua)</em>
                                    </div>
                                </td>
                                </td>
                                <td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 35% ;vertical-align: bottom; border: solid 1px; position:relative;">
                        <div class="stamp"></div>
                        <div style="position:absolute; top: 0; left: 15px;">
                            <b>7.</b>
                        </div>
                        <div
                            style="width: 60%; border-top: dotted 1px; margin-left: 5px; padding: 3px 4px 3px; text-align: right">
                            <b>Signature and Stamp</b><br>
                            <em>Semn&#259;tura &#351;i &#351;tampila</em>
                        </div>
                    </td>
                </tr>
            </table>
            <div style="padding-left: 15px;">
                <b>Certificate of discharge by the Customs of destination/</b>
                <em>Certificat de desc&#259;rcare al biroului vamal de destina&#539;ie*</em>
            </div>
            <div class="letter" >
                <div>1.</div>
                <b>The goods specified in paragraph 1 above have been re-exported/produced*</b><br>
                <em>M&#259;rfurile vizitate &#238;n paragraful 1 de mai sus au fost reexportate/prezentate*</em>
            </div>
            <div class="letter" >
                <div>2.</div>
                <b>Other remarks*/</b>
                <em>Alte men&#539;iuni * </em>
                <div class="space_to_write" style="border-top: none; margin: 0;"></div>
            </div>
            <table>
                <tr>
                    <td style="padding-top: 5px;">
                        <table id="date_place_office_table">
                            <tr>
                                <td style="border-top: 1px solid;">
                                    <div class="letter">
                                        <div>3.</div>
                                    </div>
                                    <div class="date_place_office">
                                        <div></div>
                                        <b>Customs Office</b><br>
                                        <em>Biroul vamal</em>
                                    </div>
                                </td>
                                <td>
                                    <div class="letter">
                                        <div>4.</div>
                                    </div>
                                    <div class="date_place_office">
                                        <div></div>
                                        <b>Place</b><br>
                                        <em>Locul</em>
                                    </div>
                                </td>
                                <td>
                                    <div class="letter">
                                        <div>5.</div>
                                    </div>
                                    <div class="date_place_office">
                                        <div>          /          /</div>
                                        <b>Date (year.month/day)</b><br>
                                        <em>Data (anul/luna/ziua)</em>
                                    </div>
                                </td>
                                </td>
                                <td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 40% ;vertical-align: bottom; border: solid 1px; position:relative;">
                        <div class="stamp"></div>
                        <div style="position:absolute; top: 0; left: 15px;">
                            <b>6.</b>
                        </div>
                        <div
                            style="width: 60%; border-top: dotted 1px; margin-left: 5px; padding: 3px 4px 3px; text-align: right">
                            <b>Signature and Stamp</b><br>
                            <em>Semn&#259;tura &#351;i &#351;tampila</em>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        @if($i == 1)
            <br>
            <br>
            <div style="width: 100%; border-bottom: 2px dashed;"></div>
            <br>
        @endif
        <br>
    @endfor
</div>
<div id="if_applicable">
    <b>* if applicable/*</b>
    <em>Dac&#259; este cazul</em>
</div>
<div id="footer" class="upper">
    <b>do not remove the carnet / </b>
    <em>nu extrage&#539;i din carnet</em>
</div>
</body>
</html>
