<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>

    <div class="py-12 dark:bg-gray-400">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                	<div>
						<div class="bg-gray-200 p-5 shadow rounded-md">
							<form action="{{ route('generate.shorten.link.post') }}" method="POST">
								@csrf
								<div class="sm:flex">
									<input type="text" name="link" class="flex-1 rounded ring-2 ring-green-400 placeholder-green-300" placeholder="Enter your desired URL/ Link" aria-label="Recipient's username" aria-describedby="basic-addon2">


			              			<div class="m-4">
										<button class="bg-green-400 hover:bg-green-600 p-3 text-white rounded-md" type="submit">Generate Shorten Link</button>
									</div>
								</div>
							</form>
						</div>
						<div class="bg-gray-100 p-5">
							@if (Session::has('success'))
								<div class="bg-green-200 my-2 p-4 rounded content-center">
			                    	<p class="text-green-400 content-center"><span class="font-bold">Success: </span>{{ Session::get('success') }}</p>
			                	</div>
				            @endif
				            @error('link')
								<div class="bg-red-200 my-2 p-4 rounded content-center">
									<span class="text-red-400 content-center"><span class="font-bold">Error: </span>{{ $message }}</span>
								</div>
							@enderror
							<table class="border-collapse border border-green-800">
								<thead>
				                    <tr class="bg-green-700 text-green-200">
				                        <th class="border border-green-600 p-3">Short Link</th>
				                        <th class="border border-green-600 p-3">Link</th>
				                        <th class="border border-green-600 p-3">Action</th>
				                    </tr>
				                </thead>
				                <tbody>
				                    @foreach($shortLinks as $row)
			                        	<tr>
			                            	<td class="border border-green-600 p-2">
			                            		<a href="{{ route('shorten.link', $row->code) }}" target="_blank" class="text-green-600 hover:text-black">{{ 'mse.ny/'.$row->code }}</a>
			                            	</td>
			                            	<td class="border border-green-600 p-2">{{ $row->link }}</td>
			                            	<td class="border border-green-600 p-2 flex">
			                            		<span class="flex-1 px-3 bg-blue-300 hover:bg-blue-500 hover:text-white rounded mx-1"><a href="#">View</a></span>
			                            		<span class="flex-1 px-4 bg-green-300 hover:bg-green-500 hover:text-white rounded mx-1"><a href="#">Edit</a></span>
			                            		<span class="flex-1 px-3 bg-red-300 hover:bg-red-500 hover:text-white rounded mx-1 focus:outline-none"><button>Delete</button></span></td>
			                        	</tr>
			                    	@endforeach
			                	</tbody>
				            </table>
			      		</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>