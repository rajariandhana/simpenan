<x-layout>
    @guest
        <a href="/register">Register</a>
        <a href="/login">login</a>
        <a href="/">dashboard</a>
    @endguest
    @auth
        <x-navbar></x-navbar>
    @endauth
</x-layout>