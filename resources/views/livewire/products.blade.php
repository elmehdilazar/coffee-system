<div>
    @include('layouts.admins.message')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Volt</a></li>
                    <li class="breadcrumb-item active" aria-current="page">admis</li>
                </ol>
            </nav>
            <h2 class="h4">All admins</h2>
            <p class="mb-0">Your web analytics dashboard template.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <a href="#" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                create new admin
            </a> --}}
            <!-- Button trigger modal -->
            <button type="button" wire:click='addingT()' class="btn btn-block btn-gray-800 mb-3">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                create new admin
            </button>

        </div>
    </div>

    @if ($adding == true || $editing == true)
        <div class="card card-body  w-50 my-2 mx-auto border-0 shadow">
            <h1 class="text-center fs-5" id="exampleModalLabel">
                @if ($editing == true)
                    edit
                @else
                    add
                @endif product
            </h1>
            @if ($editing == true)
                <form wire:submit.prevent="editingProduct" enctype="application/data" id="formM" class="mt-4">
                @else
                    <form wire:submit.prevent="addProduct" id="formM" class="mt-4">
            @endif
            <!-- Form -->

            <div class="form-group mb-4">
                <label for="name">product name</label>
                <div class="input-group">
                    <input type="text" wire:model.lazy='name' class="form-control" placeholder="name"
                        id="name" required>

                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="price">product price</label>
                <div class="input-group">
                    <input type="number" step="0.01" wire:model.lazy='price' min="0" class="form-control"
                        placeholder="price" id="price" required>

                </div>
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="description">product description</label>
                <div class="input-group">
                    <textarea class="form-control" wire:model.lazy='description' placeholder="Enter your description..." id="description"
                        rows="4"></textarea>
                </div>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- End of Form -->

            <div class="form-group mb-4">

                <div class="mb-4">

                    <label class="my-1 me-2" for="country">product categories</label>
                    <select class="form-select" wire:model.lazy='category' id="country"
                        aria-label="Default select example">
                        @if ($editing==true)
                        <option selected value="{{ $CatEdit->id}}">{{ $CatEdit->name}}</option>
@else
<option selected="">Open this select category</option>
                        @endif
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-4">

                <div class="mb-4">
                    <label for="image" class="form-label">product image</label>
                    <input class="form-control" wire:model.lazy='image' value="{{$imgEdit}}" type="file" id="image">
                </div>
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


                @if ($image)
                    image Preview:<br>
                    <img width="80" height="80" src="{{ $image->temporaryUrl() }}">
                @endif
            </div>

            </form>
            <div class="d-flex justify-content-between">

                <button wire:click="close()" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" form="formM" class="btn btn-primary" form="formM">Save changes</button>
            </div>
        </div>

    @endif
    <div class="table-settings mb-4">
        <div class="row align-items-center justify-content-between">
            <div class="col col-md-6 col-lg-3 col-xl-4">
                <div class="input-group me-2 me-lg-3 fmxw-400">
                    <span class="input-group-text">
                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input type="text" wire:model.lazy='search' class="form-control"
                        placeholder="Search products">
                </div>
            </div>
            <div class="col-4 col-md-2 col-xl-1 ps-md-0 text-end">
                <div class="dropdown">
                    <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-1"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end pb-0">
                        <span class="small ps-3 fw-bold text-dark">Show</span>
                        <a class="dropdown-item d-flex align-items-center fw-bold" href="#">10 <svg
                                class="icon icon-xxs ms-auto" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg></a>
                        <a class="dropdown-item fw-bold" href="#">20</a>
                        <a class="dropdown-item fw-bold rounded-bottom" href="#">30</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">#</th>
                    <th class="border-gray-200">image</th>
                    <th class="border-gray-200">name</th>
                    <th class="border-gray-200">price</th>
                    <th class="border-gray-200">description</th>
                    <th class="border-gray-200">created at</th>
                    <th class="border-gray-200">updated at</th>
                    <th class="border-gray-200">category</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <!-- Item -->
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">
                                {{ $product->id }}
                            </a>
                        </td>
                        <td><span class="fw-normal"><img width="70" height="70"
                                    src="{{ asset('storage/images/' . $product->image) }}" alt=""
                                    srcset=""></span></td>
                        <td>
                            <span class="fw-normal">{{ $product->name }}</span>
                        </td>
                        <td><span class="fw-bold">${{ $product->price }}</span></td>
                        <td><span class="fw-normal">{{ Str::limit($product->description, 50, '...') }}</span></td>
                        <td><span class="fw-normal">{{ $product->created_at }}</span></td>
                        <td><span
                                class="fw-normal">{{ \Carbon\Carbon::parse($product->updated_at)->diffForHumans() }}</span>
                        </td>
                        <td><span class="fw-bold"><a href="#"
                                    class="fw-bold">{{ $product->Category->name }}</a></span></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="icon icon-sm">
                                        <span class="fas fa-ellipsis-h icon-dark"></span>
                                    </span>
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu py-0">

                                    <a class="dropdown-item" wire:click="getProduct({{ $product->id }})"><span
                                            class="fas fa-edit me-2"></span>Edit</a>
                                    <a class="dropdown-item text-danger rounded-bottom" wire:click="removeProduct({{$product->id}})" href="#"><span
                                            class="fas fa-trash-alt me-2"></span>Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div
            class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            <nav aria-label="Page navigation example">


                {{ $products->links() }}

            </nav>
            <div class="fw-normal small mt-4 mt-lg-0">Showing <b>5</b> out of <b>25</b> entries</div>
        </div>
    </div>

</div>
