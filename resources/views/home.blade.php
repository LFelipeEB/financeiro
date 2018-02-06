@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <!-- top tiles -->
        <div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fas fa-address-card"></i> Total de Contas</span>
                <div class="count">{{Auth::user()->accounts->count()}}</div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="far fa-credit-card"></i> Total de Cartões de Credito</span>
                <div class="count">{{Auth::user()->creditCard->count()}}</div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fas fa-chart-line"></i> Total de Aplicações</span>
                <div class="count">{{Auth::user()->applications->count()}}</div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fas fa-chart-line"></i> SALDO</span>
                <div class="count">{{(Auth::user()->profits->sum('value')/100) - (Auth::user()->expenses->sum('value')/100)}}</div>
            </div>
        </div>
        <!-- /top tiles -->

        <!-- GRAFICOS -->

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">
                <div class="x_panel">
                    <div class="row x_title">
                        <h3>
                            Despesas
                            <small>Demonstraçao de despesa nos ultimos 30 dias.</small>
                        </h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <canvas id="chart_expense" class="flot-base" width="725" height="100%" ></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">
                <div class="x_panel">
                    <div class="row x_title">
                        <h3>
                            Receitas
                            <small>Demonstraçao de Receitas nos ultimos 30 dias.</small>
                        </h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <canvas id="chart_profits" class="flot-base" width="725" height="100%" ></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- /GRAFICOS -->

    </div>
    <!-- /page content -->
    @include('charts.home')

@endsection
