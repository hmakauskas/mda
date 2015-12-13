@extends('layout/app')

@section('content')

<!-- Current Tasks -->
    @if (isset($fiscalDocuments))
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="label label-primary">1</span> <b> - {{ trans('messages.joincosts_selectvariables') }}</b>
            </div>

            <div class="panel-body">

                {!! Form::open(['method'=>'GET','url'=>'joincosts','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
                    {!! 
                        Form::select(   
                            'fk_supplier_branch', 
                            (['0' => 'Select a Supplier Branch'] + $sbranches), 
                            null,  
                            ['class' => 'form-control']
                        ) 
                    !!}

                    {!! 
                        Form::select(   
                            'fk_channel', 
                            (['0' => 'Select a Channel'] + $channels), 
                            null,  
                            ['class' => 'form-control']
                        ) 
                    !!}

                    {!! 
                        Form::select(   
                            'fk_company', 
                            (['0' => 'Select a Company'] + $companies), 
                            (isset($cost->fk_company) ? $cost->fk_company : null),  
                            ['class' => 'form-control']
                        ) 
                    !!}
                 
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" id="from" name="from">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar">
                        </span>
                    </span>
                    <input type="text" class="form-control" id="to" name="to">
                </div>

                <button type="submit" class="btn btn-default navbar-btn"><i class="fa fa-filter"></i>&nbsp;Filtrar</button>

                {!! Form::close() !!}
            </div>
        </div>
        @endif

        {!! Form::open(['method'=>'POST','url'=>'joincosts'])  !!}

        <div class="panel panel-default">
          <div class="panel-heading"><span class="label label-primary">2</span> <b> - Select the Fiscal Document</b></div>
          <div class="panel-body">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" id="datepicker" placeholder="Search by Date...">

                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-plus">
                    </span>
                </span>

                <input type="text" class="form-control" name="search" placeholder="Search by document number...">
            </div>
            <br />
            <table class="table table-striped task-table">
                <!-- Table Body -->
                <tbody>
                        <tr>
                            <td class="table-text">
                                <div>#</div>
                            </td>
                            <td class="table-text">
                                <div>Document Number</div>
                            </td>
                            <td class="table-text">
                                <div>Value</div>
                            </td>
                            <td class="table-text">
                                <div>Date</div>
                            </td>
                            <td class="table-text">
                                <div>Supplier Branch</div>
                            </td> 
                        </tr>
                    @foreach ($fiscalDocuments as $fiscalDocument)
                        <tr>
                            <td class="table-text">
                                <div>{!! Form::radio('fiscalDocument_id', $fiscalDocument->id ) !!}</div>
                            </td>                                
                            <td class="table-text">
                                <div>
                                    <a href="/laravel5/public/fiscalDocument/{{ $fiscalDocument->id }}/edit">
                                        {{ $fiscalDocument->fiscal_document_number }}
                                    </a>
                                </div>
                            </td>
                            <td class="table-text">
                                <div>{{ $fiscalDocument->value }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $fiscalDocument->created_at }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $fiscalDocument->fk_supplier_branch }}</div>
                            </td>                                                                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading"><span class="label label-primary">3</span> <b> - Select the Costs</b></div>
          <div class="panel-body">
            <table class="table table-striped task-table">
                    <tbody>
                            <tr>
                                <td class="table-text">
                                    <div>#</div>
                                </td>
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
                                    <div>{!! Form::checkbox('cost_ids[]', $cost->id ) !!}</div>
                                </td>                               
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

        <div class="panel panel-default">
          <div class="panel-heading"><span class="label label-primary">4</span> <b> - Save</b></div>
          <div class="panel-body">
                <div class="form-group">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-thumbs-up"></i> Click here to save
                    </button>                
                </div>
          </div>
        </div>
    {!! Form::close() !!}
        
           


@endsection


