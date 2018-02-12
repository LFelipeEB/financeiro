@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Cadastar Despesa</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Cadastro Despesa
                                <small>Desepesas sao todas as saidas que acontecem em nossas contas.</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fas fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fas fa-times"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {!! BootForm::open(['url' => url("/expense"), 'method' => 'post']) !!}
                            <h1>Cadastrar Dados</h1>

                            <label for="category_id" class="control-label">Categoria</label>
                            <select id="category_id" name="category_id" class="select2" style="width: 100%" data-placeholder="Selecione a Categoria">
                                @foreach(\App\Models\Category::get() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                            <label for="account_id" class="control-label">Conta</label>
                            <select id="account_id" name="account_id" class="select2" style="width: 100%" data-placeholder="Selecione a Categoria">
                                @foreach(Auth::user()->accounts as $account)
                                    <option value="{{$account->id}}">Ag: {{$account->agency}} | CC: {{$account->account}}</option>
                                @endforeach
                            </select>
                            {!! BootForm::number('value', 'Valor', old('value')) !!}
                            {!! BootForm::text('receipt', 'Comprovante', old('receipt')) !!}
                            {!! BootForm::text('place', 'Local do Gasto', old('place')) !!}
                            {!! BootForm::text('description', 'Descriçao da Despesa', old('description')) !!}
                            {!! BootForm::text('date', 'Data da Despesa', old('date')) !!}
                            {!! BootForm::submit('Cadastrar Despesa', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset("js/select2.min.js") }}"></script>
    <script src="{{ asset("js/jquery.mask.min.js") }}"></script>
    <script src="{{ asset("js/moment.js") }}"></script>
    <script src="{{ asset("js/daterange.js") }}"></script>

    <script>
        $(document).ready(function () {
            $(".select2").select2();

            $('input[name="date"]').daterangepicker({
                singleDatePicker: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });
    </script>

@endpush

@push('stylesheets')
    <!-- Select2 -->
    <link href="{{ asset("css/select2.min.css") }}" rel="stylesheet">
    <!-- DateRange -->
    <link href="{{ asset("css/daterange.css") }}" rel="stylesheet">
@endpush