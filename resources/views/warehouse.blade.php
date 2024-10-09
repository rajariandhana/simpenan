<x-layout>
    <a href="/">&laquo; Back to all warehouse</a>
    <div>
        @if ($products->isEmpty())
        kosong
        @else
            @dump($products)
        @endif
    </div>
</x-layout>