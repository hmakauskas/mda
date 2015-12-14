@extends('layout/app')

@section('content')

<!-- Current Tasks -->
    @if (isset($suppliers))
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Supplier Branches
            </div>

            {!! Form::open(['method'=>'GET','url'=>'supplierbranch','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <a href="{{ url('supplierbranch/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>
             
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
                                    <div>Supplier</div>
                                </td>
                                <td class="table-text">
                                    <div>Fiscal ID </div>
                                </td>
                                <td class="table-text">
                                    <div>Country</div>
                                </td>
                                <td class="table-text">
                                    <div>&nbsp;</div>
                                </td>                                                                
                            </tr>
                        @foreach ($suppliers as $supplier)
                            @foreach ($supplier->supplierBranches as $supplierBranch)
                                <tr> 
                                    <td class="table-text">
                                        <div>
                                            <a href="{{ url('supplierbranch') .'/'. $supplierBranch->id }}/edit">
                                                {{ $supplier->supplier_name }}
                                            </a>
                                        </div>
                                    </td>                                                               
                                    <td class="table-text">
                                        <div>
                                            <a href="{{ url('supplierbranch') .'/'. $supplierBranch->id }}/edit">
                                                {{ $supplierBranch->fiscal_id }}
                                            </a>
                                        </div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $supplierBranch->country }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>&nbsp;</div>
                                    </td>
                                    <td class="table-text">
                                        <div>&nbsp;</div>
                                    </td>                                  
                                </tr>
                            @endforeach        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <?php echo $suppliers->render(); ?>

    @endif


@endsection


