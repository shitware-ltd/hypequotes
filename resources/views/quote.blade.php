<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @if (app()->isLocal())
        <script src="https://cdn.tailwindcss.com"></script>
    @else
        <link rel="stylesheet"
              href="{{ asset('css/app.css') }}">
    @endif
    <link rel="icon"
          type="image/png"
          href="{{ asset('favicon.png') }}" />
</head>

<body class="bg-neutral-50 text-neutral-900 antialiased">
    <nav class="flex place-items-center justify-end space-x-2 p-2">
        <a href="{{ route('api.docs') }}"
           class="rounded-md px-2 py-2 hover:bg-neutral-100">API Documentation</a>
        <span>&bullet;</span>
        <a href="https://github.com/shitware-ltd/hypequotes"
           class="rounded-md px-2 py-2 hover:bg-neutral-100">GitHub</a>
    </nav>
    <main class="grid h-screen place-items-center">
        <blockquote class="space-y-4 p-12 max-w-4xl">
            <header>
                <svg xmlns="http://www.w3.org/2000/svg"
                     width="38"
                     height="38"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round"
                     class="text-neutral-300">
                    <path
                          d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />
                    <path
                          d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z" />
                </svg>
            </header>
            <article>
                <p class="italic sm:text-xl">{{ $quote->quote }}</p>
            </article>
            <footer>
                <p class="text-base font-semibold">- {{ $quote->quotee }}</p>
            </footer>
        </blockquote>
</body>

</html>
