<?php

use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\Exchange;
use App\Models\Stocktype;
use App\Models\StockPrice;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        // User data
        User::create(['name'=>'Admin','email'=>'admin@eqs.com','password'=>bcrypt('admin')]);

        // Exchange Data
        $exchanges = [];
        array_push($exchanges,['name'=>'New York Stock Exchange', 'created_at'=>$now, 'updated_at'=>$now]);
        array_push($exchanges,['name'=>'London Stock Exchange', 'created_at'=>$now, 'updated_at'=>$now]);
        array_push($exchanges,['name'=>'Hong Kong Stock Exchange', 'created_at'=>$now, 'updated_at'=>$now]);
        array_push($exchanges,['name'=>'Shanghai Stock Exchange', 'created_at'=>$now, 'updated_at'=>$now]);
        array_push($exchanges,['name'=>'Deutsche Börse Frankfurt', 'created_at'=>$now, 'updated_at'=>$now]);
        Exchange::insert($exchanges);

        // Stock Type data
        $stocktypes = [];
        array_push($stocktypes,['name'=>'Common stock', 'created_at'=>$now, 'updated_at'=>$now]);
        array_push($stocktypes,['name'=>'Preferred stock', 'created_at'=>$now, 'updated_at'=>$now]);
        Stocktype::insert($stocktypes);

        // Company data
        $companies = [];
        array_push($companies,['name'=>'Kiveo AG', 'created_at'=>$now, 'updated_at'=>$now]);
        array_push($companies,['name'=>'Metadeo AG', 'created_at'=>$now, 'updated_at'=>$now]);
        Company::insert($companies);


        // Stock price data
        $stockPrices = [];
        array_push($stockPrices,['company_id'=>1, 'exchange_id'=>1, 'stocktype_id'=>2, 'price'=>12.66, 'created_at'=>$now, 'updated_at'=>$now]);
        array_push($stockPrices,['company_id'=>1, 'exchange_id'=>2, 'stocktype_id'=>2, 'price'=>12.62, 'created_at'=>$now, 'updated_at'=>$now]);
        array_push($stockPrices,['company_id'=>1, 'exchange_id'=>3, 'stocktype_id'=>2, 'price'=>12.69, 'created_at'=>$now, 'updated_at'=>$now]);
        array_push($stockPrices,['company_id'=>1, 'exchange_id'=>4, 'stocktype_id'=>2, 'price'=>12.58, 'created_at'=>$now, 'updated_at'=>$now]);
        array_push($stockPrices,['company_id'=>1, 'exchange_id'=>1, 'stocktype_id'=>1, 'price'=>11.66, 'created_at'=>$now, 'updated_at'=>$now]);
        array_push($stockPrices,['company_id'=>1, 'exchange_id'=>2, 'stocktype_id'=>1, 'price'=>12.62, 'created_at'=>$now, 'updated_at'=>$now]);
        array_push($stockPrices,['company_id'=>2, 'exchange_id'=>1, 'stocktype_id'=>1, 'price'=>24.16, 'created_at'=>$now, 'updated_at'=>$now]);
        array_push($stockPrices,['company_id'=>2, 'exchange_id'=>2, 'stocktype_id'=>1, 'price'=>24.20, 'created_at'=>$now, 'updated_at'=>$now]);
        array_push($stockPrices,['company_id'=>2, 'exchange_id'=>3, 'stocktype_id'=>1, 'price'=>24.14, 'created_at'=>$now, 'updated_at'=>$now]);

        StockPrice::insert($stockPrices);


    }
}
