<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RacesTest extends TestCase
{
  use DatabaseMigrations;

  /**
  * @test
  *
  * Test: GET /api.
  */
  public function it_fetches_races()
  {
    $this->seed('RacesTableSeeder');

    $this->get('/api/races')
        ->seeJsonStructure([
          'data' => [
            '*' => [
              'name', 'description', 'date', 'time', 'venue', 'circuit', 'weather', 'photo'
            ]
          ]
        ]);
  }

  /**
   * @test
   *
   * Test: GET api/races/1
   */
  function it_fetches_a_single_race()
  {
    $this->seed('RacesTableSeeder');

    $this->get('/api/races/1')
      ->seeJsonStructure([
        'data' => [
          'id', 'name'
        ]
      ]);
  }

}
