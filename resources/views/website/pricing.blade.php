@extends('website.layout')
@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-12">
            <div class="md:text-center max-w-5xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold leading-10">Unlock the full potential of your podcast without breaking the bank!</h1>
                <p class="mt-6 text-lg">With Voicebits, hosting and distributing your podcasts has never been simpler or easier. Get started with a risk-free 14-day trial, and then enjoy a transparent monthly pricing plan that's based on your average monthly downloads. Say goodbye to hidden fees and hello to hassle-free podcasting with Voicebits!</p>
            </div>

            <div class="my-12 md:my-24"></div>

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-8 space-y-8">
                    <div class="md:flex items-center justify-between border border-slate-300 p-6 rounded-lg">
                        <div class="md:flex items-center space-y-2 md:space-y-0 md:space-x-8">
                            <p class="text-3xl font-extrabold">$15<span class="font-light">/</span>mo</p>
                            <p>12,000 downloads per month</p>
                        </div>
                        <div class="uppercase text-4xl font-black text-slate-400">Starter</div>
                    </div>
                    <div class="md:flex items-center justify-between border border-slate-300 p-6 rounded-lg">
                        <div class="md:flex items-center space-y-2 md:space-y-0 md:space-x-8">
                            <p class="text-3xl font-extrabold">$35<span class="font-light">/</span>mo</p>
                            <p>65,000 downloads per month</p>
                        </div>
                        <div class="uppercase text-4xl font-black text-slate-400">Business</div>
                    </div>
                    <div class="md:flex items-center justify-between border border-slate-300 p-6 rounded-lg">
                        <div class="md:flex items-center space-y-2 md:space-y-0 md:space-x-8">
                            <p class="text-3xl font-extrabold">$65<span class="font-light">/</span>mo</p>
                            <p>180,000 downloads per month</p>
                        </div>
                        <div class="uppercase text-4xl font-black text-slate-400">Agency</div>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-4 bg-gradient-to-tr from-amber-50 to-amber-100 dark:text-black px-6 py-8 rounded-lg">
                    <h3 class="text-2xl font-bold">All plans include</h3>
                    <div class="mt-4">
                        <p class="flex items-center space-x-2 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                            </svg>
                            <span>Unlimited podcasts and episodes</span>
                        </p>
                        <p class="mt-2 flex items-center space-x-2 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25V18a2.25 2.25 0 002.25 2.25h13.5A2.25 2.25 0 0021 18V8.25m-18 0V6a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 6v2.25m-18 0h18M5.25 6h.008v.008H5.25V6zM7.5 6h.008v.008H7.5V6zm2.25 0h.008v.008H9.75V6z" />
                            </svg>
                            <span>One website per podcast</span>
                        </p>
                        <p class="mt-2 flex items-center space-x-2 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9.75L16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
                            </svg>
                            <span>Episodes embedded web player</span>
                        </p>
                        <p class="mt-2 flex items-center space-x-2 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z" />
                            </svg>
                            <span>Built-in analytics</span>
                        </p>
                        <p class="mt-2 flex items-center space-x-2 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                            </svg>
                            <span>100% data ownership</span>
                        </p>
                    </div>
                    <p class="mt-6">
                        <a href="{{ route('register') }}" class="px-5 py-2 block w-full font-semibold rounded-md border-2 border-slate-800 text-slate-800 hover:bg-slate-800 hover:text-amber-300 transition-all">Get started with a free trial</a>
                    </p>
                </div>
            </div>

            <div class="my-12 md:my-24"></div>

            @include('website.partials.faq')
        </div>
    </div>
@endsection
