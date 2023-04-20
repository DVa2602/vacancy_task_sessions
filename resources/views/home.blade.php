<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="mt-5">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th scope="col">id</th>
                        <th scope="col">User</th>
                        <th scope="col">IP</th>
                        <th scope="col">crerated_at</th>
                        <th scope="col"><div class="d-flex justify-content-center">Action</div></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $sessions as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user->name}}</td>
                                <td>{{ $item->ip_address }}</td>
                                <td>{{ $item->user_agent }}</td>
                                <td>{{ $item->last_activity }}</td>
                                <td>Close</td>
                            </tr>
                        @endforeach
                        {{-- @foreach ( $books as $book)
                        <tr>
                            <th scope="row">{{ $book->id }}</th>
                            <td>{{ Str::ucfirst($book->name) }}</td>
                            <td>{{ Str::ucfirst($book->description) }}</td>
                            <th>{{ $book->page_count }}</th>
                            <td>{{ $book->authors->implode('name',', ')}}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a class="edit me-3" href="{{ route('book.edit',$book->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M180 876h44l443-443-44-44-443 443v44Zm614-486L666 262l42-42q17-17 42-17t42 17l44 44q17 17 17 42t-17 42l-42 42Zm-42 42L248 936H120V808l504-504 128 128Zm-107-21-22-22 44 44-22-22Z"/></svg>
                                    </a>
                                    <form name="destroy" method="POST" action="{{route('book.destroy',$book->id)}}">
                                        @csrf
                                        @method('delete')
                                        <a class="destroy" style="cursor:pointer" onclick="this.closest('form').submit();return false;">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M261 936q-24.75 0-42.375-17.625T201 876V306h-41v-60h188v-30h264v30h188v60h-41v570q0 24-18 42t-42 18H261Zm438-630H261v570h438V306ZM367 790h60V391h-60v399Zm166 0h60V391h-60v399ZM261 306v570-570Z"/></svg>
                                        </a>
                                    </form>
                                </div></td>
                          </tr>
                         --}}
                    </tbody>
                  </table>
                  Count Sessions: {{ $sessions->count()}}

        </div>
    </div>
</x-app-layout>
