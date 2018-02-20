<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Models\Company;
use App\Models\Exchange;
use App\Models\Stocktype;


class EqsTest extends TestCase
{
    /**
     * http test
     *
     * @return void
     */
    public function testLoginPage()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }


    public function testCreateUser()
    {

        $user = factory(User::class)->create();

        $this->assertArrayHasKey('id', $user);

    }


    public function testCreateCompany()
    {

        $company = Company::create(['name'=>'test']);

        $this->assertArrayHasKey('id', $company);

    }

    public function testCreateExchange()
    {

        $exchange = Exchange::create(['name'=>'test']);

        $this->assertArrayHasKey('id', $exchange);

    }

    public function testCreateStocktype()
    {

        $stocktype = Stocktype::create(['name'=>'test']);

        $this->assertArrayHasKey('id', $stocktype);

    }




}
