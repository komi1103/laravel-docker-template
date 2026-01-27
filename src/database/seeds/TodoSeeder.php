<?php

use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->truncate(); //該当のテーブルのレコードをすべて削除するTRUNCATE文を実行

        $testData = [
             [
                'content' => 'PHP Appセクションを終える',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Laravel Lessonを終える',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        
        DB::table('todos')->insert($testData); //引数のデータをテーブルに投入するINSERT文を実行
    }
}
