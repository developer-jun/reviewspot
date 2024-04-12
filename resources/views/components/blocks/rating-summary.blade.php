@php
    use App\Helpers\Utils;
@endphp
<div>
    <h2 class="text-xl font-bold text-white">Rating Summary</h2>
    <div class="flex items-center mb-2">
        @php
            $ratingSVG = Utils::getRatingSVG(floor($ratingSummary['overallRating']));
        @endphp
        {!! $ratingSVG !!}
        
        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ $ratingSummary['overallRating'] }}</p>
        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">out of</p>
        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">5</p>
    </div>
    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $ratingSummary['overallRating'] }} global ratings</p>
    <div class="flex items-center mt-4">
        <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">5 star</a>
        <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
            <div class="h-5 bg-yellow-300 rounded" style="width: {{ $ratingSummary['percentageByRating'][5] }}%"></div>
        </div>
        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $ratingSummary['percentageByRating'][5] }}%</span>
    </div>
    <div class="flex items-center mt-4">
        <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">4 star</a>
        <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
            <div class="h-5 bg-yellow-300 rounded" style="width: {{ $ratingSummary['percentageByRating'][4] }}%"></div>
        </div>
        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $ratingSummary['percentageByRating'][4] }}%</span>
    </div>
    <div class="flex items-center mt-4">
        <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">3 star</a>
        <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
            <div class="h-5 bg-yellow-300 rounded" style="width: {{ $ratingSummary['percentageByRating'][3] }}%"></div>
        </div>
        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $ratingSummary['percentageByRating'][3] }}%</span>
    </div>
    <div class="flex items-center mt-4">
        <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">2 star</a>
        <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
            <div class="h-5 bg-yellow-300 rounded" style="width: {{ $ratingSummary['percentageByRating'][2] }}%"></div>
        </div>
        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $ratingSummary['percentageByRating'][2] }}%</span>
    </div>
    <div class="flex items-center mt-4">
        <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">1 star</a>
        <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
            <div class="h-5 bg-yellow-300 rounded" style="width: {{ $ratingSummary['percentageByRating'][1] }}%"></div>
        </div>
        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $ratingSummary['percentageByRating'][1] }}%</span>
    </div>
</div> 