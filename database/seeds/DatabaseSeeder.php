<?php

use App\Movie;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
	//    self::seedCatalog(new DatabaseSeeder);
		self::seedUsers();
	  
    }

    private static function seedCatalog($metra){
	DB::table('movies')->delete();
    	foreach($metra->arrayPeliculas as $pelicula){
		$movie = new Movie;
		$movie->title=$pelicula['title'];
		$movie->year=$pelicula['year'];
		$movie->director=$pelicula['director'];
		$movie->poster=$pelicula['poster'];
		$movie->rented=$pelicula['rented'];
		$movie->synopsis=$pelicula['synopsis'];
		$movie->save();
	}		
    }

    private static function seedUsers(){
	    DB::table('users')->delete();
	    $user = new User;
	    $user->name="Dragonyte";
	    $user->email="AcuarionEvol@outlook.com";
	    $user->password=bcrypt("colombia27");
	    $user->save();
    }
}
