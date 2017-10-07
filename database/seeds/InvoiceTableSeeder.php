<?php

use App\Invoice;
use Illuminate\Database\Seeder;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = \App\Customer::query()->select('id')->get();
        for ($i = 0; $i < 25; ++$i) {
            $invoice = factory(Invoice::class)->create([
                'customer_id' => $customers->random()->id,
            ]);

            foreach(range(1,mt_rand(2,6)) as $j){
                factory(\App\InvoiceItem::class)->create([
                    'invoice_id' => $invoice->id
                ]);
            };
        }
    }
}
