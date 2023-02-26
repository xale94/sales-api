<?php

namespace Tests\Unit\Http\Shop;

use App\Services\Shops\ShopSellProductService;
use Mockery;
use PHPUnit\Framework\TestCase;

class BuyProductTestCase extends TestCase
{

    protected $mock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mock = Mockery::mock('ShopSellProductService')->makePartial();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testEmptyStock(){
        $expected = [
            "status" => false,
            "message" => "You can\'t buy the product. Quantity is bigger than stock"
        ];

        $data = [
            "shop_id" => 2,
            "product_id" => 1,
            "quantity" => 999999999
        ];

        $this->mock->shouldReceive('execute')->withAnyArgs($data)->once()->andReturn($expected);
        $result = $this->mock->execute($data);
        $this->assertEquals($expected, $result);
    }

    public function testValidStock(){
        $expected = [
            "status" => false,
            "message" => "You can buy the product."
        ];

        $data = [
            "shop_id" => 2,
            "product_id" => 1,
            "quantity" => 1
        ];

        $this->mock->shouldReceive('execute')->withAnyArgs($data)->once()->andReturn($expected);
        $result = $this->mock->execute($data);
        $this->assertEquals($expected, $result);
    }
}