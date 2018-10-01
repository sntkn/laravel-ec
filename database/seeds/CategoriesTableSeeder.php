<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Category::class, 3)->create();

        $faker = Faker\Factory::create('ja_JP');
        foreach (Category::find([1, 2, 3]) as $item) {
            $this->addChildren($item, $faker, rand(1, Category::count()));
        }

        foreach (Category::all()->random(3) as $item) {
            $this->addChildren($item, $faker, rand(1, Category::count()));
        }

        foreach (Category::all()->random(6) as $item) {
            $this->addChildren($item, $faker, rand(1, Category::count()));
        }
    }

    private function addChildren($entity, $faker, int $number)
    {
        $children = [];
        for ($i=0; $i<$number; $i++) {
            $children[] = new Category(['name'=>$faker->word()]);
        }
        return $entity->addChildren($children);
    }
}
