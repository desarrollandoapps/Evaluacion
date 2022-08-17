<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Rol;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolAdmin = Rol::where('nombre', 'Administrador')->first();
        $rolGestor = Rol::where('nombre', 'Gestor')->first();
        $rolEvaluador = Rol::where('nombre', 'Evaluador')->first();
        $rolUsuario = Rol::where('nombre', 'Usuario')->first();

        $admin = User::create([
            'name' => 'Usuario Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);
        $gestor = User::create([
            'name' => 'Usuario Gestor',
            'email' => 'gestor@gmail.com',
            'password' => Hash::make('gestor')
        ]);
        $evaluador = User::create([
            'name' => 'Usuario Evaluador',
            'email' => 'evaluador@gmail.com',
            'password' => Hash::make('evaluador')
        ]);
        $usuario = User::create([
            'name' => 'Usuario',
            'email' => 'usuario@gmail.com',
            'password' => Hash::make('usuario')
        ]);

        $admin->roles()->attach($rolAdmin);
        $gestor->roles()->attach($rolGestor);
        $evaluador->roles()->attach($rolEvaluador);
        $usuario->roles()->attach($rolUsuario);
    }
}
