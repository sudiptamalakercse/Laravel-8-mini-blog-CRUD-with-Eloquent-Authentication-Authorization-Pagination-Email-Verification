<html>
    <head>
        <title>{{ $title ?? 'Mini Blog' }}</title>
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        		<meta charset="utf-8" />
		<link
			href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700"
			rel="stylesheet"
			type="text/css"
		/>

		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		/>

		<link rel="stylesheet" href="{{asset('css/style.css')}}" />
    </head>
    <body>

 @include('component.nav')

@include('component.logout')

{{ $slot }}

@include('component.footer')

{{-- Logout form submmit --}}
<script>
    let log_out=document.getElementById('log_out');
	
	if(log_out!=null){

	 log_out.addEventListener("click", function(e){

     e.preventDefault();
     
	 let log_out_form=document.getElementById("log_out_form");

	 log_out_form.submit();

    });

    }
</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>