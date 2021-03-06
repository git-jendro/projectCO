@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <div class="card">
                <form action="/home" method="post">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Perasaan anda ?</span>
                        </div>
                        <textarea class="form-control" aria-label="With textarea" name="threads" placeholder="Tulisakan keluh kesah anda disini..."></textarea>
                        <button type="submit" class="btn btn-primary ml-2">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('thread')
{{-- {{dd($users)}} --}}
@foreach ($threads as $thread)
<div class="media mb-3">
    <a href="profile/{{$thread->user->id}}">
    @if (($thread->user->gender=="laki"))
    <img src="{{ asset('img/1.png')}}" class="pict mr-3" alt="">
    @else
    <img src="{{ asset('img/2.png')}}" class="pict mr-3" alt="">
    @endif
    <div class="media-body">
        <h5 class="mb-0">{{$thread->user->name}}</h5>
    </a>
        <div class="card-date mb-2">
            {{date('F d, Y', strtotime($thread->created_at))}} at {{date('g : ia', strtotime($thread->created_at))}}
        </div>
        <input type="hidden" name="id_threads" value="{{$thread->id_threads}}">
        {{$thread->threads}}
        <div class="card-delete mt-3">
                @if (Auth::user()->id==$thread->id_users)
                <form action="{{$thread->id_threads}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="delete">Delete</button>
                </form>
                @else
                
                @endif
            </div>
            <hr>  
            @foreach ($comment as $c)
            @if ($thread->id_threads==$c->id_threads)
                {{$c->id_threads}}
                {{$c->users->id}}
                <div class="media comment mt-3">
                    <a class="mr-3" href="#">
                        @if (($c->users->gender=="laki"))
                    {{$c->users->gender}}
                    <img src="{{ asset('img/1.png')}}" class="pict mr-3" alt="">
                    @else
                    {{$c->users->gender}}
                    <img src="{{ asset('img/2.png')}}" class="pict mr-3" alt="">
                    @endif
                </a>
                
                <div class="media-body">
                    {{$c->id_threads}}
                    {{$c->users->id}}
                    <h6 class="mt-0">{{$c->users->name}}</h6>
                    {{$c->comments}}
                    <div class="card-delete mt-3">
                        <button class="comm">Balas</button>
                        <div class="comments mt-3">
                        <form action="">
                                <input type="hidden" name="id_threads" value="{{$c->id_threads}}">
                                <input type="hidden" name="id_users" value="{{Auth::user()->id}}">
                                <input type="hidden" name="status" value="child">
                                <textarea class="form-control" name="comments" placeholder="Komentari..."></textarea>
                                <button type="submit" class="btn btn-primary mt-1">Kirim</button>
                            </div>
                        </form>
                    </div>
                    <hr>
                    {{-- <hr>
                        <div class="media mt-3">
                            <a class="mr-3" href="#">
                                <img src="..." class="mr-3" alt="Dummy">
                            </a>
                            <div class="media-body">
                                <h6 class="mt-0">Dummy</h6>
                                Dummy
                            <div class="card-delete mt-5">
                                <a href="">Balas</a>
                            </div>
                        </div>
                    </div>
                    <div class="media mt-3">
                        <a class="mr-3" href="#">
                            <img src="..." class="mr-3" alt="Dummy">
                        </a>
                        <div class="media-body">
                            <h6 class="mt-0">Dummy</h6>
                            Dummy
                            <div class="card-delete mt-5">
                                <a href="">Balas</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            @else
            
            @endif
            @endforeach
            <div class="media mt-3">
                <a class="mr-3" href="#">
                    <img src="..." class="mr-3" alt="Dummy">
                </a>
                <div class="media-body">
                    <h5 class="mt-0">Dummy</h5>
                    Dummy
                    <div class="card-delete mt-5">
                        <a href="">Komentari</a>
                    </div>
                    <hr>
                    <div class="media mt-3">
                        <a class="mr-3" href="#">
                            <img src="..." class="mr-3" alt="Dummy">
                        </a>
                        <div class="media-body">
                            <h5 class="mt-0">Dummy</h5>
                            Dummy
                            <div class="card-delete mt-5">
                                <a href="">Komentari</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<form action="/comment" method="post">
    @csrf
    <div class="input-group mb-5">
        
        <input type="hidden" name="id_users" value="{{Auth::user()->id}}">
        <input type="hidden" name="id_threads" value="{{$thread->id_threads}}">
        <input type="hidden" name="status" value="comment">
        <textarea class="form-control" name="comments" placeholder="Komentari..."></textarea>
        <button type="submit" class="btn btn-primary ml-2">Kirim</button>
    </div>
</form>
<hr>
@endforeach
@endsection

