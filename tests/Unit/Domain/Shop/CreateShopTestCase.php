<?php

namespace Tests\Unit\Domain\Shop;

use App\Domain\Shop;
use App\Infraestructure\Repositories\Shop\ShopRepository;
use Mockery;
use PHPUnit\Framework\TestCase;

class CreateShopTestCase extends TestCase
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

    public function testCreateShop(){
        $newShop = [
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

        $created = new Shop($newShop);
        $this->mock->shouldReceive('create')->withAnyArgs($newShop)->once()->andReturn($created);
        $result = $this->mock->create($newShop);
        $this->assertEquals($result, $created);
    }
}