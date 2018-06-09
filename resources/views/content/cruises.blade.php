@include('header')
@foreach ($cruises as $cruise)
<div class="container">
  <div class="row">
   <div class="col-md-8 col-md-offset-2">
     <div class="panel panel-default">
      <div class="panel-heading"><h2>{{ $cruise->Trip_Name }} </h2></div>
      <div class="panel-body">
       <div class="col-md-4">
         <img src="{{asset ($cruise->Image)}}" style="width: 200px; height: 200px;" alt="1" class="img-rounded">
       </div>
       <div class="col-md-8">
         <p>{!!$cruise->Description!!} 
           <h4 align="center">Цены от <b>{{$cruise->Price}} грн</b></h4>  
         </p>
       </div>
       <a class="btn btn-primary pull-right marginBottom10" href="{{ url('order/' . $cruise->id) }}">ПОДРОБНЕЕ</a>                     </div>
     </div>
   </div>
 </div>
</div>
@endforeach 
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div style="margin-left: 40%;">
          {!! $cruises->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@include('footer')