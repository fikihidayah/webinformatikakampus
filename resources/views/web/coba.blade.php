{{-- @dd($data) --}}

@foreach ($data as $d)
  {{ $d->name }} <br>
@endforeach

{!! $data->links() !!}
