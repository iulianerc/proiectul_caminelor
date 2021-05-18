<?php


namespace Tests\Database;


use App\Models\Store\Store;
use DB;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckPerformanceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        \DB::table('stores')->where('id', '>', '20')->delete();
    }

        public function testSingleQuery(): void
    {
        $start = microtime(true);
        $banks = factory(Store::class, 100)->make()->toArray();
        data_set($banks, '*.created_at', now());
        data_set($banks, '*.updated_at', now());

        DB::table('stores')->insert($banks);
        $time_elapsed_secs = microtime(true) - $start;

        echo $time_elapsed_secs;
        self::assertTrue(true);
    }

    public function testMultipleQueries()
    {
        $start = microtime(true);
        factory(Store::class, 100)->create();
        $time_elapsed_secs = microtime(true) - $start;

        echo $time_elapsed_secs;

        self::assertTrue(true);
    }

}
