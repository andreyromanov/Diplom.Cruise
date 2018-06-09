@include('admin.admin_menu')
<div class="col-md-10">
  <div class="panel panel-default" style="margin: 50px 50px;">
   <div class="panel-body">
    <h3 align="center">Список круизов</h3>
    <div style="margin-left:20px;">  
     <table class="table table-bordered"> 
       <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Название</th>
          <th scope="col">Информация</th>
        </tr>
      </thead>  

      @foreach ($cruises as $cruise)
      <tr><td>{{ $cruise->id }}</td><td>{{$cruise->Trip_Name}}</td><td><a href="{{ url('admin/cruise_set/' . $cruise->id) }}">Смотреть</a></td></tr>
      @endforeach 
    </table>
  </div>      
  <br>
</div>
</div>

</div>
</div>
</div>