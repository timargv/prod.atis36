@if($errors->any())
    <div class="alert alert-danger" style="margin: 15px 15px 0;" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif