<div>
    <section x-show="tab === 'books' " class="py-1 bg-blueGray-50">
        <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">

            <div class="mb-8 p-4 shadow-md rounded-md text-left">
                <div class="text-3xl text-center">
                    Enter Book Details
                </div>
                <form wire:submit.prevent='saveBook'>
                    <label class="block">
                        <span class="text-gray-700">Name</span>
                        <input class="form-input mt-1 block w-full px-2 py-4 border border-blue-300 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none" placeholder="Jane Doe" />
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Name</span>
                        <input class="form-input mt-1 block w-full px-2 py-4 border border-blue-300 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none" placeholder="Jane Doe" />
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Name</span>
                        <input class="form-input mt-1 block w-full px-2 py-4 border border-blue-300 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none" placeholder="Jane Doe" />
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Name</span>
                        <input class="form-input mt-1 block w-full px-2 py-4 border border-blue-300 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none" placeholder="Jane Doe" />
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Name</span>
                        <input class="form-input mt-1 block w-full px-2 py-4 border border-blue-300 rounded focus:ring-2 focus:ring-blue-600 focus:outline-none" placeholder="Jane Doe" />
                    </label>
                    <button class="bg-blue-400 px-8 py-4 rounded hover:bg-blue-300 mt-8x">
                        Save
                    </button>
                </form>
            </div>
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="flex flex-row justify-between items-center px-12 py-6 bg-blue-600 text-white rounded-t-lg">
                    <div class="text-2xl">
                        Book Informtion
                    </div>
                    <div class="flex flex-row justify-center items-center">
                        <input
                            class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                            type="search"
                            placeholder="Search">
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center bg-transparent w-full border-collapse ">
                        <thead>
                        <tr>
                            <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Borrower's Name
                                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Book Title
                                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Book Author
                                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        ISBN
                                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Publication Date
                                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Amount
                                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Action
                                        </th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                        {{ $book->fname }} {{ $book->lname }}
                                    </th>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                        {{ $book->title }}
                                    </td>
                                    <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $book->author }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $book->isbn }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $book->publication_date }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $book->amount_owned }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <a href="">Edit</a>
                                        <a href="#">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
                <div class="my-4">
                    <hr />
                </div>
                <div class="mb-8 mx-4">
                    {{ $books->links() }}
                </div> 
            </div>


            {{-- Create Book --}}
            

        </div>
    </section>
</div>
