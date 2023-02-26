<?php

namespace Tests\Unit\Domain\Shop;

use App\Domain\Shop;
use App\Infraestructure\Repositories\Shop\ShopRepository;
use Mockery;
use PHPUnit\Framework\TestCase;

class ReadShopTestCase extends TestCase
{
    protected $repo;    
    protected $mock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mock = Mockery::mock(ShopRepository::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testReadSpecificShop(){
        $id = 7;
        $data = [
            'id' => 7,
            'name' => 'Tienda A',
            'products' => [
                [
                    'id' => 1,
                    'name' => 'Set de manteles',
                    'quantity' => 20
                ],
                [
                    'id' => 2,
                    'name' => 'Estantería',
                    'quantity' => 3
                ],
                [
                    'id' => 3,
                    'name' => 'Armario',
                    'quantity' => 2
                ]
            ]
        ];
        $expected = new Shop($data);
        $this->mock->shouldReceive('find')->withAnyArgs($id)->once()->andReturn($expected);
        $result = $this->mock->find($id);
        $this->assertInstanceOf(Shop::class, $result);
    }

    public function testReadAllShops(){
        $this->mock->shouldReceive('findAll')->once();
        $result = $this->mock->findAll();
        $this->assertIsObject($result);
    }
}