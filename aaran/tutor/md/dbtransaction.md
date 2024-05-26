# DB Transaction

## Description
To Create Transaction for multiple table process, no need for single transaction

## Usage Examples
1. DB::begin transaction
```php

 try { DB::beginTransaction();
       
             $bank =  Bank::create([
                      'vname' => Str::ucfirst($this->vname),
                      'active_id' => $this->active_id,
                    ]);
                    
                    ClientBank::create([
                    'bank_id' => $bank->id
                    'bank_name' ....
                    ]);
                // Do something and save to the db...

                // Commit the transaction

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

```

2. Multiple database save

```php

        DB::connection('mysql')->beginTransaction();
        try {
            DB::connection('mysql')->table('users')->update(['name' => 'John']);
            DB::connection('pgsql')->beginTransaction();
            DB::connection('pgsql')->table('orders')->update(['status' => 'shipped']);
            DB::connection('pgsql')->commit();
            DB::connection('mysql')->commit();
        } catch (\Exception $e) {
            DB::connection('mysql')->rollBack();
            DB::connection('pgsql')->rollBack();
            throw $e;
        }

```

```php
        $first = DB::table("receipts")
            ->select(
                'receipts.company_id',
                'receipts.contact_id',
                DB::raw("'receipt' as mode"),
                "receipts.id as vno",
                'receipts.vdate as vdate',
                DB::raw("'' as grand_total"),
                'receipts.receipt_amount',
            );

        $final = DB::table("sales")
            ->select(
                'sales.company_id',
                'sales.contact_id',
                DB::raw("'invoice' as mode"),
                "sales.invoice_no as vno",
                'sales.invoice_date as vdate',
                'sales.grand_total',
                DB::raw("'' as receipt_amount"),
            )
            ->union($first)
            ->orderBy('vdate')
            ->orderBy('mode')
            ->get();

        return $final;
```
