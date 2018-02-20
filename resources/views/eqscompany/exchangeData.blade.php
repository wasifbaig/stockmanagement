@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Exchange Data
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(array('url' => '/eqscompany/exchangedata', 'method'=>'get')) !!}

                    <!-- Name Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('exchange_id', 'Exchange:') !!}
                            {!! Form::select('exchange_id', $exchangeList, null, ['class' => 'form-control'] ) !!}
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        </div>

                    {!! Form::close() !!}
                </div>



                    <div class="clearfix"></div>
                    <div class="box box-primary">
                        <div class="box-body">
                            @include('stock_prices.table')
                        </div>
                    </div>



            </div>
        </div>
    </div>
@endsection
