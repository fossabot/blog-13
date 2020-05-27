<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

//    public function setUp(): void
//    {
//        // first include all the normal setUp operations
//        parent::setUp();
//
//        // now re-register all the roles and permissions
//        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();
//    }
}
