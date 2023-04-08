<?php

namespace App\Repositories;

use App\Interfaces\SquadRepositoryInterface;
use App\Models\Squad;
use \Illuminate\Database\Eloquent\Collection;

class SquadRepository implements SquadRepositoryInterface
{
    public function getSquadList(): Collection
    {
        return Squad::all();
    }

    public function createSquad()
    {
        // TODO: Implement createSquad() method.
    }
}
