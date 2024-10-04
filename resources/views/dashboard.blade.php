<x-app-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8">
                @auth
                    <div class="card">
                        <div class="card-body">
                            @auth
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Name: {{ Auth::user()->name }}</li>
                                    <li class="list-group-item">Email: {{ Auth::user()->email }}</li>
                                    <li class="list-group-item">Google ID: {{ Auth::user()->google_id }}</li>
                                    <li class="list-group-item">Created At: {{ Auth::user()->created_at }}</li>
                                </ul>
                                <div class="text-end">
                                    <form action="{{ route('auth.logout') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Logout</button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                @endauth
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                @guest
                    <div class="card">
                        <div class="card-header">Login with Google</div>
                        <div class="card-body">
                            <a class="btn btn-primary" href="{{ route('auth.redirect') }}">Login</a>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</x-app-layout>
