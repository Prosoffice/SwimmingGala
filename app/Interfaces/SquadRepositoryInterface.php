<?php

namespace App\Interfaces;

use App\Models\Squad;

interface SquadRepositoryInterface
{
    public function getSquadList();
    public function createSquad();
}
