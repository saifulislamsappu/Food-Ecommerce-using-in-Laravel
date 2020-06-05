@foreach($foodByCategory as $key=>$foods)
<div>
   <h2> categroy {{ $key + 1 }}</h2>
    {{$foods}}
</div>
@endforeach