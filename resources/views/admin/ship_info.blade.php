@include('admin.admin_menu')

@foreach ($ships as $ship) 
<div class="col-md-10">
  <div class="panel panel-default" style="margin: 50px 50px;">
   <div class="panel-body">
    <div class="panel-heading"><h2 align="center">{{$ship->Ship_Name}}</h2></div>
    <div class="panel-body">
      <div class="col-md-4">
        <img src="{{asset ($ship->Image)}}" style="width: 300px; height: 300px;" alt="1" class="img-rounded">
      </div>
      <div class=" col-md-offset-1 col-md-7">
        <p> 
          {{$ship->Description}}<hr>
        </p>
        <ul>
          <li>Дата производства: {{$ship->Year_of_production}}</li>
          <li>Количество кают:  {{$ship->Cab_Def_All}}</li>
          <li>Длина: {{$ship->Lenght}} м.</li>
          <li>Максимальная скорость: {{$ship->Speed}} уз.</li>
        </ul>
      </div>
    </div>
@endforeach
    <div style="margin:50px 50px 0px 50px;">  
     <table class="table table-bordered"> 
       <thead>
       
        <tr>
          <th scope="col">Тур</th>
          <th scope="col">Дата</th>
        </tr>
        
      </thead> 
 @foreach ($trips as $trip) 
      <tr>
        <td>{{$trip->Trip_Name}}</td>
        <td>{{$trip->Start_Date}}</td>
      </tr>
@endforeach

    </table>
  </div>      
  <br>
</div>
</div>


</div>
</div>
</div>
