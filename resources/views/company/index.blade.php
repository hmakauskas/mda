@extends('layout/app')

@section('content')

<!-- Current Tasks -->
    @if (isset($companies))
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Companies
            </div>

            {!! Form::open(['method'=>'GET','url'=>'company','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <a href="{{ url('company/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>
             
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" placeholder="Search...">

                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">Search</button>
                </span>

            </div>
            {!! Form::close() !!}

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Company</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                            <tr>
                                <td class="table-text">
                                    <div>Store Name</div>
                                </td>
                                <td class="table-text">
                                    <div>Billing Country</div>
                                </td>
                                <td class="table-text">
                                    <div>Legal Entity name</div>
                                </td>
                                <td class="table-text">
                                    <div>Legal Entity tax register</div>
                                </td> 
                            </tr>
                        @foreach ($companies as $company)
                            <tr>                                
                                <td class="table-text">
                                    <div>
                                        <a href="{{ url('company') .'/'. $company->id }}/edit">
                                            {{ $company->store_name }}
                                        </a>
                                    </div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $company->billing_country }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $company->legal_entity_name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $company->legal_entity_tax_register }}</div>
                                </td>                                                                        
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <?php echo $companies->render(); ?>

    @endif


@endsection


