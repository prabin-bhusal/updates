<?php

namespace App\Repositories;

interface EventRepositoryInterface
{
    public function getAllEvents($request);

    public function storeEvent($request);

    public function updateEvent($request, $event);

    public function destroyEvent($event);
}
