@include('admin.admin_menu')
<div class="col-md-10">
  <div class="panel panel-default" style="margin: 50px 50px;">
   <div class="panel-body">
    @if(session()->has('message'))
   <div class="alert alert-danger">
    <h4 align="center"> {{ session()->get('message') }}</h4>
   </div>
   @endif
    <h3 align="center">Зарегестрированные пользователи</h3>
    <div style="margin-left:20px;">  
     <table class="table table-bordered"> 
       <thead>
        <tr>
          <th scope="col">Имя</th>
          <th scope="col">Фамилия</th>
          <th scope="col">Телефон</th>
          <th scope="col">Email</th>
          <th scope="col">Действие</th>
        </tr>
      </thead>  

      @foreach ($users as $user)
      <tr><td>{{ $user->First_name }}</td><td>{{$user->Last_name}}</td><td>{{$user->Phone}}</td><td>{{$user->email}}</td><td><a href="{{ url('admin/users/' . $user->id) }}">Удалить</a></td></tr>
      @endforeach 
    </table>
  </div>      
  <br>
</div>
</div>

</div>
</div>
</div>