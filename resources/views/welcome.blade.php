@extends('layout/app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ trans('messages.welcome') }}
				</div>

				<div class="panel-body">					
					<i>Você não sabe o que é sentido figurado? Na escola não te dão aulas de geometria?  Seu Madruga - Chaves </i>
				</div>
			</div>
		</div>
	</div>
@endsection
