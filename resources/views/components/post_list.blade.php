
@props(
['title' => 'Some Title',
'heading',
 'errorsAny',
 'errorsAll',
 'userType',
 'posts',
 'action1',
 'action1Link',
 'action2',
'action2Link'
 ]
 )

<x-applayout>
  <style>

.selected_post{
  background-color: coral;
  color: white;
}
  </style>
  
    <x-slot name="title">
      {{ $title }}
    </x-slot>
 
   <div class="container">
  <div class="row">
    <div class="col">
            <h3 class="mb-3 text-center mt-2 text-primary">{{$heading}}({{count($posts)}})</h3>
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
<form action="" method="post" id="myform" data-user-type="{{$userType}}">
 @csrf
<table class="table">
  <thead class="thead-dark">
    <tr>
      @if(count($posts)>1)
      <th scope="col" class="align-middle text-center">Select All<br><input type ="checkbox" id='cp'/></th>
      @endif
      @php
        if($userType=='admin')
          {
          $relation='blogger';
          }
        elseif($userType=='blogger'){
          $relation='admin';
         }
      @endphp
      <th scope="col" class="align-middle text-center">Post Id</th>
      <th scope="col" class="align-middle text-center">Title</th>
      <th scope="col" class="align-middle text-center">Body</th>
      <th scope="col" class="align-middle text-center">{{ucfirst($relation)}} Name</th>
      <th scope="col" class="align-middle text-center">{{ucfirst($relation)}} Email</th>
      <th colspan="2" class="align-middle text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
     <tr>
      @if(count($posts)>1)
      <td class="align-middle text-center"><input type ="checkbox" name="post_ids[]" class='c' value = "{{$post->id}}"/></td>
      @endif
      <th scope="posts" class="align-middle text-center">{{$post->id}}</th>
      <td class="align-middle text-center">{{$post->title}}</td>
      <td class="align-middle text-center">{{$post->body}}</td>
      <td class="align-middle text-center">{{$post->$relation->name}}</td>
      <td class="align-middle text-center">{{$post->$relation->email}}</td>
      <td class="align-middle text-center"><a class="btn-success btn-sm rounded-pill" href="{{route($action1Link, ['post' =>$post->id ])}}" style="text-decoration:none;" role="button">{{$action1}}</a></td>
      <td class="align-middle text-center"><a class="btn-warning btn-sm rounded-pill" href="{{route($action2Link, ['post' =>$post->id ])}}" style="text-decoration:none;" role="button">{{$action2}}</a></td>
    </tr>
    @endforeach 
  </tbody>
</table>
<p class="text-center">

@if(Auth::guard('admin')->user() && count($posts)>1)
<input type="submit" value="{{$action1}} Selected" id="approve_or_disapprove_selected" class="btn-success btn-sm rounded-pill">
@endif

@if((Auth::guard('admin')->user() || Auth::guard('blogger')->user()) && count($posts)>1)
<input type="submit" value="Delete Selected" id="delete_selected" class="btn-danger btn-sm rounded-pill" style="margin-left:2%;" >
@endif

</p>

</form>
</div>
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

<script>

let user_type=document.getElementById("myform").getAttribute('data-user-type'); 

let form=document.getElementById("myform");

let form_action=null;

//Delete Selected

document.getElementById("delete_selected").addEventListener("click", function(e){

 e.preventDefault();
   
if(user_type=='blogger' || user_type=='admin')
 {
     form_action='{{route('posts.delete_selected_post')}}';
 }

form.action=form_action;

form.submit();

});

//Approve or Disapprove Selected

document.getElementById("approve_or_disapprove_selected").addEventListener("click", function(e){

 e.preventDefault();
   
if(user_type=='admin')
{
 
let action_1='{{$action1}}';

if(action_1=='Approve')
{
form_action='{{route('approve_selected_post')}}';
}
else if(action_1=="Disapprove")
{
form_action='{{route('disapprove_selected_post')}}';
}

form.action=form_action;

form.submit();
}

});
</script>

</x-applayout>

