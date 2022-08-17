<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Rol", "roles.id.rols.nombre")
                ->sortable(),
        ];
    }
    public function builder(): Builder
    {
        return User::query()
            ->join('rol_user', 'users.id', 'rol_user.user_id') // Join some tables
            ->select('users.*', 'rol_user.rol_id as rol'); // Select some things
    }
}
