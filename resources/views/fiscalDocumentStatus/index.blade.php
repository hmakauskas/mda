@extends('layout/app')

@section('content')


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <center>
        <h1>Fiscal Document Status</h1>
    
    </center>




    <!-- Current Tasks -->
    @if (isset($FiscalDocumentStatuses))
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Fiscal Document Status
            </div>

            {!! Form::open(['method'=>'GET','url'=>'FiscalDocumentStatus','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <a href="{{ url('fiscalDocumentStatus/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>
             


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
                        <th>Fiscal Document Status</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                            <tr>
                                <td class="table-text">
                                    <div>Fiscal Document Status</div>
                                </td>
                                 
                            </tr>
                        @foreach ($FiscalDocumentStatuses as $FiscalDocumentStatus)
                            <tr>                                
                                <td class="table-text">
                                    <div>
                                        <a href="/fiscalDocumentStatus/{{ $FiscalDocumentStatus->id }}/edit">
                                            {{ $FiscalDocumentStatus->status_name }}

                                        </a>



                                    </div>

                                </td>
                                <td> 
                                    {!! Form::open(['method'=>'DELETE','url'=>'fiscalDocumentStatus/'.$FiscalDocumentStatus->id,'class'=>'pull-right'])  !!}

                                        {!! Form::submit('Delete this Status', array('class' => 'btn btn-warning')) !!}
                                    {!! Form::close() !!}

                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <?php echo $FiscalDocumentStatuses->render(); ?>

    @endif




   
</div>
@endsection


