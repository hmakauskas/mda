@extends('layout/app')

@section('content')

<center>
    <h2>Cost Status</h2>    
</center> 

<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

   <!-- Current Tasks -->
    @if (isset($CostStatuses))
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Cost Status
            </div>

            {!! Form::open(['method'=>'GET','url'=>'costStatus','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <a href="{{ url('costStatus/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>
             


            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" placeholder="Search...">

                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">Search</button>
                </span>

            </div>
            {!! Form::close() !!}

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table Body -->
                    <tbody>
                            <tr>
                                <td class="table-text">
                                    <div>Status Name</div>
                                </td>
                                <td class="table-text">
                                    <div></div>
                                </td>
                                 
                            </tr>
                        @foreach ($CostStatuses as $CostStatus)
                            <tr>                                
                                <td class="table-text">
                                    <div>
                                        <a href="{{ url('costStatus').'/'.$CostStatus->id }}/edit">
                                            {{ $CostStatus->status_name }}

                                        </a>
                                    </div>
                                </td>
                                <td> 
                                	{!! Form::open(['method'=>'DELETE','url'=>url('costStatus').'/'.$CostStatus->id,'class'=>'pull-right'])  !!}

                                	    {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
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


