<x-back.app-layout>
    <form action="{{route('admin.visit.store-new-visitation')}}" method="post" enctype="multipart/form-data"
          class="multisteps-form__form mb-8" style="height: 408px;">

        @csrf
        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
            <h5 class="font-weight-bolder mb-0 mb-4">Create new visitation</h5>
            @if(session()->has('missing') or session()->has('fail'))
                <div class="alert alert-danger">
                    {{session()->get('missing') or session()->get('fail')}}
                </div>
            @endif
            @if(session()->has('success') or session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-control-label">Employee Name
                            @if($appointment)
                                (look for name {{$appointment['name_emp']}})
                                                <input class="form-control" type="hidden" name="id_ap" value="{{$appointment['id']}}">
                            @endif
                        </label>
                        <select id='sel_name' name="emp_id" class="form-control">
                            <option value="">--select name--</option>
                        </select>
                        @error('emp_id')
                        <span class="text-danger fa-sm">
                               {{$message}}
                           </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname" class="form-control-label">Visit date</label>
                        <input class="form-control" name="visit_date" type="text"
                               value="{{$appointment['visit_date'] ?? ''}}"
                               placeholder="visit date ..."
                               id="lastname">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <button class="btn btn-github" type="submit">submit</button>
                </div>
            </div>
        </div>
    </form>
    @push('scripts')
        <script>
            $('#sel_name').on('focus', (e) => {
                if (e.target.data === undefined || e.target.data === "") {
                    $('#sel_name').select2({
                        // allowClear: true,
                        ajax: {
                            url: "{{route('admin.user.get-all-employees')}}",
                            method: 'get',
                            dataType: 'json',
                            delay: 250,
                            processResults: function (response) {
                                return {
                                    results: $.map(response, function (emp) {
                                        return {
                                            id: emp.id,
                                            text: emp.name
                                        }
                                    })
                                };
                            },
                            cache: true
                        }
                    })
                }
            })
        </script>
    @endpush
</x-back.app-layout>