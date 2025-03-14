<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;

trait FilterTrait
{
    /**
     * Search
     * @var string
     */
    #[Validate(['nullable', 'string']), Url(keep: false, except: null, nullable: true)]
    public ?string $search;

    /**
     * Searchable Fields
     * @return void
     */
    abstract public function searchableFields(): array;

    /**
     * Search By
     * @return void
     */
    public function searchBy(): void
    {
    }

    /**
     * Apply Filter
     * @return Builder|Model
     */
    public function applyFilter(): Builder|Model
    {
        $query = $this->modelInstance();

        if (!empty($this->search)) {
            $query = $query
                ->whereRaw(
                    "MATCH(" . implode(', ', $this->searchableFields()) . ") AGAINST(? IN BOOLEAN MODE)",
                    $this->search
                );
        }

        return $query;
    }
}
