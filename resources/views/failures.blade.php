
@if ($failures)
   <div class="alert alert-danger" role="alert">
      <strong>Errors:</strong>
      
      <ul>
         @foreach ($failures as $failure)
                <li><?php print_r($failure); ?></li>
         @endforeach
      </ul>
   </div>
@endif