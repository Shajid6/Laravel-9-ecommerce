@extends('layouts.app')
@section('title', 'Thank You')
@section('content')

    <div class="card mt-5">

        <div class="jumbotron text-center">
            <h1 class="display-3">Thank You!</h1>
            <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your
                account setup.</p>
            <hr>
            <p>
                Having trouble? <a href="" class="">Contact us</a>

            <div class="row">
                <div class="col-md-8">
                    <ul>
    
                  @if ($categories)
                        @foreach ($categories as $category)
                          <li>{{$category->name }}</li> 
                          @if($category->children)
                          <li>
                            {{$category->children->name}}
                          </li>
                          @endif
                        @endforeach
                    @else
                        <h2>no category found</h2>
                    @endif
                    </ul>
                </div>
            </div>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ url('collections') }}" role="button">More Shopping</a>
            </p>
        </div>
    </div>
    </div>

@endsection
