<?php

namespace App\Http\Livewire\Show\Import;

use Livewire\Component;
use App\Jobs\ImportPodcast;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ConfirmOwnership extends Component
{
    public $podcast_id, $uniqid;
    protected $podcast, $episodes, $batch;

    public function mount()
    {
        if (!Gate::allows('create_podcasts')) {
            abort(401);
        }

        // Check that the $uniqid matches the $podcast_id
        $this->podcast = DB::table('temporary_podcasts')->find($this->podcast_id);
        if ($this->podcast->magic_code && $this->podcast->magic_code !== $this->uniqid) {
            return redirect()->route('show.import.start');
        }

        // Import the podcast & episodes
        if (!$this->podcast->imported_at) {
            ImportPodcast::dispatch($this->podcast->id);
            DB::table('temporary_podcasts')->where('id', $this->podcast->id)->update([
                'imported_at' => now()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.show.import.confirm-ownership', [
            'podcast' => $this->podcast
        ]);
    }
}
