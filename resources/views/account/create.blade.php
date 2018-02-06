@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Cadastar Conta</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Cadastro de Contas
                                <small>Conta tem a função de dar destino as movimentações.</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fas fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fas fa-times"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {!! BootForm::open(['url' => url("/account"), 'method' => 'post']) !!}
                            <h1>Cadastrar Dados</h1>

                            <label for="bank_id" class="control-label">Banco</label>
                            <select id="bank_id" name="bank_id" class="select2" style="width: 100%" data-placeholder="Selecione seu Banco">
                                @foreach(\App\Models\Bank::get() as $bank)
                                    <option value="{{$bank->id}}">{{$bank->number}} : {{$bank->name}}</option>
                                @endforeach
                            </select>

                            <label for="category_id" class="control-label">Banco</label>
                            <select id="category_id" name="category_id" class="select2" style="width: 100%" data-placeholder="Selecione seu Banco">
                                @foreach(\App\Models\Category::get() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            {!! BootForm::number('operation', 'Operação', old('operation')) !!}
                            {!! BootForm::number('account', 'Conta', old('account')) !!}
                            {!! BootForm::number('agency', 'Agencia', old('agency')) !!}
                            {!! BootForm::submit('Cadastrar Conta', ['class' => 'btn btn-primary']) !!}


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
    <script>
        $(document).ready(function () {
            $(".select2").select2({
                placeholder: 'Selecione seu Banco'
            });
        });
    </script>

@endpush

@push('stylesheets')
    <!-- Select2 -->
    <link href="{{ asset("css/select2.min.css") }}" rel="stylesheet">
@endpush