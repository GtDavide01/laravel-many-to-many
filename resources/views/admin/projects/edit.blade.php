@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="text-center">Modifica {{ $project->title }}</h2>
        <div class="row justify-content-center">
            <div class="col-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.project.update', $project->slug) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ old('title', $project->title) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="types_id">Tipologia </label>
                        <select name="types_id" id="types_id" class="form-select">
                            <option value="">Nessuna categoria</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- form per immagine --}}
                    <div class="form-group mb-3">
                        <label for="image">Immagine</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    {{-- Image preview --}}
                    <div class="mt-3">
                        <img id="image_preview" src="" alt="" style="max-height: 200px">
                    </div>
                    <div class="form-group mb-3">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="10" class="form-control">{{ old('content', $project->content) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
