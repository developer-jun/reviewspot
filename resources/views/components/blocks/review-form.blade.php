   
<div class="block" x-data="$store.formData">  
    <h2 class="text-xl font-bold mt-10 mb-2">Review Form</h2>                       
    <form id="reviewForm" name="reviewForm" x-data="reviewForm" x-on:submit.prevent="post">
        @csrf

        <div
            class="form-result"
            style="display: none"
            x-show="results"
            x-bind:class="results?.type ? `is-${results?.type}` : ''"
            x-html="results?.message"
            x-transition
        ></div>

        <div class="mb-3 max-w-sm">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Rating: </label>
            <div class="star-container">
                <div class="container__items">
                    <input x-model="userRating" type="radio" id="st5" value="5" x-on:click="$store.formData.setRatingValue(5)"/>
                    <label for="st5" x-on:click="$store.formData.setRatingValue(5)">
                        <div class="star-stroke">
                            <div class="star-fill"></div>
                        </div>
                        <div class="label-description" data-content="Excellent"></div>
                    </label>
                    <input x-model="userRating" type="radio" id="st4" value="4" x-on:click="$store.formData.setRatingValue(4)"/>
                    <label for="st4" x-on:click="$store.formData.setRatingValue(4)">
                        <div class="star-stroke">
                            <div class="star-fill"></div>
                        </div>
                        <div class="label-description" data-content="Above expectation"></div>
                    </label>
                    <input x-model="userRating" type="radio" id="st3" value="3" x-on:click="$store.formData.setRatingValue(3)"/>
                    <label for="st3" x-on:click="$store.formData.setRatingValue(3)">
                        <div class="star-stroke">
                            <div class="star-fill"></div>
                        </div>
                        <div class="label-description" data-content="Average"></div>
                    </label>
                    <input x-model="userRating" type="radio" id="st2" value="2" x-on:click="$store.formData.setRatingValue(2)"/>
                    <label for="st2" x-on:click="$store.formData.setRatingValue(2)">
                        <div class="star-stroke">
                            <div class="star-fill"></div>
                        </div>
                        <div class="label-description" data-content="Unsatisfactory"></div>
                    </label>
                    <input x-model="userRating" type="radio" id="st1" value="1" x-on:click="$store.formData.setRatingValue(1)"/>
                    <label for="st1" x-on:click="$store.formData.setRatingValue(1)">
                        <div class="star-stroke">
                            <div class="star-fill"></div>
                        </div>                                            
                        <div class="label-description" data-content="Terrible"></div>
                    </label>
                </div>
            </div>
        </div>
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title:</label>
            <input x-model="suggestionTitle" type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Worth every penny spent" required />
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Review Description:</label>
            <textarea x-model="reviewDescription" name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
        </div>        
        <div class="flex items-start mb-5">
            <div class="flex items-center h-5">
                <input x-model="accept" id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
            </div>
            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I have personally used their product or, tried their service</label>
        </div>
        <input type="hidden" name="business_id" value="{{ $businessId }}" />
        <button type="submit" class="flex align-middle text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg x-show="loading" class="animate-spin w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor">
                <path fill-rule="evenodd" d="M13.836 2.477a.75.75 0 0 1 .75.75v3.182a.75.75 0 0 1-.75.75h-3.182a.75.75 0 0 1 0-1.5h1.37l-.84-.841a4.5 4.5 0 0 0-7.08.932.75.75 0 0 1-1.3-.75 6 6 0 0 1 9.44-1.242l.842.84V3.227a.75.75 0 0 1 .75-.75Zm-.911 7.5A.75.75 0 0 1 13.199 11a6 6 0 0 1-9.44 1.241l-.84-.84v1.371a.75.75 0 0 1-1.5 0V9.591a.75.75 0 0 1 .75-.75H5.35a.75.75 0 0 1 0 1.5H3.98l.841.841a4.5 4.5 0 0 0 7.08-.932.75.75 0 0 1 1.025-.273Z" clip-rule="evenodd" />
            </svg>
              
            Submit
        </button>
    </form>

</div>    
