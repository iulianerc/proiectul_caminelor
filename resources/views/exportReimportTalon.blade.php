<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF generate</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 7px;
            line-height: 0.9;
        }

        .upper {
            text-transform: uppercase !important;
        }

        #tickets_container {
            position: absolute;
            left: 60px;
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
            left: 60px;
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

        #carnet_nr div {
            position: relative;
            top: 7px;
            left: 5px;
            font-size: 14px;
            text-align: center;
            letter-spacing: 6px;
            color: lightskyblue;
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

        #replacement {
            font-size: 18px;
            letter-spacing: 2px;
        }

        #export, #reimport {
            margin-left: 57px;
            border: 3px solid;
            position: relative;
            height: 220px;
            background-color: rgb(200, 200, 200);
        }

        #export_ro,
        #export_en {
            border: 1px solid;
            position: absolute;
            width: 28px;
            vertical-align: center;
            text-align: center;
            font-size: 9px;
            top: -3px;
            line-height: 1.3;
            background-color: rgb(200, 200, 200);
        }

        #export_ro {
            padding: 39px 0;
            left: -31px;
        }

        #export_en {
            padding: 1.6px 0;
            left: -61px;
        }

        #reimport_ro,
        #reimport_en {
            border: 1px solid;
            position: absolute;
            width: 28px;
            vertical-align: center;
            text-align: center;
            font-size: 9px;
            top: -3px;
            line-height: 1.1;
            background-color: rgb(200, 200, 200);
        }

        #reimport_ro {
            padding: 33.5px 0;
            left: -31px;
        }

        #reimport_en {
            padding: 1.6px 0;
            left: -61px;
        }

        .counterfoil {
            position: absolute;
            left: -61px;
            top: 166px;
            width: 56px;
            height: 55px;
            border: 1px solid;
            padding-left: 2px;
            font-size: 8px !important;
            text-align: center;
        }

        .counterfoil div {
            font-size: 16px !important;
            padding-top: 4px;
        }

        .letter {
            position: relative;
            padding: 5px 10px 5px 30px;
        }

        .letter div:first-child {
            position: absolute;
            left: 15px;
            top: 5px;
            font-weight: bold;
        }

        .double_space {
            height: 20px;
            border: 1px;
            border-style: dotted none;
            width: 100%;
            margin: 20px 0;
        }

        .single_line {
            display: inline-block;
            border-bottom: 1px dotted;
        }

        .date {
            width: 180px;
            border: solid 1.5px;
            padding: 10px;
            position: absolute;
            top: 10px;
            right: 20px;
        }

        #date_place_office_table tr td {
            border-top: 1px solid;
            height: 55px;
        }

        #date_place_office_table tr td:first-child {
            width: 30%;
        }

        #date_place_office_table tr td:nth-child(2) {
            border: 1px;
            border-style: solid solid none;
            width: 30%;
        }

        #date_place_office_table tr td:last-child {
            width: 40%;
        }

        .date_place_office {
            text-align: center;
            padding-top: 14px;
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
            top: 15px;
            right: 15px;
            height: 54px;
            width: 54px;
            border: 1px dotted;
            border-radius: 27px;
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
                <div id="carnet_nr">
                    <div>
                        {{$carnetNumber}}
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<div id="left_description">
    @if($replacementText)
        <b id="replacement">{!! $replacementText !!}</b>
        <br>
        <br>
    @endif
    <b style="text-transform: uppercase">for use customs of country/ customs territory of temporary exportation</b><br>
    <em>Rezervat biroului vamal / teritoriului vamal de export temporar</em>
</div>
<div id="tickets_container">
    @foreach([1,0] as $i)
        <br>
        <br>
        @if(!$i)
            <div style="width: 100%; border-bottom: 2px dashed;"></div>
        @endif
        <br>
        <br>
        <div class="ticket" id="export">
            <div class="ticket_type">
                <div id="export_ro" class="upper">
                    <em>
                        e<br>x<br>p<br>o<br>r<br>t
                    </em>
                </div>
                <div id="export_en" class="upper">
                    <b>
                        e<br>x<br>p<br>o<br>r<br>t<br>a<br>t<br>i<br>o<br>n
                    </b>
                </div>
            </div>
            <div class="counterfoil">
                <b> counterfoil/ No./</b>
                <em>Nr. <br> cotorului</em>
                <div>{{ $pageCount * 2 - $i <= $outputs ? $pageCount * 2 - $i : ''}}</div>
            </div>
            <div class="letter">
                <div>1.</div>
                <b>The goods described in the General List under item No.(s)</b>...............................................................................................................
                <br>
                <em>M&#259;rfurile enumerate &#238;n Lista General&#259; sub Nr. (numerele)</em><br>
                .......................................................................................................................................................................................................
                <b>have been exported</b>
                <br>
                <div style="text-align: right;width: 90%; ">
                    au fost exportate
                </div>
            </div>
            <div class="letter" style="border: 1px; border-style: solid none;">
                <div>2.</div>
                <b>Final date for duty-free re-importation/ </b>
                <em>Data limit&#259; pentru reimport cu scutire de vam&#259;</em>
                <div class="date">
                    <b>year    </b>/<b>    month    </b>/<b>    day</b>
                                      /        / <br>
                    <em>anul    </em>/<em>      luna        </em>/<em>     ziua</em>
                                     /        /
                </div>
                <br><br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
            <table>
                <tr>
                    <td>
                        <div class="letter">
                            <div>3.</div>
                            <b>Other remarks*/</b>
                            <em>Alte men&#539;iuni * </em>..............................................................................................................
                            <div class="double_space" style="margin: 13px 0;"></div>
                        </div>
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
                            </tr>
                        </table>
                    </td>
                    <td style="width: 30% ;vertical-align: top; border-left: solid 1px; position:relative;">
                        <div class="stamp"></div>
                        <b>  7.</b>
                        <br><br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div
                            style="width: 75%; border-top: dotted 1px; margin-left: 5px; padding: 1px 4px 15px 0; text-align: right">
                            <b>Signature and Stamp</b><br>
                            <em>Semn&#259;tura &#351;i &#351;tampila</em>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <br>
        <div class="ticker" id="reimport">
            <div class="ticket_type">
                <div class="ticket_type">
                    <div id="reimport_ro" class="upper">
                        <em>
                            r<br>e<br>i<br>m<br>p<br>o<br>r<br>t
                        </em>
                    </div>
                    <div id="reimport_en" class="upper">
                        <b>
                            r<br>e<br>i<br>m<br>p<br>o<br>r<br>t<br>a<br>t<br>i<br>o<br>n
                        </b>
                    </div>
                </div>
                <div class="counterfoil">
                    <b> counterfoil/ No./</b>
                    <em>Nr. <br> cotorului</em>
                    <div>{{ $pageCount * 2 - $i <= $outputs ? $pageCount * 2 - $i : ''}}</div>
                </div>
                <div class="letter" style="border-bottom: 1px solid;">
                    <div>1.</div>
                    <b>The goods described in the General List under item No.(s)</b>...............................................................................................................
                    <br>
                    <em>M&#259;rfurile enumerate &#238;n Lista General&#259; sub Nr. (numerele)</em><br>
                    <br>
                    <br>
                    <b>which were temporarily exported under cover of exportation voucher(s) No.(s) <span class="single_line" style="width: 70px;"></span> of this Carnet have been re-imported *</b><br>
                    <em>exportate temporar sub acoperirea voletului (voletelor) de export Nr. (numerele) <span style="display: inline-block; width: 98px;"></span> ale prezentului carnet au fost reimportate</em>
                    <br><br>
                    <br>
                    <br>
                </div>
                <table>
                    <tr>
                        <td>
                            <div class="letter">
                                <div>2.</div>
                                <b>Other remarks*/</b>
                                <em>Alte men&#539;iuni * </em>..............................................................................................................
                                <div class="double_space" style="margin: 20px 0;"></div>
                                <br>
                                <br>
                            </div>
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
                                </tr>
                            </table>
                        </td>
                        <td style="width: 30% ;vertical-align: top; border-left: solid 1px; position:relative;">
                            <div class="stamp"></div>
                            <b>  6.</b>
                            <br><br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div
                                style="width: 75%; border-top: dotted 1px; margin-left: 5px; padding: 1px 4px 15px 0; text-align: right">
                                <b>Signature and Stamp</b><br>
                                <em>Semn&#259;tura &#351;i &#351;tampila</em>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        @endforeach
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
