<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Papel;

class UsuariosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();
        $usuario->name = "Rafael Zingano";
        $usuario->email = "admin@admin.com";
        $usuario->password = bcrypt("admin");
        $usuario->save();

        echo "usuario = " . $usuario . "\n";
        $papel = Papel::where('nome', '=', 'admin')->first();
        echo "papel = " . $papel . "\n";
        $usuario->adicionaPapel($papel);
    }
}
