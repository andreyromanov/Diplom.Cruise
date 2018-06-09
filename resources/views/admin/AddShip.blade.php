@include('admin.admin_menu')
<div class="col-md-10">

	<div class="panel panel-default" style="margin-top: 20px;">
		<div class="panel-body">
			<h3 align="center">Новый лайнер</h3>

			<form role="form" class="col-md-12 go-right" action="{{ url('/admin/ship_insert') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="form-group" >
					<input name="Ship_Name" type="text" class="form-control" value="" required>
					<label for="Ship_Name">Название</label>
				</div>


				<div class="form-group" >
					<input name="Description" type="text" class="form-control" value="" required>
					<label for="Description">Описание</label>
				</div>


				<div class="form-group" >
					<input name="Year_of_production" type="date" class="form-control" value="" required>
					<label for="Year_of_production">Дата производства</label>
				</div>
				<div class="form-group" >
					<input name="Lenght" type="text" class="form-control" value="" required>
					<label for="Lenght">Длина</label>
				</div>

				<div class="form-group" >
					<input name="Speed" type="text" class="form-control" value="" required>
					<label for="Speed">Максимальная скорость</label>
				</div>

				<div class="form-group" >
					<input name="Capacity" type="text" class="form-control" value="" required>
					<label for="Capacity">Вместительность</label>
				</div>

				<div class="form-group" >
					<input name="Href" type="text" class="form-control" value="" required>
					<label for="Href">Местоположение</label>
				</div>

				<div class="form-group"><input type="file" class="form-control-file" name="Image"><br><label for="exampleFormControlFile1">Прикрепите фото лайнера.</label>
				</div>

				<div class="form-group" >
					<input name="Cab_Def_All" type="text"  class="form-control" value="" required>
					<label for="Cab_Def_All">Всего кают</label> 
				</div>
				<br><br>
				<label>Каюты по типам</label> <br>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="text-align: center;">#</th>
							<th style="text-align: center;">A</th>
							<th style="text-align: center;">B</th>
							<th style="text-align: center;">C</th>
							<th style="text-align: center;">D</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th style="text-align: center;">1</th>
							<td align="center"><input name="Cab_Def_A1" type="text" size="10" value="" required></td>
							<td align="center"><input name="Cab_Def_A2" type="text" size="10" value="" required></td>
							<td align="center"><input name="Cab_Def_A3" type="text" size="10" value="" required></td>
							<td align="center"><input name="Cab_Def_A4" type="text" size="10" value="" required></td>
						</tr>
						<tr>
							<th style="text-align: center;">2</th>
							<td align="center"><input name="Cab_Def_B1" type="text" size="10" value="" required></td>
							<td align="center"><input name="Cab_Def_B2" type="text" size="10" value="" required></td>
							<td align="center"><input name="Cab_Def_B3" type="text" size="10" value="" required></td>
							<td align="center"><input name="Cab_Def_B4" type="text" size="10" value="" required></td>
						</tr>
						<tr>
							<th style="text-align: center;">3</th>
							<td align="center"><input name="Cab_Def_C1" type="text" size="10" value="" required></td>
							<td align="center"><input name="Cab_Def_C2" type="text" size="10" value="" required></td>
							<td align="center"><input name="Cab_Def_C3" type="text" size="10" value="" required></td>
							<td align="center"><input name="Cab_Def_C4" type="text" size="10" value="" required></td>
						</tr>
						<tr>
							<th style="text-align: center;">4</th>
							<td align="center"><input name="Cab_Def_D1" type="text" size="10" value="" required></td>
							<td align="center"><input name="Cab_Def_D2" type="text" size="10" value="" required></td>
							<td align="center"><input name="Cab_Def_D3" type="text" size="10" value="" required></td>
							<td align="center"><input name="Cab_Def_D4" type="text" size="10" value="" required></td>
						</tr>
					</tbody>
				</table>

				<div class="form-group" >
					<input class="btn btn-success center-block btn-lg" type="submit" value="Добавить">
				</div>


			</form>


		</div>
	</div>



</div>
</div>
</div>