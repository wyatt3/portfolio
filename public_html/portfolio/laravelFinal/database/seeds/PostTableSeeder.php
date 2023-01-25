<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x = 1; $x <= 10; $x++) {
            $y = $x;
            if($x == 1) {
                $y = '';
            }
            if($x > 5) {
                if($x % 2 == 0) {
                    $public = '1';
                } else {
                    $public = '0';
                }
                $user_id = '2';
            } else {
                $public = '0';
                $user_id = '1';
            }
            $post = new \App\Post([
                'title' => '2020 MAKE ' . $y . ' MODEL ' . $y,
                'make' => 'MAKE ' . $y,
                'model' => 'MODEL ' . $y,
                'year' => '2020',
                'trim' => 'TRIM ' . $y,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus commodo purus eu pellentesque. Suspendisse ante turpis, aliquet a ex at, luctus semper nulla. Phasellus tincidunt vehicula pharetra. Quisque vitae dolor a diam iaculis luctus. Mauris at dui vel felis dapibus vulputate a facilisis sem. Donec vel felis sit amet ante bibendum congue. Maecenas venenatis convallis libero, eu facilisis justo porta nec.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus commodo purus eu pellentesque. Suspendisse ante turpis, aliquet a ex at, luctus semper nulla. Phasellus tincidunt vehicula pharetra. Quisque vitae dolor a diam iaculis luctus. Mauris at dui vel felis dapibus vulputate a facilisis sem. Donec vel felis sit amet ante bibendum congue. Maecenas venenatis convallis libero, eu facilisis justo porta nec.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus commodo purus eu pellentesque. Suspendisse ante turpis, aliquet a ex at, luctus semper nulla. Phasellus tincidunt vehicula pharetra. Quisque vitae dolor a diam iaculis luctus. Mauris at dui vel felis dapibus vulputate a facilisis sem. Donec vel felis sit amet ante bibendum congue. Maecenas venenatis convallis libero, eu facilisis justo porta nec.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus commodo purus eu pellentesque. Suspendisse ante turpis, aliquet a ex at, luctus semper nulla. Phasellus tincidunt vehicula pharetra. Quisque vitae dolor a diam iaculis luctus. Mauris at dui vel felis dapibus vulputate a facilisis sem. Donec vel felis sit amet ante bibendum congue. Maecenas venenatis convallis libero, eu facilisis justo porta nec.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dapibus commodo purus eu pellentesque. Suspendisse ante turpis, aliquet a ex at, luctus semper nulla. Phasellus tincidunt vehicula pharetra. Quisque vitae dolor a diam iaculis luctus. Mauris at dui vel felis dapibus vulputate a facilisis sem. Donec vel felis sit amet ante bibendum congue. Maecenas venenatis convallis libero, eu facilisis justo porta nec.',
                'public' => $public,
                'user_id' => $user_id,
            ]);
            $post->save();
        }
    }
}
