@aware(['page'])
@props([
    'title',
    'description',
    'keywords',
    'og_title',
    'og_description',
])




@section('meta-title', $title)
@section('meta-description', $description)
@section('meta-keywords', implode(', ', $keywords))
@section('meta_robots', $page->index ? 'index, follow' : 'noindex, nofollow')



@section('meta-og-title', $og_title)
@section('meta-og-description', $og_description)
@section('meta-og-image', 'Your Custom Description')