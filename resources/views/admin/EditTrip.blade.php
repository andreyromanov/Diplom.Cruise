@include('admin.admin_menu')

@foreach($cruises as $cruise)
<div class="col-md-10">

  <div class="panel panel-default" style="margin-top: 20px;">
   <div class="panel-body">
    <h3 align="center">Редактировать круиз - {{$cruise->Trip_Name}}</h3>

    <form role="form" class="col-md-12 go-right" action="{{ url('/admin/trip_update') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group" >
        <input id="trip" name="Trip_Name" type="text" class="form-control"  value="{{$cruise->Trip_Name}}" required>
        <label for="trip">Название</label>
      </div>

      
      <div class="form-group" >
        <input id="Description" name="Description" type="text" class="form-control"  value="{{$cruise->Description}}" required>
        <label for="Description">Описание</label>
      </div>
      
      <div class="form-group" >
        <input id="Duration" name="Duration" type="text" class="form-control" value="{{$cruise->Duration}}" required>
        <label for="Duration">Продолжительность</label>
      </div>

      <div class="form-group" >
        <input id="Countries" name="Countries" type="text" class="form-control" value="{{$cruise->Countries}}" required>
        <label for="Countries">Страны</label>
      </div>

      <div class="form-group" >
        <input id="Port" name="Port" type="text" class="form-control" value="{{$cruise->Port}}" required>
        <label for="Port">Порт</label>
      </div>

      <div class="form-group" >
        <input id="Start_Date" name="Start_Date" type="date" class="form-control" value="{!!$cruise->Start_Date!!}" required>
        <label for="Start_Date">Дата начала</label>
      </div>

      <div class="form-group" >
        <input id="Price" name="Price" type="text" class="form-control" value="{{$cruise->Price}}" required>
        <label for="Price">Стоимость тура</label>
      </div>
       @endforeach

      <div class="panel panel-default">

        <div class="panel-body">
          <div class="col-md-6">


            <p style="font-size: 20px;">Выберите лайнер.</p>

            <select id="select" name="Ship" class="selectpicker" style="font-size: 20px;" required>
              @foreach($cruises as $cruise)
              <option value="{{$cruise->id}}">{{$cruise->Ship_Name}}</option>
               @endforeach
              @foreach($ships as $ship)
              <option value="{{$ship->id}}">{{$ship->Ship_Name}}</option>
              @endforeach
            </select> 

          </div>
          
        </div>
      </div>

@foreach($cruises as $cruise)
      <div class="form-group" >
        <textarea id="Schedule" name="Schedule" type="textfield" class="form-control" rows="10" required>{{$cruise->Schedule}}</textarea>
        <label for="Schedule">Расписание</label>
      </div>
 @endforeach
      <div class="form-group" >
        <input class="btn btn-success center-block btn-lg" type="submit" value="Изменить">
      </div>


    </form>


  </div>
</div>



</div>
</div>
</div>