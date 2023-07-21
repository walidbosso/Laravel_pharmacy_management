@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-info">
            {{$error}}
        </div>
			<!-- alert alert-primary: Displays a primary color alert box.
			alert alert-secondary: Displays a secondary color alert box.
			alert alert-info: Displays an informational alert box.
			alert alert-warning: Displays a warning alert box.
			alert alert-danger: Displays a danger alert box.
			alert alert-light: Displays a light color alert box.
			alert alert-dark: Displays a dark color alert box.
			badge badge-primary: Displays a primary color badge.
			badge badge-secondary: Displays a secondary color badge.
			badge badge-info: Displays an informational badge.
			badge badge-warning: Displays a warning badge.
			badge badge-danger: Displays a danger badge.
			badge badge-light: Displays a light color badge.
			badge badge-dark: Displays a dark color badge.
			btn btn-primary: Styles a button with the primary color.
			btn btn-secondary: Styles a button with the secondary color.
			btn btn-success: Styles a button with the success color.
			btn btn-info: Styles a button with the info color.
			btn btn-warning: Styles a button with the warning color.
			btn btn-danger: Styles a button with the danger color.
			btn btn-light: Styles a button with the light color.
			btn btn-dark: Styles a button with the dark color.
			btn btn-outline-primary: Styles an outlined button with the primary color.
			btn btn-outline-secondary: Styles an outlined button with the secondary color.
			btn btn-outline-success: Styles an outlined button with the success color.
			btn btn-outline-info: Styles an outlined button with the info color.
			btn btn-outline-warning: Styles an outlined button with the warning color.
			btn btn-outline-danger: Styles an outlined button with the danger color.
			btn btn-outline-light: Styles an outlined button with the light color.
			btn btn-outline-dark: Styles an outlined button with the dark color.
			-->
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif