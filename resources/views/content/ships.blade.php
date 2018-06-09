@include('header')
@foreach ($ships as $ship)
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
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
							<li><a href="{!! $ship->Href !!}" target="_blank">Местоположение лайнера</a></li>
						</ul>
					</div>
				 </div>
				</div>
			</div>
		</div>
	</div>
	@endforeach 
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div style="margin-left: 40%;">
						{!! $ships->links() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('footer')