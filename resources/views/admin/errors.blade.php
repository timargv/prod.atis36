@if($errors->any())
    <div class="alert alert-danger" style="margin: 15px 0px 0;" role="alert">
        <ul style="padding: 0 0 0 15px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
