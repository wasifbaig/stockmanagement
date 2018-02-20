@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Stocktype
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($stocktype, ['route' => ['stocktypes.update', $stocktype->id], 'method' => 'patch']) !!}

                        @include('stocktypes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection