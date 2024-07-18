<?php

namespace App\Livewire\Zync\Audit\SalesTrack;

use Aaran\Audit\Models\Client;
use Aaran\Audit\Models\SalesTrack\Rootline;
use Aaran\Audit\Models\SalesTrack\RootlineItems;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    use CommonTrait;

    #region[clients]
    public function clients(): void
    {
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


    #region[rootline]
    public function rootLine(): void
    {
        DB::table('rootlines')->delete();

        DB::statement("ALTER TABLE rootlines AUTO_INCREMENT = 1;");

        $rootLines = DB::connection('mariadb_web')->table('rootlines')->get();

        foreach ($rootLines as $rootLine) {
            Rootline::create([
                'id' => $rootLine->id,
                'vname' => $rootLine->vname,
                'active_id' => $rootLine->active_id,
                'user_id' => '1',
            ]);
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => 'Rootline Sync  Successfully']);
    }
    #endregion


    #region[rootline items]
    public function rootLineItems(): void
    {
        DB::table('rootline_items')->delete();

        DB::statement("ALTER TABLE rootline_items AUTO_INCREMENT = 1;");


        $rootLines = DB::connection('mariadb_web')->table('rootline_items')->get();

        foreach ($rootLines as $row) {

            RootlineItems::create([
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

    #region[render]
    public function render()
    {
        return view('livewire.zync.audit.sales-track.index');
    }
    #endregion
}
