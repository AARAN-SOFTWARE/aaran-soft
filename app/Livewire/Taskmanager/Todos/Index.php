<?php

namespace App\Livewire\Taskmanager\Todos;

use Aaran\Taskmanager\Models\Todos;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('My Todo List')]
class Index extends Component
{

    public string $slno = '';
    public mixed $vdate = '';
    public string $vname = '';
    public string $ename = '';
    public bool $completed = false;
    public bool $editmode = false;
    public mixed $subjective = false;
    public mixed $active_id = '1';

    public function mount()
    {
        $this->slno=Todos::nextNo( );
        $this->vdate = Carbon::parse(Carbon::now());

    }

    public function isChecked($id): void
    {
        $todo = Todos::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
        $this->clearFields();
        $this->refreshComponent();
    }

    public function saveTodo(): void
    {
        $this->slno=Todos::nextNo();
        Todos::create([
            'slno' => $this->slno,
            'vdate' => $this->vdate,
            'vname' => $this->vname,
            'completed' => $this->completed,
            'subjective' => $this->subjective,
            'user_id' => auth()->id(),
            'active_id' => '1'
        ]);

        $this->clearFields();
        $this->refreshComponent();
    }

    public function clearFields(): void
    {
        $this->slno = '1';
        $this->vdate = Carbon::parse(Carbon::now());
        $this->vname = '';
        $this->ename = '';
        $this->completed = false;
        $this->active_id = '1';

    }

    public function edit($v)
    {
        $this->ename = $v;
    }

    public function updateTodo($id)
    {
        $todo = Todos::find($id);
        $todo->slno = $this->slno;
        $todo->vname = $this->ename;
        $todo->save();
        $this->clearFields();
        $this->refreshComponent();

        $this->ename = '';
    }

    public function markAsPublic($id): void
    {
        $todo = Todos::find($id);
        $todo->subjective = !$todo->subjective;
        $todo->save();
        $this->clearFields();
        $this->refreshComponent();
    }

    public function getDelete($id)
    {
        $todo = Todos::find($id);
        $todo->delete();
        $this->clearFields();
        $this->refreshComponent();
    }

    public function getList()
    {
        return Todos::Where('user_id','=', auth()->id())
            ->orwhere('subjective','=', true)
            ->get();

    }

    protected function refreshComponent(): void
    {
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.taskmanager.todos.index')->with([
            'list' => $this->getList()
        ]);
    }


}
