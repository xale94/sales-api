<?php

namespace Tests\Unit\Domain\Shop;

use App\Domain\Shop;
use App\Infraestructure\Repositories\Shop\ShopRepository;
use Mockery;
use PHPUnit\Framework\TestCase;

class UpdateShopTestCase extends TestCase
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

    public function testUpdateShop(){
        $updatedShop = [
            'id' => 7,
            'name' => 'Tienda A',
            'products' => [
                [
                    'id' => 1,
                    'name' => 'Set de manteles',
                    'quantity' => 3
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

        $updated = new Shop($updatedShop);
        $this->mock->shouldReceive('create')->withAnyArgs($updatedShop['id'], $updatedShop)->once()->andReturn($updated);
        $result = $this->mock->create($updatedShop);
        $this->assertEquals($result, $updated);
    }
}