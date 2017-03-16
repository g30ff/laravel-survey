<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Question;
use App\Answer;
use App\Survey;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // create user in DB
        $user = factory(User::class)->create();

        // create question in DB
        $question = factory(Question::class)->create();

        // create answer in DB
        $answer = factory(Answer::class)->create();

        // create survey in DB
        $answer = factory(Survey::class)->create();

        /* test access to questions admin section for authenticated user */
        $response = $this->actingAs($user)->get('admin/questions');
        $response->assertStatus(200);

        /* test access to answers admin section for authenticated user */
        $response = $this->actingAs($user)->get('admin/answers');
        $response->assertStatus(200);

        /* test access to surveys admin section for authenticated user */
        $response = $this->actingAs($user)->get('admin/surveys');
        $response->assertStatus(200);


    }
}
