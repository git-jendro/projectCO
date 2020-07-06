@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="col-md-12">
                    <div class="media-profile">
                        
                        @if (($u->first()->gender=="laki"))
                        <img src="{{ asset('img/1.png')}}" class="profile mr-3" alt="">
                        @else
                        <img src="{{ asset('img/2.png')}}" class="profile mr-3" alt="">
                        @endif
                        <div class="media-profile-body">
                            <h4>
                                {{$u->first()->name}}
                            </h4>
                            <hr>
                            <h6>
                                Bio : {{$u->first()->email}}
                            </h6>
                            <hr>
                            <h7>
                                Jumlah Update = {{$count->count()}}
                            </h7>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('thread')
{{$id}}
@foreach ($show as $s)

{{$s->user->name}}
{{$s->threads}}

<div class="media mb-3">
    @if (($s->user->gender=="laki"))
    <img src="{{ asset('img/1.png')}}" class="pict mr-3" alt="">
    @else
    <img src="{{ asset('img/2.png')}}" class="pict mr-3" alt="">
    @endif
    <div class="media-body">
        <h5 class="mb-0">{{$s->user->name}}</h5>
        <div class="card-date mb-2">
            {{date('F d, Y', strtotime($s->created_at))}} at {{date('g : ia', strtotime($s->created_at))}}
        </div>
        <input type="hidden" name="id_threads" value="{{$s->id_threads}}">
        {{$s->threads}}
        <div class="card-delete mt-3">
                @if (Auth::user()->id==$s->id_users)
                <form action="{{$s->id_threads}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="delete">Delete</button>
                </form>
                @else
                
                @endif
            </div>
            <hr>  
            @foreach ($comment as $c)
            @if ($s->id_threads==$c->id_threads)
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
        <input type="hidden" name="id_threads" value="{{$s->id_threads}}">
        <input type="hidden" name="status" value="comment">
        <textarea class="form-control" name="comments" placeholder="Komentari..."></textarea>
        <button type="submit" class="btn btn-primary ml-2">Kirim</button>
    </div>
</form>
<hr>
@endforeach
@endsection

