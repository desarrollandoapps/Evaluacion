<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\Idea;

class IdeaTable extends DataTableComponent
{
    protected $model = Idea::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('ideas.show', ['idea' => $row->id]);
            });
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable(),
            Column::make("Código", "codigo")
                ->sortable()
                ->searchable(),
            Column::make("Titulo", "titulo")
                ->sortable()
                ->searchable(),
            Column::make("Talento", "talento")
                ->sortable()
                ->searchable(),
            ButtonGroupColumn::make('')
                ->attributes(function($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('View') // make() has no effect in this case but needs to be set anyway
                        ->title(fn($row) => 'Ver')
                        ->location(fn($row) => route('ideas.show', $row))
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-info',
                            ];
                        }),
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Editar')
                        ->location(fn($row) => route('ideas.edit', $row))
                        ->attributes(function($row) {
                            return [
                                // 'target' => '_blank',
                                'class' => 'btn btn-warning',
                            ];
                        }),
                ]),
        ];
    }
}
