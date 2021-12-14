@extends('layout')

@section('content')
    <div class="container p-3">
        <div class="row text-xl">
            <p>{{ $practice->description }}</p>
            <p class="text-right"><i class="fa fa-info-circle toggling float-right" data-togglescope="description" data-toggleid="0"></i></p>
        </div>
        <div id="toggled-description-0" class="d-none">
            <div class="row">
                <div class="col-1 border bg-light">Domaine</div>
                <div class="col-11">{{ $practice->domain->name }}</div>
            </div>
            <div class="row">
                <div class="col-1 border bg-light">Soumis par</div>
                <div class="col-11">{{ $practice->submitter->name }}</div>
            </div>
            <div class="row">
                <div class="col-1 border bg-light">Le</div>
                <div class="col-11">{{ Carbon\Carbon::make($practice->created_at)->isoformat('D MMMM Y') }}</div>
            </div>
            <div class="row">
                <div class="col-1 border bg-light">Modifié le</div>
                <div class="col-11">{{ Carbon\Carbon::make($practice->updated_at)->isoformat('D MMMM Y') }}</div>
            </div>
            <div class="row">
                <div class="col-1 border bg-light">Etat</div>
                <div class="col-11">{{ $practice->publicationState->name }}</div>
            </div>
        </div>
        <div class="h5">Opinions</div>
        @forelse($practice->opinions as $opinion)
            <div class="row">
                <div class="col-2 small text-gray-500 toggling mb-2" data-togglescope="comment" data-toggleid="{{ $opinion->id }}">
                    <div>{{ Carbon\Carbon::make($practice->updated_at)->isoformat('D MMM YY') }}, <a href="/user/{{ $opinion->user->id }}">{{ $opinion->user->name }}</a></div>
                    <div class="text-right">{{ $opinion->comments()->count() }} <i class="fa fa-comments"></i> ( {{ $opinion->upvotes() }} <i class="fa fa-thumbs-up"></i> {{ $opinion->downvotes() }} <i class="fa fa-thumbs-down"></i> )</div>
                </div>
                <div class="col-10">
                    {{ $opinion->description }}
                </div>
                <div id="toggled-comment-{{ $opinion->id }}" class="d-none">
                    @foreach ($opinion->comments as $comment)
                        <div class="row">
                            <div class="col-3 small text-gray-500 text-right">
                                {{ $comment->name }}
                                @if ($comment->pivot->points > 0)
                                    <i class="fa fa-thumbs-up"></i>
                                @elseif($comment->pivot->points < 0)
                                    <i class="fa fa-thumbs-down"></i>
                                @endif
                            </div>
                            <div class="col-7 small text-gray-500 mb-2">
                                {{ $comment->pivot->comment }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p>Aucun</p>
        @endforelse
    </div>
@endsection
