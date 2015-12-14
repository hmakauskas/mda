@extends('layout/app')

@section('content')

<center>
    <h2>Fiscal Documents</h2>    
</center> 

<!-- Current Tasks -->
    @if (isset($fiscalDocuments))
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Fiscal Documents
            </div>

            {!! Form::open(['method'=>'GET','url'=>'fiscalDocument','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <a href="{{ url('fiscalDocument/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>
             
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
                    <!-- Table Body -->
                    <tbody>
                            <tr>
                                <td class="table-text">
                                    <div>Document Number</div>
                                </td>
                                <td class="table-text">
                                    <div>Value</div>
                                </td>
                                <td class="table-text">
                                    <div>Date</div>
                                </td>
                                <td class="table-text">
                                    <div>&nbsp;</div>
                                </td> 
                            </tr>
                        @foreach ($fiscalDocuments as $fiscalDocument)
                            <tr>                                
                                <td class="table-text">
                                    <div>
                                        <a href="{{ url('fiscalDocument') .'/'. $fiscalDocument->id }}/edit">
                                            {{ $fiscalDocument->fiscal_document_number }}
                                        </a>
                                    </div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $fiscalDocument->value }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $fiscalDocument->created_at }}</div>
                                </td>
                                <td class="table-text">
                                    <div><a href="{{ url('fiscalDocument') .'/'. $fiscalDocument->id }}/show" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-zoom-in"></span> Costs</a></div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <?php echo $fiscalDocuments->render(); ?>

    @endif


@endsection


