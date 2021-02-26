<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\UserFactory;
use App\Models\Product;

class ProducTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product::factory()
        //     ->count(50)
        //     ->create();

        $file = app()->basePath('config') . env('DB_SEED_DATA_CSV');
        
        $products =  $this->csvToArray($file);

        // for ($i = 0; $i < count($products); $i ++)
        // // for ($i = 0; $i < 20; $i ++)
        // {
        //     // Product::firstOrCreate($products[$i]);
        //     // Product::firstOrCreate($this->parser($products[$i]));
        //     // $this->parser($products[$i]);
        //     if ($this->parser($products[$i]) != null && count($products[$i]) == 17)
        //     // {
        //         print($i."\r\n");
                // Product::firstOrCreate($this->parser($products[51]));
            // }
                // print();
                // Product::firstOrCreate($this->parser($products[$i]));
        // }
        $header = array(
            'amzon_id',
            'name',
            'brand_name',
            'selling_price',
            'quantity',
            'model_number',
            'description',
            'specification',
            'technical_details',
            'weight',
            'dimensions',
            'images',
            'sku',
            'url',
            'stock',
            'detail', 
            'color'
        );
        
        foreach ($products as $p){
            if ($this->parser($p) != null && count($p) == 17)
            {   $fp = array_combine($header, $p);
                print_r($fp['amzon_id']);
                // Product::firstOrCreate([
                //     'amzon_id' => $fp['amzon_id'],
                //     'name' => $fp['name'],
                //     'brand_name' => $fp['brand_name'],
                //     'selling_price' => $fp['selling_price'],
                //     'quantity' => $fp['quantity'],
                // ]);
                Product::firstOrCreate($fp);
        }

       }
        print_r('Amazon list Product seeding done');
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

                    $header = array(
                    'amzon_id',
                    'name',
                    'brand_name',
                    'selling_price',
                    'quantity',
                    'model_number',
                    'description',
                    'specification',
                    'technical_details',
                    'weight',
                    'dimensions',
                    'images',
                    'sku',
                    'url',
                    'stock',
                    'detail', 
                    'color'
                );
                
                    $row_data = array(
                        isset($row[0]) ? $row[0] : '0',
                        isset($row[1]) ? $row[1] : '0',
                        isset($row[2]) ? $row[2] : '0',
                        isset($row[7]) ? $row[7] : '0',
                        isset($row[8]) ? $row[8] : '0',
                        isset($row[9]) ? $row[9] : '0',
                        isset($row[10]) ? $row[10] : '0',
                        isset($row[11]) ? $row[11] : '0',
                        isset($row[12]) ? $row[12] : '0',
                        isset($row[13]) ? $row[13] : '0',
                        isset($row[14]) ? $row[14] : '0',
                        isset($row[15]) ? $row[15] : '0',
                        isset($row[17]) ? $row[17] : '0',
                        isset($row[18]) ? $row[18] : '0',
                        isset($row[19]) ? $row[19] : '0',
                        isset($row[20]) ? $row[20] : '0',
                        isset($row[22]) ? $row[22] : '0'
                    );
                    $data[] = array_combine($header, $row_data);
                }
               
                    
            }

            fclose($handle);
        }

        return $data;
    }

    public function parser($data)
    {
        $amzon_id ="";
        $name ="";
        $brand_name ="";
        $selling_price="";
        $quantity="";
        $model_number="";
        $description="";
        $specification="";
        $technical_details="";
        $weight="";
        $dimensions="";
        $images="";
        $sku="";
        $url="";
        $stock="";
        $detail="";
        $color="";
        foreach($data as $key => $value) {
            // $result = trim($value[0]);
            // echo $key.' is a '.$value[0].' containing '.$result;

             if ($key == 'amzon_id'){
                    if (strlen($value) < 32)
                    {
                        // print($key.' invalid: too short '.$value."\r\n");
                        return null;
                    }
                    else{

                        $amzon_id = $value;
                    }
                   
                }
                elseif($key == 'name'){
                    if (strlen($value) < 1)
                    {
                        return null;
                        
                    }else{
                        if (filter_var($value, FILTER_VALIDATE_URL)) { 
                            return null;
                          }
                          
                        // echo $key.' is a >>>>>'.$value.' containing '."\r\n";
                        $name = $value;
                    }
                   

                }
                elseif($key == 'selling_price'){
                    if (strlen($value) < 1)
                        return null;
                    if ($value == "0")
                        return null;
                    if (filter_var($value, FILTER_VALIDATE_URL)) { 
                        return null;
                      }
                    // echo $key.' is a >>>>>'.substr($value, 1, 5)."\r\n";
                    // echo $key.' is a >>>>>'.$value."\r\n";
                    // $selling_price = substr($value, 1, 5);
                    $selling_price = $value;

                }
                elseif($key == 'quantity'){
                    if (strlen($value) < 1)
                    // return null;
                    // echo $key.' is a >>>>>'.$value.' containing '."\r\n";
                    $quantity = 0;

                }
                elseif($key == 'model_number'){
                    if (strlen($value) < 1)
                        return null;
                    // echo $key.' is a >>>>>'.$value.' containing '."\r\n";
                    $model_number = $value;

                }
                elseif($key == 'description'){
                    if (strlen($value) < 1)
                        return null;
                    // echo $key.' is a >>>>>'.$value.' containing '."\r\n";
                    $description = $value;

                }
                elseif($key == 'specification'){
                    if (strlen($value) < 1)
                        return null;
                    // echo $key.' is a >>>>>'.$value.' containing '."\r\n";
                    $specification = $value;

                }
                elseif($key == 'technical_details'){
                    if (strlen($value) < 1)
                    return null;
                    if ($value == "0")
                        return null;
                    // echo $key.' is a >>>>>'.$value.' containing '."\r\n";
                    $technical_details = $value;

                }
                elseif($key == 'weight'){
                    if (strlen($value) < 1)
                    return null;
                    if ($value == "0")
                    return null;

                    if (strlen($value) > 15)
                    return null;
                    // echo $key.' is a >>>>>'.$value.' containing '."\r\n";
                    $weight = $value;

                }
                elseif($key == 'dimensions'){
                    // echo $key.' is a  >>>>>'.$value.' containing '."\r\n";
                    // $dimensions = $value;
                    // if (strlen($value) < 1)
                    // $dimensions = "none";

                    if (strlen($value) < 1)
                    return null;
                    $dimensions = $value;
                }
                elseif($key == 'images'){
                    if (!filter_var($value, FILTER_VALIDATE_URL)) { 
                        return null;
                      }
                    // echo $key.' is a >>>>>'.$value.' containing '."\r\n";
                    $images = $value;
                }
                elseif($key == 'sku'){
                    if (strlen($value) < 1)
                    return null;
                    // echo $key.' is a >>>>>'.$value.' containing '."\r\n";
                    $sku = $value;
                }

        }
        return $row_data = array(
        $amzon_id,
        $name,
        $brand_name,
        $selling_price,
        $quantity,
        $model_number,
        $description,
        $specification,
        $technical_details,
        $weight,
        $dimensions,
        $images,
        $sku,
        $url,
        $stock,
        $detail,
        $color,
        );
        
        // $result = trim($string);
        // if ($key == 'amzon_id'){
        //     if (strlen($result)> 32)
        //     return null;
        // }
    }
}
