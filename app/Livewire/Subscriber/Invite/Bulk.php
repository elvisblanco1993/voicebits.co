<?php

namespace App\Livewire\Subscriber\Invite;

use League\Csv\Reader;
use App\Models\Podcast;
use Livewire\Component;
use App\Models\Subscriber;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use App\Jobs\SubscriberInvitationJob;
use Illuminate\Support\Facades\Validator;
use Spatie\SimpleExcel\SimpleExcelReader;

class Bulk extends Component
{
    use WithFileUploads;

    public Podcast $podcast;
    public $file;
    public $review = false;
    public $existingEmails = [];
    public $invalidEmails = [];
    public $validEmails = [];

    public function render()
    {
        return view('livewire.subscriber.invite.bulk');
    }

    public function save()
    {
        $this->validate([
            'file' => 'required|mimes:csv,xlsx|max:2048',
        ]);

        $rows = SimpleExcelReader::create($this->file->getRealPath())->getRows();

        $rows->each(function(array $rowProperties) use (&$existingEmails, &$invalidEmails) {
            // in the first pass $rowProperties will contain
            $email = $rowProperties['email'] ?? null;

            // Validate the email using Laravel's validation rules
            $validator = Validator::make(['email' => $email], [
                'email' => 'required|email:dns',
            ]);

            if ($validator->fails()) {
                $this->invalidEmails[] = $email;
                return; // Skip further processing for this email
            }

            // Check if the subscriber already exists
            if (Subscriber::where('email', $email)->exists()) {
                $this->existingEmails[] = $email;
            } else {
                $this->validEmails[] = $email;
            }
         });
        $this->review = true;
    }

    public function store()
    {
        try {
            foreach ($this->validEmails as $email) {
                if (!Subscriber::where('podcast_id', $this->podcast->id)->where('email', $email)->exists()) {
                    // Create subscriber and mark it as pending
                    $subscriber = Subscriber::create([
                        'podcast_id' => $this->podcast->id,
                        'token' => md5(now() . $email), // Generate unique subscriber id
                        'email' => $email,
                        'status' => 'PENDING',
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                    // Send invite
                    SubscriberInvitationJob::dispatch($subscriber);
                }
            }
            session()->flash('flash.banner', 'Subscribers invitations sent!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', 'Oops. We ran into an issue. Please contact us for assistance.');
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('podcast.subscribers');
    }
}
