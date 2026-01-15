<?php
class Reservation
{

    public function __construct(
        private int $id,
        private array $books,
        private DateTime $createdAt,
    ) {}
}
