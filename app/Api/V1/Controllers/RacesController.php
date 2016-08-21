<?php

namespace App\Api\V1\Controllers;

use App\Race;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Api\V1\Transformers\RacesTransformer;

/**
 * @Resource('Races', uri='/races')
 */
class RacesController extends BaseController
{
  public function index()
  {
    $races = Race::all();

    return $this->collection($races, new RacesTransformer);
  }

  public function show($id)
  {
    $race = Race::where('id', $id)->first();

    if ($race) {
      return $this->item($race, new RacesTransformer);
    }

    return $this->response->errorNotFound();
  }

  public function store(Requests\StoreRaceRequest $request)
  {
    if (Race::Create($request->all())) {
      return $this->response->created();
    }

    return $this->response->errorBadRequest();
  }

}
