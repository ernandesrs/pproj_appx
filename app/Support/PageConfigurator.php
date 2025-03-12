<?php

namespace App\Support;

use Illuminate\Support\Collection;

class PageConfigurator
{
    private bool $withoutTitle;

    private string $title;

    private Collection $breadcrumbs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->withoutTitle = false;
        $this->title = '';
        $this->breadcrumbs = Collection::make([]);
    }

    /**
     * Start
     * @return PageConfigurator
     */
    public static function start(): PageConfigurator
    {
        return new PageConfigurator();
    }

    /**
     * Without Title
     * @return PageConfigurator
     */
    public function withoutTitle(): PageConfigurator
    {
        $this->withoutTitle = true;
        return $this;
    }

    /**
     * Add Title
     * @param string $title
     * @return PageConfigurator
     */
    public function addTitle(string $title): PageConfigurator
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Add Breadcrumb
     * @param string $label
     * @param string $href
     * @param bool $active
     * @return PageConfigurator
     */
    public function addBreadcrumb(string $label, string $href, bool $active = false): PageConfigurator
    {
        $this->breadcrumbs->push(
            Collection::make([
                'label' => $label,
                'href' => $href,
                'active' => $active,
            ])
        );
        return $this;
    }

    /**
     * Is Without Title
     * @return bool
     */
    public function isWithoutTitle(): bool
    {
        return $this->withoutTitle;
    }

    /**
     * Get Title
     * @return string
     */
    public function getTitle(): string
    {
        return empty($this->title) ? 'Untitled page' : $this->title;
    }

    /**
     * Get Breadcrumbs
     * @return Collection
     */
    public function getBreadcrumbs(): Collection
    {
        return $this->breadcrumbs;
    }
}
