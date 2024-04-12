@php
    use App\Helpers\Utils;
    use Carbon\Carbon;
@endphp

<div class="block mb-7" id="reviewList">
    <h2 class="text-xl font-bold mt-5">Reviews</h2>
    @foreach ($reviews as $review)
        @php
            $ratingSVG = Utils::getRatingSVG($review->rating);
            $createdAt = Carbon::parse($review->created_at);
        @endphp
        <div class="block mt-5 px-10 py-5 rounded-lg border-slate-900 shadow-xl shadow-slate-900">
            <div class="flex items-center pb-3">{!! $ratingSVG !!}</div>
            <div class="text-sm text-zinc-300">{{ $createdAt->diffForHumans() }}</div>
            <h3 class="font-bold w-[50%] truncate">{{ $review->title }}</h3>            
            <div class="text-sm pb-3 text-zinc-400">{{ $review->description }}</div>
            <div class="text-sm text-zinc-100 pb-3">{{ $review->name }}<br />{{ $review->city }}, {{ $review->state }}</div>
        </div>
    @endforeach
</div>