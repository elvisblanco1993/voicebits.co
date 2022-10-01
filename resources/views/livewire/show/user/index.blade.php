<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
        @include('layouts.podcast-menu')
        <div class="mt-10 flex items-center justify-between">
            <x-jet-input type="search" wire:model="search" placeholder="Search by name"/>
            @can('invite_users',$podcast)
                @livewire('show.user.invite', ['podcast' => $podcast->id])
            @endcan
        </div>

        <div class="mt-4 prose max-w-full">
            <table class="table-auto w-full">
                <thead class="text-sm text-slate-500">
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th class="sr-only">Options</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($invitations as $invitation)
                        <tr class="">
                            <td>
                                {{ $invitation->email }}
                            </td>
                            <td> - </td>
                            <td>
                                <span class="text-xs font-medium text-slate-600 bg-slate-200 px-4 py-1 rounded-full border border-slate-300 uppercase tracking-wider">{{__("Invited")}}</span>
                            </td>
                            <td class="capitalize"> - </td>
                            <td class="flex items-center justify-end space-x-3">
                                @livewire('show.user.resend-invitation', ['podcast_id' => $podcast->id, 'email'=> $invitation->email], key('resend-'.$invitation->id))
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    @forelse ($users as $user)
                        <tr class="">
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>{{  $user->name }}</td>
                            <td>
                                @if (!$user->podcasts->contains($podcast->id))
                                    <span class="text-xs font-medium text-slate-600 bg-slate-200 px-4 py-1 rounded-full border border-slate-300 uppercase tracking-wider">{{__("Pending")}}</span>
                                @else
                                    <span class="text-xs font-medium text-green-600 bg-green-200 px-4 py-1 rounded-full border border-green-300 uppercase tracking-wider">{{__("Active")}}</span>
                                @endif
                            </td>
                            <td>
                                <span class="text-xs font-medium text-slate-600 bg-slate-200 px-4 py-1 rounded-full border border-slate-300 uppercase tracking-wider">
                                    {{ $user->podcasts->find($podcast->id)->pivot->role ?? 'member' }}
                                </span>
                            </td>
                            <td class="flex items-center justify-end space-x-3">
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

            {{ $users->links() }}
        </div>
    </div>
</div>
