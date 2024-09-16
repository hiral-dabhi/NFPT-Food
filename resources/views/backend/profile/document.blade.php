@extends('layouts.master')
@section('title')
    {{ __('Professional Profile') }}
@endsection
@section('css')
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
                <x-page-title title="Professional Profile" pagetitle="Document" />
                @include('components.alert-message')

                <div class="grid grid-cols-1 mt-3">
                    <div class="flex flex-wrap card-body">
                        <div class="nav-tabs border-b-tabs">
                            <ul
                                class="flex flex-wrap w-full text-sm font-medium text-center text-gray-500 border-b border-gray-100 nav dark:border-gray-700 dark:text-gray-400">
                                <li>
                                    <a href="{{ route('professionalProfile.profile') }}"
                                        class="inline-block p-4 ">Professional Details</a>
                                </li>
                                <li>
                                    <a href="{{ route('professionalProfile.bank-detail') }}" class="inline-block p-4">Bank
                                        Details</a>
                                </li>
                                <li>
                                    <a href="{{ route('professionalProfile.document') }}"
                                        class="inline-block p-4 active">Documents</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                            <form method="POST" action="{{ route('professionalProfile.document.update', $user->id) }}"
                                class="document-form" id="document-form" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-12 gap-x-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mb-4">
                                            <label for="document_name"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Document
                                                Name<span class="text-sm text-red-600">*</span></label>
                                            <input type="text" name="document_name" id="document_name"
                                                placeholder="Enter Document Name"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20  dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                value="{{ old('document_name', $user->document_name ?? '') }}">
                                            @error('document_name')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="document_file"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">
                                                Document File
                                                <span class="text-sm text-red-600">
                                                    {{ $user->document_file === null ? '*' : '' }}
                                                </span>
                                            </label>
                                            <input type="file" name="document_file" id="document_file"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-300 placeholder:text-gray-400 dark:text-zinc-100"
                                                onchange="previewImage(event)">
                                            @error('document_file')
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4" id="imagePreviewContainer">
                                            <!-- This image will show existing document file if available -->
                                            {{-- @if ($user->document_file)
                                                <img src="{{ asset('storage/documents/' . $user->document_file) }}"
                                                    alt="Document Preview" id="imagePreview"
                                                    class="w-full max-h-60 object-cover">
                                            @else
                                                <img id="imagePreview" class="hidden w-full max-h-60 object-cover"
                                                    height="100px" width="100px">
                                            @endif --}}

                                            @if (!empty($user->document_file) && file_exists(public_path('storage/documents/' . $user->document_file)))
                                                @if (in_array(pathinfo($user->document_file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                    <img src="{{ asset('storage/documents/' . $user->document_file) }}"
                                                        alt="{{ $user->document_file }}" class="max-w-full h-auto"
                                                        height="100px" width="100px" id="imagePreview">
                                                @else
                                                    <i
                                                        class="w-10 h-10 text-xl leading-loose text-center text-gray-300 align-middle transition-all duration-300 border bx bxs-file-pdf border-gray-50 ltr:mr-5 rtl:ml-5 group-hover:border-transparent group-hover:bg-violet-50/50 group-hover:text-violet-500 dark:border-zinc-600 dark:group-hover:border-transparent dark:group-hover:bg-violet-500/20"></i>
                                                @endif
                                            @else
                                                <img id="imagePreview" class="hidden w-full max-h-60 object-cover"
                                                    height="100px" width="100px">
                                            @endif

                                        </div>
                                        <input type="hidden" name="old_file" id="old_file"
                                            value="{{ $user->document_file ?? null }}">
                                    </div>
                                </div>
                                <div class="mt-3 col-span-6 sm:col-span-4 flex items-center justify-center">
                                    <button type="submit"
                                        class="mr-1 font-medium text-white border-transparent btn bg-violet-500 w-28 hover:bg-violet-700 focus:bg-violet-700 focus:ring focus:ring-violet-50">Submit</button>
                                    <a class="font-medium text-white border-transparent btn bg-red-500 w-28 hover:bg-red-700 focus:bg-red-700 focus:ring focus:ring-red-50"
                                        href="{{ route('home') }}">
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
    <script src="{{ URL::asset('build/libs/alertifyjs/build/alertify.min.js') }}"></script>
    <script src="{{ asset('js/backend/profile.js') }}"></script>
    <script>
        function previewImage(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];
            const preview = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }

                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.classList.add('hidden');
            }
        }
        $(function() {
            profile.document();
        });
    </script>
@endsection
