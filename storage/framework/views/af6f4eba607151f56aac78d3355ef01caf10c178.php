<div class="mt-6 text-xl font-bold">Distribution Checklist</div>
<div class="mt-4 w-full bg-white rounded-lg shadow p-8">
    <div class="max-w-full">
        <h3 class="text-lg font-bold">Hi there!</h3>
        <p class="text-base">Congratulations on your new podcast. There are some things you still need to do before you can start distributing your show.</p>

        <div class="mt-10 max-w-full">
            <?php if(!$podcast->cover): ?>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-amber-400 flex-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="">
                            <div class="font-semibold text-base flex items-center">Upload cover artwork
                                <a href="<?php echo e(route('show.settings', ['show' => $podcast->id])); ?>?#artwork">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                        <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="text-xs">Artwork must be a minimum size of 1400 x 1400 pixels and a maximum size of 3000 x 3000 pixels, in JPEG or PNG format, 72 dpi, with appropriate file extensions (.jpg, .png), and in the RGB colorspace. </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-400 flex-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="">
                            <div class="font-semibold text-base">Cover artwork ready</div>
                        </div>
                    </div>
                <?php endif; ?>
        </div>

        <div class="mt-6 max-w-full">
            <?php if(!$podcast->url): ?>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-amber-400 flex-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="">
                            <div class="font-semibold text-base flex items-center">Create your podcast url
                                <a href="<?php echo e(route('show.settings', ['show' => $podcast->id])); ?>?#show-url">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                        <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="text-xs">You need to create a unique url that's going to be used for your public website and rss feed.</div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-400 flex-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="">
                            <div class="font-semibold text-base">Podcast URL created</div>
                        </div>
                    </div>
                <?php endif; ?>
        </div>

        <div class="mt-6 max-w-full">
            <?php if($podcast->episodes->count() === 0): ?>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-amber-400 flex-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="">
                            <div class="font-semibold text-base flex items-center">Upload and publish an episode
                                <a href="<?php echo e(route('episode.create', ['show' => $podcast->id])); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                        <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="text-xs">You need upload and publish at least one episode before you can distribute your show.</div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-400 flex-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="">
                            <div class="font-semibold text-base">Your first episode is uploaded and published.</div>
                        </div>
                    </div>
                <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/elvis/Projects/voicebits-2.0/resources/views/layouts/podcast-dist-checklist.blade.php ENDPATH**/ ?>