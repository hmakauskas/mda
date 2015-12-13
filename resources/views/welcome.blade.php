@extends('layout/app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					Welcome
				</div>

				<div class="panel-body">
					{{ trans('messages.welcome') }}					
				</div>
			</div>
		</div>
	</div>
@endsection
