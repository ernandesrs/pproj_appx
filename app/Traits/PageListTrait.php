<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

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
    abstract public function modelInstance(): Model|Builder;

    /**
     * Columns
     * @return array
     */
    abstract public function columns(): array;

    /**
     * Get Items
     * @return mixed
     */
    public function getItems(): mixed
    {
        return $this->modelInstance()->paginate($this->limit);
    }
}
