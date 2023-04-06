<table id="category-list" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Quote</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($category as $key => $categorylist)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $categorylist->name }}</td>
                <td>{{ $categorylist->description }}</td>
                <td>{{ $categorylist->quote }}</td>
                <td>
                    @if ($categorylist->image)
                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/uploads/categories') . '/' . $categorylist->image }}"
                            alt='' class="rixerimages"/>
                    @endif
                </td>
                <td>
                    <a class="status category_status" data-id="{{ $categorylist->id }}" style="cursor: pointer;"
                        id="category_status">
                        <span
                            class="badge  font-size-12 p-2 cursor-pointer  {{ $categorylist->status == 1 ? 'badge-soft-success' : 'badge-soft-danger' }}">{{ $categorylist->status == 1 ? 'Active' : 'Deactive' }}
                        </span>
                    </a>
                </td>
                <td><a class="edit btn btn-success btn-sm" data-toggle="modal" data-target="#edit_category"
                        data-id="{{ $categorylist->id }}"><i class="bx bx-edit-alt text-white"></i></a>
                    <a class=" delete btn btn-danger btn-sm" data-id="{{ $categorylist->id }}"><i class="bx bx-trash-alt text-white"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
