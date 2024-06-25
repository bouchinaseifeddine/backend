<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use App\Models\Year;
use App\Models\Admin;
use App\Models\School;
use App\Models\Stage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Wilaya;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $wilayas = [
            ["name" => "أدرار"],
            ["name" => "الشلف"],
            ["name" => "الأغواط"],
            ["name" => "أم البواقي"],
            ["name" => "باتنة"],
            ["name" => "بجاية"],
            ["name" => "بسكرة"],
            ["name" => "بشار"],
            ["name" => "البليدة"],
            ["name" => "البويرة"],
            ["name" => "تمنراست"],
            ["name" => "تبسة"],
            ["name" => "تلمسان"],
            ["name" => "تيارت"],
            ["name" => "تيزي وزو"],
            ["name" => "الجزائر"],
            ["name" => "الجلفة"],
            ["name" => "جيجل"],
            ["name" => "سطيف"],
            ["name" => "سعيدة"],
            ["name" => "سكيكدة"],
            ["name" => "سيدي بلعباس"],
            ["name" => "عنابة"],
            ["name" => "قالمة"],
            ["name" => "قسنطينة"],
            ["name" => "المدية"],
            ["name" => "مستغانم"],
            ["name" => "المسيلة"],
            ["name" => "معسكر"],
            ["name" => "ورقلة"],
            ["name" => "وهران"],
            ["name" => "البيض"],
            ["name" => "إليزي"],
            ["name" => "برج بوعريريج"],
            ["name" => "بومرداس"],
            ["name" => "الطارف"],
            ["name" => "تندوف"],
            ["name" => "تيسمسيلت"],
            ["name" => "الوادي"],
            ["name" => "خنشلة"],
            ["name" => "سوق أهراس"],
            ["name" => "تيبازة"],
            ["name" => "ميلة"],
            ["name" => "عين الدفلى"],
            ["name" => "النعامة"],
            ["name" => "عين تيموشنت"],
            ["name" => "غرداية"],
            ["name" => "غليزان"]
        ];

        $oeb = [
            ["name" => "أم البواقي"],
            ["name" => "عين البيضاء"],
            ["name" => "عين مليلة"],
            ["name" => "عين ببوش"],
            ["name" => "عين الديس"],
            ["name" => "عين فكرون"],
            ["name" => "بريش"],
            ["name" => "بئر الشهداء"],
            ["name" => "بئر الراقم"],
            ["name" => "الجازية"],
            ["name" => "الرحية"],
            ["name" => "سوق نعمان"],
            ["name" => "الضلعة"],
            ["name" => "الفجوج بوسكران"],
            ["name" => "هنشير تومغني"],
            ["name" => "أولاد زواي"],
            ["name" => "سيقوس"],
            ["name" => "العامرية"],
            ["name" => "عين كرشة"],
            ["name" => "عين الزيتون"],
            ["name" => "عين ببوش"],
            ["name" => "الحروش"],
            ["name" => "قصر الصبيحي"],
            ["name" => "السبع"],
            ["name" => "وادي نيني"],
            ["name" => "زنينة"],
            ["name" => "بحير الشرقي"],
            ["name" => "سوق نعمان"],
            ["name" => "وادي برقش"]
        ];

        $batna = [
            ["name" => "باتنة"],
            ["name" => "تازولت"],
            ["name" => "وادي الشعبة"],
            ["name" => "عين ياقوت"],
            ["name" => "فسديس"],
            ["name" => "مروانة"],
            ["name" => "رأس العيون"],
            ["name" => "سريانة"],
            ["name" => "عين جاسر"],
            ["name" => "بومية"],
            ["name" => "تكوت"],
            ["name" => "تالخمت"],
            ["name" => "بريكة"],
            ["name" => "عين التوتة"],
            ["name" => "الجزار"],
            ["name" => "سفيان"],
            ["name" => "أولاد عمار"],
            ["name" => "منعة"],
            ["name" => "إشمول"],
            ["name" => "تيمقاد"],
            ["name" => "عيون العصافير"],
            ["name" => "معافة"],
            ["name" => "شمرة"],
            ["name" => "قايس"],
            ["name" => "تيمقاد"],
            ["name" => "الشمرة"],
            ["name" => "بن عيسى العابد"],
            ["name" => "لمسان"],
            ["name" => "عين التوتة"],
            ["name" => "بريكة"],
            ["name" => "بسكرة"],
            ["name" => "البيضاء"],
            ["name" => "التعظيم"],
            ["name" => "قصر بلزمة"],
            ["name" => "زانا بني عدي"],
            ["name" => "عين توتة"],
            ["name" => "بريكة"],
            ["name" => "شعبة"],
            ["name" => "عيون العصافير"],
            ["name" => "جرمة"],
            ["name" => "وادي الماء"]
        ];

        $Oeb = [
            ["name" => "المدرسة الابتدائية العربي بن مهيدي" ,'stage_id' => 1 , "city_id" => 1],
            ["name" => "المدرسة الابتدائية الشهيد بوعلام" ,'stage_id' => 1 , "city_id" => 1],
            ["name" => "المدرسة الابتدائية سيدي يحيى" ,'stage_id' => 1 , "city_id" => 1],
            ["name" => "المدرسة الابتدائية الإخوة بوقرة" ,'stage_id' => 1 , "city_id" => 1]
        ];

        $AinBeida = [
            ["name" => "المدرسة الابتدائية عبد الحميد بن باديس" ,'stage_id' => 1 , "city_id" => 2],
            ["name" => "المدرسة الابتدائية الإخوة بوسكين" ,'stage_id' => 1 , "city_id" => 2],
            ["name" => "المدرسة الابتدائية المجاهد مصطفى بن بولعيد" ,'stage_id' => 1 , "city_id" => 2],
            ["name" => "المدرسة الابتدائية الإخوة بن عمر" ,'stage_id' => 1 , "city_id" => 2]
        ];

        $Merouana = [
            ["name" => "المدرسة الابتدائية الإخوة بلعمري",'stage_id' => 1 , "city_id" => 35 ],
            ["name" => "المدرسة الابتدائية الصديق بلقايد" ,'stage_id' => 1 , "city_id" => 35],
            ["name" => "المدرسة الابتدائية عبد القادر علولي" ,'stage_id' => 1 , "city_id" => 35],
            ["name" => "المدرسة الابتدائية المجاهد السعيد بومعزة" ,'stage_id' => 1 , "city_id" => 35]
        ];

        Admin::create([
            "name"=> "Djaafri",
            "last"=> "Fouzi",
        ]);

        User::factory()->create([
            'email' => 'Fouzi@gmail.com',
        ]);

        foreach ($wilayas as $key => $wilaya) {
            Wilaya::create([
                'id' => $key+1 ,
                'name' => $wilaya['name'] ,
            ]) ;
        }


        foreach ($oeb as $key => $city) {
            City::where('wilaya_id' , 4)->create([
                'id' => $key+1 ,
                'name' => $city['name'] ,
                'wilaya_id' => 4 ,
            ]) ;
        }


        foreach ($batna as $key => $city) {
            City::where('wilaya_id' , 5)->create([
                'id' => count($oeb) + $key+1 ,
                'name' => $city['name'] ,
                'wilaya_id' => 5 ,
            ]) ;
        }

        Stage::create(["name"=>'اللإبتدائي']);Stage::create(["name"=>'المتوسط']);Stage::create(["name"=>'الثانوي']);
        Year::create(["name"=>'أولى' , 'stage_id' =>1]);Year::create(["name"=>'الثانية' , 'stage_id' =>1]);Year::create(["name"=>'الثالثة' , 'stage_id' =>1]);Year::create(["name"=>'الرابعة' , 'stage_id' =>1]);Year::create(["name"=>'الخامسة' , 'stage_id' =>1]);
        Year::create(["name"=>'أولى' , 'stage_id' =>2]);Year::create(["name"=>'الثانية' , 'stage_id' =>2]);Year::create(["name"=>'الثالثة' , 'stage_id' =>2]);Year::create(["name"=>'الرابعة' , 'stage_id' =>2]);;
        Year::create(["name"=>'أولى' , 'stage_id' =>3]);Year::create(["name"=>'الثانية' , 'stage_id' =>3]);Year::create(["name"=>'الثالثة' , 'stage_id' =>3]);;

        foreach ($Oeb as $key => $school) {
            School::create([
                'name' => $school['name'] ,
                'max_students' => rand(56, 200) ,
                'city_id' => $school['city_id'] ,
                'stage_id' => $school['stage_id'] ,
            ]) ;
        }

        foreach ($AinBeida as $key => $school) {
            School::create([
                'name' => $school['name'] ,
                'max_students' => rand(56, 200) ,
                'city_id' => $school['city_id'] ,
                'stage_id' => $school['stage_id'] ,
            ]) ;
        }

        foreach ($Merouana as $key => $school) {
            School::create([
                'name' => $school['name'] ,
                'max_students' => rand(56, 200) ,
                'city_id' => $school['city_id'] ,
                'stage_id' => $school['stage_id'] ,
            ]) ;
        }

    }
}
