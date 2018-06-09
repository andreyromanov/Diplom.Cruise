@include('admin.admin_menu')
<div class="col-md-10">
	<div class="col-md-12">
		<div class="panel panel-default" style="margin: 10px 0px;">
			<div class="panel-body">

				@foreach ($cruises as $cruise)

				<h2 align="center">{{ $cruise->Trip_Name }}</h2>

				@endforeach 
				
				@foreach ($places as $place)
				<div style="font-size: 18px;">
					<ul>

						<li>Порт отправления - {{ $place->Port }}.</li>

						<li>Страны - {{ $place->Countries }}.</li>

						<li>Дата отпраления - {{ $place->Start_Date }}.</li>

						<li>Продолжительность тура - {{ $place->Duration }} дней.</li>

						<li>Лайнер - {{ $place->Ship_Name }}.</li>

						<li>{{ $place->Ship_Name }} вмещает {{ $place->Cab_Def_All }} кают(ы).</li>

						<li>Забронировано {{ $place->Cab_Ord_All }} кают(ы). - {{number_format((($place->Cab_Ord_All*100)/($place->Cab_Def_All)),1)}} %.</li>

					</ul>
				</div>
				@endforeach

			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-body">

				<canvas id="myChart"></canvas>
				
			</div>
		</div>

		<form role="form" action="{{ url('/admin/trip_delete') }}" method="post">
			{{ csrf_field() }}

			<div>
				@foreach ($cruises as $cruise)
				<input name="id" type="text" style="display: none" value="{{ $cruise->id }}" required>
				@endforeach 
			</div>
			

			@foreach ($places as $place)
			@if($place->Cab_Ord_All == 0)
			<div class="form-group" >
				<input class="btn btn-danger pull-right btn-lg" style="margin-bottom: 25px;" type="submit" value="Удалить">
			</div>
			@else
			
			@endif



			@endforeach 
			
		</form>
		@foreach ($cruises as $cruise)
		<div class="form-group" >
			<a href="{{ url('/admin/trip_edit/'.$cruise->id) }}"><input class="btn btn-success pull-left btn-lg" style="margin-bottom: 25px;" type="button" value="Редактировать"></a> 
		</div>
		@endforeach
	</div>


</div>
</div>
</div>

<script type="text/javascript">
	let myChart = document.getElementById('myChart').getContext('2d');

	let massPopChart = new Chart(myChart,{
		type:'pie',
		data:{
			labels:['Всего', 'Забронировано'],
			datasets:[{
				label:'Каюты',
				data:[
				{{ $place->Cab_Def_All-$place->Cab_Ord_All }}, {{ $place->Cab_Ord_All }}
				],
				backgroundColor:['blue','yellow'],
				borderWidth: 2,
				borderColor: 'grey'
			}]
		},
		options:{
			title:{
				display:true,
				text: 'Забронированные каюты',
				fontSize:20
			},
			legend:{
				display:true,
				position: 'right'
			},
			animation:{
				easing: 'linear',
				duration: 1000
			}	
		}

	});

</script>