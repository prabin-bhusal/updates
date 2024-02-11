<?php

namespace Tests\Feature;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class NewsTest extends TestCase
{

    /**
     * Checking authentication in news dashboard
     */

    public function test_authentication_in_news_dashboard_and_checking_if_not_authenticated_sending_back_to_login_page(): void
    {
        $response = $this->get("/news");
        $response->assertStatus(302);
        $response->assertRedirect('login');
    }

    /**
     * Checking test for news create and update views
     * 
     */

    public function test_authentication_in_news_create_and_update_dashboard_and_checking_if_not_authenticated_sending_back_to_login_page(): void
    {
        $response = $this->get("/news/create");
        $response->assertStatus(302);
        $response->assertRedirect('login');

        $response2 = $this->get("/news/edit");
        $response2->assertStatus(302);
        $response2->assertRedirect('login');
    }

    /**
     * checking if news dashboard can be viewed after authenticated
     */
    public function test_news_dashboard_page_can_be_viewed(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/news');

        $response->assertStatus(200);
        $response->assertSee(__('News'));
    }

    // checking factory test
    public function test_news_factory_test(): void
    {
        $user = User::factory()->create();
        $news = News::factory(11)->create();

        $lastnews = $news->last();
        $response = $this->actingAs($user)->get('/news');
        $response->assertStatus(200);
        $response->assertViewHas('news', function ($collection) use ($lastnews) {
            return !$collection->contains($lastnews);
        });
    }

    /**
     * checking if user routes to dashboard once login
     */

    public function test_login_redirects_to_dashboard(): void
    {
        User::create([
            'name' => "Prabin",
            'email' => "bhusalprabin127@gmail.com",
            "password" => Hash::make("password")
        ]);

        $response = $this->post('/login', [
            'email' => 'bhusalprabin127@gmail.com',
            'password' => 'password'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('dashboard');
    }

    /**
     * checking if data is stored in database
     */

    public function test_data_stored_in_database(): void
    {
        $file = UploadedFile::fake()->image('image_one.jpg');

        $user = User::factory()->create();
        $news = [
            'title' => "This is news title",
            'content' => "This is news content",
            'banner_image' => $file,
            'user_id' => $user->id,
        ];

        $response = $this->actingAs($user)->post('/news', $news);

        $response->assertStatus(302);
        $response->assertRedirect('/news');

        // $this->assertDatabaseHas('news', $news);

        $lastnewsid = DB::getPdo()->lastInsertId();
        $lastnews = News::find($lastnewsid);
        $this->assertEquals($news['title'], $lastnews->title);
    }
}
