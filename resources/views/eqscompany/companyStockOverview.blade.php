@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Company Stock Overview</h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>



                @foreach($companyStockList as $companyStock)

                    <div class="box box-primary">
                        <div class="box-body">

                            <table class="table table-responsive" id="exchanges-table">
                                <thead>
                                <tr>
                                    <th colspan="2">{!! $companyStock['company']->name !!} <br/> {!! $companyStock['stockType']->name !!}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companyStock['stockPriceData'] as $stockPriceData)
                                    <tr>
                                        <td>{!! $stockPriceData->exchange->name !!}</td>
                                        <td>{!! $stockPriceData->price !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                @endforeach





        </div>
    </div>
@endsection