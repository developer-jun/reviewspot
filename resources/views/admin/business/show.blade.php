<x-layouts.admin>
    <div class="bg-gray-200 h-screen">
        <section class="header p-5">
            <h1>Business Info</h1>
            <a href="{{ route('business.index') }}" class="custom-link back-link"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="back-button w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
              </svg>
               List of Businesses</a>
        </section>
        <section class="content-body p-5">            
            <div class="message-container text-lime-500">
                @session('message')
                    <div class="success-message">{{ session('message') }}</div>
                @endsession
            </div>
            <div class="business-container overflow-auto form-result py-12">
                <div class="flex flex-row w-full">
                    <div class="px-2 basis-1/2">
                        <label class="block text-sm" for="name">Name</label>
                        <span>{{ $business->name }}</span>
                    </div>
                    <div class="px-2 basis-1/2">
                        <label class="block text-sm" for="phone">Phone</label>
                        <span>{{ $business->phone }}</span>
                    </div>
                </div>
                <div class="mt-2 flex flex-row">
                    <div class="px-2 basis-1/2">
                        <label class="block text-sm" for="address2">Building / Apartment Number</label>
                        <span>{{ $business->address2 }}</span>
                    </div>
                    <div class="px-2 basis-1/2">                                
                        <label class="block text-sm" for="address">Address</label>
                        <span>{{ $business->address }}</span>
                    </div>  
                </div>
                <div class="mt-2 flex flex-row">
                    <div class="px-2 basis-1/2">
                        <label class="block text-sm" for="city">City</label>
                        <span>{{ $business->city }}</span>
                    </div>
                    <div class="px-2 basis-1/2">
                        <div class="mt-2 flex flex-row">
                            <div class="basis-auto grow-0">
                                <label class="block text-sm" for="state">State</label>
                                <span>
                                    @foreach ($states as $state)
                                        {{ $state->code == $business->state ? $state->name : '' }} 
                                    @endforeach
                                </span>
                            </div>
                            <div class="basis-auto grow pl-2">
                                <label class="block text-sm" for="zip_code">Zip Code</label>
                                <span>{{ $business->zip_code }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2 flex flex-row">
                    <div class="px-2 basis-1/2">
                        <label class="block text-sm" for="summary">Short Description</label>
                        <span>{{ $business->summary }}</span>
                    </div>
                    <div class="px-2 basis-1/2">
                        <label class="block text-sm" for="city">Business Type</label>
                        <span>
                            @foreach ($businessTypes as $businessType)
                                {{ $businessType->id == $business->business_type ? $businessType->type : '' }}
                            @endforeach
                        </span>
                    </div>
                </div>                       
                
                <div class="mt-2 px-2">
                    <label class=" block text-sm" for="description">Full Description</label>
                    <span>{{ $business->description }}</span>
                </div>                                             
                             
            </div>
        </section>
    </div>
</x-layouts.admin>