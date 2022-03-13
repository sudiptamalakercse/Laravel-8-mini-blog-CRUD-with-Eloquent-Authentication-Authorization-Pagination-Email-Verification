
@props(
['title' => 'Some Title',
'heading',
 'userTypeInfo',
 'posts',
 'uniqueUsersCount'
 ]
 )

<x-applayout>

    <x-slot name="title">
      {{ $title }}
    </x-slot>
 
   <div class="container">
  <div class="row">
<div class="col">
<h3 class="mb-3 text-center mt-2 text-primary">{{$heading}}({{$uniqueUsersCount}})</h3>
<div class="table-responsive-md">
<table class="table">
  <thead class="thead-dark">
    <tr>
      @if(count($posts)>1)
      <th scope="col" class="align-middle text-center">Select All<br><input type ="checkbox" id='cp'/></th>
      @endif
      <th scope="col" class="align-middle text-center">{{ucfirst($userTypeInfo)}} Id</th>
      <th scope="col" class="align-middle text-center">{{ucfirst($userTypeInfo)}} Name</th>
      <th scope="col" class="align-middle text-center">{{ucfirst($userTypeInfo)}} Email</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
     <tr>
      @if(count($posts)>1)
      <td class="align-middle text-center"><input type ="checkbox" name="post_ids[]" class='c'/></td>
      @endif
      <th scope="posts" class="align-middle text-center">{{$post->$userTypeInfo->id}}</th>
      <td class="align-middle text-center">{{$post->$userTypeInfo->name}}</td>
      <td class="align-middle text-center">{{$post->$userTypeInfo->email}}</td>
    </tr>
    @endforeach 
  </tbody>
</table>
</div>

<div class="mt-3 d-flex justify-content-center">
       {{$posts->links()}}  
</div>
  
       
</div>
</div>
</div> 

<script>

//select or not select post by checkbox

let checkp= document.getElementById('cp');

let checkboxes=document.getElementsByClassName("c");

if(checkp!=null){
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
}
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

