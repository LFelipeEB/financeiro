@extends('layouts.blank')

@section('main_container')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Listar Gastos</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Lista de Gastos
                                <small>Gastos sao todas as saidas que acontecem em nossas contas.</small></h2>
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
                                    <th>Conta</th>
                                    <th>Valor</th>
                                    <th>Recibo</th>
                                    <th>Local</th>
                                    <th>Descriçao</th>
                                    <th>Data</th>
                                    <th>Açoes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Auth::user()->expenses->sortByDesc('date_operation') as $expense)
                                    <tr>
                                        <td>{{$expense->category->name}}</td>
                                        <td>AG: {{$expense->account->agency}} | CC: {{$expense->account->account}}</td>
                                        <td>{{$expense->value}}</td>
                                        <td>{{$expense->receipt}}</td>
                                        <td>{{$expense->source}}</td>
                                        <td>{{$expense->description}}</td>
                                        <td>{{$expense->date_operation->toFormattedDateString()}}</td>
                                        <td>
                                            <div class="row">
                                                <a href="/expense/{{$expense->id}}/edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="post" action="/expense/{{$expense->id}}" style='display:inline;'>
                                                    {{csrf_field()}}
                                                    <input name="_method" value="delete" type="hidden">
                                                    <button><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <a href="/expense/create" class="btn btn-primary">Adicionar Despesa</a>
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
            $('.dataTable').DataTable({
                "bSort": false
            });
        });
    </script>

@endpush

@push('stylesheets')
    <!-- Select2 -->
    <link href="{{ asset("css/dataTable.min.css") }}" rel="stylesheet">
@endpush