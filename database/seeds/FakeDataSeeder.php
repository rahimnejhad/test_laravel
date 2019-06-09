<?php

use App\Model\PlayerModel;
use App\Model\TeamModel;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FakeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teamLimit=4000;
        $teamPlayer=11;

        factory(TeamModel::class,$teamLimit)->create()->each(function ($team) use ($teamPlayer) {
            factory(PlayerModel::class,$teamPlayer)->create(['team_id'=>$team->id]);
        });

        //Add Admin User
        factory(User::class,1)->create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('admin'),
        ]);

    }
}
