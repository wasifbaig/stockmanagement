<table class="table table-responsive" id="stocktypes-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($stocktypes as $stocktype)
        <tr>
            <td>{!! $stocktype->name !!}</td>
            <td>
                {!! Form::open(['route' => ['stocktypes.destroy', $stocktype->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('stocktypes.show', [$stocktype->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('stocktypes.edit', [$stocktype->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>