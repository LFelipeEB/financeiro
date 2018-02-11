@extends('layouts.blank')

@section('main_container')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Listar Categorias</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Lista de Categorias
                                <small>Categorias sao o modo de classificar qualquer coisa dentro do sistema.</small></h2>
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
                                    <th class="text-center">Nome da Categoria</th>
                                    <th>Açoes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Models\Category::orderBy('name')->get() as $category)
                                    <tr>
                                        <td class="text-center"><strong>{{$category->name}}</strong></td>
                                        <td>
                                            <div class="row">
                                                <a href="/category/{{$category->id}}/edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="post" action="/category/{{$category->id}}" style='display:inline;'>
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

                            <a href="/category/create" class="btn btn-primary">Adicionar Categoria</a>
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