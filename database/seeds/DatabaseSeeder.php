<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\events::all() as $event) {
            factory(App\tickets::class, 1)->create([
                'type'=>'Third Row',
                'event_id'=>$event->id,

            ]);
        }
    }
}
