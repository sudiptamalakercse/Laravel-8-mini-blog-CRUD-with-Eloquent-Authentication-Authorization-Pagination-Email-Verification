@props(
['title',
'heading',
 'errorsAny',
 'errorsAll',
 'actionLink' => '',
 'post',
 'actionButton'
 ]
 )
<x-applayout>
  
    <x-slot name="title">
       {{$title}}
    </x-slot>
 
   <div class="container">
   @include('component.nav')
  <div class="row">
    <div class="col-md-4 offset-md-4">
            <h3 class="mb-3 text-center">{{$heading}}</h3>
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
      <form action="{{$actionLink}}" method="post">

        @if($actionButton=='Update')
         @method('PUT')
        @endif

          @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" value="{{ old('title') }}@if(isset($post)){{$post->title}}@endif">
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Body</label>
    <div class="form-floating">
      <textarea class="form-control" placeholder="Body" id="body" style="height: 200px;resize:none;" name="body">{{ old('body') }}@if(isset($post)){{$post->body}}@endif</textarea>
    </div>
  </div>
  <button type="submit" class="btn btn-primary rounded-pill">{{$actionButton}}</button>
</form>
    </div>
  </div>
</div> 

</x-applayout>







