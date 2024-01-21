<?php

namespace App\Livewire;

use App\Models\Absence;
use Livewire\Component;
use Livewire\Attributes\Computed;

class ManageAbsences extends Component
{
    public $initialDate;
    
    public $listeners = [ 'created' => '$refresh'];

    public function mount()
    {
        $this->initialDate=Absence::getInitialDate();
    }

    #[Computed]
    public function absences()
    {
        return Absence::getAbsences();
    }

    public function setInitialDate()
    {
        Absence::setInitialDate($this->initialDate);
    }

    public function render()
    {
        return view('livewire.manage-absences');
    }
}
