<td>
    @if($seance->status)
        @if($seance->user_request_id)
            <button class="btn btn-block btn-light-warning btn-sm text-uppercase font-weight-bolder">
                بإنتظار الموافقة
            </button>
            @elseif($seance->user_id)
            <button class="btn btn-block btn-light-info btn-sm text-uppercase font-weight-bolder">
                @if(Auth::user()->id == $seance->user_id)
                    محجوز من طرفك
                    @else
                    محجوز
                @endif
            </button>
            @else
            <form action="{{ route('hajz.hodor.request',['id' => $seance->id]) }}" method="post">
                @csrf
                <button class="btn btn-block btn-light-primary btn-sm text-uppercase font-weight-bolder">حجز</button>
            </form>
        @endif
    @else
        <button class="btn btn-block btn-light-danger btn-sm text-uppercase font-weight-bolder">غير متاح</button>
    @endif
</td>
