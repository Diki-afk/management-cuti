<a title="edit" href="{{ route('employees.edit', $employee->id) }}" class="btn btn-info btn-sm mt-2">
  <i class="mdi mdi-pencil-box-outline me-0" style="font-size:20px;"></i>
</a>
<form method="POST" class="d-inline" action="{{route('employees.destroy', [$employee->id])}}"
    onsubmit="return confirm('Hapus Data Karyawan?')">
  @method("DELETE")
  @csrf
 
  <input type="hidden" value="{{$employee->id}}" />
  <button title="hapus" class="btn btn-danger btn-sm mt-2">
    <i class="mdi mdi-delete me-0" style="font-size:20px;"></i>
  </button>
</form>