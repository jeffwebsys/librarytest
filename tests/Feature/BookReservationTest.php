<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Book;

class BookReservationTest extends TestCase
{
	#replica of the database
	use RefreshDatabase;

   /** @test */
  
    public function a_book_can_be_added_to_the_library()
    {
    	 #a method that can add books
    	#this uncovers the real error that laravel produced.
    	$this->withoutExceptionHandling();
       $response = $this->post('/books',[

		'title' => 'Cool Title',
		'author' => 'Jeff',

        ]);
       #if asserts is ok then true
        $response->assertOk();

        #this match the database if we added unto it
        $this->assertCount(1, Book::all());

   	 }


		/** @test */
		public function a_title_is_required(){


		// $this->withoutExceptionHandling();
       	$response = $this->post('/books',[

		'title' => '',
		'author' => 'Jeff',

        ]);
       #there is no title so we run this assert that needs to be required
       $response->assertSessionHasErrors('title');


		}
		/** @test */
		public function a_author_is_required(){


		// $this->withoutExceptionHandling();
       	$response = $this->post('/books',[

		'title' => 'Cool Title',
		'author' => '',

        ]);
       
       $response->assertSessionHasErrors('author');


		}
		/** @test */
		//updating the book
		public function a_book_can_be_updated(){

		// $this->withoutExceptionHandling();
       	$this->post('/books',[

		'title' => 'Cool Title',
		'author' => 'Jeff',
		]);

		$book = Book::first();

		$response = $this->patch('/books/'.$book->id,[

		'title' => 'New Title',
		'author' => 'New Author',
		]);

		$this->assertEquals('New Title', Book::first()->title);
		$this->assertEquals('New Author', Book::first()->author);



		}



#end class
}
