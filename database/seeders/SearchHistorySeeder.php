<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SearchHistory;

class SearchHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SearchHistory::create([
            'key_words' => 'Hardik',
            'user_id'=>'1',
            'user_name' => 'Hardik',
        ]);
        SearchHistory::create([
            'key_words' => 'bangladdesh',
            'user_id'=>2,
            'user_name' => 'Rahim',
        ]);
        SearchHistory::create([
            'key_words' => 'key words',
            'user_id'=>4,
            'user_name' => 'Sakib',
        ]);
        SearchHistory::create([
            'key_words' => 'chatgpt',
            'user_id'=>1,
            'user_name' => 'Hardik',
        ]);
        SearchHistory::create([
            'key_words' => 'hatirjheel',
            'user_id'=>2,
            'user_name' => 'Rahim',
        ]);
        SearchHistory::create([
            'key_words' => 'habi jabi',
            'user_id'=>3,
            'user_name' => 'Sadman',
        ]);
        SearchHistory::create([
            'key_words' => 'banglaadesh',
            'user_id'=>5,
            'user_name' => 'Taskin',
        ]);
    }
}
