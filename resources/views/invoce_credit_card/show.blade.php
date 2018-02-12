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
                                    <li>
                                        <i class="fas fa-user user-profile-icon"></i>
                                        {{$expenses[0]->creditCard->printed_name}}
                                    </li>

                                    <li>
                                        <i class="fas fa-credit-card user-profile-icon"></i>{{$expenses[0]->creditCard->number}}
                                    </li>

                                    <li class="m-top-xs">
                                        <i class="fas fa-calendar-alt "></i>
                                        Vencimento da Fatura: Dia {{$expenses[0]->creditCard->maturity}}
                                    </li>
                                </ul>
                                <br />
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <h3>Valor da Fatura: {{$expenses->sum('value')/100}}</h3>

                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fas fa-arrow-up user-profile-icon"></i>
                                        {{$expenses[0]->creditCard->limit/100}}
                                    </li>

                                    <li>
                                        <i class="fas fa-calendar user-profile-icon"></i>
                                        Mes: {{$month}}
                                    </li>

                                    <li class="m-top-xs">
                                        <i class="fas fa-calendar-check "></i>
                                        Ano: {{$year}}
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
                                    <th>Categoria</th>
                                    <th>Data</th>
                                    <th>Parcelas</th>
                                    <th>Local da Compra</th>
                                    <th>Valor</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($expenses as $invoce)
                                    <tr>
                                        <td>{{$invoce->category->name}}</td>
                                        <td>{{$invoce->date_buy}}</td>
                                        <td>{{$invoce->plots}}</td>
                                        <td>{{$invoce->place}}</td>
                                        <td>{{$invoce->value/100}}</td>
                                    </tr>
                                @endforeach
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
            $('.dataTable').DataTable();
        });
    </script>

@endpush

@push('stylesheets')
    <!-- Select2 -->
    <link href="{{ asset("css/dataTable.min.css") }}" rel="stylesheet">
@endpush