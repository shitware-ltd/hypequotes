<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"">

<head>
    <meta charset=" UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen bg-zinc-100 text-zinc-800 font-inter">
    <main class="flex-grow p-4 place-items-center place-content-center">
        <blockquote class="flex-col space-y-2 text-xl">
            <svg  xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 11h-4a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1v6c0 2.667 -1.333 4.333 -4 5" /><path d="M19 11h-4a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h3a1 1 0 0 1 1 1v6c0 2.667 -1.333 4.333 -4 5" /></svg>
            <p>{{ $quote->quote }}</p>
            <footer class="text-sm">
                <cite>- {{ $quote->quotee }}</cite>
            </footer>
        </blockquote>
    </main>

    <footer class="w-full py-4 px-8 font-semibold bg-zinc-200/40">
        <nav class="flex justify-end text-sm space-x-4">
            <a href="{{ route('scalar') }}" class="hover:underline transition-colors">API Reference &rarr;</a>
            <a href="https://github.com/shitware-ltd/hypequotes" target="_blank" class="hover:underline transition-colors">GitHub &rarr;</a>
        </nav>
    </footer>
</body>

</html>
