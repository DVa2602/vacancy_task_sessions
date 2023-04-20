<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                </div>
            @endif
            <div class="mt-5">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th scope="col">id</th>
                        <th scope="col">User</th>
                        <th scope="col">IP</th>
                        <th scope="col">Last activity</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $sessions as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user->name}}</td>
                                <td>{{ $item->ip_address }}</td>
                                <td>{{ $item->last_activity }}</td>
                                <td><div class="d-flex justify-content-center">
                                    <form name="destroy" method="POST" action="{{ route('clearSession',$item) }}">
                                        @csrf
                                        @method('delete')
                                        <a class="destroy text-decoration-none" style="cursor:pointer" onclick="this.closest('form').submit();return false;">
                                            Close
                                        </a>
                                    </form>
                                </div></td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>Count Sessions: {{ $sessions->count()}}</div>
                    <form name="destroy" method="POST" action="{{ route('clearAllSession') }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Close All</button>
                    </form>

                  </div>
        </div>
    </div>
</x-app-layout>
