<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Author;
use Carbon\Carbon;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function an_author_can_be_created()
    {
        // $this->withoutExceptionHandling();

        $this->post('/author',[
        'name' => 'Author Name',
        'dob' => '09/24/1989']);

        $author = Author::all();

        $this->assertCount(1,$author);
        #determine if the dob is a date
        $this->assertInstanceOf(Carbon::class,$author->first()->dob);
        $this->assertEquals('1989/24/09', $author->first()->dob->format('Y/d/m'));
    }
}
