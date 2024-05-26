<?php

namespace Aaran\Common\Tests;

use Aaran\Common\Models\City;
use App\Livewire\Common\CityList;
use FontLib\Table\Type\name;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Livewire\Livewire;
use phpDocumentor\Reflection\Types\Object_;
use Tests\TestCase;
use function Pest\Laravel\call;
use function PHPUnit\Framework\assertEquals;

class CityTest extends TestCase
{
    use DatabaseMigrations;


    public function test_city_table(): void
    {
        $city = City::factory()->create();

        $this->assertEquals('City', actual: $city->vname);
        $this->assertEquals('1', actual: $city->active_id);
    }


    public function test_save()
    {
        Livewire::test(CityList::class)
            ->set(['vname' => 'Sundar city', 'active_id' => '1'])
            ->call('getSave');

        $obj = City::find(1);

        $this->assertEquals('Sundar city',$obj->vname);
    }

         public function test_delete()
    {
        Livewire::test(CityList::class)
            ->set(['vname' => 'sundar city', 'active_id' => '1'])
            ->call('getSave');

        $obj = City::find(1);
        $this->assertEquals('Sundar city',$obj->vname);

        Livewire::test(CityList::class)->call('getDelete',$obj->id
        );

    }

    public function test_update()
    {
        Livewire::test(CityList::class)
                ->set(['vname' => 'sundar City', 'active_id' => '1'])
                ->call('getSave');

        $obj = City::find(1);

        Livewire::test(CityList::class)->call('getObj',$obj->id)

            ->set(['vname' => 'Dd City', 'active_id' => '1'])
            ->call('getSave');
        $getObj = City::find(1);
        $this->assertEquals('Dd City',$getObj->vname);

    }


}





