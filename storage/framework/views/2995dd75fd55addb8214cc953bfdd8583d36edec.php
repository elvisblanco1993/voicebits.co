<div>
    <?php if(auth()->user()->podcasts->count() == 0): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('show.create')->html();
} elseif ($_instance->childHasBeenRendered('l2273570718-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2273570718-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2273570718-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2273570718-0');
} else {
    $response = \Livewire\Livewire::mount('show.create');
    $html = $response->html();
    $_instance->logRenderedChild('l2273570718-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>
</div>
<?php /**PATH /home/elvis/Projects/voicebits-2.0/resources/views/livewire/show/dashboard.blade.php ENDPATH**/ ?>