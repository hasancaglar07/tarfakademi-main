<div>
    @if($errors->any())
        <div class="alert alert-danger p-2 bg-red-500 text-white py-4 px-6 rounded-lg shadow-lg">
            <ul class="list-unstyled">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
            <div class="alert alert-success p-2 bg-green-500 text-white py-4 px-6 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger p-2 bg-red-500 text-white py-4 px-6 rounded-lg shadow-lg">
            {{ session('error') }}
        </div>
    @endif
</div>
