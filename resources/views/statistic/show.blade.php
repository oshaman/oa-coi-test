@extends('layouts.app')

@section('nav')
    @include('statistic.nav')
@endsection

@section('js')
    @if(null != $dataPoints)
        <script>
            window.onload = function () {

                var chart1 = new CanvasJS.Chart("chartContainer1", {
                    theme: "light1",// "light1", "light2", "dark1", "dark2"
                    animationEnabled: true,
                    title: {
                        text: "Exmo - {{ $title }}"
                    },
                    subtitles: [{
                        text: "{{ date('d.m.Y') }}"
                    }],
                    axisY: {
                        includeZero: false,
                        prefix: "$ ",
                        @if(empty($hours)) maximum: {{ $dataPoints['exmo']['max']*1.05 ?? 50 }} @endif
                    },
                    axisX: {
                        includeZero: false,
                        valueFormatString: "HH:mm",
                        crosshair: {
                            enabled: true,
                            snapToDataPoint: true
                        }
                    },
                    legend: {
                        cursor: "pointer",
                        itemclick: toggleDataSeries
                    },
                    toolTip: {
                        shared: true
                    },
                    data: [
                        {
                            type: "area",
                            xValueType: "dateTime",
                            name: "MIN",
                            showInLegend: true,
                            visible: true,
                            yValueFormatString: "#,###.0000 $",
                            xValueFormatString: "DD.MM HH:mm",
                            dataPoints: {!! $dataPoints['exmo'][0]  !!}
                        },
                        {
                            type: "area",
                            color: "rgba(255,12,32,.3)",
                            xValueType: "dateTime",
                            name: "MAX",
                            showInLegend: true,
                            visible: false,
                            yValueFormatString: "#,###.0000 $",
                            xValueFormatString: "DD.MM HH:mm",
                            dataPoints: {!! $dataPoints['exmo'][1]  !!}
                        }
                    ]
                });
                var chart2 = new CanvasJS.Chart("chartContainer2", {
                    theme: "dark2",// "light1", "light2", "dark1", "dark2"
                    animationEnabled: true,
                    title: {
                        text: "Bitfinex - {{ $title }}"
                    },
                    subtitles: [{
                        text: "{{ date('d.m.Y') }}"
                    }],
                    axisY: {
                        includeZero: false,
                        prefix: "$ ",
                        @if(empty($hours)) maximum: {{ $dataPoints['bitfinex']['max']*1.05 ?? 50 }} @endif
                    },
                    axisX: {
                        includeZero: false,
                        valueFormatString: "HH:mm",
                        crosshair: {
                            enabled: true,
                            snapToDataPoint: true
                        }
                    },
                    legend: {
                        cursor: "pointer",
                        itemclick: toggleDataSeries
                    },
                    toolTip: {
                        shared: true
                    },
                    data: [
                        {
                            type: "area",
                            xValueType: "dateTime",
                            name: "MIN",
                            showInLegend: true,
                            visible: true,
                            yValueFormatString: "#,###.0000 $",
                            xValueFormatString: "DD.MM HH:mm",
                            dataPoints: {!! $dataPoints['bitfinex'][0]  !!}
                        },
                        {
                            type: "area",
                            color: "#b3e6b3",
                            xValueType: "dateTime",
                            name: "MAX",
                            showInLegend: true,
                            visible: false,
                            yValueFormatString: "#,###.0000 $",
                            xValueFormatString: "DD.MM HH:mm",
                            dataPoints: {!! $dataPoints['bitfinex'][1]  !!}
                        }
                    ]
                });

                chart1.render();
                chart2.render();

                function toggleDataSeries(e) {
                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    }
                    else {
                        e.dataSeries.visible = true;
                    }
                    chart1.render();
                    chart2.render();
                }

            }
        </script>
    @endif
@endsection
@section('content')
    <div class="">
        <button type="button" class="btn btn-primary">min - {{ $dataPoints['exmo']['min'] }}</button>
        <button type="button" class="btn btn-success">max - {{ $dataPoints['exmo']['max'] }}</button>
    </div>
    <hr>
    <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
    <hr>
    <div class="">
        <button type="button" class="btn btn-primary">min - {{ $dataPoints['bitfinex']['min'] }}</button>
        <button type="button" class="btn btn-success">max - {{ $dataPoints['bitfinex']['max'] }}</button>
    </div>
    <hr>
    <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
@endsection

@section('jss')
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
