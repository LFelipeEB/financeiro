@extends('layouts.blank')

@section('main_container')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Editar dados de {{$user->name}}</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Dados dos Usuarios<small>Detalhamento das informaçoes</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-times"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {!! BootForm::open(['url' => url("/user/{$user->id}"), 'method' => 'post']) !!}
                            <h1>Editar Dados</h1>
                            <input name="_method" value="put" type="hidden">
                            {!! BootForm::text('name', 'Nome Completo', $user->name) !!}

                            {!! BootForm::text('cpf', 'CPF', $user->cpf) !!}

                            {!! BootForm::text('email', 'E-mail', $user->email) !!}

                            {!! BootForm::submit('Editar Dados', ['class' => 'btn btn-primary']) !!}

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection