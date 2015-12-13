@extends('layout/app')

@section('content')

<!-- Current Tasks -->
    @if (isset($costs))
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Costs
            </div>

            {!! Form::open(['method'=>'GET','url'=>'cost','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <a href="{{ url('cost/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>
             
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
                        <th>Cost</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                            <tr>
                                <td class="table-text">
                                    <div>Short Description</div>
                                </td>
                                <td class="table-text">
                                    <div>Value</div>
                                </td>
                                <td class="table-text">
                                    <div>Manamagent Date</div>
                                </td>
                                <td class="table-text">
                                    <div>Supplier</div>
                                </td> 
                            </tr>
                        @foreach ($costs as $cost)
                            <tr>                                
                                <td class="table-text">
                                    <div>
                                        <a href="/laravel5/public/cost/{{ $cost->id }}/edit">
                                            {{ $cost->short_description }}
                                        </a>
                                    </div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $cost->value }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $cost->date_mgr }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $cost->fk_supplier }}</div>
                                </td>                                                                        
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <?php echo $costs->render(); ?>

    @endif


@endsection


