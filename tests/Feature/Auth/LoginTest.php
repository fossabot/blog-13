<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Class LoginTest
 * @package Tests\Feature\Auth
 */
class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     *
     */
    public function testUserCanViewLoginForm()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     * @return string
     */
    protected function successfulLoginRoute()
    {
        return route('home');
    }

    /**
     * @return string
     */
    protected function loginGetRoute()
    {
        return route('login');
    }

    /**
     * @return string
     */
    protected function loginPostRoute()
    {
        return route('login');
    }

    /**
     * @return string
     */
    protected function logoutRoute()
    {
        return route('logout');
    }

    /**
     * @return string
     */
    protected function successfulLogoutRoute()
    {
        return '/';
    }

    /**
     * @return string
     */
    protected function guestMiddlewareRoute()
    {
        return route('home');
    }

    /**
     * @return string
     */
    protected function getTooManyLoginAttemptsMessage()
    {
        return sprintf('/^%s$/', str_replace('\:seconds', '\d+', preg_quote(__('auth.throttle'), '/')));
    }

    /**
     *
     */
    public function testUserCanViewALoginForm()
    {
        $response = $this->get($this->loginGetRoute());

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     *
     */
    public function testUserCannotViewALoginFormWhenAuthenticated()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get($this->loginGetRoute());

        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    /**
     *
     */
    public function testUserCanLoginWithCorrectCredentials()
    {
        $user = factory(User::class)->create([
            'password' => Hash::make($password = 'password'),
        ]);

        $response = $this->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect($this->successfulLoginRoute());
        $this->assertAuthenticatedAs($user);
    }

//    public function testRememberMeFunctionality()
//    {
//        $user = factory(User::class)->create([
//            'id' => mt_rand(1, 100),
//            'password' => Hash::make($password = 'i-love-laravel'),
//        ]);
//
//        $response = $this->post($this->loginPostRoute(), [
//            'email' => $user->email,
//            'password' => $password,
//            'remember' => 'on',
//        ]);
//
//        $user = $user->fresh();
//
//        $response->assertRedirect($this->successfulLoginRoute());
//        $response->assertCookie(Auth::guard()->getRecallerName(), vsprintf('%s|%s|%s', [
//            $user->id,
//            $user->getRememberToken(),
//            $user->password,
//        ]));
//        $this->assertAuthenticatedAs($user);
//    }
//
//    public function testUserCannotLoginWithIncorrectPassword()
//    {
//        $user = factory(User::class)->create([
//            'password' => Hash::make('i-love-laravel'),
//        ]);
//
//        $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
//            'email' => $user->email,
//            'password' => 'invalid-password',
//        ]);
//
//        $response->assertRedirect($this->loginGetRoute());
//        $response->assertSessionHasErrors('email');
//        $this->assertTrue(session()->hasOldInput('email'));
//        $this->assertFalse(session()->hasOldInput('password'));
//        $this->assertGuest();
//    }
//
//    public function testUserCannotLoginWithEmailThatDoesNotExist()
//    {
//        $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
//            'email' => 'nobody@example.com',
//            'password' => 'invalid-password',
//        ]);
//
//        $response->assertRedirect($this->loginGetRoute());
//        $response->assertSessionHasErrors('email');
//        $this->assertTrue(session()->hasOldInput('email'));
//        $this->assertFalse(session()->hasOldInput('password'));
//        $this->assertGuest();
//    }
//
//    public function testUserCanLogout()
//    {
//        $this->be(factory(User::class)->create());
//
//        $response = $this->post($this->logoutRoute());
//
//        $response->assertRedirect($this->successfulLogoutRoute());
//        $this->assertGuest();
//    }
//
//    public function testUserCannotLogoutWhenNotAuthenticated()
//    {
//        $response = $this->post($this->logoutRoute());
//
//        $response->assertRedirect($this->successfulLogoutRoute());
//        $this->assertGuest();
//    }
//
//    public function testUserCannotMakeMoreThanFiveAttemptsInOneMinute()
//    {
//        $user = factory(User::class)->create([
//            'password' => Hash::make($password = 'i-love-laravel'),
//        ]);
//
//        foreach (range(0, 5) as $_) {
//            $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
//                'email' => $user->email,
//                'password' => 'invalid-password',
//            ]);
//        }
//
//        $response->assertRedirect($this->loginGetRoute());
//        $response->assertSessionHasErrors('email');
//        $this->assertRegExp(
//            $this->getTooManyLoginAttemptsMessage(),
//            collect(
//                $response
//                    ->baseResponse
//                    ->getSession()
//                    ->get('errors')
//                    ->getBag('default')
//                    ->get('email')
//            )->first()
//        );
//        $this->assertTrue(session()->hasOldInput('email'));
//        $this->assertFalse(session()->hasOldInput('password'));
//        $this->assertGuest();
//    }
}
