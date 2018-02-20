@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Exchange
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($exchange, ['route' => ['exchanges.update', $exchange->id], 'method' => 'patch']) !!}

                        @include('exchanges.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection