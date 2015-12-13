@extends('layout/app')

@section('content')


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <center>
    	<h1>Marketing Channels</h1>
    
	</center>




	<!-- Current Tasks -->
    @if (isset($CostStatuses))
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Cost Status
            </div>

            {!! Form::open(['method'=>'GET','url'=>'costStatus','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <a href="{{ url('marketingChannel/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>
             


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
                        <th>Marketing Channel</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                            <tr>
                                <td class="table-text">
                                    <div>Channel Name</div>
                                </td>
                                 
                            </tr>
                        @foreach ($MarketingChannels as $MarketingChannel)
                            <tr>                                
                                <td class="table-text">
                                    <div>
                                        <a href="/marketingChannel/{{ $MarketingChanenl->id }}/edit">
                                            {{ $MarketingChannel->channel_name }}

                                        </a>



                                    </div>

                                </td>
                                <td> 
                                	{!! Form::open(['method'=>'DELETE','url'=>'marketingChannel/'.$MarketingChannel->id,'class'=>'pull-right'])  !!}

                                	    {!! Form::submit('Delete this Channel', array('class' => 'btn btn-warning')) !!}
					                {!! Form::close() !!}

                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <?php echo $MarketingChannels->render(); ?>

    @endif




   
</div>
@endsection


