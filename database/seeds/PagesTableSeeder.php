<?php

use Illuminate\Database\Seeder;
use App\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'title' => 'Sobre a imobiliaria', 
                'content' => 'Texto que fale sobre a imobiliaria', 
                'image' => null,
                'slug' => 'sobre',
                'meta_title' => 'Sobre',
                'meta_description' => 'Sobre a imobiliaria',
                'view' => 'paginas.sobre'
            ],
            [
                'title' => 'Contato da imobiliaria', 
                'content' => 'Texto de contato da imobiliaria', 
                'image' => null,
                'slug' => 'sobre',
                'meta_title' => 'contato',
                'meta_description' => 'Texto de contato da imobiliaria',
                'view' => 'paginas.contato'
            ]
        ];
        foreach ($pages as $page) {
            $exist = Page::where('slug', '=', $page['slug'])->count();
            if ($exist <= 0) {
                DB::table('pages')->insert($page);
                echo "Página " . $page['title'] . " criada com sucesso!\n";
            }else{
                echo "Página " . $page['title'] . " não foi criada pois ja existe!\n";
            }
        }
    }
}