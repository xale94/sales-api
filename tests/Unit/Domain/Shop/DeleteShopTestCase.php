<?php

namespace Tests\Unit\Domain\Shop;

use App\Domain\Shop;
use App\Infraestructure\Repositories\Shop\ShopRepository;
use Mockery;
use PHPUnit\Framework\TestCase;

class DeleteShopTestCase extends TestCase
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

    public function testDeleteShop(){
        $deleteId = 6;

        $this->mock->shouldReceive('delete')->withAnyArgs($deleteId)->once();
        $result = $this->mock->delete($deleteId);
        $this->assertIsBool($result);
    }
}