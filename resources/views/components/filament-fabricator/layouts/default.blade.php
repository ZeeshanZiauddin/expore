@props(['page'])
<x-filament-fabricator::layouts.base :title="$page->title">
    {{-- Header Here --}}
    @include('components.layouts.header')
    @include('components.layouts.navbar')

    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />

    {{-- Footer Here --}}
    @include('components.layouts.footer')

</x-filament-fabricator::layouts.base>