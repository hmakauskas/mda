@extends('layout/app')

@section('content')


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form 
    <form action="supplier" method="POST" class="form-horizontal">
    -->

    {!! Form::open(['method'=>'POST','url'=>'supplier','class'=>'form-horizontal'])  !!}

        {{ csrf_field() }}

        @if (isset($supplier->id))
            {{ method_field('PUT') }}
        @endif

        <input type="hidden" name="id" value="{{ $supplier->id or '' }}">

        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Supplier Name</label>

            <div class="col-sm-6">
                <input type="text" name="supplier_name" id="supplier-supplier_name" value="{{ $supplier->supplier_name or '' }}" class="form-control">
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