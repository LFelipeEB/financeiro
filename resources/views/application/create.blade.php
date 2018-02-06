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
                            {!! BootForm::submit('Cadastrar Aplicaçao', ['class' => 'btn btn-primary']) !!}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection