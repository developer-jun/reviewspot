<x-layouts.admin>
    <div class="bg-gray-200 h-screen">
        <section class="header p-5">
            <h1>Create Business Form</h1>
            <a href="{{ route('business.index') }}" class="custom-link back-link"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="back-button w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
              </svg>
               List of Businesses</a>
        </section>
        <section class="content-body p-5">            
            <div class="errors-container text-rose-500">
                @if($errors->any())
                    <ul class="errors bg-slate-100 px-3 py-3">
                        @foreach($errors->all() as $error)
                            <li class="border-rose-500 ">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="business-container businesses overflow-auto">
                <form action="{{ route('business.store') }}" method="POST" class="form">                       
                    @csrf
                    <div class="flex flex-row w-full">
                        <div class="px-2 basis-1/2">
                            <label class="block text-sm" for="name">Name</label>
                            <input class="w-full px-3 py-2" id="name" name="name" type="text"  placeholder="Business Name" aria-label="Name" value="{{ old('name') ?? $business->name }}">
                        </div>
                        <div class="px-2 basis-1/2">
                            <label class="block text-sm" for="phone">Phone</label>
                            <input class="w-full px-3 py-2" id="phone" name="phone" type="text" placeholder="Business Phone" aria-label="Phone" value="{{ old('phone') ?? $business->phone }}" />
                        </div>
                    </div>
                    <div class="mt-2 flex flex-row">
                        <div class="px-2 basis-1/2">
                            <label class="block text-sm" for="address2">Building / Apartment Number</label>
                            <input class="w-full px-3 py-1" id="address2" name="address2" type="text" placeholder="Building / Apartment Number" aria-label="Building / Apartment Number" value="{{ old('address2') ?? $business->address2 }}" />
                        </div>
                        <div class="px-2 basis-1/2">                                
                            <label class="block text-sm" for="address">Address</label>
                            <input class="w-full px-3 py-1" id="address" name="address" type="text" placeholder="Address" aria-label="Address" value="{{ old('address') ?? $business->address }}" />
                        </div>  
                    </div>
                    <div class="mt-2 flex flex-row">
                        <div class="px-2 basis-1/2">
                            <label class="block text-sm" for="city">City</label>
                            <input class="w-full px-3 py-1 " id="city" name="city" type="text" placeholder="City" aria-label="City" value="{{ old('city') ?? $business->city }}" />
                        </div>
                        <div class="px-2 basis-1/2">
                            <div class="mt-2 flex flex-row">
                                <div class="basis-auto grow-0">
                                    <label class="block text-sm" for="state">State</label>
                                    <select name="state" id="state">
                                        @foreach ($states as $state)
                                            <option {{ (old('state') ?? $state->code) == $business->state ? 'selected' : '' }} value="{{ $state->code }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="basis-auto grow pl-2">
                                    <label class="block text-sm" for="zip_code">Zip Code</label>
                                    <input class="w-full px-3 py-1" id="zip_code" name="zip_code" type="text" placeholder="Zip Code" aria-label="Zip Code" value="{{ old('zip_code') ?? $business->zip_code }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-row">
                        <div class="px-2 basis-1/2">
                            <label class="block text-sm" for="summary">Short Description</label>
                            <textarea class="w-full px-3 py-2" id="summary" name="summary" rows="6" placeholder="Summary" aria-label="Summary">{{ old('summary') ?? $business->summary }}</textarea>
                        </div>
                        <div class="px-2 basis-1/2">
                            <label class="block text-sm" for="city">Business Type</label>
                            <select name="business_type" id="" class="business-type">
                                @foreach ($businessTypes as $businessType)
                                    <option {{ (old('business_type') ?? $businessType->id) == $business->business_type ? 'selected' : '' }} value="{{ $businessType->id }}">{{ $businessType->type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                       
                    
                    <div class="mt-2 px-2">
                        <label class=" block text-sm" for="description">Full Description</label>
                        <textarea class="w-full px-3 py-2" id="description" name="description" rows="6" placeholder="Description" aria-label="Description">{{ old('description') ?? $business->description }}</textarea>
                    </div>
                    <div class="mt-6 px-2">
                        <button class="hover:bg-sky-700 bg-sky-950 btn submit-btn flex px-3 py-1 text-white rounded" type="submit"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 submitBtn-hover:text-sky-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg> Submit
                        </button>
                    </div>                        
                    
                </form>            
            </div>      
        </section>
    </div>
</x-layouts.admin>