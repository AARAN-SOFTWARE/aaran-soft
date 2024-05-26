<?php

namespace App\Livewire\Developer\TaskReview;

use Aaran\Developer\Models\ReviewFileName;
use Aaran\Developer\Models\ReviewList;
use Aaran\Developer\Models\TaskReview;
use App\Enums\Active;
use App\Enums\Status;
use App\Livewire\Trait\CommonTrait;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Show extends Component
{
    use CommonTrait;
    public $task_review_id;
    public $review_filename_id;
    public string $changeStatus;
    public $str;
    public function mount($id)
    {
      $this->task_review_id=$id;
    }

    public function generate()
    {
           $file_name = ReviewFileName::all();

           foreach ($file_name as $obj) {
               $file = ReviewList::where('task_review_id','=',$this->task_review_id)
               ->where('review_filename_id', $obj->id)
                      ->get();
               if ($file->count() == 0) {
                   ReviewList::create([
                       'review_filename_id' => $obj->id,
                       'task_review_id'=>$this->task_review_id,
                       'completed'=>0,
                   ]);
               }

           }
    }

    public function toggle($todoID)
    {
        $todo = ReviewList::find($todoID);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    #region[Update]
    public function updateStatus(): void
    {
        $this->validate(['changeStatus' => 'required']);
        $obj =  TaskReview::find($this->task_review_id);
        $obj->status = $this->changeStatus;
        $obj->save();
        redirect()->to(route('task-review'));
    }
    #endregion

    public function getList()
    {
        $this->sortField = 'task_review_id';
        return ReviewList::search($this->searches)
            ->where('task_review_id','=' ,$this->task_review_id)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.developer.task-review.show')->with([
            'list' => $this->getList()
        ]);
    }
}
