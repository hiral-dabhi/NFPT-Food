@extends('layouts.master')
@section('title')
    {{ __('Edit Menu Item') }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/libs/select2.min.css') }}">

    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('build/libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <!-- page title -->
                <x-page-title title="Edit Menu Item" pagetitle="Menu Item" />

                <div class="grid grid-cols-1 mt-3">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                            <form method="POST" action="{{ route('menu.update', $menu->id) }}" class="menu-edit-form"
                                id="menu_form_edit" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-12 gap-x-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mb-4">
                                            <label for="category_id"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Category
                                                <span class="text-sm text-red-600">*</span></label>
                                            <select name="category_id" id="category_id"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('category_id') }}">
                                                <option value="">Select Category</option>
                                                @foreach ($categoryList as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ $menu->category_id == $key ? 'selected' : '' }}>
                                                        {{ Crypt::decryptString($value) }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="sub_category_id"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Sub Category
                                                <span class="text-sm text-red-600">*</span></label>
                                            <select name="sub_category_id" id="sub_category_id"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('sub_category_id') }}">
                                                <option value="">Select Sub Category</option>
                                            </select>
                                            @error('sub_category_id')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="title"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Title<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="title" id="title" placeholder="Enter Title"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100""
                                                value="{{ old('title', Crypt::decryptString($menu->title) ?? '') }}">
                                            @error('title')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                      
                                        <div class="mb-4">
                                            <label for="image"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Image</label>
                                            <div class="flex items-center">
                                                <input type="file" name="image" id="image" class="mr-4" accept=".jpg, .jpeg, .png"
                                                    onchange="previewImage(event)">
                                                <div id="imagePreview">
                                                    @if ($menu->image && file_exists(public_path('menu/' . $menu->image)))
                                                        <img src="{{ asset('menu/' . $menu->image) }}" alt="Item Image"
                                                            class="w-32 h-32 object-cover" height="100px" width="100px">
                                                    @endif
                                                </div>
                                            </div>
                                            @error('image')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="tag"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Tag</label>
                                            <input type="text" name="tag" id="tag" placeholder="Enter Tag"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100""
                                                value="{{ old('tag', $menu->tag ?? '') }}">
                                            @error('tag')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="type"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Type<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <div class="mt-1 flex items-center">
                                                <div class="flex items-center" style="margin-right: 10px">
                                                    <input type="radio" id="type1" name="type" value="0"
                                                    {{ old('type', $menu->type) === '0' ? 'checked' : '' }}

                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                    <label for="type1"
                                                        class="ml-2 block text-sm leading-5 text-gray-700">Veg</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="radio" id="type2" name="type" value="1"
                                                        {{ old('type', $menu->type) === '1' ? 'checked' : '' }}
                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                    <label for="type2"
                                                        class="ml-2 block text-sm leading-5 text-gray-700">Non-veg</label>
                                                </div>
                                            </div>
                                            @error('type')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="price"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Price</label>
                                            <input type="number" name="price" id="price" placeholder="Enter price"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100""
                                                value="{{ old('price', $menu->price ?? '') }}">
                                            @error('price')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="description"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Description</label>
                                            <textarea type="text" name="description" id="description" placeholder="Enter Description"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100">{{ old('description', $menu->description ?? '') }}</textarea>
                                            @error('description')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="in_stock"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">In Stock<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <div class="mt-1 flex items-center">
                                                <div class="flex items-center" style="margin-right: 10px">
                                                    <input type="radio" id="in_stock1" name="in_stock" value="0"
                                                    {{ old('in_stock', $menu->in_stock) === '0' ? 'checked' : '' }}

                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                    <label for="in_stock1"
                                                        class="ml-2 block text-sm leading-5 text-gray-700">Yes</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="radio" id="in_stock2" name="in_stock" value="1"
                                                        {{ old('in_stock', $menu->in_stock) === '1' ? 'checked' : '' }}
                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                    <label for="in_stock2"
                                                        class="ml-2 block text-sm leading-5 text-gray-700">No</label>
                                                </div>
                                            </div>
                                            @error('in_stock')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="status"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Status<span
                                                    class="text-sm text-red-600">*</span></label>
                                            <div class="mt-1 flex items-center">
                                                <div class="flex items-center" style="margin-right: 10px">
                                                    <input type="radio" id="status1" name="status" value="0"
                                                        {{ old('status', $menu->status) === '0' ? 'checked' : '' }}
                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                    <label for="status1"
                                                        class="ml-2 block text-sm leading-5 text-gray-700">Active</label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input type="radio" id="status2" name="status" value="1"
                                                        {{ old('status', $menu->status) === '1' ? 'checked' : '' }}
                                                        class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                                    <label for="status2"
                                                        class="ml-2 block text-sm leading-5 text-gray-700">Inactive</label>
                                                </div>
                                            </div>
                                            @error('status')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit"
                                        class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                        href="{{ route('menu.index') }}">
                                        Back
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/libs/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libs/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libs/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/alertifyjs/build/alertify.min.js') }}"></script>
    <script src="{{ asset('js/backend/menu.js') }}"></script>
    <script>
        var getSubCategoryUrl = "{{ route('menu.getSubCategory') }}";
        var categoryId = "{{ $menu->category_id ?? '' }}";
        var dishId = "{{ $menu->sub_category_id ?? '' }}";

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('imagePreview');
                output.innerHTML = '<img src="' + reader.result +
                    '" alt="Preview Image" class="w-32 h-32 object-cover" height="100px" width="100px">';
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        $(function() {
            menu.edit();
        });
    </script>
@endsection
