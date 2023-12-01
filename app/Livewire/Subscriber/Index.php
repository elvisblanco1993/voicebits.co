<?php

namespace App\Livewire\Subscriber;

use App\Models\Podcast;
use App\Models\Subscriber;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $podcast;
    public $search = '';

    public function mount()
    {
        $this->podcast = Podcast::findorfail(session('podcast'));
    }

    public function render()
    {
        return view('livewire.subscriber.index', [
            'subscribers' => $this->podcast->subscribers()->withCount('statistics')->where('email', 'like', '%' . $this->search . '%')->paginate(10)
        ]);
    }
}
