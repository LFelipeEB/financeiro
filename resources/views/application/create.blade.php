@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Cadastar Aplicaçao</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Cadastro de Aplicaçoes
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
                            {!! BootForm::open(['url' => url("/application"), 'method' => 'post']) !!}
                            <h1>Cadastrar Aplicaçao</h1>
                            {!! BootForm::number('value', 'Valor', old('value')) !!}
                            {!! BootForm::number('expected', 'Rendimento Esperado', old('expected')) !!}
                            {!! BootForm::text('type', 'Tipo de Aplicaçao', old('type')) !!}
                            {!! BootForm::text('description', 'Descriçao', old('description')) !!}
                            <label for="account_id" class="control-label">Conta</label>
                            <select id="account_id" name="account_id" class="select2" style="width: 100%" data-placeholder="Selecione a conta para debito do Investimento">
                                <option value="0">Sem Conta para debito.</option>
                            @foreach(Auth::user()->accounts as $account)
                                    <option value="{{$account->id}}">Ag: {{$account->agency}} | CC: {{$account->account}}</option>
                                @endforeach
                            </select>
                            {!! BootForm::submit('Cadastrar Aplicaçao', ['class' => 'btn btn-primary']) !!}


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
            $(".select2").select2();
        });
    </script>

@endpush

@push('stylesheets')
    <!-- Select2 -->
    <link href="{{ asset("css/select2.min.css") }}" rel="stylesheet">
@endpush