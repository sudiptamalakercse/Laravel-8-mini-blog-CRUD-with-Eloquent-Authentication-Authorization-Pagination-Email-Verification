
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
         <div class="border rounded border-primary p-2 mb-2" style="margin-left:1.2%;border-width:2px !important;">
         <span class="fs-4 text-primary"> {{$post->blogger->name}}</span><br>
          {{$ago}}<br>
          <p class="mt-1">
          <span class="fs-5 text-justify">{{$post->title}}</span><br>
          <span class="fw-light fs-6 text-justify">{{$post->body}}</span><br>
          </p>
          </div>
        @endforeach
        <div class="mt-3 d-flex justify-content-center">
          <span class="d-none d-sm-inline">{{$posts->onEachSide(4)->links()}}</span>
        </div>
        <div class="d-flex flex-wrap justify-content-center d-sm-none">
        <a class="btn btn-primary btn-sm mt-1 px-4 @if($posts->currentPage()==1) disabled @endif" href="{{$posts->url(1)}}">First</a>
        <a class="btn btn-primary btn-sm ml-1 mt-1 px-2 @if($posts->currentPage()==1) disabled @endif" href="{{$posts->previousPageUrl()}}">Privious</a>
        <a class="btn btn-primary btn-sm ml-1 mt-1 px-4 @if($posts->currentPage()==$posts->lastPage()) disabled @endif" href="{{$posts->nextPageUrl()}}">Next</a>
        <a class="btn btn-primary btn-sm ml-1 mt-1 px-4 @if($posts->currentPage()==$posts->lastPage()) disabled @endif" href="{{$posts->url($posts->lastPage())}}">Last</a>
       </div>
    </div>
  </div>
</div>  

</x-applayout>


