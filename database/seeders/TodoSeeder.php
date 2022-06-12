<?php
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;
use File;
  
class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Todo::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
  
        $json = File::get("database/data/todo.json");
        $todos = json_decode($json);
  
        foreach ($todos as $key => $value) {
            Todo::create([
                "user_id" => $value->userId,
                "task" => $value->title,
                "completed" => $value->completed,
            ]);
        }
    }
}

