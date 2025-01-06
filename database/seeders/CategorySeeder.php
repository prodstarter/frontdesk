<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'guests' => 'Guests',
            'staff' => 'Staff',
            'clients' => 'Clients',
            'vendors' => 'Vendors',
            'interviewees' => 'Interviewees',
            'prospectiveClients' => 'Prospective Clients',
            'deliveryPersonnel' => 'Delivery Personnel',
            'students' => 'Students',
            'contractEmployees' => 'Contract Employees',
            'consultants' => 'Consultants',
            'vip' => 'VIP',
            'others' => 'Others',
        ];


        foreach ($categories as $key => $value) {
            Category::create([
                'name' => $value,
                'company_id' => Company::inRandomOrder()->first()->id,
            ]);
        }
    }
}
