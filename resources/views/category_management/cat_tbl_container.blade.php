<table id="catTable" class="table table-striped table-bordered dt-responsive nowrap"
       style="width:100%">
    <thead>
    <tr>
        <th>#</th>
        <th>Category</th>
        <th>Status</th>
        <th>Applications</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if (isset($categories) && count($categories) > 0)
        @foreach($categories as $key => $category)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->status}}</td>
                <td>
                    <ul>
                        @if ($category->apps)
                            @foreach($category->apps as $app)
                                <li>{{ $app->name }}</li>
                            @endforeach
                        @endif
                    </ul>
                </td>
                <td class="text-center">
                    <a href="{{ url('category_management/'.$category->id) }}" class="btn btn-primary btn-info-full">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{ url('category_management/delete/'.$category->id) }}" class="btn btn-primary btn-info-full">
                        <i class="fa fa-trash" style="color: red"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
