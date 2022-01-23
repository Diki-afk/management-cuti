<a href="{{ route('leaves.edit', $leave->id) }}" class="btn btn-info btn-sm mt-2">
  <i class="mdi mdi-pencil-box-outline me-0" style="font-size:20px;"></i>
</a>
<form method="POST" class="d-inline" action="{{route('leaves.destroy', [$leave->id])}}"
    onsubmit="return confirm('Hapus Data karyawan?')">
  @method("DELETE")
  @csrf
 
  <input type="hidden" value="{{$leave->id}}" />
  <button class="btn btn-danger btn-sm mt-2">
    <i class="mdi mdi-delete me-0" style="font-size:20px;"></i>
  </button>
</form>