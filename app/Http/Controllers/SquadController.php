<?php

namespace App\Http\Controllers;
use App\Services\SquadService;
use \Illuminate\Database\Eloquent\Collection;

class SquadController
{
    protected SquadService $squadService;
    public function __construct(SquadService $squadService)
    {
        $this->squadService = $squadService;
    }

    public function getSquadList(): Collection
    {
        return $this->squadService->getSquadList();
    }
}
