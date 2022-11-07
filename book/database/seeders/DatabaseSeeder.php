<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
        User::truncate();
        Author::truncate();
        Genre::truncate();
        Book::truncate();

        $user1 = User::create(['name'=>'ana','email'=>'ana123@gmail.com','password'=>'ana']);
        $user2 = User::create(['name'=>'maja','email'=>'maja321@gmail.com','password'=>'maja']);

        $users = User::factory(3)->create();

        $author1 = Author::create(['first_name'=>'Herman','last_name'=>'Melville','country'=>'USA']);
        $author2 = Author::create(['first_name'=>'Franz','last_name'=>'Kafka','country'=>'Czech Republic']);
        $author3 = Author::create(['first_name'=>'Agatha','last_name'=>'Christie','country'=>'United Kingdom']);


        $genre1 = Genre::create(['name'=> 'Novel', 'description'=>'The novel is a genre of fiction, and fiction may be defined as the art or craft of contriving, through the written word, representations of human life that instruct or divert or both.']);
        $genre2 = Genre::create(['name'=> 'Mystery', 'description'=>'The mystery genre is a genre of fiction that follows a crime (like a murder or a disappearance) from the moment it is committed to the moment it is solved.']);
        $genre3 = Genre::create(['name'=> 'Epic', 'description'=>'Epic is a genre of narrative defined by heroic or legendary adventures presented in a long format.']);
        

        $book1 = Book::create([
            'title'=>'Moby Dick',
            'number_of_pages'=>'822',
            'year_of_release'=>'1851',
            'author_id'=>$author1->id,
            'genre_id'=>$genre3->id,
            'user_id'=>$user1->id
       
        ]);

        $book2 = Book::create([
            'title'=>'Death on the Nile',
            'number_of_pages'=>'240',
            'year_of_release'=>'1937',
            'author_id'=>$author3->id,
            'genre_id'=>$genre2->id,
            'user_id'=>$user1->id
       
        ]);

        $book3 = Book::create([
            'title'=>'Metamorphosis',
            'number_of_pages'=>'100',
            'year_of_release'=>'1915',
            'author_id'=>$author2->id,
            'genre_id'=>$genre1->id,
            'user_id'=>$user2->id
       
        ]);

        $book4 = Book::create([
            'title'=>'The Trial',
            'number_of_pages'=>'178',
            'year_of_release'=>'1925',
            'author_id'=>$author2->id,
            'genre_id'=>$genre1->id,
            'user_id'=>$user1->id
       
        ]);


        
        $book5 = Book::create([
            'title'=>'Murder on the Orient Express',
            'number_of_pages'=>'256',
            'year_of_release'=>'1934',
            'author_id'=>$author3->id,
            'genre_id'=>$genre2->id,
            'user_id'=>$user2->id
       
        ]);



    }
}
