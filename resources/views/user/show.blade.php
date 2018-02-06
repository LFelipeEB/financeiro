@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Dados Pessoais</h3>
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
                            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                <div class="profile_img">
                                    <div id="crop-avatar">
                                        <img class="img-circle avatar-view" src="{{Gravatar::src($user->email) }}" alt="Gavatar" title="Foto do Perfil">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-xs-9">
                                <h3>{{$user->name}}</h3>

                                <ul class="list-unstyled user_data">
                                    <li>
                                        <i class="fas fa-user user-profile-icon"></i> {{$user->cpf}}
                                    </li>

                                    <li>
                                        <i class="fas fa-at user-profile-icon"></i> {{$user->email}}
                                    </li>

                                    <li class="m-top-xs">
                                        <i class="fas fa-calendar-alt user-profile-icon"></i>
                                        Cadastrado em: {{$user->created_at->toFormattedDateString()}}
                                    </li>
                                </ul>
                                <a class="btn btn-success" href="{{$user->id}}/edit"><i class="fa fa-edit m-right-xs"></i>Editar Dados</a>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Contas<small>Detalhamento das contas cadastradas por este usuario.</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-times"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Banco</th>
                                    <th>Agencia</th>
                                    <th>Conta</th>
                                    <th>Tipo</th>
                                    <th>Operaçao</th>
                                    <th>Site</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->accounts as $account)
                                    <tr>
                                        <th>{{$account->bank->name}}</th>
                                        <th>{{$account->agency}}</th>
                                        <th>{{$account->account}}</th>
                                        <th>{{$account->category->name}}</th>
                                        <th>{{$account->operation}}</th>
                                        <th><a href="{{$account->bank->url}}">Link</a> </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Cartoes de Credito<small>Detalhamento dos cartoes de credito cadastrado por este usuario.</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-times"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Apelido</th>
                                    <th>Ultimos Numeros</th>
                                    <th>Valido ate</th>
                                    <th>Nome no cartao</th>
                                    <th>Conta relacionada</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->creditCard as $creditcard)
                                    <tr>
                                        <th>{{$creditcard->nickname}}</th>
                                        <th>{{substr($creditcard->number, -4)}}</th>
                                        <th>{{$creditcard->goo_true}}</th>
                                        <th>{{$creditcard->printed_name}}</th>
                                        <th>
                                            @if($creditcard->account_id)
                                                CC: {{$creditcard->account->account}}
                                                | Ag: {{$creditcard->account->agency}}
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /page content -->

@endsection