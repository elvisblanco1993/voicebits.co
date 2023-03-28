<div>
    <div class="max-w-7xl mx-auto h-44 bg-center bg-cover" style="background-image: url('{{ asset($podcast->cover) }}') ">
        <div class="h-full flex items-center bg-slate-900/60 backdrop-blur-xl px-4 sm:px-6 lg:px-8">
            @if ($podcast->cover)
                <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-24 aspect-square rounded-xl object-center object-cover">
            @else
                <div class="h-24 w-24 rounded-xl bg-teal-50 flex items-center justify-center">
                    <img src="{{ asset('logo-mark.svg') }}" alt="{{ $podcast->name }}" class="w-10 h-auto">
                </div>
            @endif
            <h1 class="ml-6 text-3xl font-bold text-white">{{ $podcast->name }}</h1>
        </div>
    </div>
    @livewire('submenu')
    <div class="py-6">
        <div class="text-2xl font-bold">Podcast Team</div>
        <div class="mt-4 flex items-center justify-between">
            <x-input type="search" wire:model="search" placeholder="Search by name" class="w-1/2"/>
            @can('invite_users',$podcast)
                @livewire('show.user.invite', ['podcast' => $podcast->id])
            @endcan
        </div>

        <div class="mt-4 overflow-x-auto shadow rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            E-mail
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Role
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($invitations as $invitation)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                {{ $invitation->email }}
                            </th>
                            <td class="py-4 px-6">
                                -
                            </td>
                            <td class="py-4 px-6">
                                -
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-xs font-medium text-slate-600 bg-slate-200 px-4 py-1 rounded-full border border-slate-300 uppercase tracking-wider">{{__("Invited")}}</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                @livewire('show.user.resend-invitation', ['podcast_id' => $podcast->id, 'email'=> $invitation->email], key('resend-'.$invitation->id))
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    @forelse ($users as $user)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                {{ $user->email }}
                            </th>
                            <td class="py-4 px-6">
                                {{ $user->name }}
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-xs font-medium text-slate-600 bg-slate-200 px-4 py-1 rounded-full border border-slate-300 uppercase tracking-wider">
                                    {{ $user->podcasts->find($podcast->id)->pivot->role ?? 'member' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                @if (!$user->podcasts->contains($podcast->id))
                                    <span class="text-xs font-medium text-slate-600 bg-slate-200 px-4 py-1 rounded-full border border-slate-300 uppercase tracking-wider">{{__("Pending")}}</span>
                                @else
                                    <span class="text-xs font-medium text-green-600 bg-green-200 px-4 py-1 rounded-full border border-green-300 uppercase tracking-wider">{{__("Active")}}</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 flex items-center justify-end space-x-3">
                                @if ($user->email !== Auth::user()->email && $user->podcasts->find($podcast->id)->pivot->role !== 'owner')
                                    @livewire('show.user.resend-invitation', ['podcast_id' => $podcast->id, 'email'=> $user->email], key('resend-'.$user->id))
                                    @livewire('show.user.edit', ['podcast' => $podcast->id, 'user'=> $user->id], key('edit-'.$user->id))
                                    @livewire('show.user.delete', ['podcast' => $podcast->id, 'user'=> $user->id], key('unlink-'.$user->id))
                                @endif
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
