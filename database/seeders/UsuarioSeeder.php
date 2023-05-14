<?php

namespace Database\Seeders;

use App\Models\usuario\Usuario;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->crearRoles();
        $this->crearPermisos();
        $this->asignarPermisos();
    }

    public function crearRoles()
    {
        Role::updateOrCreate([
            'name' => Usuario::ROL_ADMINISTRADOR,
        ],[
            'nombre' => 'Administrador',
            'guard_name' => 'web',
        ]);

        Role::updateOrCreate([
            'name' => Usuario::ROL_CLIENTE,
        ],[
            'nombre' => 'Cliente',
            'guard_name' => 'web',
        ]);
    }


    public function crearPermisos()
    {
        Permission::updateOrCreate([
            'name' => Usuario::PERMISO_LISTADO
        ], [
            'guard_name' => 'web',
        ]);

        Permission::updateOrCreate([
            'name' => Usuario::PERMISO_CREAR
        ], [
            'guard_name' => 'web',
        ]);
        
        Permission::updateOrCreate([
            'name' => Usuario::PERMISO_EDITAR
        ], [
            'guard_name' => 'web',
        ]);
        
        Permission::updateOrCreate([
            'name' => Usuario::PERMISO_ELIMINAR
        ], [
            'guard_name' => 'web',
        ]);
    }

    /**
     * Función que permite asignar los permisos a los roles.
     * @return void
     */
    public function asignarPermisos()
    {
        $rolAdministradorPractica = Role::findByName(Usuario::ROL_ADMINISTRADOR);

        $rolAdministradorPractica->syncPermissions([
            Usuario::PERMISO_LISTADO,
            Usuario::PERMISO_CREAR,
            Usuario::PERMISO_EDITAR,
            Usuario::PERMISO_ELIMINAR,
        ]);
    }
}