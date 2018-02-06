@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Listar Cartao de Credito</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Lista de Cartoes de Credito
                                <small>Cartoes de Credito sao uma forma de efetuar pagamento a prazo.</small></h2>
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
                                    <th>Apelido</th>
                                    <th>Ultimos Numeros</th>
                                    <th>Bandeira</th>
                                    <th>Nome no Cartao</th>
                                    <th>Validade</th>
                                    <th>Criação</th>
                                    <th>Açoes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Auth::user()->creditCard as $cc)
                                 <tr>
                                        <td>{{$cc->nickname}}</td>
                                        <td>**** **** **** {{substr($cc->number, -4)}}</td>
                                        <td>{{$cc->brand}}</td>
                                        <td>{{$cc->printed_name}}</td>
                                        <td>{{$cc->good_true}}</td>
                                        <td>{{$cc->created_at->toFormattedDateString()}}</td>
                                        <td>
                                            <div class="row">
                                                <a href="/creditcard/{{$cc->id}}/edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="post" action="/creditcard/{{$cc->id}}" style='display:inline;'>
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

                            <a href="/creditcard/create" class="btn btn-primary">Adicionar Cartao de Credito</a>
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