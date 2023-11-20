<?php

namespace App\Services\Classes;

use App\Repositories\Classes\EventRepository;
use App\Services\Interfaces\IEventService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EventService
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function findBy(Request $request,$andsFilters=[])
    {
        return $this->eventRepository->findBy($request,$andsFilters);
    }


    public function store($request)
    {
        $this->eventRepository->store($request);
    }


    public function show($id)
    {
        return $this->eventRepository->show($id);
    }

    public function update($request, $id)
    {


        $event = $this->eventRepository->update($request, $id);
        return $event;
    }

    public function destroy($id)
    {
        $this->eventRepository->destroy($id);
    }
}

