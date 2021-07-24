<table id="dailyReportsTable"
       class="table table-striped table-bordered dt-responsive nowrap"
       style="width: 100%">
    <thead>
    <tr>
        <th>Date</th>
        <th>Subscribed</th>
        <th>Unsubscribed</th>
        <th>Registered</th>
    </tr>
    </thead>
    <tbody>
    @if (isset($reportData) && count($reportData) > 0)
        @foreach($reportData as $data)
            <tr>
                <td>{{$data->report_date}}</td>
                <td>{{$data->sub_count}}</td>
                <td>{{$data->unsub_count}}</td>
                <td>{{$data->reg_count}}</td>
            </tr>
    @endforeach
    @endif
    <tfoot>
    <tr>
        <th>Total</th>
        <th>{{isset($footerData[0]) ? $footerData[0]->total_sub : 0}}</th>
        <th>{{isset($footerData[0]) ? $footerData[0]->total_unsub : 0}}</th>
        <th>{{isset($footerData[0]) ? $footerData[0]->total_reg : 0}}</th>
    </tr>
    </tfoot>
    </tbody>
</table>