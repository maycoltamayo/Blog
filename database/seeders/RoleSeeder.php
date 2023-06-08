<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 =  Role::create(['name' => 'blogger']);

        Permission::create(['name' => 'admin.index','description' => 'Ver el Panel de administracion'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.user.index','description' => 'Ver listado de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.user.edit','description' => 'Editar Permiso del usuario'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.category.index','description' => 'Ver listado de Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.category.create','description' => 'Crear categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.category.edit','description' => 'Editar categoria'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.category.destroy','description' => 'Eliminar Categoria'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tag.index','description' => 'Ver listado de Etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tag.create','description' => 'Crear Etiqueta'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tag.edit','description' => 'Editar Etiqueta'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tag.destroy','description' => 'Eliminar Etiqueta'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.post.index','description' => 'Ver listado de Posts'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.post.create','description' => 'Crear un Post'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.post.edit','description' => 'Editar un Post'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.post.destroy','description' => 'Eliminar un Post'])->syncRoles([$role1,$role2]);


        




    }
}
