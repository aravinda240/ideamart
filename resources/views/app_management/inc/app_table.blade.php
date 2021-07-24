<table id="appsTable" class="table table-striped table-bordered dt-responsive nowrap"
       style="width:100%">
    <thead>
    <tr>
        <th>App Name</th>
        <th>Platforms</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if (count($apps) > 0)
        @foreach($apps as $app)
            <tr>
                <td>{{ $app->name }}</td>
                <td>
                    @if (count($app->platforms))
                        <ul>
                        @foreach ($app->platforms as $platform)
                            <li>{{ $platform->name }}</li>
                        @endforeach
                        </ul>
                    @endif
                </td>
                <td>
                    <a href="{{url('app_management/edit/' . $app->id)}}"
                       data-id="{{$app->id}}" type="button"
                       class="btn btn-primary btn-info-full edit-app">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ url('app_management/delete/'.$app->id) }}" class="btn btn-primary btn-info-full">
                        <i class="fa fa-trash" style="color: red"></i>
                    </a>
                </td>
            </tr>

    @endforeach
    @endif
    <tfoot>
    <tr>
        <th>App Name</th>
        <th>Platforms</th>
        <th>Action</th>
    </tr>
    </tfoot>
    </tbody>
</table>
