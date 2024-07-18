<?php

namespace App\Livewire\Zync\Audit\SalesTrack;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\SalesTrack\Rootline;
use Aaran\Audit\Models\SalesTrack\RootlineItems;
use Aaran\Audit\Models\SalesTrack\SalesBill;
use Aaran\Audit\Models\SalesTrack\SalesBillItem;
use Aaran\Audit\Models\SalesTrack\SalesTrack;
use Aaran\Audit\Models\SalesTrack\SalesTrackItem;
use Aaran\Audit\Models\Vehicle;
use Aaran\Common\Models\Category;
use Aaran\Common\Models\Colour;
use Aaran\Common\Models\Hsncode;
use Aaran\Common\Models\Size;
use Aaran\Master\Models\Product;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[clients]
    public function clients(): void
    {
        DB::table('sales_bill_items')->delete();
        DB::table('sales_bills')->delete();
        DB::table('sales_track_items')->delete();
        DB::table('sales_tracks')->delete();
        DB::table('rootline_items')->delete();
        DB::table('rootlines')->delete();
        DB::table('clients')->delete();

        DB::statement("ALTER TABLE clients AUTO_INCREMENT = 1;");

        $rootLines = DB::connection('mariadb_web')->table('clients')->get();

        foreach ($rootLines as $row) {
            Client::create([
                'id' => $row->id,
                'vname' => $row->vname,
                'group' => $row->group,
                'payable' => $row->payable,
                'active_id' => $row->active_id,
                'user_id' => '1',
            ]);
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Clients Sync Successfully']);
    }
    #endregion

    #region[vehicles]
    public function vehicles(): void
    {
        DB::table('sales_bill_items')->delete();
        DB::table('sales_bills')->delete();
        DB::table('sales_track_items')->delete();
        DB::table('sales_tracks')->delete();
        DB::table('rootline_items')->delete();
        DB::table('rootlines')->delete();
        DB::table('vehicles')->delete();

        DB::statement("ALTER TABLE vehicles AUTO_INCREMENT = 1;");

        $rootLines = DB::connection('mariadb_web')->table('vehicles')->get();

        foreach ($rootLines as $row) {
            Vehicle::create([
                'id' => $row->id,
                'client_id' => $row->client_id,
                'vname' => $row->vname,
                'active_id' => $row->active_id,
                'user_id' => '1',
            ]);
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Vehicle Sync Successfully']);
    }
    #endregion

    #region[Products]
    public function products(): void
    {
        DB::table('sales_bill_items')->delete();
        DB::table('sales_bills')->delete();
        DB::table('products')->delete();
        DB::table('hsncodes')->delete();

        DB::statement("ALTER TABLE hsncodes AUTO_INCREMENT = 1;");
        DB::statement("ALTER TABLE products AUTO_INCREMENT = 1;");

        $hsncodes = DB::connection('mariadb_web')->table('hsncodes')->get();

        foreach ($hsncodes as $hsncode) {
            Hsncode::create([
                'id' => $hsncode->id,
                'vname' => $hsncode->vname,
                'active_id' => $hsncode->active_id,
            ]);
        }

        $products = DB::connection('mariadb_web')->table('products')->get();

        foreach ($products as $row) {
            Product::create([
                'id' => $row->id,
                'vname' => $row->vname,
                'product_type' => $row->product_type,
                'hsncode_id' => $row->hsncode_id,
                'units' => $row->units,
                'gst_percent' => $row->gst_percent,
                'active_id' => $row->active_id,
                'company_id' => $row->company_id,
                'user_id' => '1',
            ]);
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Product Sync Successfully']);
    }
    #endregion

    #region[categories]
    public function categories(): void
    {
        DB::table('sales_bill_items')->delete();
        DB::table('sales_bills')->delete();
        DB::table('categories')->delete();

        DB::statement("ALTER TABLE categories AUTO_INCREMENT = 1;");

        $rootLines = DB::connection('mariadb_web')->table('categories')->get();

        foreach ($rootLines as $row) {
            Category::create([
                'id' => $row->id,
                'vname' => $row->vname,
                'active_id' => $row->active_id,
            ]);
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Category Sync Successfully']);
    }
    #endregion

    #region[Colours]
    public function colours(): void
    {
        DB::table('sales_bill_items')->delete();
        DB::table('sales_bills')->delete();
        DB::table('colours')->delete();

        DB::statement("ALTER TABLE colours AUTO_INCREMENT = 1;");

        $rootLines = DB::connection('mariadb_web')->table('colours')->get();

        foreach ($rootLines as $row) {
            Colour::create([
                'id' => $row->id,
                'vname' => $row->vname,
                'active_id' => $row->active_id,
            ]);
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Colours Sync Successfully']);
    }
    #endregion

    #region[Sizes]
    public function sizes(): void
    {
        DB::table('sales_bill_items')->delete();
        DB::table('sales_bills')->delete();
        DB::table('sizes')->delete();

        DB::statement("ALTER TABLE sizes AUTO_INCREMENT = 1;");

        $rootLines = DB::connection('mariadb_web')->table('sizes')->get();

        foreach ($rootLines as $row) {
            Size::create([
                'id' => $row->id,
                'vname' => $row->vname,
                'active_id' => $row->active_id,
            ]);
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Size Sync Successfully']);
    }
    #endregion

    #region[rootline]
    public function rootLine(): void
    {
        DB::table('sales_bill_items')->delete();
        DB::table('sales_bills')->delete();
        DB::table('sales_track_items')->delete();
        DB::table('sales_tracks')->delete();
        DB::table('rootline_items')->delete();
        DB::table('rootlines')->delete();

        DB::statement("ALTER TABLE rootlines AUTO_INCREMENT = 1;");

        $rootLines = DB::connection('mariadb_web')->table('rootlines')->get();

        foreach ($rootLines as $row) {
            Rootline::create([
                'id' => $row->id,
                'vname' => $row->vname,
                'active_id' => $row->active_id,
                'user_id' => '1',
            ]);
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Rootline Sync  Successfully']);
    }
    #endregion

    #region[rootline items]
    public function rootLineItems(): void
    {
        DB::table('sales_bill_items')->delete();
        DB::table('sales_bills')->delete();
        DB::table('sales_track_items')->delete();
        DB::table('sales_tracks')->delete();
        DB::table('rootline_items')->delete();

        DB::statement("ALTER TABLE rootline_items AUTO_INCREMENT = 1;");


        $rootLines = DB::connection('mariadb_web')->table('rootline_items')->get();

        foreach ($rootLines as $row) {

            RootlineItems::create([
                'id' => $row->id,
                'serial' => $row->serial,
                'rootline_id' => $row->rootline_id,
                'client_id' => $row->client_id,
                'active_id' => $row->active_id ?: '0',
                'user_id' => auth()->id(),
            ]);
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Rootline items Sync Successfully']);
    }
    #endregion

    #region[Sales Tracks]
    public function salesTracks(): void
    {
        DB::table('sales_bill_items')->delete();
        DB::table('sales_bills')->delete();
        DB::table('sales_track_items')->delete();
        DB::table('sales_tracks')->delete();

        DB::statement("ALTER TABLE sales_tracks AUTO_INCREMENT = 1;");


        $rootLines = DB::connection('mariadb_web')->table('sales_tracks')->get();

        foreach ($rootLines as $row) {

            SalesTrack::create([
                'id' => $row->id,
                'vcode' => $row->vcode,
                'vdate' => $row->vdate,
                'rootline_id' => $row->rootline_id,
                'active_id' => $row->active_id ?: '0',
                'user_id' => auth()->id(),
            ]);
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Sales Track Sync Successfully']);
    }
    #endregion

    #region[Sales Tracks Items]
    public function salesTracksItems(): void
    {
        DB::table('sales_bill_items')->delete();
        DB::table('sales_bills')->delete();
        DB::table('sales_track_items')->delete();

        DB::statement("ALTER TABLE sales_track_items AUTO_INCREMENT = 1;");


        $rootLines = DB::connection('mariadb_web')->table('sales_track_items')->get();

        foreach ($rootLines as $row) {

            SalesTrackItem::create([
                'id' => $row->id,
                'serial' => $row->serial,
                'vdate' => $row->vdate,
                'rootline_id' => $row->rootline_id,
                'sales_track_id' => $row->sales_track_id,
                'client_id' => $row->client_id,
                'status' => $row->status,
                'active_id' => $row->active_id ?: '0',
                'user_id' => auth()->id(),
            ]);
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Sales Track Items Sync Successfully']);
    }
    #endregion

    #region[Sales Bills]
    public function salesBills(): void
    {
        DB::table('sales_bill_items')->delete();
        DB::table('sales_bills')->delete();

        DB::statement("ALTER TABLE sales_bills AUTO_INCREMENT = 1;");


        $rootLines = DB::connection('mariadb_web')->table('sales_bills')->get();

        foreach ($rootLines as $row) {

            SalesBill::create([
                'id' => $row->id,
                'serial' => $row->serial,
                'rootline_id' => $row->rootline_id,
                'sales_track_item_id' => $row->sales_track_item_id,
                'sales_track_id' => $row->sales_track_id,
                'unique_no' => $row->unique_no,
                'group' => $row->group,
                'vno' => $row->vno,
                'vdate' => $row->vdate,
                'sales_from' => $row->sales_from,
                'client_id' => $row->client_id,
                'bundle' => $row->bundle,
                'ledger_id' => $row->ledger_id,
                'additional' => $row->additional,
                'total_qty' => $row->total_qty,
                'taxable' => $row->taxable,
                'gst' => $row->gst,
                'round_off' => $row->round_off,
                'grand_total' => $row->grand_total,
                'vehicle_id' => $row->vehicle_id,
                'status' => $row->status,
                'active_id' => $row->active_id ?: '0',
                'user_id' => auth()->id(),
            ]);
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Sales Bill Sync Successfully']);
    }
    #endregion

    #region[Sales Bills Items]
    public function salesBillsItems(): void
    {
        DB::table('sales_bill_items')->delete();

        DB::statement("ALTER TABLE sales_bill_items AUTO_INCREMENT = 1;");


        $rootLines = DB::connection('mariadb_web')->table('sales_bill_items')->get();

        foreach ($rootLines as $row) {

            SalesBillItem::create([
                'id' => $row->id,
                'serial' => $row->serial,
                'sales_track_bill_id' => $row->sales_track_bill_id,
                'category_id' => $row->category_id,
                'product_id' => $row->product_id,
                'description' => $row->description,
                'colour_id' => $row->colour_id,
                'size_id' => $row->size_id,
                'qty' => $row->qty,
                'price' => $row->price,
                'active_id' => $row->active_id ?: '0',
                'user_id' => auth()->id(),
            ]);
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Sales Bill items Sync Successfully']);
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.zync.audit.sales-track.index');
    }
    #endregion
}
