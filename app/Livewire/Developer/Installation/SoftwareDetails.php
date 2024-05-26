<?php

namespace App\Livewire\Developer\Installation;

use Aaran\Common\Models\Software_details;
use App\Enums\Version;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class SoftwareDetails extends Component
{
    use CommonTrait;


    public string $sub_domain = '';
    public string $database = '';
    public string $git = '';
    public string $webhook = '';
    public string $copy_build_folder = '';
    public string $copy_env = '';
    public string $db_migrate = '';
    public string $storage_link = '';
    public string $user_created = '';
    public string $user_tenant_id = '';
    public $installed_on = '';
    public mixed $soft_version;
    public mixed $db_version;


    #region[mount]
    public function mount()
    {
        $this->installed_on = Carbon::now()->format('Y-m-d');
        $this->soft_version = Version::v_1_0_2->name;
        $this->db_version = Version::v_1_0_2->name;
    }
    #endregion[]

    #region[save]
    public function getSave(): string
    {

        if ($this->sub_domain != '') {
            if ($this->vid == "") {
                Software_details::create([
                    'sub_domain' => $this->sub_domain,
                    'database' => $this->database,
                    'git' => $this->git,
                    'webhook' => $this->webhook,
                    'copy_build_folder' => $this->copy_build_folder,
                    'copy_env' => $this->copy_env,
                    'db_migrate' => $this->db_migrate,
                    'storage_link' => $this->storage_link,
                    'user_created' => $this->user_created,
                    'user_tenant_id' => $this->user_tenant_id,
                    'installed_on' => $this->installed_on,
                    'soft_version' => $this->soft_version,
                    'db_version' => $this->db_version,
                    'active_id' => $this->active_id,
                ]);
                $message = "Saved";

            } else {
                $obj = Software_details::find($this->vid);
                $obj->sub_domain = $this->sub_domain;
                $obj->database = $this->database;
                $obj->git = $this->git;
                $obj->webhook = $this->webhook;
                $obj->copy_build_folder = $this->copy_build_folder;
                $obj->copy_env = $this->copy_env;
                $obj->db_migrate = $this->db_migrate;
                $obj->storage_link = $this->storage_link;
                $obj->user_created = $this->user_created;
                $obj->user_tenant_id = $this->user_tenant_id;
                $obj->installed_on = $this->installed_on;
                $obj->soft_version = $this->soft_version;
                $obj->db_version = $this->db_version;
                $obj->active_id = $this->active_id;
                $obj->save();
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
        return '';
    }
    #endregion

    #region[clear]
    public function clearFields(): void
    {
        $this->sub_domain = '';
        $this->database = '';
        $this->git = '';
        $this->webhook = '';
        $this->copy_build_folder = '';
        $this->copy_env = '';
        $this->db_migrate = '';
        $this->storage_link = '';
        $this->user_created = '';
        $this->user_tenant_id = '';
        $this->installed_on = '';
        $this->soft_version = Version::v_1_0_2->name;
        $this->db_version = Version::v_1_0_2->name;
        $this->active_id = true;
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Software_details::find($id);
            $this->vid = $obj->id;
            $this->sub_domain = $obj->sub_domain;
            $this->database = $obj->database;
            $this->git = $obj->git;
            $this->webhook = $obj->webhook;
            $this->copy_build_folder = $obj->copy_build_folder;
            $this->copy_env = $obj->copy_env;
            $this->db_migrate = $obj->db_migrate;
            $this->storage_link = $obj->storage_link;
            $this->user_created = $obj->user_created;
            $this->user_tenant_id = $obj->user_tenant_id;
            $this->installed_on = $obj->installed_on;
            $this->soft_version = $obj->soft_version;
            $this->db_version = $obj->db_version;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[list]
    public function getList()
    {
        $this->sortField = 'sub_domain';

        return Software_details::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion
    #region[sort]
    public function sortBy($field): void
    {
        if ($this->sortField_1 === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }
    #endregion

    #region[render]
    public function reRender(): void
    {
        $this->render()->render();
    }


    public function render()
    {
        return view('livewire.developer.installation.software-details')->with([
            'list' => $this->getList()
        ]);
    }
}
