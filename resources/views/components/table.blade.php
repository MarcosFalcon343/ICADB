<table id="table" class="table table-hover table-bordered table-responsive">
    <thead class="thead-dark">
        <tr>
            @foreach ($headers as $header)
            <th scope="col">{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
        <tr>
            @foreach ($row as $cell)
            <td>{{ $cell }}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>