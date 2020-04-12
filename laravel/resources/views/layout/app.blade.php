@include('layout.partials.header')
    <body>
        {{-- Content --}}
        <div id="app" class="site-wrapper" style="opacity: 0">
            @yield('content')
        </div>

        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}" async>
            window._locale = '{{ app()->getLocale() }}';
            window._translations = {!! cache('translations') !!};
        </script>
    </body>
</html>
