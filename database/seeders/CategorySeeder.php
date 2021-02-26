<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::factory()
        // ->count(10)
        // ->create();

        $file = app()->basePath('config') . env('DB_SEED_DATA_CSV');
        
        $categories =  $this->csvToArray($file);

        // // for ($i = 1; $i < count($categories); $i ++){
        //     print_r($categories);
        // // }
        foreach ($categories as $cat){
            //  print_r($cat."\r\n");
             Category::firstOrCreate([
                 'name' => $cat,
             ]);
        }
                              
        print_r('Amazon list Category seeding done');
    }

    function csvToArray($filename = '', $delimiter = ',', $headerrow = '')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    { $header = $row;
                    }
                else{

                    if (isset($row[4]) && (strlen($row[4]) > 1) && !filter_var($row[4], FILTER_VALIDATE_URL)){
                       
                        $cats = explode("|", $row[4]);  
                        foreach ($cats as $cat)
                                array_push($data, trim($cat));
                    }
                }
               
                    
            }

            fclose($handle);
        }

        return array_unique($data);
    }
}
