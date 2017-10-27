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
        $usuario->name = "Eduardo Tavares";
        $usuario->email = "admin@mail.com";
        $usuario->password = bcrypt("123456");
        $usuario->save();

        echo "usuario = " . $usuario . "\n";
        $papel = Papel::where('nome', '=', 'admin')->first();
        echo "papel = " . $papel . "\n";
        $usuario->adicionaPapel($papel);
    }
}
