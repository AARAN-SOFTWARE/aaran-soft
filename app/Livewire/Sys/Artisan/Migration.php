<?php

namespace App\Livewire\Sys\Artisan;

use App\Models\Role;
use App\Models\SoftVersion;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class Migration extends Component
{
    public Collection $users;
    public Collection $tenants;
    public mixed $roles;

    public Collection $versions;

    public string $user_id = '';
    public string $tenant_id = '';
    public string $role_id = '';
    public string $soft_v = '';
    public string $db_v = '';

    public function getUser()
    {
        $this->users = \DB::table('users')->get();
    }

    public function getTenants()
    {
        $this->tenants = \DB::table('tenants')->get();

    }

    public function getRoles()
    {
        $this->roles = \DB::table('roles')->get();
    }

    public function getVersions()
    {
        $obj = SoftVersion::latest()->first();
        $this->soft_v = $obj->soft_version;
        $this->db_v = $obj->db_version;
    }

    public function getObj($no)
    {
        $obj = User::find($no);
        $this->tenant_id = $obj->tenant_id;
        $this->role_id = $obj->role_id;
        dd($this->tenant_id);

    }

    public function updateUser()
    {
        \DB::table('users')
            ->where('id', '=', $this->user_id)
            ->update([
                'tenant_id' => $this->tenant_id,
                'role_id' => $this->role_id,
            ]);

        $this->role_id = '';
        $this->tenant_id = '';
        $this->user_id = '';
    }

    public function updateVersion()
    {
       SoftVersion::create([
          'soft_version' => $this->soft_v,
          'db_version' => $this->db_v,
       ]);

        $this->soft_v = '';
        $this->db_v = '';
    }


    #region[Migration]
    public function clearView(): void
    {
        Artisan::call('view:clear');
    }

    public function runMigration(): void
    {
        Artisan::call('migrate');
    }

    public function runMigrationRollBack(): void
    {
        Artisan::call('migrate:rollback');
    }


    public function runMigrationFreshSeed(): void
    {
        Artisan::call('migrate:fresh --seed');
    }

    public function storageLink(): void
    {
        Artisan::call('storage:link');
    }

    #endregion

    public function render()
    {
        $this->getUser();
        $this->getRoles();
        $this->getTenants();
        $this->getVersions();
        return view('livewire.sys.artisan.migration');
    }
}
