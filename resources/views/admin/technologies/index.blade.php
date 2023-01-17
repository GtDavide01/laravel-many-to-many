@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <h2 class="text-center">Area tecnologie</h2>
            @if (session('message'))
                <div class="alert alert-primary">
                    {{ session('message') }}
                </div>
            @endif
            <div class="col-7">
                <h3>Aggiungi : </h3>
                <form action="{{ route('admin.technologies.store') }}" method="POST" class="mt-3">
                    @csrf
                    <div class="input-group">
                        <input name="name" type="text" class="form-control"
                            placeholder="Inserisci una nuova tecnologia" aria-label="Inserisci una nuova tecnologia"
                            aria-describedby="create-technology-btn">
                        <button class="btn btn-outline-primary" type="submit" id="create-technology-btn">Salva</button>
                    </div>
                </form>

                <table class="table table-light mt-5">
                    <thead>
                        <tr>
                            <th scope="col">Titolo tecnologia</th>
                            <th scope="col">Numero progetti </th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($technologies as $technology)
                            <tr>
                                <th scope="row">
                                    <form id="edit-technology-{{ $technology->id }}"
                                        action="{{ route('admin.technologies.update', $technology->slug) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="name" id="name" class="form-control border-0"
                                            value="{{ $technology->name }}">
                                    </form>
                                </th>
                                <td>{{ count($technology->projects) }}</td>
                                <td class="d-flex">
                                    <form action="{{ route('admin.technologies.update', $technology->slug) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class=" me-3 btn btn-outline-success" type="submit">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.technologies.destroy', $technology->slug) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <p>Nessuna tecnologia presente</p>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection
