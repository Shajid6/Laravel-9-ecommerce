@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
                @if ($errors->any())
        <div class="alert alert-danger">
            <p><strong>Opps Something went wrong</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <div class="card">
                <div class="card-header">
                    <h3>Add Products

                        <a href="{{ url('admin/products') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">

                    <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                        @csrf

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
                                    <select name="category_id" class="form-control"required >
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control"required />
                                  
                                  
                                </div>
                                <div class="mb-3">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" class="form-control" required/>
                                   
                                </div>
                                <div class="mb-3">
                                    <label>Select Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Small Description (500 Words)</label>

                                    <textarea name="small_description" class="form-control" rows="4"required></textarea>
                                   
                                </div>

                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="4"></textarea>
                                    
                                </div>
                            </div>

                            <div class="tab-pane fade" id="seotags-pane" role="tabpanel" aria-labelledby="seotags"
                                tabindex="0">
                                <div class="mb-3 py-4 ">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" required/>
                                   
                                </div>
                                <div class="mb-3">

                                    <label>Meta Description (500 Words)</label>
                                    <textarea name="meta_description" class="form-control" rows="4"required></textarea>
                                  
                                </div>
                                <div class="mb-3">

                                    <label>Meta Keyword(500 Words)</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4"required></textarea>
                                   
                                </div>
                            </div>

                            <div class="tab-pane fade" id="Details-pane" role="tabpanel" aria-labelledby="Details"
                                tabindex="0">

                                <div class="row py-4">
                                    <div class="col-md-3 ">
                                        <div class="mb-3">
                                            <label>Original price</label>
                                            <input type="text" name="original_price" class="form-control" required/>
                                           
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Selling price</label>
                                            <input type="text" name="selling_price" class="form-control"required />
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Quantity</label>
                                            <input type="text" name="quantity" class="form-control" required/>
                                           
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>discount</label>
                                            <input type="text" name="discount" class="form-control" />
                                           
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Trending</label>
                                            <input type="checkbox" name="trending"style="width: 30px; height: 30px;" />
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Featured</label>
                                            <input type="checkbox" name="featured"style="width: 30px; height: 30px;" />
                                            
                                        </div>
                                    </div>

                                      <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Badge</label>
                                            <input type="text" name="badge" />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <input type="checkbox" name="status"style="width: 30px; height: 30px;" />
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
                            </div>
                            <div class="tab-pane fade" id="color-tabe-pane" role="tabpanel" aria-labelledby="color-tabe"
                                tabindex="0">
                                <div class="mb-5">
                                    <div class="py-4">
                                        <h4> Select Color</h4>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        @forelse ($colors as $coloritem)
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-5">
                                                    Color: <input type="checkbox"style="width: 20px; height: 20px;" name="colors[{{ $coloritem->id }}]"
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
                                                <h1>No colors found</h1>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary float-end">
                                Submit
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
