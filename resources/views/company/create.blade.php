@extends('layout/app')

@section('content')


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form 
    <form action="company" method="POST" class="form-horizontal">
    -->

    {!! Form::open(['method'=>'POST','url'=>'company','class'=>'form-horizontal'])  !!}

        {{ csrf_field() }}

        @if (isset($company->id))
            {{ method_field('PUT') }}
        @endif

        <input type="hidden" name="id" value="{{ $company->id or '' }}">

        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Store Name</label>

            <div class="col-sm-6">
                <input type="text" name="store_name" id="company-store_name" value="{{ $company->store_name or '' }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Billing Country</label>

            <div class="col-sm-6">
                <input type="text" name="billing_country" id="company-billing_country" value="{{ $company->billing_country or '' }}" class="form-control">                  
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Legal Entity Name</label>

            <div class="col-sm-6">
                <input type="text" name="legal_entity_name" value="{{ $company->legal_entity_name or '' }}" id="company-legal_entity_name" class="form-control">
            </div>
        </div>

         <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Legal Entity tax register</label>

            <div class="col-sm-6">
                <input type="text" name="legal_entity_tax_register" value="{{ $company->legal_entity_tax_register or '' }}" id="company-legal_entity_tax_register" class="form-control">
            </div>
        </div>
        
        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Save Company
                </button>
            </div>
        </div>
    {!! Form::close() !!}
</div>

@endsection