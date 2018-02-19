@extends('layouts.blank')

@section('main_container')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Listar Faturas de Cartao de Credito</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Dados do Cartao de Credito<small>Detalhamento das informaçoes</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-times"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-6 col-xs-6">
                                <h3>{{$expenses[0]->creditCard->nickname}}</h3>

                                <ul class="list-unstyled">
                                    <li id="printed_name">
                                        <i class="fas fa-user user-profile-icon"></i>
                                    </li>

                                    <li id="number">
                                        <i class="fas fa-credit-card user-profile-icon"></i>
                                    </li>

                                    <li class="m-top-xs" id="maturity">
                                        <i class="fas fa-calendar-alt "></i>
                                        Vencimento da Fatura: Dia
                                    </li>
                                </ul>
                                <br />
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <h3 id="value">Valor da Fatura: </h3>

                                <ul class="list-unstyled">
                                    <li id="limit">
                                        <i class="fas fa-arrow-up user-profile-icon"></i>
                                    </li>

                                    <li id="month">
                                        <i class="fas fa-calendar user-profile-icon"></i>
                                        Mes:
                                    </li>

                                    <li class="m-top-xs" id="year">
                                        <i class="fas fa-calendar-check "></i>
                                        Ano:
                                    </li>
                                </ul>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Lista de Faturas de Cartao e Credito
                                <small>Faturas de cartao de Credito sao todas as compras feitas no cartao e orgnizadas por mes.</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fas fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fas fa-times"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table dataTable">
                                <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Parcelas</th>
                                    <th>Local da Compra</th>
                                    <th>Valor</th>
                                </tr>
                                </thead>
                                <tbody id="tBodyInvoce">
                                </tbody>
                            </table>

                            <a href="/invocecreditcard/create" class="btn btn-primary">Adicionar Compra com cartao de Credito</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset("js/dataTable.min.js") }}"></script>
    <script>
        $(document).ready(function(){
            url = window.location.pathname.split('/');
            $.getJSON("/api/invocecreditcard/invoce/"+url[2]+"/"+url[3]+"/"+url[4], function (data) {
                $("#printed_name").append(data.credit_card.printed_name);
                $("#number").append(data.credit_card.number);
                $("#maturity").append(data.credit_card.maturity);
                $("#value").append(data.value/100);
                $("#limit").append(data.credit_card.limit/100);
                $("#month").append(url[3]);
                $("#year").append(url[4]);

                data.invoce.forEach(function (a) {
                    append = "<tr><td>"+a.date_buy+"</td><td>"+a.plots+"</td><td>"+a.place+"</td><td>"+(a.value/100)+"</td>";
                    $("#tBodyInvoce").append(append);
                });

                $('.dataTable').DataTable();
            });
        });
    </script>

@endpush

@push('stylesheets')
    <!-- Select2 -->
    <link href="{{ asset("css/dataTable.min.css") }}" rel="stylesheet">
@endpush