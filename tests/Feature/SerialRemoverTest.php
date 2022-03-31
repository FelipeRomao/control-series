<?php

namespace Tests\Feature;

use App\Services\SerialRemover;
use App\Services\SeriesCreator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SerialRemoverTest extends TestCase
{
    use RefreshDatabase;

    /** @var  Serie */
    private $serie;

    protected function setUp(): void
    {
        parent::setUp();
        $serieCreator = new SeriesCreator();
        $this->serie = $serieCreator->createSerie('Teen Wolf', 4, 2);
    }

    public function testExample()
    {
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);

        $serialRemove = new SerialRemover();
        $serieName = $serialRemove->removeSerie($this->serie->id);

        $this->assertIsString($serieName);
        $this->assertEquals('Teen Wolf', $this->serie->name);
        $this->assertDatabaseMissing('series', ['id'=> $this->serie->id]);
    }
}
