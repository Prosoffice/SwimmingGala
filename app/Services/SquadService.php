<?php

namespace App\Services;

use App\Repositories\SquadRepository;
use \Illuminate\Database\Eloquent\Collection;

class SquadService
{
    protected SquadRepository $squadRepository;
    public function __construct(SquadRepository $squadRepository)
    {
        $this->squadRepository = $squadRepository;
    }

    public function getSquadList(): Collection
    {
        return $this->squadRepository->getSquadList();
    }
}
