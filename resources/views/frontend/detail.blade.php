@php
    use App\Helpers\Utils;
@endphp
<x-layouts.frontend :metatags="$metatags">
  <article class="card">
      <h1 class="text-2xl mb-5 text-yellow-700">{{ $business->name }}</h1>

          <div class="block">
              <div class="mb-5">
                  <img alt="{{ $business->name }}" class="w-40 h-30 float-right" src="{{ $generatePlaceholderUrl($business->name, '160x120') }}">
                  <h2 class="text-xl text-white font-bold"><a href="/detail/{{ $business->slug }}">{{ $business->name }}</a></h2>
                  <a class="text-orange-100" href="#">{{ $business->phone }}</a>
                  <p>{{ $business->address }}<br />
                      {{ $business->city }}, {{ $business->state }}, {{ $business->zip_code }}</p>
                        

                    <div class="flex gap-1 items-center">
                        @php
                            $ratingSVG = Utils::getRatingSVG(floor($ratingSummary['overallRating']));
                        @endphp
                        {!! $ratingSVG !!}
                        <p class="text-sm font-bold text-yellow-300">{{ $ratingSummary['overallRating'] }}</p>
                        <span class="w-1 h-1 mx-1.5 rounded-full bg-gray-400"></span>
                        <a href="#reviewList" class="text-sm font-medium text-white hover:no-underline">{{ $ratingSummary['total'] }} review(s)</a>
                        <a href="#reviewForm" class="ml-3 inline-flex items-center rounded-lg border border-yellow-400 border-rounded px-3 py-1 text-yellow-400 text-sm hover:border-yellow-300 hover:text-yellow-300 hover:no-underline">Write Review</a>
                    </div>

                  <div class="my-8">
                    <p class="mb-2">{{ $business->summary }}</p>
                    <p>{{ $business->description }}</p>
                  </div>
                  <div class="flex gap-2 justify-between">
                    <img alt="{{ $business->name }}" class="w-32 h-24" src="{{ $generatePlaceholderUrl($business->name, '120x90') }}">
                    <img alt="{{ $business->name }}" class="w-32 h-24" src="{{ $generatePlaceholderUrl($business->name, '120x90') }}">
                    <img alt="{{ $business->name }}" class="w-32 h-24" src="{{ $generatePlaceholderUrl($business->name, '120x90') }}">
                    <img alt="{{ $business->name }}" class="w-32 h-24" src="{{ $generatePlaceholderUrl($business->name, '120x90') }}">
                    <img alt="{{ $business->name }}" class="w-32 h-24" src="{{ $generatePlaceholderUrl($business->name, '120x90') }}">
                  </div>
                </div>
                <hr class="w-full border-gray-300">
                <div class="mt-10">
                    <x-blocks.rating-summary :ratingSummary="$ratingSummary" />        
                    <x-blocks.review-lists :reviews="$reviews" />
                    <x-blocks.review-form :businessId="$business->id" />
                </div>
          </div>      
    </article>       
        
    <script>        
        document.addEventListener("alpine:init", () => {         
            Alpine.store('formData', {
                userRating: 1,
                suggestionTitle: '',
                reviewDescription: '',
                accept: false,
                setRatingValue(val) {
                    this.userRating = val;

                    if(this.suggestionTitle !== '')
                        return;

                    switch(parseInt(val)) {
                        case 1:
                            this.suggestionTitle = 'Terrible, not recommended';
                            break;
                        case 2:
                            this.suggestionTitle = 'Get\'s the job done, but not good enough';
                            break;
                        case 3:
                            this.suggestionTitle = 'Get\'s the job done okay';
                            break;
                        case 4:
                            this.suggestionTitle = 'Did better than I expected';
                            break;
                        case 5:
                            this.suggestionTitle = 'Highly recommended, Excellent job.';
                            break;
                        default:
                            this.suggestionTitle = '';
                    }
                },
                resetForm() {
                    this.userRating         = 1;
                    this.suggestionTitle    = '';
                    this.reviewDescription  = '';
                    this.accept             = false;
                },       
            });            

            Alpine.data("reviewForm", () => ({
                loading: false,
                results: false,
                data() {
                    const inputs = Array.from(this.$el.querySelectorAll("input, textarea"));                    
                    const data = inputs.reduce(
                        (object, key) => ({ ...object, [key.name]: key.value }),
                        {}
                    );
                    // add our custom rating value
                    const myFormData = Alpine.store('formData');
                    data.rating = myFormData.userRating;
                    this.loading = true;
                    return data;
                },

                async post() {
                    const response =  await (
                        await fetch("/review", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify(this.data()),
                        })
                    ).json();

                    let postResults = {};
                    postResults['type'] = response.type;
                    postResults['message'] = response.message;
                    
                    if(response.type === 'error') {
                        let errorMessage = '';
                        if(response.errors) {                            
                            response.errors.description.forEach(error => {
                                errorMessage += error + '<br />';                                                               
                            });
                        }
                        if(errorMessage) {                            
                            postResults['message'] = '<strong>'+ postResults['message'] + '</strong><br />' + errorMessage;
                        }
                    } else {
                        // If post is successful, reset the form data
                        const myFormData = Alpine.store('formData');
                        myFormData.resetForm();
                    }
                    this.loading = false;
                    this.results = postResults;
                },
            }));
        });
    </script>
</x-layouts.frontend>
