
<table class="table table-bordered table-hover" style="width:100%">
    @foreach($failures as $failure)
        <tr>
            <td><b>{{ is_array($failure->row()) ? json_encode($failure->row()) : $failure->row() }} _ {{is_array($failure->attribute()) ? json_encode($failure->attribute()) : $failure->attribute() }} _ {{is_array($failure->errors()) ? json_encode($failure->errors()) : $failure->errors() }}</b></td>
            <td>{{ is_array($failure->values()) ? json_encode($failure->values()) : $failure->values() }}</td>
        </tr>
    @endforeach
</table>
