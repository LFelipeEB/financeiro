@php
    $expense30days = DB::table('expense30days')->where('user_id', Auth::id())->get();
@endphp
<input id="values_expense" value="{{$expense30days}}" type="hidden">
@php
    $profit30days = DB::table('profit30days')->where('user_id', Auth::id())->get();
@endphp
<input id="values_profit" value="{{$profit30days}}" type="hidden">

@push('scripts')
    <script src="{{ asset("js/chart.bundle.min.js") }}"></script>
    <script src="{{ asset("js/chart.min.js") }}"></script>
    <script>
        var expense = document.getElementById("chart_expense").getContext('2d');

        var valuesExpenses = JSON.parse($('#values_expense').val());
        var dataExpense=[], labelExpense=[];
        valuesExpenses.forEach(function (v) {
            dataExpense.push(v.value);
            labelExpense.push(v.day);
        });
        var chartExpense = new Chart(expense, {
            type: 'line',
            data: {
                labels: dataExpense,
                datasets: [{
                    label: 'Gastos em Reais',
                    data: dataExpense,
                    backgroundColor: 'rgba(255, 0, 0, 0.4)',
                }]
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


        var valuesProfit = JSON.parse($('#values_profit').val());
        var dataProfit=[], labelProfit=[];
        valuesProfit.forEach(function (v) {
            dataProfit.push(v.value);
            labelProfit.push(v.day);
        });
        var profit = document.getElementById("chart_profits").getContext('2d');
        var chartProfit = new Chart(profit, {
            type: 'bar',
            data: {
                labels: labelProfit,
                datasets: [{
                    label: 'Receitas em Reais',
                    data: dataProfit,
                    backgroundColor: 'rgba(0, 0, 255, 0.4)',
                }]
            }
        });
    </script>

@endpush