<?php

namespace App\Livewire\Master\Contact;


use Aaran\Common\Models\Country;
use Aaran\Master\Models\Contact;
use Aaran\Common\Models\City;
use Aaran\Common\Models\State;
use Aaran\Common\Models\Pincode;
use Aaran\Master\Models\Contact_detail;
use App\Livewire\Trait\CommonTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class Upsert extends Component
{
    use CommonTrait;

    #region[Contact properties]

    public string $mobile = '';
    public string $whatsapp = '';
    public string $contact_person = '';
    public mixed $contact_type='';
    public string $msme_no = '';
    public string $msme_type = '';
    public mixed $opening_balance = 0;
    public string $effective_from = '';
    public mixed $route;

    #endregion

    #region[Address Properties]
    public $contact_detail_id = '';
    public $address_type = '';
    public $address_1 = '';
    public $address_2 = '';
    public $gstin = '';
    public $email = '';

    #endregion

    #region[array]
    public $itemList = [];
    public mixed $itemIndex = '';
    #endregion

    #region[City]
    public $city_id = '';
    public $city_name = '';
    public Collection $cityCollection;
    public $highlightCity = 0;
    public $cityTyped = false;

    public function decrementCity(): void
    {
        if ($this->highlightCity === 0) {
            $this->highlightCity = count($this->cityCollection) - 1;
            return;
        }
        $this->highlightCity--;
    }

    public function incrementCity(): void
    {
        if ($this->highlightCity === count($this->cityCollection) - 1) {
            $this->highlightCity = 0;
            return;
        }
        $this->highlightCity++;
    }

    public function setCity($name, $id): void
    {
        $this->city_name = $name;
        $this->city_id = $id;
        $this->getCityList();
    }

    public function enterCity(): void
    {
        $obj = $this->cityCollection[$this->highlightCity] ?? null;

        $this->city_name = '';
        $this->cityCollection = Collection::empty();
        $this->highlightCity = 0;

        $this->city_name = $obj['vname'] ?? '';;
        $this->city_id = $obj['id'] ?? '';;
    }

    #[On('refresh-city')]
    public function refreshCity($v): void
    {
        $this->city_id = $v['id'];
        $this->city_name = $v['name'];
        $this->cityTyped = false;

    }

    public function citySave($name)
    {
        $obj= City::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshCity($v);
    }

    public function getCityList(): void
    {
        $this->cityCollection = $this->city_name ? City::search(trim($this->city_name))->get() : City::all();
    }
    #endregion

    #region[State]
    public $state_id = '';
    public $state_name = '';
    public Collection $stateCollection;
    public $highlightState = 0;
    public $stateTyped = false;

    public function decrementState(): void
    {
        if ($this->highlightState === 0) {
            $this->highlightState = count($this->stateCollection) - 1;
            return;
        }
        $this->highlightState--;
    }

    public function incrementState(): void
    {
        if ($this->highlightState === count($this->stateCollection) - 1) {
            $this->highlightState = 0;
            return;
        }
        $this->highlightState++;
    }

    public function setState($name, $id): void
    {
        $this->state_name = $name;
        $this->state_id = $id;
        $this->getStateList();
    }

    public function enterState(): void
    {
        $obj = $this->stateCollection[$this->highlightState] ?? null;

        $this->state_name = '';
        $this->stateCollection = Collection::empty();
        $this->highlightState = 0;

        $this->state_name = $obj['vname'] ?? '';;
        $this->state_id = $obj['id'] ?? '';;
    }

    #[On('refresh-state')]
    public function refreshState($v): void
    {
        $this->state_id = $v['id'];
        $this->state_name = $v['name'];
        $this->stateTyped = false;

    }

    public function getStateList(): void
    {
        $this->stateCollection = $this->state_name ? State::search(trim($this->state_name))
            ->get() : State::all();
    }
    #endregion

    #region[Pincode]

    public $pincode_id = '';
    public $pincode_name = '';
    public Collection $pincodeCollection;
    public $highlightPincode = 0;
    public $pincodeTyped = false;

    public function decrementPincode(): void
    {
        if ($this->highlightPincode === 0) {
            $this->highlightPincode = count($this->pincodeCollection) - 1;
            return;
        }
        $this->highlightPincode--;
    }

    public function incrementPincode(): void
    {
        if ($this->highlightPincode === count($this->pincodeCollection) - 1) {
            $this->highlightPincode = 0;
            return;
        }
        $this->highlightPincode++;
    }

    public function enterPincode(): void
    {
        $obj = $this->pincodeCollection[$this->highlightPincode] ?? null;

        $this->pincode_name = '';
        $this->pincodeCollection = Collection::empty();
        $this->highlightPincode = 0;

        $this->pincode_name = $obj['vname'] ?? '';;
        $this->pincode_id = $obj['id'] ?? '';;
    }

    public function setPincode($name, $id): void
    {
        $this->pincode_name = $name;
        $this->pincode_id = $id;
        $this->getPincodeList();
    }

    #[On('refresh-pincode')]
    public function refreshPincode($v): void
    {
        $this->pincode_id = $v['id'];
        $this->pincode_name = $v['name'];
        $this->pincodeTyped = false;
    }

    public function pincodeSave($name)
    {
        $obj= Pincode::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshPincode($v);
    }

    public function getPincodeList(): void
    {
        $this->pincodeCollection = $this->pincode_name ? Pincode::search(trim($this->pincode_name))
            ->get() : Pincode::all();
    }

    #endregion

    #region[Country]

    public $country_id = '';
    public $country_name = '';
    public Collection $countryCollection;
    public $highlightCountry = 0;
    public $countryTyped = false;

    public function decrementCountry(): void
    {
        if ($this->highlightCountry === 0) {
            $this->highlightCountry = count($this->countryCollection) - 1;
            return;
        }
        $this->highlightCountry--;
    }

    public function incrementCountry(): void
    {
        if ($this->highlightCountry === count($this->countryCollection) - 1) {
            $this->highlightCountry = 0;
            return;
        }
        $this->highlightCountry++;
    }

    public function enterCountry(): void
    {
        $obj = $this->countryCollection[$this->highlightCountry] ?? null;

        $this->country_name = '';
        $this->countryCollection = Collection::empty();
        $this->highlightCountry = 0;

        $this->country_name = $obj['vname'] ?? '';;
        $this->country_id = $obj['id'] ?? '';;
    }

    public function setCountry($name, $id): void
    {
        $this->country_name = $name;
        $this->country_id = $id;
        $this->getcountryList();
    }

    #[On('refresh-country')]
    public function refreshCountry($v): void
    {
        $this->country_id = $v['id'];
        $this->country_name = $v['name'];
        $this->countryTyped = false;
    }

    public function countrySave($name)
    {
        $obj= country::create([
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshCountry($v);
    }

    public function getCountryList(): void
    {
        $this->countryCollection = $this->country_name ? country::search(trim($this->country_name))
            ->get() : country::all();
    }

    #endregion

    #region[Save]
    public function save(): void
    {
        if ($this->vname != '') {
            if ($this->vid == "") {
                $obj = Contact::create([
                    'vname' => Str::upper($this->vname),
                    'mobile' => $this->mobile,
                    'whatsapp' => $this->whatsapp,
                    'contact_person' => $this->contact_person,
                    'contact_type' => $this->contact_type ?: 1,
                    'msme_no' => $this->msme_no,
                    'msme_type' => $this->msme_type,
                    'opening_balance' => $this->opening_balance?:0,
                    'effective_from' => $this->effective_from,
                    'active_id' => $this->active_id,
                    'user_id' => Auth::id(),
                    'company_id' => session()->get('company_id'),
                ]);
                $this->saveItem($obj->id);

                $message = "Saved";
                $this->getRoute();

            } else {
                $obj = Contact::find($this->vid);
                $obj->vname = Str::upper($this->vname);
                $obj->mobile = $this->mobile;
                $obj->whatsapp = $this->whatsapp;
                $obj->contact_person = $this->contact_person;
                $obj->contact_type = $this->contact_type ;
                $obj->msme_no = $this->msme_no;
                $obj->msme_type = $this->msme_type;
                $obj->opening_balance = $this->opening_balance?:0;
                $obj->effective_from = $this->effective_from;
                $obj->active_id = $this->active_id;
                $obj->user_id = Auth::id();
                $obj->company_id = session()->get('company_id');
                $obj->save();

//                DB::table('contact_details')->where('contact_id', '=', $obj->id)->delete();
                $this->saveItem($obj->id);

                $message = "Updated";
                $this->getRoute();
            }
            $this->vname = '';
            $this->mobile = '';
            $this->whatsapp = '';
            $this->contact_person = '';
            $this->contact_type = '';
            $this->msme_no = '';
            $this->msme_type = '';
            $this->opening_balance = '';
            $this->effective_from = '';
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }


    public function saveItem($id): void
    {
        if ($this->itemList!=null) {
            foreach ($this->itemList as $sub) {
                if ($sub['contact_detail_id'] === 0) {
                    Contact_detail::create([
                        'contact_id' => $id,
                        'address_type' => $sub['address_type'],
                        'address_1' => $sub['address_1'],
                        'address_2' => $sub['address_2'],
                        'city_id' => $sub['city_id'],
                        'state_id' => $sub['state_id'],
                        'pincode_id' => $sub['pincode_id'],
                        'country_id' => $sub['country_id'],
                        'gstin' => Str::upper($sub['gstin']),
                        'email' => $sub['email'],
                    ]);
                } else {
                    $detail = Contact_detail::find($sub['contact_detail_id']);
                    $detail->address_type = $sub['address_type'];
                    $detail->address_1 = $sub['address_1'];
                    $detail->address_2 = $sub['address_2'];
                    $detail->city_id = $sub['city_id'];
                    $detail->state_id = $sub['state_id'];
                    $detail->pincode_id = $sub['pincode_id'];
                    $detail->country_id = $sub['country_id'];
                    $detail->gstin = $sub['gstin'];
                    $detail->email = $sub['email'];
                    $detail->save();
                }
            }
        }else{
            Contact_detail::create([
                'contact_id' => $id,
                'address_type' => 'Primary',
                'address_1' => '-',
                'address_2' => '-',
                'city_id' => 1,
                'state_id' => 1,
                'pincode_id' =>1,
                'country_id' => 1,
                'gstin' => '-',
                'email' => '-',
            ]);
        }
    }

    #endregion

    #region[Mount]
    public function mount($id): void
    {
        $this->route = url()->previous();
        if ($id != 0) {

            $obj = Contact::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->mobile = $obj->mobile;
            $this->whatsapp = $obj->whatsapp;
            $this->contact_person = $obj->contact_person;
            $this->contact_type = $obj->contact_type;
            $this->msme_no = $obj->msme_no;
            $this->msme_type = $obj->msme_type;
            $this->opening_balance = $obj->opening_balance;
            $this->effective_from = $obj->effective_from;
            $this->active_id = $obj->active_id;


            $data = DB::table('contact_details')->select('contact_details.*',
                'cities.vname as city_name',
                'states.vname as state_name',
                'countries.vname as country_name',
                'pincodes.vname as pincode_name',)
                ->join('cities', 'cities.id', '=', 'contact_details.city_id')
                ->join('states', 'states.id', '=', 'contact_details.state_id')
                ->join('pincodes', 'pincodes.id', '=', 'contact_details.pincode_id')
                ->join('countries', 'countries.id', '=', 'contact_details.country_id')
                ->where('contact_id', '=', $id)->get()->transform(function ($data) {
                    return [
                        'contact_detail_id' => $data->id,
                        'address_type' => $data->address_type,
                        'city_name' => $data->city_name,
                        'city_id' => $data->city_id,
                        'state_name' => $data->state_name,
                        'state_id' => $data->state_id,
                        'pincode_name' => $data->pincode_name,
                        'pincode_id' => $data->pincode_id,
                        'country_name' => $data->country_name,
                        'country_id' => $data->country_id,
                        'address_1' => $data->address_1,
                        'address_2' => $data->address_2,
                        'gstin' => $data->gstin,
                        'email' => $data->email,
                    ];
                });
            $this->itemList = $data;
        } else {
            $this->effective_from = Carbon::now()->format('Y-m-d');
            $this->active_id = true;
            $this->contact_type = '';
            $this->state_id = '2';
            $this->state_name = 'Tamilnadu';
            $this->city_id = 2;
            $this->city_name = 'Tiruppur';
            $this->country_id = 2;
            $this->country_name = "India";
            $this->address_type = "Primary";
        }
    }
#endregion

    #region[Add Item]
    public function addItems(): void
    {

        if ($this->itemIndex == "") {
            if (!(empty($this->city_name)) &&
                !(empty($this->address_type)) &&
                !(empty($this->state_name)) &&
                !(empty($this->gstin))
            ) {
                $this->itemList[] = [
                    'contact_detail_id' => $this->contact_detail_id ?: 0,
                    'address_type' => $this->address_type,
                    'city_name' => $this->city_name,
                    'city_id' => $this->city_id,
                    'state_name' => $this->state_name,
                    'state_id' => $this->state_id,
                    'pincode_name' => $this->pincode_name,
                    'pincode_id' => $this->pincode_id ?: '1',
                    'country_name' => $this->country_name,
                    'country_id' => $this->country_id ?: '1',
                    'address_1' => $this->address_1,
                    'address_2' => $this->address_2,
                    'gstin' => $this->gstin,
                    'email' => $this->email,

                ];
            }
        } else {
            $this->itemList[$this->itemIndex] = [
                'contact_detail_id' => $this->contact_detail_id,
                'address_type' => $this->address_type,
                'city_name' => $this->city_name,
                'city_id' => $this->city_id,
                'state_name' => $this->state_name,
                'state_id' => $this->state_id,
                'pincode_name' => $this->pincode_name,
                'pincode_id' => $this->pincode_id,
                'country_name' => $this->country_name,
                'country_id' => $this->country_id,
                'address_1' => $this->address_1,
                'address_2' => $this->address_2,
                'gstin' => $this->gstin,
                'email' => $this->email,
            ];

        }

        $this->resetsItems();
        $this->render();
    }

    public function resetsItems(): void
    {
        $this->itemIndex = '';
        $this->contact_detail_id = '';
        $this->address_type = '';
        $this->city_name = '';
        $this->city_id = '';
        $this->state_name = '';
        $this->state_id = '';
        $this->pincode_name = '';
        $this->pincode_id = '';
        $this->country_name = '';
        $this->country_id = '';
        $this->address_1 = '';
        $this->address_2 = '';
        $this->gstin = '';
        $this->email = '';
    }

    public function changeItems($index): void
    {
        $this->itemIndex = $index;

        $items = $this->itemList[$index];
        $this->contact_detail_id = $items['contact_detail_id'];
        $this->address_type = $items['address_type'];
        $this->city_name = $items['city_name'];
        $this->city_id = $items['city_id'];
        $this->state_name = $items['state_name'];
        $this->state_id = $items['state_id'];
        $this->pincode_name = $items['pincode_name'];
        $this->pincode_id = $items['pincode_id'];
        $this->country_name = $items['country_name'];
        $this->country_id = $items['country_id'];
        $this->address_1 = $items['address_1'];
        $this->address_2 = $items['address_2'];
        $this->gstin = $items['gstin'];
        $this->email = $items['email'];
    }

    public function removeItems($index): void
    {
        $items = $this->itemList[$index];
        unset($this->itemList[$index]);
        $this->itemList = collect($this->itemList);
        if($items['contact_detail_id']!=0){
           $obj=Contact_detail::find( $items['contact_detail_id']);
           $obj->delete();
        }
    }

    #endregion

    #region[Get Obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Contact::find($id);
            $this->vid = $obj->id;
            $this->vname = $obj->vname;
            $this->mobile = $obj->mobile;
            $this->whatsapp = $obj->whatsapp;
            $this->contact_person = $obj->contact_person;
            $this->contact_type = $obj->contact_type;
            $this->msme_no = $obj->msme_no;
            $this->msme_type = $obj->msme_type;
            $this->opening_balance = $obj->opening_balance;
            $this->effective_from = $obj->effective_from;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }

    #endregion

    #region[render]
    public function getRoute(): void
    {
        $this->redirect($this->route);
    }

    public function render()
    {
        $this->getCityList();
        $this->getStateList();
        $this->getPincodeList();
        $this->getCountryList();
        return view('livewire.master.contact.upsert');
    }
    #endregion
}
