@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Listar Aplicaçoes</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Lista de Aplicaçoes
                                <small>Aplicaçoes sao investimentos financeiros, que esperam um retorno.</small></h2>
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
                                    <th>Tipo</th>
                                    <th>Valor</th>
                                    <th>Rendimento Esperado</th>
                                    <th>Descriçao</th>
                                    <th>Criação</th>
                                    <th>Açoes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Auth::user()->applications as $aplication)
                                    <tr>
                                        <td>{{$aplication->type}}</td>
                                        <td>{{($aplication->value/100)}}</td>
                                        <td>{{($aplication->expected/100)}}</td>
                                        <td>{{$aplication->description}}</td>
                                        <td>{{$aplication->created_at->toFormattedDateString()}}</td>
                                        <td>
                                            <div class="row">
                                                <a href="/application/{{$aplication->id}}/edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="post" action="/application/{{$aplication->id}}" style='display:inline;'>
                                                    {{csrf_field()}}
                                                    <input name="_method" value="delete" type="hidden">
                                                    <button>
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <a href="/application/create" class="btn btn-primary">Adicionar Aplicaçao de Investimento</a>
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