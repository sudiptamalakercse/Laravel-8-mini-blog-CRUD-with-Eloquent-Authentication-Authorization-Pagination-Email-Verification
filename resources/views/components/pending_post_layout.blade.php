
@props(
['title' => 'Pending Posts',
 'errorsAny',
 'errorsAll',
 'actionFor',
 'posts',
 'action1',
 'action1Link',
 'action2',
'action2Link'
 ]
 )

<x-applayout>
  
  
    <x-slot name="title">
      {{ $title }}
    </x-slot>
 
   <div class="container">
   @include('component.nav')
  <div class="row">
    <div class="col">
            <h3 class="mb-3 text-center mt-2">Pending Posts</h3>
        @if (Session::has('message'))
   <div class="alert alert-info" class="mb-3">{{ Session::get('message') }}</div>
@endif
@if ($errorsAny)
    <div class="alert alert-danger" class="mt-5">
        <ul>
            @foreach ($errorsAll as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{$actionFor}}" method="post">
 @csrf
<table class="table">
  <thead class="thead-dark">
    <tr>
      @if(count($posts)>1)
      <th scope="col">Select All<br><input type ="checkbox" id='cp'/></th>
      @endif
      <th scope="col">Post Id</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Admin Email</th>
      <th colspan="2" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
     <tr>
      @if(count($posts)>1)
      <td><input type ="checkbox" name="post_ids[]" class='c' value = "{{$post->id}}"/></td>
      @endif
      <th scope="posts">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->body}}</td>
      <td>{{$post->admin->email}}</td>
      <td><a class="btn-success btn-sm rounded-pill" href="{{route($action1Link, ['post' =>$post->id ])}}" style="text-decoration:none;" role="button">{{$action1}}</a></td>
      <td><a class="btn-warning btn-sm rounded-pill" href="{{route($action2Link, ['post' =>$post->id ])}}" style="text-decoration:none;" role="button">{{$action2}}</a></td>
    </tr>
    @endforeach 
  </tbody>
</table>

</form>
    </div>
  </div>
</div> 

<script>

let checkp= document.getElementById('cp');

checkp.addEventListener("click", function(){

let checkboxes=document.getElementsByClassName("c");

 if(checkp.checked==true)
 {
   for(let i=0;i<checkboxes.length;i++)
   {
    let checkbox1=checkboxes[i];
     if(checkbox1.type=='checkbox'){
     checkbox1.checked=true;
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
     }
   }
 }
});

</script>

</x-applayout>

