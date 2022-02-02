	<x-layout>

		<section class="px-6 py-8">
      <main class="max-w-lg max-auto mt-10 bg-gray-100 border border-gray-200 px-6 rounded-xl" style="position: relative; left: 30%;">
      			<h1 class="text-center font-bold text-xl">New Post!</h1>

		<form method="POST" action="/admin/posts" enctype="multipart/form-data">

			@csrf

			   <div class="mb-6">

				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="tite" enctype="multipart/form-data">
					
					Title

				</label>

				<input class="border border-gray-400 p-2 w-full" type="text"  name="title" id="title" required                            value="{{ old('title') }}">

                     @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
			</div>


			 <div class="mb-6">

				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
					
					Slug

				</label>

				<input class="border border-gray-400 p-2 w-full" type="text"  name="slug" id="slug" required                            value="{{ old('slug') }}">

                     @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
			</div>

			 <div class="mb-6">

				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="image">
					
					Upload Image

				</label>

				<input class="border border-gray-400 p-2 w-full" type="file"  name="image" id="image" required value="{{ old('image') }}">

                     @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
			</div>



			 <div class="mb-6">

				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
					
					Excerpt

				</label>

				<textarea class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt" required>{{old('ecxerpt')}}</textarea>

                     @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
			</div>


			 <div class="mb-6">

				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
					
					Body

				</label>

				<textarea class="border border-gray-400 p-2 w-full" name="body" id="body" rows="10" required>{{old('body')}}</textarea>

                     @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
			</div>



			 <div class="mb-6">

				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
					
					Category

				</label>

				<select name="category_id" id="category_id" class="border border-gray-400 p-2 w-full" >
                <option value="" selected disabled >-- Select  Category --</option>				@foreach(\App\Models\Category::all() as $category)
				

				<option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''}} >{{ ucwords($category->name)}}</option>

				@endforeach 
				</select>

                     @error('category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
			</div>




				<div class="mb-6">

				<button type="submit"  
				class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">Publish</button>


			</div>



		</form>
          </main>
		</section>
	</x-layout>