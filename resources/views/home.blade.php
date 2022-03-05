
<x-applayout>
  
    <x-slot name="title">
     Home
    </x-slot>
 
 <div class="container">
  <div class="row">        
    <div class="col">
       <h3 class="text-center text-primary">Informations</h3>
        @foreach ($posts as $post)
         @php
           $updated = new Carbon\Carbon($post->updated_at);
           $now = Carbon\Carbon::now();
           $ago=$updated->diffForHumans($now);
           $ago=str_replace("before", "ago", $ago);
         @endphp
         <div class="border border-2 rounded border-primary p-2 mb-2" style="margin-left:1.2%;">
         <span class="fs-4 text-primary"> {{$post->blogger->name}}</span><br>
          {{$ago}}<br>
          <p class="mt-1">
          <span class="fs-5 text-justify">{{$post->title}}</span><br>
          <span class="fw-light fs-6 text-justify">{{$post->body}}</span><br>
          </p>
          </div>
        @endforeach
    </div>
  </div>
</div>  

</x-applayout>


