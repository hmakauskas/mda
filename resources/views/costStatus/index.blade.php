@extends('layout/app')

@section('content')


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <center>
    	<h1>Cost Status - Actions</h1>
    <div class="btn-group" role="group" aria-label="Actions">
	  <button type="button" class="btn btn-default"><a href="<?=url('costStatus/create')?>">Add</a></button>
	  <button type="button" class="btn btn-default">Edit</button>
	  <button type="button" class="btn btn-default">Remove</button>
	</div>
	</center>




	<!-- Current Tasks -->
    @if (isset($CostStatuses))
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Cost Status
            </div>

            {!! Form::open(['method'=>'GET','url'=>'costStatus','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <a href="{{ url('costStatus/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>
             


            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" id="datepicker" placeholder="Search...">

                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>

                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">Search</button>
                </span>

            </div>
            {!! Form::close() !!}

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Cost Status</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                            <tr>
                                <td class="table-text">
                                    <div>Status Name</div>
                                </td>
                                 
                            </tr>
                        @foreach ($CostStatuses as $CostStatus)
                            <tr>                                
                                <td class="table-text">
                                    <div>
                                        <a href="/costStatus/{{ $CostStatus->id }}/edit">
                                            {{ $CostStatus->status_name }}

                                        </a>



                                    </div>

                                </td>
                                <td> 
                                	{!! Form::open(['method'=>'DELETE','url'=>'costStatus/'.$CostStatus->id,'class'=>'pull-right'])  !!}

                                	    {!! Form::submit('Delete this Nerd', array('class' => 'btn btn-warning')) !!}
					                {!! Form::close() !!}

                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <?php echo $CostStatuses->render(); ?>

    @endif




   
</div>
@endsection


