<?php

namespace Tests;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Return an admin user
     * @param array $overrides
     * @return User $admin
     */
    protected function admin($overrides = [])
    {
        $admin = $this->user($overrides);
        $admin->roles()->attach(
            factory(Role::class)->states('admin')->create()
        );

        return $admin;
    }

    /**
     * Return an user
     * @param array $overrides
     * @return User
     */
    protected function user($overrides = [])
    {
        return factory(User::class)->create($overrides);
    }

    /**
     * Acting as an admin
     * @param null $api
     * @return TestCase
     */
    protected function actingAsAdmin($api = null)
    {
        $this->actingAs($this->admin(), $api);

        return $this;
    }

    /**
     * Acting as an user
     * @param null $api
     * @return TestCase
     */
    protected function actingAsUser($api = null)
    {
        $this->actingAs($this->user(), $api);

        return $this;
    }
}
