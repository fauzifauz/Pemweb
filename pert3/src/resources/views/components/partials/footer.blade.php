@php
    use App\Models\Footer;
    $footer = \App\Models\Footer::first();
@endphp

<main>
    <footer class="section-sm bg-tertiary">
        <div class="container">
            <div class="container d-flex justify-content-center">
                <a wire:navigate href="{{ route('home') }}">{{$footer->footer ?? '' }}</a>
            </div>
        </div>
    </footer>

</main>