@php
    $expense30days = DB::table('expense30days')->where('user_id', Auth::id())->orderByDesc('day')->get();
@endphp
<input id="values_expense" value="{{$expense30days}}" type="hidden">

@php
    $profit30days = DB::table('profit30days')->where('user_id', Auth::id())->get();
@endphp
<input id="values_profit" value="{{$profit30days}}" type="hidden">

@php
    $balance_account = DB::table('balance_account')->where('user_id', Auth::id())->get();
@endphp
<input id="values_balance_account" value="{{$balance_account}}" type="hidden">


@push('scripts')
    <script src="{{ asset("js/chart.bundle.min.js") }}"></script>
    <script src="{{ asset("js/chart.min.js") }}"></script>
    <script>
        var expense = document.getElementById("chart_expense").getContext('2d');

        var valuesExpenses = JSON.parse($('#values_expense').val());
        var dataExpense=[], labelExpense=[];
        valuesExpenses.forEach(function (v) {
            dataExpense.push(v.day);
            labelExpense.push(v.value);
        });
        var valuesProfit = JSON.parse($('#values_profit').val());
        var dataProfit=[], labelProfit=[];
        valuesProfit.forEach(function (v) {
            dataProfit.push(v.day);
            labelProfit.push(v.value);
        });

        var chartExpense = new Chart(expense, {
            type: 'line',
            data: {
                labels: dataExpense,
                datasets: [{
                    label: 'Gastos em Reais',
                    data: labelExpense,
                    backgroundColor: 'rgba(255, 0, 0, 0.4)',
                },
                    {
                        label: 'Receitas em Reais',
                        data: labelProfit,
                        backgroundColor: 'rgba(0, 0, 255, 0.4)',
                    }
               ]
            },
            options: {
                responsive: true,
                animation: {
                    easing: 'linear',
                    durantion: 10000
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
            }
        });

        var randomColorGenerator = function () {
            return '#' + (Math.random().toString(16) + '0000000').slice(2, 8);
        };

        var balance_account = JSON.parse($('#values_balance_account').val());
        var dataBalance=[], labelBalance=[], colorBalance=[];
        balance_account.forEach(function (v) {
            labelBalance.push(v.name);
            dataBalance.push(v.value);
            colorBalance.push(randomColorGenerator())
        });

        var balance = document.getElementById("chart_balance_account").getContext('2d');
        var chartBalance = new Chart(balance, {
            type: 'pie',
            data: {
                datasets:[{
                    data: dataBalance,
                    backgroundColor: colorBalance
                }],
                labels: labelBalance,
            },
            options:{
                responsive: true,
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
            }
        });

    </script>

@endpush