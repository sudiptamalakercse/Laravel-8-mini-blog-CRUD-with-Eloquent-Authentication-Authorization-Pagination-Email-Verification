
@props(
['title' => 'Some Title',
'heading',
'units'
 ]
 )

<x-applayout>
    <x-slot name="title">
      {{ $title }}
    </x-slot>
   
<div class="container">
<h3 class="mb-3 text-center mt-2 text-primary">{{$heading}}</h3>
<div class="row mt-5">

@foreach ($units as $unit)
<div class="col-md-3 col-sm-6">
  <a href="{{$unit['link']}}" class="text-decoration-none">
   <div class="border border-2 rounded border-primary p-2 mb-2 text-center" style="margin-left:1.2%;height:90%;">
      <h6 class="fs-4 text-primary">{{$unit['title']}}</h6>
      <h6 class="fs-4 text-primary">{{$unit['count']}}</h6>
    </div>
  </a>
</div>
@endforeach

</div>
</div> 

<script>

//select or not select post by checkbox

let checkp= document.getElementById('cp');

let checkboxes=document.getElementsByClassName("c");

checkp.addEventListener("click", function(e){

 if(checkp.checked==true)
 {
   for(let i=0;i<checkboxes.length;i++)
   {
    let checkbox1=checkboxes[i];
     if(checkbox1.type=='checkbox'){
     checkbox1.checked=true;
     checkbox1.closest('tr').classList.add("bg-info");
   }
  }
 }

 else if(checkp.checked==false)
 {
   for(let i=0;i<checkboxes.length;i++)
   {
    let checkbox1=checkboxes[i];
      if(checkbox1.type=='checkbox'){
     checkbox1.checked= false;
     checkbox1.closest('tr').classList.remove("bg-info");
     }
   }
 }

});

   for(let i=0;i<checkboxes.length;i++)
   {

     checkboxes[i].addEventListener('change', function(e){
      let checkbox1=checkboxes[i];
      if(checkbox1.type=='checkbox' && checkbox1.checked==false){
       checkbox1.closest('tr').classList.remove("bg-info");
     }
     else if(checkbox1.type=='checkbox' && checkbox1.checked==true){
        checkbox1.closest('tr').classList.add("bg-info");
     }
});
   
   }
</script>
</x-applayout>

