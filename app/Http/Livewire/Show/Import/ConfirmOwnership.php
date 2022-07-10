<?php

namespace App\Http\Livewire\Show\Import;

use Livewire\Component;
use App\Jobs\ImportPodcast;
use App\Jobs\CreateEpisodes;
use App\Jobs\ImportEpisodes;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;

class ConfirmOwnership extends Component
{
    public $podcast_id, $uniqid;
    protected $podcast;

    public function mount()
    {
        // Check that the $uniqid matches the $podcast_id
        $this->podcast = DB::table('temporary_podcasts')->find($this->podcast_id);
        if ($this->podcast->magic_code && $this->podcast->magic_code !== $this->uniqid) {
            return redirect()->route('show.import.start');
        }

        if (!$this->podcast->imported_at) {
            ImportPodcast::dispatch($this->podcast_id);
            DB::table('temporary_podcasts')->where('id', $this->podcast_id)->update([
                'imported_at' => now()
            ]);
        }
    }

    public function render()
    {
        $this->importEpisodes();
        return view('livewire.show.import.confirm-ownership', [
            'podcast' => $this->podcast
        ]);
    }

    public function importEpisodes() {
        // Import all episodes
        $episodes = DB::table('temporary_episodes')->where('temp_podcast_id', $this->podcast_id)->get();
        $batch = Bus::batch([])->onQueue('import-episodes')->dispatch();

        foreach ($episodes as $episode) {
            $batch->add(
                new ImportEpisodes($episode->id)
            );
        }
        return $batch;
    }
}
