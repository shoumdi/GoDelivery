<?php
namespace Core;

final class EventFlow{

    private array $listeners = [];

    public function subscribe(string $class,callable $listener){
        $this->listeners[$class][] = $listener;
    }

    public function emit(object $event){
        $eventClass = $event::class;

        foreach($this->listeners[$eventClass] ?? [] as $listener){
            $listener($event);
        }
    }
}