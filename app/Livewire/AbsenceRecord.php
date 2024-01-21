<?php

namespace App\Livewire;

use App\Models\Absence;
use Livewire\Component;
use Livewire\Attributes\Locked;

class AbsenceRecord extends Component
{
    #[Locked]
    public $id;
    public $exitDate, $returnDate, $comment;
    public $startDate;
    public $editMode;

    public function mount($startDate, ?Absence $absence = null)
    {
        $this->startDate = $startDate;
        if ($absence) {
            $this->id = $absence->id;
            $this->exitDate = $absence->fromDate;
            $this->returnDate = $absence->toDate;
            $this->comment = $absence->comment;
        }
    }

    public function daysAway()
    {
        return daysBetween($this->exitDate, $this->returnDate, strict:true);
    }

    public function rules()
    {
        return [
            'exitDate'=>'required|date|after:' . carbon($this->startDate)->toDateString(),
            'returnDate'=>'required|date|after_or_equal:exitDate'
        ];
    }

    public function save()
    {
        $this->validate();
        $absence = Absence::create([
            'fromDate' => $this->exitDate,
            'toDate' => $this->returnDate,
            'comment' => $this->comment
        ]);
        $this->dispatch('created');
    }

    public function render()
    {
        return view('livewire.absence-record', ['daysAway' => $this->daysAway()]);
    }
}
