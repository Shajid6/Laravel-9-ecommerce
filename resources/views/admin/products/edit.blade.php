@extends('layouts.admin')
@section('content')
    <div class="row">

        @if (session('message'))
            <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Products

                        <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>

                <div class="card-body">

                    <form action="{{ url('admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method ('PUT')

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">
                                    Product Info</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotags" data-bs-toggle="tab" data-bs-target="#seotags-pane"
                                    type="button" role="tab" aria-controls="SEO tags-pane" aria-selected="false">
                                    SEO tags</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Details" data-bs-toggle="tab" data-bs-target="#Details-pane"
                                    type="button" role="tab" aria-controls="Details-pane" aria-selected="false">
                                    Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tabe" data-bs-toggle="tab"
                                    data-bs-target="#image-tabe-pane" type="button" role="tab"
                                    aria-controls="image-pane" aria-selected="false">
                                    Product Image
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tabe" data-bs-toggle="tab"
                                    data-bs-target="#color-tabe-pane" type="button" role="tab"
                                    aria-controls="image-pane" aria-selected="false">
                                    Product Color
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3 py-4">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" value="{{ $product->name }}"required
                                        class="form-control" />

                                </div>
                                <div class="mb-3">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" value="{{ $product->slug }}"
                                        class="form-control"required />

                                </div>
                                <div class="mb-3">
                                    <label>Select Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}"
                                                {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Small Description (500 Words)</label>

                                    <textarea name="small_description" class="form-control" rows="4"required>{{ $product->small_description }} </textarea>

                                </div>

                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="4">{{ $product->description }} </textarea>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="seotags-pane" role="tabpanel" aria-labelledby="seotags"
                                tabindex="0">
                                <div class="mb-3 py-4 ">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" value="{{ $product->meta_title }}"
                                        class="form-control" required />

                                </div>
                                <div class="mb-3">

                                    <label>Meta Description (500 Words)</label>
                                    <textarea name="meta_description" class="form-control" rows="4"required>{{ $product->meta_description }}</textarea>

                                </div>
                                <div class="mb-3">

                                    <label>Meta Keyword(500 Words)</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4"required>{{ $product->meta_keyword }}</textarea>

                                </div>
                            </div>


                            <div class="tab-pane fade" id="Details-pane" role="tabpanel" aria-labelledby="Details"
                                tabindex="0">

                                <div class="row py-3">
                                    <div class="col-md-4 ">
                                        <div class="mb-3">
                                            <label>Original price</label>
                                            <input type="text" name="original_price"
                                                value="{{ $product->original_price }}" class="form-control" required />

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Selling price</label>
                                            <input type="text" name="selling_price"
                                                value="{{ $product->selling_price }}" class="form-control" required />

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Quantity</label>
                                            <input type="text" name="quantity" value="{{ $product->quantity }}"
                                                class="form-control" required />

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>discount</label>
                                            <input type="text" name="discount"value="{{ $product->discount }}"
                                                class="form-control" required />

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Trending</label>
                                            <input type="checkbox" name="trending"
                                                {{ $product->trending == '1' ? 'checked' : '' }}
                                                style="width: 30px; height: 30px;" />

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Featured</label>
                                            <input type="checkbox" name="featured"
                                                {{ $product->featured == '1' ? 'checked' : '' }}
                                                style="width: 30px; height: 30px;" />

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Badge</label>
                                            <input type="text"value="{{ $product->badge }}" name="badge" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <input type="checkbox"
                                                name="status"{{ $product->status == '1' ? 'checked' : '' }}
                                                style="width: 30px; height: 30px;" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="image-tabe-pane" role="tabpanel" aria-labelledby="image-tabe"
                                tabindex="0">

                                <div class="mb-3 py-4">
                                    <label class="py-4">Upload Product Images</label>
                                    <input name="image[]"type="file" multiple class="form-control" />
                                </div>
                                <div>

                                    <div>
                                        @if ($product->productImages)
                                            <div class="row">
                                                @foreach ($product->productImages as $image)
                                                    <div class="col-md-2">
                                                        <img src="{{ asset($image->image) }}"
                                                            style="width: 80px;height:80px;" class="me-4 border"
                                                            alt="Img" /><br /><br />
                                                        <a href="{{ url('admin/product-image/' . $image->id . '/delete') }}"
                                                            class="d-block btn btn-danger btn-sm mx-auto">Remove</a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <h5>No Image Added</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="color-tabe-pane" role="tabpanel" aria-labelledby="color-tabe"
                                tabindex="0">


                                <div class="mb-3">
                                    <h4 class="mt-4">Add Color</h4>
                                    <h6 class="mt-4">Select Color</h6>
                                    <hr />
                                    <div class="row">
                                        @forelse($colors as $coloritem)
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-3">
                                                    Color:<input type="checkbox"style="width: 20px; height: 20px;"
                                                        name="colors[{{ $coloritem->id }}]"
                                                        value="{{ $coloritem->id }}" />
                                                    {{ $coloritem->name }}
                                                    <br />
                                                    <br />
                                                    Quantity: <input type="number"
                                                        name="colorquantity[{{ $coloritem->id }}]"
                                                        style="width:70px; border:1px solid" />
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h3>No Color Availavle </h3>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Color Name</th>
                                                <th>Quantity</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $prodColor)
                                                <tr class="prod-color-tr">
                                                    <td>
                                                        @if ($prodColor->color)
                                                            {{ $prodColor->color->name }}
                                                        @else
                                                            <h3>No Color Availavle </h3>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="input-group ab-3" style="width:150px">
                                                            <input type="text" value="{{ $prodColor->quantity }}"
                                                                class=" productColorQuantity form-control form-control-sm" />
                                                            <button type="button" value="{{ $prodColor->id }}"
                                                                class="  updateProductColor btn btn-primary btn-sm 
                                                            text-white">Update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" value="{{ $prodColor->id }}"
                                                            class="deleteProdColorBtn btn btn-danger btn-sm text-white">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary float-end">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.updateProductColor', function() {

                var product_id = '{{ $product->id }}';
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
                // alert(prod_color_id);

                if (qty <= 0) {
                    alert('Quantity is required');
                    return false;
                }

                var data = {
                    'product_id': product_id,
                    'qty': qty
                };

                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/" + prod_color_id,
                    data: data,
                    success: function(response) {
                        alert(response.message)
                    }
                });
            });


            $(document).on('click', '.deleteProdColorBtn', function() {
                var prod_color_id = $(this).val();
                var thisClick = $(this);
                $.ajax({
                    type: "GET",
                    url: "/admin/product-color/" + prod_color_id + "/delete",
                    success: function(response) {
                        thisClick.closest('.prod-color-tr').remove();
                        alert(response.message);
                    }
                });
            });
        });
    </script>
@endsection
