<?php

namespace App\Http\Livewire\Show\Import;

use Livewire\Component;
use App\Jobs\ImportPodcast;
use App\Jobs\CreateEpisodes;
use App\Jobs\ImportEpisodes;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ConfirmOwnership extends Component
{
    public $podcast_id, $uniqid;
    protected $podcast, $episodes, $batch;

    public function mount()
    {
        // Check that the $uniqid matches the $podcast_id
        $this->podcast = DB::table('temporary_podcasts')->find($this->podcast_id);
        if ($this->podcast->magic_code && $this->podcast->magic_code !== $this->uniqid) {
            return redirect()->route('show.import.start');
        }

        // Import the podcast
        if (!$this->podcast->imported_at) {
            ImportPodcast::dispatch($this->podcast->id);
            DB::table('temporary_podcasts')->where('id', $this->podcast->id)->update([
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

    public function importEpisodes()
    {
        $episodes = DB::table('temporary_episodes')->where('temp_podcast_id', $this->podcast_id)->get();
        $batch = Bus::batch([])->onQueue('import-episodes')->name($this->podcast->name . " episodes")->dispatch();
        // Import all episodes
        try {
            foreach ($episodes as $episode) {
                $batch->add(
                    new ImportEpisodes($episode->id)
                );
            }
        } catch (\Throwable $th) {
            Log::error($th);
        }
        return $batch;
    }
}
