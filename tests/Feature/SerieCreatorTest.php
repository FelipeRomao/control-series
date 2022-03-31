<?php

namespace Tests\Feature;

use App\Serie;
use App\Services\SeriesCreator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SerieCreatorTest extends TestCase
{
    use RefreshDatabase;

    public function testSerieCreator()
    {
        $serieCreator = new SeriesCreator();

        $serieName = 'The Vikings';
        $createdSerie = $serieCreator->createSerie($serieName, 12, 4);

        $this->assertInstanceOf(Serie::class, $createdSerie);
        $this->assertDatabaseHas('series', ['name' => $serieName]);
        $this->assertDatabaseHas('seasons', ['serie_id' => $createdSerie->id, 'number' => 1]);
        $this->assertDatabaseHas('episodes', ['number' => 1]);
    }
}
