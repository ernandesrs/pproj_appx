<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Url;

trait FilterTrait
{
    /**
     * Default Between Dates Fields
     * @var array
     */
    public array $defaultBetweenDatesFields = ['created_at'];

    /**
     * Default Sortable Fields
     * @var array
     */
    public array $defaultSortableFields = ['id', 'created_at'];

    /**
     * Search
     * @var string
     */
    #[Url(keep: false, except: null, nullable: true)]
    public ?string $search = null;

    /**
     * Between
     * @var array
     */
    public array $between = [];

    /**
     * Sort by field
     * @var ?string
     */
    public ?string $sort_by = 'created_at';

    /**
     * Sort direction
     * @var ?string
     */
    public ?string $sort_direction = 'desc';

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
     * Apply Filters
     * @return void
     */
    public function applyFilters(): void
    {
    }

    /**
     * Apply Filter
     * @return Builder|Model
     */
    public function applyFilter(): Builder|Model
    {
        $query = $this->modelInstance();

        $validated = \Validator::make([
            'search' => $this->search,
            'between' => $this->between,
            'sort_by' => $this->sort_by,
            'sort_direction' => $this->sort_direction,
        ], [
            'search' => ['nullable', 'string'],
            'between.*.start' => ['nullable', 'date'],
            'between.*.end' => ['nullable', 'date'],
            'sort_by' => ['nullable', \Illuminate\Validation\Rule::in($this->defaultSortableFields)],
            'sort_direction' => ['nullable', \Illuminate\Validation\Rule::in(['asc', 'desc'])],
        ])->validated();

        if (!empty($validated['search'])) {
            $query = $query
                ->whereRaw(
                    "MATCH(" . implode(', ', $this->searchableFields()) . ") AGAINST(? IN BOOLEAN MODE)",
                    $validated['search']
                );
        }

        if (count($validated['between'] ?? [])) {
            foreach ($validated['between'] as $key => $values) {
                $query = $query->whereBetween($key, [$values['start'], $values['end']]);
            }
        }

        if (isset($validated['sort_by']) && isset($validated['sort_direction'])) {
            $query = $query->orderBy($validated['sort_by'], $validated['sort_direction']);
        }

        return $query;
    }


    /**
     *
     *
     *  Getters
     *
     *
     */

    /**
     * Get Filter Fields BetweenDates
     * @return array
     */
    public function getFilterFieldsBetweenDates(): array
    {
        return array_merge($this->defaultBetweenDatesFields, []);
    }

    /**
     * Get Filter Fields Sortables
     * @return array
     */
    public function getFilterFieldsSortables(): array
    {
        return array_merge($this->defaultSortableFields, []);
    }
}
