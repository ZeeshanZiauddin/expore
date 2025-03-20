<?php

namespace App\Filament\Resources\QueryResource\Pages;

use App\Filament\Resources\QueryResource;
use App\Models\Query;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
class ListQueries extends ListRecords
{
    protected static string $resource = QueryResource::class;


    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),

            'awailed' => Tab::make('Awailed')
                ->modifyQueryUsing(fn(Builder $query) => $query->whereNotNull('awailed_by')),

            'awailed_by_me' => Tab::make('Awailed By Me')
                ->badge(Query::query()->where('awailed_by', Auth::id())->count())
                ->modifyQueryUsing(fn(Builder $query) => $query->where('awailed_by', Auth::id())),
        ];
    }
    public function getDefaultActiveTab(): string|int|null
    {
        return 'all';
    }
}