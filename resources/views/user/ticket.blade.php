@include('header')
<script type="text/javascript">
	function printContent(el) {
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
	}
</script>
@foreach ($orders as $order)
<div   style="min-height: 700px">
	<div class="panel panel-default" style="margin: 0 50px;">
		<div class="panel-body">
			<h3 align="center">Ваш билет</h3>
			<div   class="col-md-6 col-sm-offset-3 col-sm-6 col-sm-offset-3" style="height: 650px; border: 1px solid black;">
				<div id="1">
					
					<div class="col-md-4 col-md-offset-3 col-sm-4 col-sm-offset-2">
						<img src="/img/cruise.png" style="width: 100px; margin: 15px 0 -5px 0">
					</div>
					<div class="col-md-4 col-sm-5">
						<br><br><span class="ticket"><h3>Cruise</h3></span><br>
					</div>
					<div class="col-md-4 col-md-offset-3 col-sm-4 col-sm-offset-2">
						<br><br><span class="ticket">Тур:<br> <u>{{$order->Trip_Name}}</u></span><br><br>
						<span class="ticket">Отправление:<br> <u>{{$order->Start_Date}}</u></span><br><br>
						<span class="ticket">Лайнер:<br> <u>{{$order->Ship_Name}}</u></span><br><br>
						<span class="ticket">Порт:<br> <u>{{$order->Port}}</u></span><br><br><br><br><br><br>
						<span class="ticket">Контактный телефон: +380955407642</span><br>
						<span class="ticket">Контактный email: cruise@gmail.com</span>
					</div>
					<div class="col-md-4 col-sm-5">
						<br><br><span class="ticket">Гости:<br><u>{!!$order->Guests!!}</u></span><br>
						<span class="ticket">Каюта:<br> <u>{{$order->Numb_of_Pers}} {{ $order->Cab_Type}}</u></span><br><br>
						<span class="ticket">Номер:<br> <u>{{$order->Cab_Number}}</u></span><br><br>
						<span class="ticket">Заказ:<br> <u>{{$order->Order_id}}</u></span><br><br>
					</div>

				</div>
			</div>
			
		</div>
		<button onclick="printContent('1')" class="btn btn-success center-block btn-lg">Печать</button><br>
	</div>
</div>


@endforeach 
@include('footer')