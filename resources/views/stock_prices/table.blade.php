<table class="table table-responsive" id="stockPrices-table">
    <thead>
        <tr>
            <th>Company</th>
            <th>Exchange</th>
            <th>Stock Type</th>
            <th>Price enter date</th>
            <th>price enter time</th>
            <th>Price</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($stockPrices as $stockPrice)
        <tr>
            <td>{!! $stockPrice->company->name !!}</td>
            <td>{!! $stockPrice->exchange->name !!}</td>
            <td>{!! $stockPrice->stocktype->name !!}</td>
            <td>{!! date('d.m.Y',strtotime($stockPrice->created_at))  !!}</td>
            <td>{!! date('H:i:s',strtotime($stockPrice->created_at)) !!}</td>
            <td>{!! $stockPrice->price !!}</td>
            <td>
                {!! Form::open(['route' => ['stockPrices.destroy', $stockPrice->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('stockPrices.show', [$stockPrice->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('stockPrices.edit', [$stockPrice->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>