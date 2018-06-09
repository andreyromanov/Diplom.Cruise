@include('admin.admin_menu')

<div class="col-md-10 col-sm-10">
  <div class="panel panel-default" style="margin: 50px 0px; ">
   <div class="panel-body">





    @if(session()->has('message'))
    <div class="alert alert-success">
     <h4 align="center"> {{ session()->get('message') }}</h4>
   </div>
   @endif
   @if(session()->has('message2'))
   <div class="alert alert-danger">
    <h4 align="center"> {{ session()->get('message2') }}</h4>
   </div>
   @endif
   @if($count==0)
   <h3 align="center">Заказов нет</h3>
   <div style="margin-left:20px;">  


    @else
    <h3 align="center">Заказы тура</h3>
    <div style="margin-left:20px;">  
     <table class="table table-bordered"> 
       <thead>
        <tr>
          <th scope="col">Клиент</th>
          <th scope="col">Гости</th>
          <th scope="col">Каюта</th>

          <th scope="col">Почта</th>
          <th scope="col">Документы</th>
          <th scope="col">Сумма</th>
          <th scope="col">Состояние</th>
          <th scope="col">Действие</th>
        </tr>
      </thead> 
      @foreach ($orders as $order) 

      <tr><td>{{$order->First_name}} {{$order->Last_name}}</td> <td>{!!$order->Guests!!}</td> <td>{{$order->Numb_of_Pers}} {{$order->Cab_Type}}, {{$order->Cab_Number}}</td>          <td>{{$order->email}}</td> <td>{!!$order->image!!}</td><td>{{$order->Cost}} грн</td><td>{{$order->State}}</td><td valign="center"><a href="{{ url('admin/order_info/confirm/' . $order->Order_id.'/1') }}">Да</a>&nbsp;&nbsp;&nbsp;|||&nbsp;&nbsp;&nbsp;<a href="{{ url('admin/order_info/delete/' . $order->Order_id.'/'.$order->Trips_id.'/'.$order->Numb_of_Pers.'/'.$order->Cab_Type) }}">Нет</a></td></tr>
      @endforeach
      @endif
    </table>
  </div>      
  <br>
</div>
</div>


</div>
</div>
</div>