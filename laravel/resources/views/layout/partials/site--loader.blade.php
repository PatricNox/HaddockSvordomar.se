<div id="loader" class="loader-indicator--wrapper">
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md noselect loading-title">
                {{ config('app.name') }}
                <br/>
                {{-- TODO - Tenant specific (svordom) --}}
                <small>{{ __('Tryck för att ändra svordom!') }}</small>
                <noscript>
                    <br/>
                    {{ __('noJavaScriptMessage' )}}
                </noscript>
            </div>
        </div>
    </div>
</div>
