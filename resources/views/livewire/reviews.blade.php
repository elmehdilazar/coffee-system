  <div>
    @if ($data)

    <table class="table table-hover">
        <thead>
            <tr>
                <th class="border-gray-200">#</th>
                <th class="border-gray-200">name</th>
                <th class="border-gray-200">message</th>

                <th class="border-gray-200">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $review)
                <!-- Item -->
                <tr>
                    <td>
                        <a href="#" class="fw-bold">
                            {{ $review->id }}
                        </a>
                    </td>
                    <td>
                        <span class="fw-normal"> {{ $review->name }}</span>
                    </td>
                    <td>
                        <span class="fw-normal">
                            <textarea class="form-control" disabled id="textarea" cols="6" rows="4">

                                {{ $review->message }}
                            </textarea>
                        </span>
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

                                <a class="dropdown-item text-danger rounded-bottom" wire:click="removereview({{$review->id}})"><span
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


          {{ $data->links() }}

        </nav>

    </div>
    @else
<h1>no reviews yet</h1>
    @endif
    </div>
