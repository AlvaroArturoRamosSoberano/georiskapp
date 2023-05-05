Formulario de Creacion de Compañia

<form action="{{ url('/company') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('company.form');
</form>

<!-- /resources/views/post/create.blade.php -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->
