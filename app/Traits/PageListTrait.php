<?php

namespace App\Traits;

trait PageListTrait
{
    use FilterTrait, \Livewire\WithPagination;

    /**
     * Limit
     * @var int
     */
    public int $limit = 5;

    /**
     * Model Instance
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
     */
    abstract public function modelInstance(): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder;

    /**
     * Get Items
     * @return mixed
     */
    public function getItems(): mixed
    {
        return $this->modelInstance()->paginate($this->limit);
    }
}
