<?php

namespace App\Livewire;

use Livewire\Component;

class ConfirmationModal extends Component
{

    public $confirmingRoleCreate = false;
    public $creatRole = null;

    public function render()
    {
        return view('livewire.confirmation-modal');
    }
}
