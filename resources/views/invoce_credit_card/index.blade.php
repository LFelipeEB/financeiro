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
                                    <th>Apelido do Cartao</th>
                                    <th>Mes</th>
                                    <th>Ano</th>
                                    <th>Valor</th>
                                    <th>Açoes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(DB::table('invoce')->where('user_id', \Auth::id())->get() as $invoce)
                                    <tr>
                                        <td>{{$invoce->nickname}}</td>
                                        <td>{{$invoce->month}}</td>
                                        <td>{{$invoce->year}}</td>
                                        <td>{{$invoce->value/100}}</td>
                                        <td>
                                            <div class="row">
                                                <a href="/invocecreditcard/{{$invoce->id}}/{{$invoce->month}}/{{$invoce->year}}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <a href="/invocecreditcard/create" class="btn btn-primary">Adicionar Compra com Cartao de Credito</a>
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