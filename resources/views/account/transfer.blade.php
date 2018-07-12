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
                            <h2>Transferencia de Valores entre Contas
                                <small>Transferencia de valores e para informar ao sistema que houve uma transferencia de valores entre as Contas.</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fas fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fas fa-times"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {!! BootForm::open(['url' => url("/account/transfer"), 'method' => 'post']) !!}
                            <h1>Transferir Valores</h1>

                            <label for="orig_account" class="control-label">Conta de Origem</label>
                            <select id="orig_account" name="orig_account" class="select2" style="width: 100%" data-placeholder="Selecione a Conta de Origem">
                                @foreach(\App\Models\Account::where('user_id', Auth::id())->get() as $account)
                                    <option value="{{$account->id}}">Ag: {{$account->agency}} | CC: {{ $account->account }}</option>
                                @endforeach
                            </select>

                            <label for="dest_account" class="control-label">Conta Destino</label>
                            <select id="dest_account" name="dest_account" class="select2" style="width: 100%" data-placeholder="Selecione a Conta de Destino">
                                @foreach(\App\Models\Account::where('user_id', Auth::id())->get() as $account)
                                    <option value="{{$account->id}}">Ag: {{$account->agency}} | CC: {{ $account->account }}</option>
                                @endforeach
                            </select>

                            {!! BootForm::number('value', 'Valor de Transferencia', old('value')) !!}
                            {!! BootForm::text('date', 'Data da Transferencia', old('date')) !!}
                            {!! BootForm::submit('Cadastrar Transferencia', ['class' => 'btn btn-primary']) !!}


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