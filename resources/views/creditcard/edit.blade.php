@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Editar Cartao de Credito</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Editar de Cartao de Credito
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
                            {!! BootForm::open(['url' => url("/creditcard"), 'method' => 'post']) !!}
                            <h1>Cadastrar Dados</h1>

                            <label for="account_id" class="control-label">Conta</label>
                            <select id="account_id" name="account_id" class="select2" style="width: 100%" data-placeholder="Selecione sua Agencia">
                                @foreach(Auth::user()->accounts as $account)
                                    <option value="{{$account->id}}"
                                            @if ($account->id == $creditCard->account_id)
                                                selected
                                            @endif
                                    >Ag: {{$account->agency}} | CC: {{$account->account}}</option>
                                @endforeach
                            </select>
                            {!! BootForm::text('nickname', 'Apelido do Cartao', $creditCard->nickname) !!}
                            {!! BootForm::text('good_true', 'Valido ate', $creditCard->good_true) !!}
                            {!! BootForm::text('printed_name', 'Nome no cartao', $creditCard->printed_name) !!}
                            {!! BootForm::number('number', 'Numero do Cartao', $creditCard->number) !!}
                            {!! BootForm::text('brand', 'Bandeira', $creditCard->brand) !!}
                            {!! BootForm::number('limit', 'Limite disponivel no cartao', $creditCard->limit) !!}
                            {!! BootForm::number('maturity', 'Data de Vencimento da Fatura', $creditCardmaturity) !!}
                            {!! BootForm::number('closure', 'Data de Fechamento da Fatura', $creditCard->closure) !!}
                            {!! BootForm::submit('Cadastrar Cartao de Credito', ['class' => 'btn btn-primary']) !!}
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

    <script>
        $(document).ready(function () {
            $(".select2").select2({
                placeholder: 'Selecione seu Banco'
            });

            $("#good_true").inputmask({"mask": "99-9999"});
        });
    </script>

@endpush

@push('stylesheets')
    <!-- Select2 -->
    <link href="{{ asset("css/select2.min.css") }}" rel="stylesheet">
@endpush