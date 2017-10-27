<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissaoSeeds::class);
        $this->call(PapelSeeds::class);
        $this->call(PaginasSeeds::class);
        $this->call(UsuariosSeeds::class);
    }
}
