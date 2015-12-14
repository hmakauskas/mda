@extends('layout/app')

@section('content')

<!-- Current Tasks -->
    @if (isset($suppliers))
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Suppliers
            </div>

            {!! Form::open(['method'=>'GET','url'=>'supplier','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <a href="{{ url('supplier/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>
             
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
                                    <div>Supplier Name</div>
                                </td>
                                <td class="table-text">
                                    <div>&nbsp;</div>
                                </td>
                                <td class="table-text">
                                    <div>&nbsp;</div>
                                </td>
                                <td class="table-text">
                                    <div>&nbsp;</div>
                                </td>                                
                            </tr>
                        @foreach ($suppliers as $supplier)
                            <tr>                                
                                <td class="table-text">
                                    <div>
                                        <a href="{{ url('supplier') .'/'. $supplier->id }}/edit">
                                            {{ $supplier->supplier_name }}
                                        </a>
                                    </div>
                                </td>
                                <td class="table-text">
                                    <div>&nbsp;</div>
                                </td>
                                <td class="table-text">
                                    <div>&nbsp;</div>
                                </td>
                                <td class="table-text">
                                    <div>&nbsp;</div>
                                </td>                                  
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <?php echo $suppliers->render(); ?>

    @endif


@endsection


