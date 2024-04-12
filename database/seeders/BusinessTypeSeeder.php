<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\BusinessType;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array([
            'id' => 1,
            'business_type_code' => 'Service',
            'type' => 'Service Business',
            'description' => 'A service type of business provides intangible products (products with no physical form). Service type firms offer professional skills, expertise, advice, and other similar products.

            Examples of service businesses are salons, repair shops, schools, banks, accounting firms, and law firms.',
        ], [
            'id' => 2,
            'business_type_code' => 'Merchandising',
            'type' => 'Merchandising Business',
            'description' => 'This type of business buys products at wholesale price and sells the same at retail price. They are known as "buy and sell" businesses. They make a profit by selling the products at prices higher than their purchase costs.

            A merchandising business sells a product without changing its form. Examples are grocery stores, convenience stores, distributors, and other resellers.',
        ], [
            'id' => 3,
            'business_type_code' => 'Manufacturing',
            'type' => 'Manufacturing Business',
            'description' => 'Unlike a merchandising business, a manufacturing business buys products with the intention of using them as materials in making a new product. Thus, there is a transformation of the products purchased.

            A manufacturing business combines raw materials, labor, and factory overhead in its production process. The manufactured goods will then be sold to customers.',
        ]);
        BusinessType::factory()->create($data);
    }
}
