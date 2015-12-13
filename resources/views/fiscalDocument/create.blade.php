@extends('layout/app')

@section('content')


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form 
    <form action="fiscalDocument" method="POST" class="form-horizontal">
    -->

    {!! Form::open(['method'=>'POST','url'=>'fiscalDocument','class'=>'form-horizontal','files' => true])  !!}

        {{ csrf_field() }}

        @if (isset($fiscalDocument->id))
            {{ method_field('PUT') }}
        @endif

        <input type="hidden" name="id" value="{{ $fiscalDocument->id or '' }}">

        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Fiscal Document</label>

            <div class="col-sm-6">
                <input type="text" name="fiscal_document_number" id="fiscalDocument-name" value="{{ $fiscalDocument->fiscal_document_number or '' }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Value</label>

            <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon">$</span>
                  <input type="text" name="value" id="fiscalDocument-value" value="{{ $fiscalDocument->value or '' }}" class="form-control">                  
                </div>                
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Branch</label>

            <div class="col-sm-6">
                <input type="text" name="fk_supplier_branch" value="{{ $fiscalDocument->fk_supplier_branch or '' }}" id="fiscalDocument-fk_supplier_branch" class="form-control">
            </div>
        </div>

         <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Currency</label>

            <div class="col-sm-6">
                <input type="text" name="fk_currency" value="{{ $fiscalDocument->fk_currency or '' }}" id="fiscalDocument-fk_currency" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Company</label>
            <div class="col-sm-6">
                {!! 
                    Form::select(   
                        'fk_company', 
                        (['0' => 'Select a Company'] + $companies), 
                        (isset($fiscalDocument->fk_company) ? $fiscalDocument->fk_company : null), 
                        ['class' => 'form-control']
                    ) 
                !!}
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Status</label>

            <div class="col-sm-6">
                <input type="text" name="fk_fiscal_document_status" value="{{ $fiscalDocument->fk_fiscal_document_status or '' }}" id="fiscalDocument-fk_fiscal_document_status" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">File</label>

            <div class="col-sm-6">
                {!! Form::file('file', null, array('class' => 'form-control')) !!}
            </div>
        </div>

        @if (isset($fiscalDocument->filename))
            @if (File::exists(base_path() . '/public/files/fiscal_documents/', $fiscalDocument->filename))
                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">File added</label>

                    <div class="col-sm-6">
                        <a href="{{ url('files/fiscal_documents') .'/'.  $fiscalDocument->filename }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-file"></span>
                            Download
                        </a>
                    </div>
                </div>
            @endif
        @endif

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Save Fiscal Document
                </button>
            </div>
        </div>
    {!! Form::close() !!}
</div>

@endsection