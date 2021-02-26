<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ProductCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = app()->basePath('config') . env('DB_SEED_DATA_CSV');
        
        $this->csvToArray($file);
                              
        print_r('Amazon list Prodcut Category relationship seeding done');
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
                    //   print_r($row);  
                    }
                else{

                    // if (isset($row[0]) && (strlen($row[0]) < 32)){
                    if (isset($row[0]) && (strlen($row[0]) == 32 )){
                        // print($row[0]."\r\n");
                        try
                            {
                                $product = Product::where('amzon_id', '=', $row[0] )->firstOrFail();
                                if ($row[0] == $product->amzon_id) {

                                if (isset($row[4]) && (strlen($row[4]) > 1) && !filter_var($row[4], FILTER_VALIDATE_URL)){
                                    $cats = array_map('trim', explode("|", $row[4]));
                                    
                                    $product_cat = Category::whereIn('name', $cats)->get();
                                    $product->categories()->sync($product_cat);
                                    
                                }
                                       
                                 }
                            }
                        catch(ModelNotFoundException $e)
                            {
                                // dd(get_class_methods($e)); // lists all available methods for exception object
                                
                            }
                       
                       
                        

                        

                    }
                      

                    

                }
               
                    
            }

            fclose($handle);
        }

    }
    
}
