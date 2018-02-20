@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Stock Price
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($stockPrice, ['route' => ['stockPrices.update', $stockPrice->id], 'method' => 'patch']) !!}

                        @include('stock_prices.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection