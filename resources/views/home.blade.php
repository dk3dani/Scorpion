@extends('layouts.master')

@section('content')

<div><h1 class="text-center">Resumo do mês</h1></div>
  <div class="container-fluid mb-4">
    <div class="row justify-content-md-center">
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fas fa-tshirt"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Quantidade de Pedidos</span>
            <span class="info-box-number">{{ $data['total'] }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-secondary"><i class="fas fa-clipboard-check"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Quantidade de pedidos pagos</span>
            <span class="info-box-number">{{ $data['total_paid'] }}</span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="fas fa-money-check-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Valor total de pedidos pagos</span>
            <span class="info-box-number"> R${{ sprintf(number_format($data['value_paid'], 2, ',','.')) }}</span>
          </div>
        </div>
      </div>

    </div>
    <div class="row justify-content-md-center">

        <div class="col-md-3  col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-dark"><i class="far fa-clipboard"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Quantidade de pedidos a receber</span>
                <span class="info-box-number"> {{ $data['total_no_paid'] }}</span>
              </div>
            </div>
          </div>
          <div class="col-md-3  col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fas fa-hand-holding-usd"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> Valor total de pedidos a receber</span>
                <span class="info-box-number">R${{ sprintf(number_format($data['value_no_paid'], 2, ',','.')) }}</span>
              </div>
            </div>
          </div>

    </div>
</div>






    <div class="row mb-3">
        <div class="col-6" style="height: 400px"  >
            <canvas id="myChart" ></canvas>
      </div>
      <div class="col-6" style="height: 400px">
        <canvas id="ChartValues"></canvas>
      </div>
    </div>



    <hr>

{{--
<table class="table table-dark table-striped table-hover">
          <thead class="thead-dark ">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Cliente</th>
              <th scope="col">Produto</th>
              <th scope="col">Preço</th>
              <th scope="col">Status</th>
              <th scope="col">Ação</th>


            </tr>
          </thead>
          <tbody>

            <tr>

              <th scope="row"></th>
              <td> </td>
              <td> </td>
              <td></td>
              <td>  </td>



            </tr>


          </tbody>
        </table>



    --}}
    <div><h1 class="text-center">Entregas do dia</h1></div>

    @if($deliveries->count())
    <table class="table table-dark table-striped table-hover">
        <thead class="thead-dark ">
          <tr>
            <th scope="col">Produto</th>
            <th scope="col">Descrição</th>
            <th scope="col">Preço</th>

          </tr>
        </thead>
        <tbody>
            @foreach($deliveries as $delivery)
          <tr>
            <td> {{ $delivery->product }} </td>
            <td>{{ $delivery->description ?: 'Sem descrição' }} </td>
            <td> R${{ $delivery->price }}</td>
          </tr>
           @endforeach
        </tbody>
      </table>
      <div><h1 class="text-right mr-5"><span class="badge badge-dark">Total: R$ {{ sprintf(number_format($data['value_day'], 2, ',','.')) }}</span> </h1></div>

      @else
          <div class="alert alert-primary">
              Não há nenhuma entrega para hoje!
          </div>
      @endif

    {{-- <h4>Entregas do dia</h4>
    @if($deliveries->count())
        <ul>
            @foreach($deliveries as $delivery)
                <li>
                    {{ $delivery->product }} - {{ $delivery->description ?: 'Sem descrição' }} - R${{ $delivery->price }}
                </li>
            @endforeach
        </ul>

        <br>
        Total: {{ $data['value_day'] }}
    @else
        <div class="alert alert-primary">
            Não há nenhuma entrega para hoje!
        </div>
    @endif --}}

@endsection

@section('scripts')

 <script type="text/javascript">


var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Pagas', ' A Receber'],
        datasets: [{
            label: '# of Votes',
            data: [ "{{ $data['total_paid'] }}", "{{ $data['total_no_paid'] }}"],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',

            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
    maintainAspectRatio: true,
        title:{
            display:true,
            text:'Quantidade de Costuras ',
            fontSize:25
        },


    }
});

var paid = "{{ $data['value_paid'] + $data['value_no_paid'] }}"



var ctx = document.getElementById('ChartValues').getContext('2d');
Chart.defaults.global.defaultColor='rgba(166, 138, 255, 0.1)';
var ChartValues = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Pagas', ' A Receber', 'Total'],
        datasets: [{
            label: 'Valor das costuras R$',
            data: [ "{{ $data['value_paid'] }}", "{{ $data['value_no_paid']}}", paid ],
            backgroundColor: [

                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(154, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(154, 162, 235, 1)',

            ],
            borderWidth: 1
        }]
    },
    options: {
        legend: false,
        responsive: true,
    maintainAspectRatio: true,
        title:{
            display:true,
            text:'Faturamento do Mês ',
            fontSize:25
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }


    }
});
</script>
@endsection
