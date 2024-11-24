<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\BankAccount;
class BankAccount_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $bankAccount = new BankAccount();
        $bankAccount->holder_uid = 1;
        $bankAccount->account_number = $faker->creditCardNumber();
        $bankAccount->bank_name = $faker->company();
        $bankAccount->branch_name = $faker->company();
        $bankAccount->holder_name = $faker->name();
        
    }
}
