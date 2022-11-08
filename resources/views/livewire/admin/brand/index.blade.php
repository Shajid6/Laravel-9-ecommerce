

<div>
    <div wire:ignore.self class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Delete </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="destroyBrand">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this data?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes. Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="row ">
        @if (session('message'))
            <div class="alert alert-success"> {{ session('message') }}</div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Brands List
                        <a href="{{ url('admin/brands/create') }}" class="btn btn-primary float-end"> Add Brands </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        @if ($brand->category)
                                            {{ $brand->category->name }}
                                        @else
                                            No Category!!
                                        @endif
                                    </td>
                                    <td>
                                        {{ $brand->slug }}
                                    </td>
                                    <td>{{ $brand->status == '1 ' ? 'hidden' : 'visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/brands/' . $brand->id . '/edit') }}"
                                            class="btn btn-success btn-sm">
                                            Edit </a>

                                        <a type="button" href="#" wire:click="deleteBrand({{ $brand->id }})"
                                            class="btn btn-sm btn-danger"data-bs-toggle="modal"
                                            data-bs-target="#exampleModal2">
                                            Delete </a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5">No Brands Found</td>
                                </tr>
                        </tbody>
                        @endforelse
                    </table><br />

                    {{ $brands->links() }}

                </div>
            </div>
        </div>
    </div>
