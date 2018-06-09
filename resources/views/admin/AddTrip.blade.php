@include('admin.admin_menu')
<div class="col-md-10">

  <div class="panel panel-default" style="margin-top: 20px;">
   <div class="panel-body">
    <h3 align="center">Новый круиз</h3>

    <form role="form" class="col-md-12 go-right" action="{{ url('/admin/trip_insert') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group" >
        <input id="trip" name="Trip_Name" type="text" class="form-control"  value="" required>
        <label for="trip">Название</label>
      </div>

      
      <div class="form-group" >
        <input id="Description" name="Description" type="text" class="form-control"  value="" required>
        <label for="Description">Описание</label>
      </div>
      
      <div class="form-group" >
        <input id="Duration" name="Duration" type="text" class="form-control" value="" required>
        <label for="Duration">Продолжительность</label>
      </div>

      <div class="form-group" >
        <input id="Countries" name="Countries" type="text" class="form-control" value="" required>
        <label for="Countries">Страны</label>
      </div>

      <div class="form-group" >
        <input id="Port" name="Port" type="text" class="form-control" value="" required>
        <label for="Port">Порт</label>
      </div>

      <div class="form-group" >
        <input id="Start_Date" name="Start_Date" type="date" class="form-control" value="" required>
        <label for="Start_Date">Дата начала</label>
      </div>

      <div class="form-group" >
        <input id="Price" name="Price" type="text" class="form-control" value="" required>
        <label for="Price">Стоимость тура</label>
      </div>

      <div class="panel panel-default">

        <div class="panel-body">
          <div class="col-md-6">


            <p style="font-size: 20px;">Выберите лайнер.</p>

            <select id="select" name="Ship" class="selectpicker" style="font-size: 20px;" required>
              <option value=""> ---</option>
              @foreach($ships as $ship)
              <option value="{{$ship->id}}">{{$ship->Ship_Name}}</option>
              @endforeach
            </select> 

          </div>
          
        </div>
      </div>


      <div class="form-group" >
        <input id="Schedule" name="Schedule" type="text" class="form-control" value="" required>
        <label for="Schedule">Расписание</label>
      </div>

      <div class="form-group" >
        <input class="btn btn-success center-block btn-lg" type="submit" value="Добавить">
      </div>


    </form>


  </div>
</div>



</div>
</div>
</div>