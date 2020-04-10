@include('layout.partials.header')
    <body>
        {{-- Content --}}
        <div id="app">
            @yield('content')
        </div>

        {{-- Scripts --}}
        <script src="{{ asset('js/app.js') }}" async></script>
    </body>
</html>
