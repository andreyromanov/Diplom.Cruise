@include('header')
<div class="container">

	<div class="row">

		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">

				<div class="panel-body">

					@foreach ($cruises as $cruise)
					@if(session()->has('message'))
					<div class="alert alert-danger">
						<h4 align="center"> {{ session()->get('message') }}</h4>
					</div>
					@endif
					<h2 align="center">{{ $cruise->Trip_Name }} 
					</h2>

					<div class="col-md-12">
						<div class="panel panel-default">

							<div class="panel-body">
								<div class="col-md-5">
									<img src="{{asset ($cruise->Image)}}" style="width: 250px; height: 250px;" alt="1" class="img-rounded">
								</div>
								<div class="col-md-7">
									<p>
										<ul>
											<li>Лайнер - <a href="{{ url('/ships') }}">{{ $cruise->Ship_Name }} </a></li>
											<br>
											<li>Длительность тура (в днях) - {{ $cruise->Duration }}</li>
											<br>
											<li>Страны - {{ $cruise->Countries }}</li>
											<br>
											<li>Дата начала - {{ $cruise->Start_Date }}</li>
											<br>
											<li><a href="{!! $cruise->Href !!}" target="_blank">Местоположение лайнера</a></li>
										</ul>
									</p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="panel panel-default">

							<div class="panel-body">
								<h4 align="center"> Описание тура</h4>
								<p>{!!$cruise->Description!!} </p>
							</div>
						</div>
					</div>


					<div class="col-md-12">
						<div class="panel panel-default">

							<div class="panel-body">
								<h4 align="center"> Расписание тура</h4>
								<table class="table table-bordered">
									{!! $cruise->Schedule!!}
								</table>
							</div>
						</div>
					</div>

					<div>  <form role="form" class="col-md-12 go-right" action="/insert" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}

						@guest
						@else
						<div class="form-group" style="display:none;">
							<input id="trip" name="Trips_id" type="text" class="form-control"  value="{{ $cruise->id }}" required>
							<label for="trip">Trip</label>
						</div>

						<div class="form-group" style="display:none;">
							<input id="ship" name="Ship_Name" type="text" class="form-control"  value="{{ $cruise->Ship_Name }}" required>
							<label for="Ship_Name">Ship_Name</label>
						</div>

						<div class="form-group" style="display:none;" >
							<input id="user" name="Users_id" type="text" class="form-control" value="{{ Auth::user()->id }}" required>
							<label for="user">Your id</label>
						</div>

						<div class="form-group" style="display:none;">
							<div id="2"></div>

							<label for="user">Количество человек</label>
						</div>

						
						@endguest
						<div class="form-group" style="display:none;">
							<input id="price" name="Cost" type="text" class="form-control" value="{{ $cruise->Price }}" required>
							<label for="user">Стоимость тура</label>
						</div>
						<div class="panel panel-default">

							<div class="panel-body">
								<div class="col-md-6">
									

									<p style="font-size: 20px;">Выберите тип каюты.</p>

									<select onchange="cabin();fff();" id="select1" name="Cab_Type" class="selectpicker" style="font-size: 20px;" required>
										<option value=""> ---</option>
										<option value="D"> Внутренняя, {{$cruise->Price}} грн за чел.</option>
										<option value="C"> Внешняя с окном, {{$cruise->Price*1.5}} грн за чел.</option>
										<option value="B"> Внешняя с балконом, {{$cruise->Price*2}} грн за чел.</option>
										<option value="A"> Сьют, {{$cruise->Price*3}} грн за чел.</option>
									</select> 

								</div>
								<div class="col-md-6">
									<div id="222" >

									</div>
								</div>
							</div>
						</div>



						<div id="CabsD" class="panel panel-default" style="display: none;">

							<div class="panel-body">
								<h4 align="center">Внутренняя, доступно</h4>

								<div class="col-md-2" style="margin: 30px;">
									<div class="cab">
										Одноместная <br>
										<span class="cabspan">	{{ $cruise->Cab_Def_D1-$cruise->Cab_Ord_D1 }}</span>
									</div>
								</div>

								<div class="col-md-2" style="margin: 30px;">
									<div class="cab">
										Двухместная <br>
										<span class="cabspan">	{{ $cruise->Cab_Def_D2-$cruise->Cab_Ord_D2 }}</span>
									</div>
								</div>
								
								<div class="col-md-2" style="margin: 30px;">
									<div class="cab">
										Трёхместная <br>
										<span class="cabspan">	{{ $cruise->Cab_Def_D3-$cruise->Cab_Ord_D3 }}</span>
									</div>
								</div>
								
								<div class="col-md-2" style="margin: 30px;">
									<div class="cab">
										Четырёхместная <br>
										<span class="cabspan">	{{ $cruise->Cab_Def_D4-$cruise->Cab_Ord_D4 }}</span>
									</div>
								</div>
							</div>
						</div>

						<div id="CabsC" class="panel panel-default" style="display: none;">

							<div class="panel-body">
								<h4 align="center">Внешняя с окном, доступно</h4>

								<div class="col-md-2" style="margin: 30px;">
									<div class="cab">
										Одноместная <br>
										<span class="cabspan">{{ $cruise->Cab_Def_C1-$cruise->Cab_Ord_C1 }} </span>
									</div>
								</div>

								<div class="col-md-2" style="margin: 30px;">
									<div class="cab">
										Двухместная <br>
										<span class="cabspan">{{ $cruise->Cab_Def_C2-$cruise->Cab_Ord_C2 }} </span>
									</div>
								</div>

								<div class="col-md-2" style="margin: 30px;">
									<div class="cab">
										Трёхместная <br>
										<span class="cabspan">{{ $cruise->Cab_Def_C3-$cruise->Cab_Ord_C3 }} </span>
									</div>
								</div>

								<div class="col-md-2" style="margin: 30px;">
									<div class="cab">
										Четырёхместная <br>
										<span class="cabspan">{{ $cruise->Cab_Def_C4-$cruise->Cab_Ord_C4 }} </span>
									</div>
								</div>
							</div>
						</div>


						<div id="CabsB" class="panel panel-default" style="display: none;">

							<div class="panel-body">
								<h4 align="center">Внешняя с балконом, доступно</h4>
								<div class="col-md-2" style=" margin: 30px;">
									<div class="cab">
										Одноместная <br>
										<span class="cabspan">{{ $cruise->Cab_Def_B1-$cruise->Cab_Ord_B1 }}</span>
									</div> 
								</div>

								<div class="col-md-2" style=" margin: 30px;">
									<div class="cab">
										Двухместная <br>
										<span class="cabspan">{{ $cruise->Cab_Def_B2-$cruise->Cab_Ord_B2 }} </span>
									</div>
								</div>

								<div class="col-md-2" style=" margin: 30px;">
									<div class="cab">
										Трёхместная <br>
										<span class="cabspan">{{ $cruise->Cab_Def_B3-$cruise->Cab_Ord_B3 }} </span>
									</div>
								</div>

								<div class="col-md-2" style=" margin: 30px;">
									<div class="cab">
										Четырёхместная <br>
										<span class="cabspan">{{ $cruise->Cab_Def_B4-$cruise->Cab_Ord_B4 }} </span>
									</div>
								</div>
							</div>
						</div>


						<div id="CabsA" class="panel panel-default" style="display: none;">

							<div class="panel-body">
								<h4 align="center">Сьют, доступно</h4>
								<div class="col-md-2" style="margin: 30px;">
									<div class="cab">
										Одноместная <br>
										<span class="cabspan">
											{{ $cruise->Cab_Def_A1-$cruise->Cab_Ord_A1 }} </span>
										</div>
									</div>

									<div class="col-md-2" style="margin: 30px;">
										<div class="cab">
											Двухместная <br>
											<span class="cabspan">{{ $cruise->Cab_Def_A2-$cruise->Cab_Ord_A2 }} </span>
										</div>
									</div>

									<div class="col-md-2" style="margin: 30px;">
										<div class="cab">
											Трёхместная <br>
											<span class="cabspan">{{ $cruise->Cab_Def_A3-$cruise->Cab_Ord_A3 }} </span>
										</div>
									</div>

									<div class="col-md-2" style="margin: 30px;">
										<div class="cab">
											Четырёхместная <br>
											<span class="cabspan">{{ $cruise->Cab_Def_A4-$cruise->Cab_Ord_A4 }} </span>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12" style="border: 1px solid #d3e0e9;border-radius: 4px;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);">


								<div class="col-md-8">
									<div class="panel-body">

										<p style="font-size: 20px;">Выберите число пассажиров.</p>

										<select onchange="input();fff()" id="select" name="Numb_of_Pers" class="selectpicker" style="font-size: 20px;" required >
											<option value="">---</option>
											<option value="1"> 1</option>
											<option value="2"> 2</option>
											<option value="3"> 3</option>
											<option value="4"> 4</option>
										</select> 


									</div>

									<div id="111" class="panel-body">
									</div>
								</div>
								<div class="col-md-4">
									<p style="margin-top: 25px;">Обычный - 100%<br>Детский(дети до 14 лет) - 50%</p>
								</div>


							</div>

							<div class="col-md-12" style="margin-top: 25px;">
								<div class="col-md-4"></div>
								<div class="col-md-4">


									@guest
									<input onclick="f1()" class="btn btn-success center-block btn-lg" type="button"  value="Заказать"><br><br>
									<div id="101" class="alert alert-danger" style="display: none;" role="alert">
										Для заказа необходимо войти или зарегистрироваться!
									</div>
									@else
									<input id="paybtn" onclick="pay()" class="btn btn-success center-block btn-lg" type="button" value="Далее"> <br>

								</div>
								<div class="col-md-4"><span style="font-size: 25px;">Итого:</span>
									<input id="fsumid"  type="text" name="fsum"  value="0" size="6" style="border-style: none;text-align: right; font-size: 23px;"> грн.</div><br><br><br>
								</div>

								<div id="pay" class="col-md-12" style="display: none;">
									<div  class="panel panel-default">

										<div class="panel-body">
											<div class="col-md-5">


												<p style="font-size: 20px;">Cпособы оплаты.</p>

												<select onchange="paytype()" id="payselect" name="payselect" class="selectpicker" style="font-size: 20px;" required>
													<option value=""> --- </option>
													<option value="1"> Наличными</option>
													<option value="2"> Через банк</option>
													<option value="3"> С помощью карты</option>
												</select> 
												<br>

											</div>
											<div class="col-md-7">
												<div id="paydiv" >

												</div>
											</div>
										</div>

									</div>
									<br>
									<input class="btn btn-success center-block btn-lg" type="submit" value="Заказать">
									<br>
								</div>
								@endguest
							</form>
						</div>
						@endforeach 

					</div>
				</div>

			</div>
		</div>
	</div>
	@include('footer')