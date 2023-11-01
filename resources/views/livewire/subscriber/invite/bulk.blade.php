<div>
    <div class="sm:flex items-start gap-4">
        <div class="h-16 w-16 aspect-square flex items-center justify-center rounded-full bg-slate-100">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-slate-600 w-8 h-8">
                <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
            </svg>
        </div>
        <div class="">
            <p class="text-lg font-semibold">Upload a CSV file</p>
            @if ($review == false)
            <p class="mt-2 text-sm text-slate-600">Please upload a CSV file containing the email addresses. We will identify all emails that are not yet subscribed for review in the next step. Ensure that your CSV file does not have headers. For guidance on preparing your CSV, <a href="#">click here.</a></p>
                <form wire:submit.prevent="save" enctype="multipart/form-data">
                    <input type="file" class="mt-4 outline-none border-0 block w-full text-sm text-slate-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-amber-50 file:text-amber-700
                        hover:file:bg-amber-100"
                        wire:model="file" required accept=".csv, .xlsx"
                    />
                    <x-input-error for="file" class="mt-1"/>
                    <x-button class="mt-4">Upload CSV & Review</x-button>
                </form>
            @else
                <p class="mt-2 text-sm text-slate-600">The following emails are set to join your subscriber list. As soon as they accept the invitation, they'll become active members and gain access to the show.</p>
                <ul class="mt-3 ml-4 font-medium text-sm list-decimal">
                    @forelse ($validEmails as $validEmail)
                        <li>{{$validEmail}}</li>
                    @empty
                    @endforelse
                </ul>
                <x-button class="mt-4" wire:click="store" wire:target="store" wire:loading.attr="disabled">Confirm & Invite</x-button>
            @endif
        </div>
    </div>
</div>
