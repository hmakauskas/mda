@extends('layout/app')

@section('content')


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
    <form action="/laravel5/public/cost" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        @if (isset($cost[0]->id))
            {{ method_field('PUT') }}
        @endif

        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Descrição</label>

            <div class="col-sm-6">
                <input type="text" name="short_description" id="cost-short_description" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Descrição 2</label>

            <div class="col-sm-6">
                <input type="text" name="desciption" id="cost-desciption" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Valor</label>

            <div class="col-sm-6">
                <input type="text" name="value" id="cost-value" class="form-control">
            </div>
        </div>

         <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Fiscal Document</label>

            <div class="col-sm-6">
                <input type="text" name="fk_fiscal_document" id="cost-fk_fiscal_document" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Supplier</label>

            <div class="col-sm-6">
                <input type="text" name="fk_supplier" id="cost-fk_supplier" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Currency</label>

            <div class="col-sm-6">
                <input type="text" name="fk_currency" id="cost-fk_currency" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Company</label>
            <div class="col-sm-6">
                {!! 
                    Form::select(   
                        'fk_company', 
                        (['0' => 'Select a Company'] + $companies), 
                        null, 
                        ['class' => 'form-control']
                    ) 
                !!}
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Marketing Channel</label>

            <div class="col-sm-6">
                <input type="text" name="fk_marketing_channel" id="cost-fk_marketing_channel" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Category</label>

            <div class="col-sm-6">
                <input type="text" name="fk_category" id="cost-fk_category" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Status</label>

            <div class="col-sm-6">
                <input type="text" name="fk_cost_status" id="cost-fk_cost_status" class="form-control">
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Cost
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Current Tasks -->
    @if (isset($costs))
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Fiscal Documents
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Cost</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($costs as $cost)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $cost->short_description }}</div>
                                </td>

                                <td>
                                    <tr>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div>{{ $cost->short_description }}</div>
                                        </td>

                                        <!-- Delete Button -->
                                        <td>
                                            <form action="/task/{{ $task->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button>Delete Cost</button>
                                            </form>
                                        </td>
                                    </tr>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


@endsection


