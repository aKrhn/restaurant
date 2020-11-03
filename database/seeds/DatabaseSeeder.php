<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Subcategory;
use App\Product;
use App\User;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // $this->call(UsersTableSeeder::class);
    Category::create([
      'name'=>'food',
      'slug'=>'food',
      'description'=>'food category',
      'image'=>'files/67CsNDz6qei0xYRTEzdSAXKpLEyQ94G2Si4Ixu0F.jpeg'
    ]);

    Category::create([
      'name'=>'drinks',
      'slug'=>'drinks',
      'description'=>'drinks category',
      'image'=>'files/kEZ3czyGtDKV5XgsF208WVY55OVPhCa7J7ZXct1O.jpeg'
    ]);

    Subcategory::create([
      'name'=>'meat',
      'category_id'=>1
    ]);

    Subcategory::create([
      'name'=>'alcohol',
      'category_id'=>2
    ]);

    Subcategory::create([
      'name'=>'beverages',
      'category_id'=>2
    ]);


    Product::create([
      'name'=>'Jhonnie-walker Whiskey',
      'image'=>'product/VcIONa31vVgL1ncdIjEyIKvwvSeRpRV50YWTuPdG.jpeg',
      'price'=> 700,
      'description'=>'This is the description of a product',
      'additional_info'=>'This is additional info',
      'category_id'=> 2,
      'subcategory_id'=>1
    ]);

    Product::create([
      'name'=>'Merlot Wine',
      'image'=>'product/healthy-eating-ingredients-1200x628-facebook-1200x628.jpeg',
      'price'=> 500,
      'description'=>'This is the description of a product',
      'additional_info'=>'This is additional info',
      'category_id'=> 2,
      'subcategory_id'=>1
    ]);

    Product::create([
      'name'=>'Coke',
      'image'=>'product/MW-HX764_coke_c_20200103171249_ZQ.jpg',
      'price'=> 5,
      'description'=>'This is the description of a product',
      'additional_info'=>'This is additional info',
      'category_id'=> 2,
      'subcategory_id'=>1
    ]);

    Product::create([
      'name'=>'Aspava',
      'image'=>'product/iskender3slider1.jpeg',
      'price'=> 50,
      'description'=>'This is the description of a product',
      'additional_info'=>'This is additional info',
      'category_id'=> 1,
      'subcategory_id'=>2
    ]);

    User::create([
      'name'=>'LaraAdmin',
      'email'=>'admin@gmail.com',
      'password'=>bcrypt('password'),
      'email_verified_at'=>NOW(),
      'address'=>'Turkey',
      'phone_number'=>'0543',
      'is_admin'=>1
    ]);
  }
}
