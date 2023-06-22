<div>
    @if ($quote)
        <div class="flex justify-center gap-4">
            <i class="fa-solid fa-quote-left"></i>
            <p><span class="italic">{{ $quote['text'] }}</span> - {{ $quote['author'] }}</p>
            <i class="fa-solid fa-quote-right"></i>
        </div>
    @else
        <div>
            Loading quote...
        </div>
    @endif
</div>
