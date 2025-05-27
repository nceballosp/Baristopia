<!-- NCP -->

@extends('layouts.admin')
@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card-body">
        <h4>
            {{ $viewData['payment']->getId() }}
        </h4>
        <p class="card-text">{{ __('messages.payMethod') }}{{ $viewData['payment']->getMethod()}}</p>
        <p class="card-text">{{ __('messages.status') }}{{ $viewData['payment']->getStatus()}}</p>
        <a class="btn btn-primary" href="{{ route('admin.payment.edit', ['id'=>$viewData['payment']->getId()]) }}">{{ __('messages.edit') }}</a>
        <form action="{{ route( 'admin.payment.delete') }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $viewData['payment']->getId() }}" />
            <button type="submit" class="btn btn-danger">
                {{ __('messages.remove') }}
            </button>
        </form>


    </div>    
</div>
@endsection