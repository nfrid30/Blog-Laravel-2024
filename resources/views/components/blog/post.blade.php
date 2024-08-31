<div class="col-md-6">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <div>
                @foreach($post->tags as $tag)
                    <strong class="d-inline-block mb-2 text-primary-emphasis mx-1">#{{$tag?->name}}</strong>
                @endforeach
            </div>
            <strong class="d-inline-block mb-2 text-primary-emphasis">{{$post->category?->name}}</strong>
            <h3 class="mb-0">{{ $post->title }}</h3>
            <div class="d-flex justify-content-between">
                <div class="mb-1 text-body-secondary">{{$post->created_at?->format('d M Y')}}</div>
                <div class="mb-1 text-body-secondary">Views: {{ $post->views }}</div>
            </div>
            <div class="mb-1 text-body-dark"><b>{{$post->user->name}}</b></div>
            <p class="card-text mb-auto">{{$post->description}}</p>
            <a href="{{ route('posts.show', ['post' => $post]) }}" class="icon-link gap-1 icon-link-hover stretched-link">
                Continue reading
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            </a>
        </div>
        <div class="col-auto d-none d-lg-block">
            @if($post->image)
                <img class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" src="{{ asset('storage/' . $post->image) }}" alt="IMAGE">
            @else
                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            @endif
        </div>
    </div>
</div>
