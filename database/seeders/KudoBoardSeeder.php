<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KudoBoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kudo_boards')->insert([
            'name'         => 'Maria Jose Martinez Vega',
            'description'  => 'This is a kudo for people teams',
            'categorie_id' => '1',
            'email'        => 'majo@test.com',
            'birthday'     => '1982-12-23',
            'uri'          => 'https://cdn.pixabay.com/photo/2017/10/26/19/45/red-2892235__480.png'
        ]);
        DB::table('kudo_boards')->insert([
            'name'         => 'Salma Vega',
            'description'  => 'This is a kudo for people teams',
            'categorie_id' => '1',
            'email'        => 'salma@test.com',
            'birthday'     => '1981-11-23',
            'uri'          => 'https://cdn.pixabay.com/photo/2017/10/26/19/45/red-2892235__480.png'
        ]);
        DB::table('kudo_boards')->insert([
            'name'         => 'Joca Antunez',
            'description'  => 'This is a kudo for Joca Birthday',
            'categorie_id' => '2',
            'email'        => 'joca@test.com',
            'birthday'     => '1985-12-23',
            'uri'          => 'https://cdn.pixabay.com/photo/2017/10/26/19/45/red-2892235__480.png'
        ]);
        DB::table('kudo_boards')->insert([
            'name'         => 'Pedro Castro',
            'description'  => 'This is a kudo for Joca Birthday',
            'categorie_id' => '2',
            'email'        => 'pedro@test.com',
            'birthday'     => '1982-12-22',
            'uri'          => 'https://cdn.pixabay.com/photo/2017/10/26/19/45/red-2892235__480.png'
        ]);   
        DB::table('kudo_boards')->insert([
            'name'         => 'Carolina Jimenez',
            'description'  => 'This is a kudo for OpenOffice Project',
            'categorie_id' => '3',
            'email'        => 'carol@test.com',
            'birthday'     => '1985-12-23',
            'uri'          => 'https://cdn.pixabay.com/photo/2017/10/26/19/45/red-2892235__480.png'
        ]);
        DB::table('kudo_boards')->insert([
            'name'         => 'Angela Ramirez',
            'description'  => 'This is a kudo for OpenOffice Project',
            'categorie_id' => '3',
            'email'        => 'angela@test.com',
            'birthday'     => '1982-12-23',
            'uri'          => 'https://cdn.pixabay.com/photo/2017/10/26/19/45/red-2892235__480.png'
        ]);                
    }
}
