<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class AppNavigation extends Component
{
    public array $links;

    public function __construct()
    {
        $this->links = [
            [
                'name' => 'Dashboard',
                'href' => '/dashboard',
                'isCurrent' => Request::routeIs('dashboard*'),
            ],
            [
                'name' => 'Contests',
                'href' => '/contests',
                'isCurrent' => Request::routeIs('contests*'),
            ],
            [
                'name' => 'Questions',
                'href' => '/questions',
                'isCurrent' => Request::routeIs('questions*'),
            ],
            [
                'name' => 'Tags',
                'href' => '/tags',
                'isCurrent' => Request::routeIs('tags*'),
            ],
            [
                'name' => 'Settings',
                'href' => '/settings',
                'isCurrent' => Request::routeIs('settings*'),
            ],
        ];
    }

    public function render(): View|string|\Closure
    {
        return view('components.app.layouts.navigation');
    }
}
