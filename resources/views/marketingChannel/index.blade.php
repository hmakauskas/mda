@extends('layout/app')

@section('content')

<center>
    <h2>Marketing Channels</h2>    
</center>    

<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

	<!-- Current Tasks -->
    @if (isset($MarketingChannels))
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Marketing Channels
            </div>

            {!! Form::open(['method'=>'GET','url'=>'marketingChannel','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
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
                    <tbody>
                            <tr>
                                <td class="table-text">
                                    <div>Channel Name</div>
                                </td>
                                <td class="table-text">
                                    <div>&nbsp;</div>
                                </td>
                            </tr>
                        @foreach ($MarketingChannels as $MarketingChannel)
                            <tr>                                
                                <td class="table-text">
                                    <div>
                                        <a href="/marketingChannel/{{ $MarketingChannel->id }}/edit">
                                            {{ $MarketingChannel->channel_name }}
                                        </a>
                                    </div>
                                </td>
                                <td> 
                                	{!! Form::open(['method'=>'DELETE','url'=>'marketingChannel/'.$MarketingChannel->id,'class'=>'pull-right'])  !!}

                                	    {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
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


