	<x-layout>
     <!--   <div class="flex">
        <aside class="w-48">
   <aside class="w-48 flex-shrink-0" style="position: relative; left: 140%;top: 110%;">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul>
                <li>
                    
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All Posts</a>
                </li>

                <li>
                    <a href="/admins/post/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                </li>
            </ul>
        </aside>
     </aside>
  </div> -->
    



      			<h1 class="text-center font-bold text-xl">Manage Post!</h1><br>


<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                S.No
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Author
              </th>

              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Title
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Published
              </th>
              
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
               <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Delete</span>
              </th>

            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          	@foreach($posts as $key => $post)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{++$key}} </div>
               
              </td>
               <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$post->author->username}}</div>
               
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
              	<a href="/posts/{{$post->slug}}">
                <div class="text-sm text-gray-900">{{$post->title}}</div>
             </a>
               
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{$post->created_at->diffForHumans()}}
                </span>
              </td>
            
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="/admin/posts/{{$post->id}}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <!-- <a href="#" class="text-indigo-600 hover:text-indigo-900">Delete</a> -->

                <form method="POST" action="/admin/posts/{{$post->id}}">
                	@csrf
                	@method('DELETE')
                	<button class="text-xs text-gray-700">Delete</button>
                </form>
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

           





    


		</section>
	</x-layout>