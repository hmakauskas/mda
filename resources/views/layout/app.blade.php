<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel Quickstart - Intermediate</title>

	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">

	<link rel="shortcut icon" href="<?=url('/')?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?=url('/')?>/favicon.ico" type="image/x-icon">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


	<style>
		body {
			font-family: 'Raleway';			
		}

		.fa-btn {
			margin-right: 6px;
		}

		.table-text div {
			padding-top: 6px;
		}
	</style>

	<script>
		(function () {
			$('#task-name').focus();
		}());
	</script>
</head>

<body>

	<div style="margin-left: auto; width: 180px; padding-bottom: 5px;">
  		<a href="{{ url('/') .'/?language=pt'}}">
  			<img src="<?=url('/')?>/images/brasil.jpg"/>
  		</a>
  		<a href="{{ url('/') .'/?language=en'}}">
  			<img src="<?=url('/')?>/images/eua.png"/>
  		</a>
  		<a href="{{ url('/') .'/?language=es'}}">
  			<img src="<?=url('/')?>/images/espanha.gif"/>
  		</a>
  	</div>

	<div class="container">		
		
		<nav class="navbar navbar-default">
		  
		  <div class="container-fluid">

		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="<?=url('/')?>" style="padding:2px;"><img src="<?=url('/')?>/images/logo.png"/></a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <!--
		        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
		        <li><a href="#">Link</a></li>
		    	-->
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="<?=url('fiscalDocument')?>">Fiscal Documents</a></li>
		            <li><a href="<?=url('cost')?>">Costs</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="<?=url('joincosts')?>">Add costs to a Fiscal Document</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="<?=url('company')?>">Companies</a></li>		            
		            <li><a href="<?=url('supplier')?>">Suppliers</a></li>
		            <li><a href="<?=url('supplierbranch')?>">Supplier Branches</a></li>		            
		            <li><a href="<?=url('marketingChannel')?>">Marketing Channel</a></li>
		            <li><a href="<?=url('category')?>">Category</a></li>
		            <li><a href="<?=url('costStatus')?>">Cost status</a></li>
		            <li><a href="<?=url('fiscalDocumentStatus')?>">Fiscal Document Status</a></li>
		          </ul>
		        </li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        @if (Auth::guest())
					<li><a href="<?=url('auth/register')?>"><i class="fa fa-btn fa-heart"></i>Register</a></li>
					<li><a href="<?=url('auth/login')?>"><i class="fa fa-btn fa-sign-in"></i>Login</a></li>
				@else
					<li class="navbar-text"><i class="fa fa-btn fa-user"></i>{{ Auth::user()->name }}</li>
					<li><a href="<?=url('auth/logout')?>"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
				@endif		        
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	
		@yield('content')	

	</div>
</body>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
	$(function() {
		$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
	});

	$(function() {
		$( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
	});
	$(function() {
		$( "#from" ).datepicker({
			defaultDate: "-1m",
			changeMonth: true,
			numberOfMonths: 2,
			dateFormat: 'yy-mm-dd',
			onClose: function( selectedDate ) {
				$( "#to" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 2,
			dateFormat: 'yy-mm-dd',
			onClose: function( selectedDate ) {
				$( "#from" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
</script>

</html>
