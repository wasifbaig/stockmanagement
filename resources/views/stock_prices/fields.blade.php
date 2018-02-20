<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company:') !!}
    {!! Form::select('company_id', $companyList, null, ['class' => 'form-control'] ) !!}
</div>

<!-- Exchange Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('exchange_id', 'Exchange:') !!}
    {!! Form::select('exchange_id', $exchangeList, null, ['class' => 'form-control'] ) !!}
</div>


<!-- Stock type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stocktype_id', 'Stock type:') !!}
    {!! Form::select('stocktype_id', $stocktypeList, null, ['class' => 'form-control'] ) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('stockPrices.index') !!}" class="btn btn-default">Cancel</a>
</div>
