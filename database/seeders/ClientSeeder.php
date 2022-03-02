<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender=['M','F'];
        $brand=['Toyota','Lexus','Lada','Audi'];

        $color=['Red','White','Black'];
//        $full_names=[
//            'Сорокина Маргарита Егоровна',
//            'Крючков Александр Максимович',
//            'Тихомирова Анастасия Александровна',
//            'Медведев Константин Ярославович',
//            'Яковлев Кирилл Романович',
//            'Миронов Фёдор Артёмович',
//            'Зайцев Иван Дмитриевич',
//            'Миронов Али Платонович',
//            'Панина Екатерина Васильевна',
//            'Петровская Виктория Алексеевна'];

        for($i = 0;$i<10;$i++){
            DB::table('clients')->insert([
            'full_name'=>Str::random(10),
            'gender'=>$gender[rand(0,1)],
            'phone_number'=>rand(1000,9999),
            'address'=>Str::random(10)
            ]);
        };
        for($i = 0;$i<10;$i++){
            DB::table('cars')->insert([
                'brand'=>$brand[rand(0,3)],
                'model'=>Str::random(5),
                'color'=>$color[rand(0,2)],
                'state_number'=>Str::random(2).rand(100,999),
                'flag'=>(bool)rand(0,1),
                'client_id'=>$i+1
            ]);
        }



//        DB::table('users')->insert([
//            'name' => Str::random(10),
//            'email' => Str::random(10).'@gmail.com',
//            'password' => Hash::make('password'),
//        ]);
    }
}
