<table id="contentTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
    <thead>
    <tr>
        <th>#</th>
        <th>Category</th>
        <th>Content</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if (count($contents) > 0)
        @foreach($contents as $key => $content)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{ $content->content }}</td>
                <td>
                    @if ($content->categories)
                        <ul>
                            @foreach($content->categories as $category)
                                <li>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ url('content_management/'.$content->id) }}" class="btn btn-primary btn-info-full edit-cat">
                        <i class="fa fa-edit edit-cat"></i>
                    </a>
                    <a href="{{ url('content_management/delete/'.$content->id) }}" class="btn btn-primary btn-info-full">
                        <i class="fa fa-trash" style="color: red"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
