<x-layouts.admin>
    <div class="bg-gray-200 h-screen" x-data="{
        isDialogOpen: false,
        id: 0,
        name: '',
        formAction: '',
        toggle(id, name, actionAddress) {                                                
            this.isDialogOpen = ! this.isDialogOpen;
            this.id = id;
            this.name = name;
            this.formAction = actionAddress;
            console.log('toggled', id, name, actionAddress);            
        },
    }" @keydown.escape="isDialogOpen = false">
        <section class="header p-5">
            <h1>List of Businesses</h1>
        </section>
        <section class="content-body">
            <div class="business-container p-5">
                <a href="{{ route('business.create') }}" class="btn new-btn"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                  </svg> New Business</a>
                <div class="message-container text-lime-500">
                    @session('message')
                        <div class="success-message">{{ session('message') }}</div>
                    @endsession
                </div>
                <div class="businesses mt-3 bg-white overflow-auto">                    
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Address</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">City</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">State</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Summary</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">                        
                            @foreach ($businesses as $business)
                                <tr>
                                    <td class="w-1/3 text-left py-3 px-4"><h2>{{ $business->name }}</h2></td>                            
                                    <td class="text-left py-3 px-4">{{ $business->address }}</td>
                                    <td class="text-left py-3 px-4">{{ $business->city }}</td>
                                    <td class="text-left py-3 px-4">{{ $business->state }}</td>
                                    <td class="text-left py-3 px-4">{{ $business->phone }}</td>
                                    <td class="w-1/3 text-left py-3 px-4">{{ Str::words($business->summary, 100) }}</td>
                                    <td class="text-left py-3 px-4"><div class="flex flex-row">
                                        <a href="{{ route('business.show', $business) }}" class="btn view-button"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                          </svg> View</a>
                                        <a href="{{ route('business.edit', $business) }}" class="btn edit-button mx-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                          </svg> Edit</a>
                                        <button class="btn delete-btn" @click="toggle({{ $business->id }}, '{{ $business->name }}', '{{ route('business.destroy', $business->id) }}')"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                          </svg> Delete</button>
                                    </div></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        
                <div class="p-6">
                    {{ $businesses->links() }}
                </div>
            </div>
        </section>
        
        <!-- overlay -->
        <div
            class="overflow-auto"
            style="background-color: rgba(0,0,0,0.5)"
            x-show="isDialogOpen"
            :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }"
        >
            <!-- dialog -->
            <div
                class="custom-modal bg-white text-sky-950 shadow-2xl m-4 p-10 sm:m-8"
                x-show="isDialogOpen"
                @click.away="isDialogOpen = false"
            >
                <div class="flex justify-between items-center border-b p-2 text-xl">
                    <h6 class="text-xl font-bold">Confirmation</h6>
                    <button type="button" @click="isDialogOpen = false">✖</button>
                </div>
                <div class="p-2">
                    <!-- content -->
                    <h4 class="font-bold text-rose-700">Are you sure you want to delete this business?</h4>
                    <p class="py-5"><strong><span x-text="name"></span></strong></p>
                    <p class="text-sm">This action cannot be undone.</p>
                    <div class="flex justify-between">
                    <form id="deleteBusinessForm" action="" :action="formAction" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="" :value="id">
                        <button class="btn cancel-button" @click.away="isDialogOpen = false" type="submit">Cancel</button> <button class="btn delete-btn" type="submit"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                          </svg> Confirm Delete</button>
                    </form>
                    </div>
                </div>
            </div><!-- /dialog -->
        </div><!-- /overlay -->
        
        
    <script>
        // import Alpine from 'alpinejs'
        //let formAction = "{{ route('business.destroy', 1111) }}";
        // document.getElementById('myForm').action = 'http://localhost:8000/admin/business/actionto';
        //document.getElementById("myForm").action = formAction;
            
 
        
        function foo(id, name) {
            //window.Alpine = Alpine;            
            //Alpine.start()
            let data = { id: id }
            //e.preventDefault();
            // Now you can access the event object (e) directly
            console.log('Modal is Clicked ', id, name);
            // isDialogOpen = true;
            // let reactiveData = Alpine.reactive(data);

            console.log('reactiveData: ', reactiveData.count) // 1
        }
    </script>
    </div>
</x-layouts.admin>
