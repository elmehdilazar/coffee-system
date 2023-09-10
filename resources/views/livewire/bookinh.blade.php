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
                    <li class="breadcrumb-item active" aria-current="page">bookings</li>
                </ol>
            </nav>
            <h2 class="h4">All bookings</h2>
            <p class="mb-0">Your web analytics dashboard template.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="#" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                New Plan
            </a>
            <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
            </div>
        </div>
    </div>
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
                    <input type="text" wire:model.lazy="search" class="form-control" placeholder="Search orders">
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
                    <th class="border-gray-200">firstname</th>
                    <th class="border-gray-200">date</th>
                    <th class="border-gray-200">time</th>
                    <th class="border-gray-200">phone</th>
                    <th class="border-gray-200">Status</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <!-- Item -->
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">
                                {{ $booking->id }}
                            </a>
                        </td>
                        <td>
                            <span class="fw-normal"> {{ $booking->first_name }}</span>
                        </td>
                        <td><span class="fw-normal">{{ $booking->date }}</span></td>
                        <td><span class="fw-bold">{{ $booking->time }}</span></td>
                        <td><span class="fw-normal">{{ $booking->phone }}</span></td>
                        <td>
                            @if ($booking->status === 'processing')
                                <span class="fw-bold text-warning">processing</span>
                            @elseif($booking->status === 'booked')
                                <span class="fw-bold text-success">booked</span>
                            @else
                                <span class="fw-bold text-danger">canceled</span>
                            @endif

                        </td>
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
                                    <a class="dropdown-item rounded-top" data-bs-toggle="modal"
                                        data-bs-target="#reviews{{ $booking->id }}"><span
                                            class="fas fa-eye me-2"></span>View reviews</a>
                                    <a class="dropdown-item rounded-top" data-bs-toggle="modal"
                                        data-bs-target="#details{{ $booking->id }}"><span
                                            class="fas fa-eye me-2"></span>View Details</a>
                                    <a class="dropdown-item" class="btn btn-block btn-gray-800 mb-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modal-default{{ $booking->id }}"><span
                                            class="fas fa-edit me-2"></span>edit status</a>
                                    <a class="dropdown-item text-danger rounded-bottom"
                                        wire:click="removeBooking({{ $booking->id }})"><span
                                            class="fas fa-trash-alt me-2"></span>Remove</a>
                                </div>
                                <div class="modal fade" id="modal-default{{ $booking->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modal-default{{ $booking->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="h6 modal-title">change status</h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-4">
                                                    <label class="my-1 me-2" for="country">status</label>
                                                    <select wire:model="status" class="form-select" id="country"
                                                        aria-label="Default select example">
                                                        <option selected="">{{ $booking->status }}</option>
                                                        <option value="processing">processing</option>
                                                        <option value="booked">booked</option>
                                                        <option value="canceled">canceled</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" wire:click="updateStatus({{ $booking->id }})"
                                                    class="btn btn-secondary" data-bs-dismiss="modal">Accept</button>
                                                <button type="button" class="btn btn-link text-gray-600 ms-auto"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="details{{ $booking->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="details{{ $booking->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="h6 modal-title">details booking <span
                                                        class="badge bg-info">N°{{ $booking->id }} </span></h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3 d-flex">
                                                    <div class="mx-2">

                                                        <label for="disabledTextInput">firstname</label>
                                                        <input type="text" id="disabledTextInput"
                                                            class="form-control" placeholder="Disabled input"
                                                            value="{{ $booking->first_name }}" disabled>
                                                    </div>
                                                    <div class="mx-2">

                                                        <label for="disabledTextInput">lastname</label>
                                                        <input type="text" id="disabledTextInput"
                                                            class="form-control" placeholder="Disabled input"
                                                            value="{{ $booking->last_name }}" disabled>
                                                    </div>

                                                </div>
                                                <div class="mb-3 d-flex">
                                                    <div class="mx-2">

                                                        <label for="disabledTextInput">date</label>
                                                        <input type="text" id="disabledTextInput"
                                                            class="form-control" placeholder="Disabled input"
                                                            value="{{ $booking->date }}" disabled>
                                                    </div>
                                                    <div class="mx-2">

                                                        <label for="disabledTextInput">time</label>
                                                        <input type="text" id="disabledTextInput"
                                                            class="form-control" placeholder="Disabled input"
                                                            value="{{ $booking->time }}" disabled>
                                                    </div>

                                                </div>
                                                <div class="my-4">
                                                    <label for="textarea">message</label>
                                                    <textarea disabled class="form-control" placeholder="Enter your message..." id="textarea" rows="4">{{ $booking->message }}</textarea>
                                                </div>
                                                <div class="mb-3 d-flex">
                                                    <div class="mx-2">

                                                        <label for="disabledTextInput">phone</label>
                                                        <input type="text" id="disabledTextInput"
                                                            class="form-control" placeholder="Disabled input"
                                                            value="{{ $booking->phone }}" disabled>
                                                    </div>
                                                    <div class="mx-2">

                                                        <label for="disabledTextInput">status</label>
                                                        <input type="text" id="disabledTextInput"
                                                            class="form-control" placeholder="Disabled input"
                                                            value="{{ $booking->status }}" disabled>
                                                    </div>

                                                </div>
                                                <div class="mx-2 d-flex justify-content-center">
                                                    <span class="text-primary mx-2">
                                                        date of booking:<span
                                                            class="badge bg-danger">{{ $booking->created_at->format('Y-m-d') }}</span>

                                                    </span> | <span class="text-primary mx-2">
                                                        date of update :<span
                                                            class="badge bg-success">{{ $booking->updated_at->format('Y-m-d') }}</span>

                                                    </span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary text-gray-600 ms-auto"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="reviews{{ $booking->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="reviews{{ $booking->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="h6 modal-title">reviews booking <span
                                                        class="badge bg-info">N°{{ $booking->id }} </span></h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div  class="card card-body border-0 shadow table-wrapper table-responsive">

                                                    @livewire("reviews",["id"=>$booking->id ,"type"=>"booking"])
                                                </div>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary text-gray-600 ms-auto"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
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


                {{ $bookings->links() }}

            </nav>
            <div class="fw-normal small mt-4 mt-lg-0">Showing <b>5</b> out of <b>25</b> entries</div>
        </div>
    </div>
</div>