<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\Idea;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Auth;

class EvaluarIdeaTable extends DataTableComponent
{
    // protected $model = Idea::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->sortable(),
            Column::make("Codigo", "codigo")
                ->sortable()
                ->searchable(),
            Column::make("Titulo", "titulo")
                ->sortable()
                ->searchable(),
            Column::make("Talento", "talento")
                ->sortable()
                ->searchable(),
            Column::make('Estado')
                ->sortable()
                ->format(
                    fn($value, $row, Column $column) => $this->verificar($value)
                )
                ->html(),
            LinkColumn::make('')
                ->title(fn($row) => 'Evaluar')
                ->location(fn($row) => route('evaluar.irEvaluar', $row))
                ->attributes(fn($row) => [
                    'class' => 'btn btn-orange',
                ]),
        ];
    }

    public function verificar($valor) 
    {
        if($valor == "Convocado")
            return "<span class='badge text-bg-info'>$valor</span>";
        elseif ($valor == "Asignado")
            return "<span class='badge text-bg-warning'>$valor</span>";
        elseif ($valor == "Viable")
            return "<span class='badge text-bg-success'>$valor</span>";
        elseif ($valor == "No viable")
            return "<span class='badge text-bg-danger'>$valor</span>";
    }

    public function builder(): Builder
    {
        $usuario = Auth::user()->id;
        return Idea::join('idea_evaluadors', 'ideas.id', 'idea_evaluadors.idea_id')
                    ->select('ideas.*', 'idea_evaluadors.evaluada as evaluada')
                    ->where('idea_evaluadors.user_id', $usuario)
                    ->where('idea_evaluadors.evaluada', 0);
    }
}
