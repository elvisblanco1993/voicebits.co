<div>
    <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-8">
            <div class="col-span-2 sm:col-span-1">
                <div class="prose">
                    <h1>Select a plan</h1>
                    <p class="lead">Hi there! We noticed your trial is now over. Choose a plan and sign up now to continue using Voicebits.</p>
                </div>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <button wire:click="save(1)" class="w-full text-left">
                    <div class="w-full rounded-lg border border-slate-300 border-l-4 p-4 hover:border-blue-400 transition-all">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2 sm:col-span-1">
                                <div class="text-xl font-bold">Starter</div>
                                <ul class="mt-2">
                                    <li>Unlimited podcasts and episodes</li>
                                    <li>Analytics and team members</li>
                                    <li>12,000 downloads / month</li>
                                </ul>
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex items-center sm:justify-end">
                                <div>
                                    <span class="text-3xl font-black">$16</span> / month
                                </div>
                            </div>
                        </div>
                    </div>
                </button>
                <div class="my-4"></div>
                <button wire:click="save(2)" class="w-full text-left">
                    <div class="w-full rounded-lg border border-slate-300 border-l-4 p-4 hover:border-blue-400 transition-all">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2 sm:col-span-1">
                                <div class="text-xl font-bold">Professional</div>
                                <ul class="mt-2">
                                    <li>Unlimited podcasts and episodes</li>
                                    <li>Analytics and team members</li>
                                    <li>65,000 downloads / month</li>
                                </ul>
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex items-center sm:justify-end">
                                <div>
                                    <span class="text-3xl font-black">$36</span> / month
                                </div>
                            </div>
                        </div>
                    </div>
                </button>
                <div class="my-4"></div>
                <button wire:click="save(3)" class="w-full text-left">
                    <div class="w-full rounded-lg border border-slate-300 border-l-4 p-4 hover:border-blue-400 transition-all">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2 sm:col-span-1">
                                <div class="text-xl font-bold">Business</div>
                                <ul class="mt-2">
                                    <li>Unlimited podcasts and episodes</li>
                                    <li>Analytics and team members</li>
                                    <li>180,000 downloads / month</li>
                                </ul>
                            </div>
                            <div class="col-span-2 sm:col-span-1 flex items-center sm:justify-end">
                                <div>
                                    <span class="text-3xl font-black">$66</span> / month
                                </div>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
