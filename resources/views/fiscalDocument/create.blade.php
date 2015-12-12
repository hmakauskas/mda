@extends('layout/app')

@section('content')


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
    <form action="<?=url('fiscalDocument')?>" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        @if (isset($fiscalDocument[0]->id))
            {{ method_field('PUT') }}
        @endif

        <input type="hidden" name="id" value="{{ $fiscalDocument[0]->id or '' }}">

        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Fiscal Document</label>

            <div class="col-sm-6">
                <input type="text" name="fiscal_document_number" id="fiscalDocument-name" value="{{ $fiscalDocument[0]->fiscal_document_number or '' }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Valor</label>

            <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon">$</span>
                  <input type="text" name="value" id="fiscalDocument-value" value="{{ $fiscalDocument[0]->value or '' }}" class="form-control">                  
                </div>                
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Branch</label>

            <div class="col-sm-6">
                <input type="text" name="fk_supplier_branch" value="{{ $fiscalDocument[0]->fk_supplier_branch or '' }}" id="fiscalDocument-fk_supplier_branch" class="form-control">
            </div>
        </div>

         <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Currency</label>

            <div class="col-sm-6">
                <input type="text" name="fk_currency" value="{{ $fiscalDocument[0]->fk_currency or '' }}" id="fiscalDocument-fk_currency" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Company</label>
            <div class="col-sm-6">
                {!! 
                    Form::select(   
                        'fk_company', 
                        (['0' => 'Select a Company'] + $companies), 
                        (isset($fiscalDocument[0]->fk_company) ? $fiscalDocument[0]->fk_company : null), 
                        ['class' => 'form-control']
                    ) 
                !!}
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Status</label>

            <div class="col-sm-6">
                <input type="text" name="fk_fiscal_document_status" value="{{ $fiscalDocument[0]->fk_fiscal_document_status or '' }}" id="fiscalDocument-fk_fiscal_document_status" class="form-control">
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Save Fiscal Document
                </button>
            </div>
        </div>
    </form>
</div>

@endsection