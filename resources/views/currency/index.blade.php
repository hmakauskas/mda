@extends('layout/app')

@section('content')

<center>
    <h2>Currencies</h2>    
</center> 

<!-- Current Tasks -->
    @if (isset($currencies))
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Currencies
            </div>

            {!! Form::open(['method'=>'GET','url'=>'currency','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <a href="{{ url('currency/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>
             
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
                                    <div>Code</div>
                                </td>
                                <td class="table-text">
                                    <div>Symbol</div>
                                </td>
                                <td class="table-text">
                                    <div>Name</div>
                                </td>
                                <td class="table-text">
                                    <div>Country</div>
                                </td> 
                            </tr>
                        @foreach ($currencies as $currency)
                            <tr>                                
                                <td class="table-text">
                                    <div>
                                        <a href="{{ url('currency') .'/'. $currency->id }}/edit">
                                            {{ $currency->currency_code }}
                                        </a>
                                    </div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $currency->currency_symbol }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $currency->currency_name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $currency->country }}</div>
                                </td>                                                                        
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <?php echo $currencies->render(); ?>

    @endif


@endsection


