<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Gentellela Alela! | </title>
    
    <!-- Bootstrap -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">

</head>

<body class="login">
<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
			{!! BootForm::open(['url' => url('/register'), 'method' => 'post']) !!}
			
			<h1>Create Account</h1>

			{!! BootForm::text('name', 'Name', old('name'), ['placeholder' => 'Full Name']) !!}

			{!! BootForm::text('cpf', 'CPF', old('cpf'), ['placeholder' => 'CPF']) !!}

			{!! BootForm::email('email', 'Email', old('email'), ['placeholder' => 'Email']) !!}

			{!! BootForm::password('password', 'Password', ['placeholder' => 'Password']) !!}

			{!! BootForm::password('password_confirmation', 'Password confirmation', ['placeholder' => 'Confirmation']) !!}
		
			{!! BootForm::submit('Register', ['class' => 'btn btn-primary']) !!}
		   
			<div class="clearfix"></div>
			
			<div class="separator">
				<p class="change_link">Already a member ?
					<a href="{{ url('/login') }}" class="to_register"> Log in </a>
				</p>
				
				<div class="clearfix"></div>
				<br />
				
				<div>
					<h1><i class="fa fa-paw"></i>Gerenciador Financeiro!</h1>
					<p>©2018 MIT License. Use Gentelella Alela wiht Bootstrap 3</p>
				</div>
			</div>
			{!! BootForm::close() !!}
        </section>
    </div>
</div>
</body>
</html>