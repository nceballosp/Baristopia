<!-- NCP -->

@extends('layouts.admin')
@section('title',  __('messages.showOrder') )
@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card-body">
        <h4>
            {{ $viewData['order']->getId() }}
        </h4>
        <p class="card-text">{{ __('messages.total') }}{{ $viewData['order']->getTotal()}}</p>
        <p class="card-text">{{ __('messages.totalQuantity') }}{{ $viewData['order']->getTotalQuantity()}}</p>
        <a class='btn btn-primary' href="{{ route('admin.order.edit', ['id'=>$viewData['order']->getId()]) }}">{{ __('messages.edit') }}</a>
        <form action="{{ route( 'admin.order.delete') }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $viewData['order']->getId() }}" />
            <button type="submit" class="btn btn-danger">
                {{ __('messages.remove') }}
            </button>
        </form>
    </div>    
</div>
@endsection