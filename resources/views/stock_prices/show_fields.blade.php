<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $stockPrice->id !!}</p>
</div>

<!-- Company Id Field -->
<div class="form-group">
    {!! Form::label('company_id', 'Company Id:') !!}
    <p>{!! $stockPrice->company->name !!}</p>
</div>

<!-- Exchange Id Field -->
<div class="form-group">
    {!! Form::label('exchange_id', 'Exchange Id:') !!}
    <p>{!! $stockPrice->exchange->name !!}</p>
</div>

<!-- Stock Id Field -->
<div class="form-group">
    {!! Form::label('stock_id', 'Stock Type:') !!}
    <p>{!! $stockPrice->stocktype->name !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{!! $stockPrice->price !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $stockPrice->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $stockPrice->updated_at !!}</p>
</div>

