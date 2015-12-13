@extends('layout/app')

@section('content')


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form 
    <form action="supplierBranch" method="POST" class="form-horizontal">
    -->

    {!! Form::open(['method'=>'POST','url'=>'supplierbranch','class'=>'form-horizontal'])  !!}

        {{ csrf_field() }}

        @if (isset($supplierBranch->id))
            {{ method_field('PUT') }}
        @endif

        <input type="hidden" name="id" value="{{ $supplierBranch->id or '' }}">

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Supplier</label>
            <div class="col-sm-6">
                {!! 
                    Form::select(   
                        'supplier_id', 
                        (['0' => 'Select a Supplier'] + $suppliers), 
                        (isset($supplierBranch->supplier_id) ? $supplierBranch->supplier_id : null), 
                        ['class' => 'form-control']
                    ) 
                !!}
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Fiscal ID</label>

            <div class="col-sm-6">
                <input type="text" name="fiscal_id" id="supplierBranch-fiscal_id" value="{{ $supplierBranch->fiscal_id or '' }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Country</label>

            <div class="col-sm-6">
                <input type="text" name="country" id="supplierBranch-country" value="{{ $supplierBranch->country or '' }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Save Supplier
                </button>
            </div>
        </div>
    {!! Form::close() !!}
</div>

@endsection