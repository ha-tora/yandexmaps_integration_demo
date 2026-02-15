<?php

namespace App\Shared\Domain\Entities;

/**
 * @template TEntity
 */
class Pagination
{
    public ?int $prevPage = null;
    public ?int $nextPage = null;
    public ?int $firstPage = null;

    public function __construct(
        /**
         * @var TEntity[] $items;
         */
        public array $items,
        public int $perPage,
        public ?int $currentPage,
        public ?int $lastPage = null,
        public ?int $count = null,
    ) {
        $this->prevPage = ($this->currentPage > 1) ? $this->currentPage - 1 : null;
        $this->nextPage = ($this->currentPage < $this->lastPage) ? $this->currentPage + 1 : null;
        $this->firstPage = ($this->count) ? 1 : null;
    }
}