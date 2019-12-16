@if (session('thongbao'))
    <div class="alert alert-warning">
        {{ session('thongbao') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif