@include('header')
<div style="min-height: 700px">
  <div class="panel panel-default" style="margin: 0 50px;">
   <div class="panel-body">
     @if(session()->has('message2'))
   <div class="alert alert-danger">
    <h4 align="center"> {{ session()->get('message2') }}</h4>
   </div>
   @endif
    <h3 align="center">Ваши заказы</h3>
    <div style="margin-left:20px;">  
     <table class="table table-bordered"> 
       <thead>
        <tr>
          <th scope="col">Название тура</th>
          <th scope="col">Гости</th>
          <th scope="col">Дата тура</th>
          <th scope="col">Стоимость</th>
          <th scope="col">Билет</th>
          <th scope="col">Отмена</th>
        </tr>
      </thead> 
      @foreach ($orders as $order)
      <tr><td>{{ $order->Trip_Name }}</td><td>{!!$order->Guests!!}</td><td>{{ $order->Start_Date }}</td><td>{{ $order->Cost }}грн.</td>
        <td>

@if($order->State=='0')

Обработка

@else

<a href="{{ url('profile/ticket/' . $order->Order_id) }}">Билет</a>

@endif
         




        </td>
        <td><a href="{{ url('profile/cancel/' . $order->Order_id.'/'.$order->Trips_id.'/'.$order->Numb_of_Pers.'/'.$order->Cab_Type) }}">Отменить</a></td>
      </tr>
      @endforeach 
    </table>
  </div>
</div>
</div>
</div>
<br>
@include('footer')