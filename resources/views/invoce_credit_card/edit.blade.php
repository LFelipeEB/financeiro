@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Editar Compra com Cartao de Credito</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Editar Compra/Parcela com Cartao de Credito
                                <small>Editar compra/parcela com Cartao de Credito e uma forma de comprar com prazo.</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fas fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fas fa-times"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {!! BootForm::open(['url' => url("/invocecreditcard/{$invoceCreditCard->id}"), 'method' => 'post']) !!}
                            <h1>Cadastrar Dados</h1>
                            <input type="hidden" name="_method" value="put">

                            <label for="credit_card_id" class="control-label">Cartao de Credito</label>
                            <select id="credit_card_id" name="credit_card_id" class="select2" style="width: 100%" data-placeholder="Selecione o Cartao de Credito">
                                @foreach(Auth::user()->creditCard as $creditCard)
                                    <option value="{{$creditCard->id}}"
                                            @if($invoceCreditCard->credit_card_id == $creditCard->id)
                                            selected
                                            @endif
                                    >{{$creditCard->nickname}} | **** **** **** {{substr($creditCard->number, -4)}}</option>
                                @endforeach
                            </select>

                            <label for="category_id" class="control-label">Categoria da Compra</label>
                            <select id="category_id" name="category_id" class="select2" style="width: 100%" data-placeholder="Selecione a Categoria da Compra">
                                @foreach(\App\Models\Category::get() as $category)
                                    <option value="{{$category->id}}"
                                            @if($invoceCreditCard->category_id == $category->id)
                                            selected
                                            @endif
                                    >{{$category->name}}</option>
                                @endforeach
                            </select>
                            {!! BootForm::text('date_buy', 'Data da compra', $invoceCreditCard->date_buy) !!}
                            {!! BootForm::text('plots', 'Parcelas', $invoceCreditCard->plots) !!}
                            {!! BootForm::text('place', 'Local da Comrpa', $invoceCreditCard->place) !!}
                            {!! BootForm::number('value', 'Valor da Compra', $invoceCreditCard->value) !!}
                            {!! BootForm::submit('Editar Compra/Parcela Cartao de Credito', ['class' => 'btn btn-primary']) !!}
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
    <!-- DateRanger -->
    <script src="{{ asset("js/moment.js") }}"></script>
    <script src="{{ asset("js/daterange.js") }}"></script>

    <script>
        $(document).ready(function () {
            $(".select2").select2({
                placeholder: 'Selecione seu Banco'
            });

            $('input[name="date_buy"]').daterangepicker({
                singleDatePicker: true,
                startDate:
                    Date.parse($('input[name="date_buy"]').val()),
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