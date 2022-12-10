<td>

    @if($seance->status)
        @if($seance->user_request_id)
            <button class="btn btn-block mb-2 btn-success btn-sm text-uppercase font-weight-bolder">
                {{ \App\Models\User::find($seance->user_request_id)->name }}
            </button>
                <button class="btn btn-block mb-2 btn-light-warning btn-sm text-uppercase font-weight-bolder" disabled>بإنتظار الموافقة</button>
                <div class="row">
                    <div class="col-6">
                        <form action="{{ route('chachat.almodir.accept',['id' => $seance->id]) }}" method="post">
                            @csrf
                            <button class="btn btn-block mb-2 btn-light-success btn-sm text-uppercase font-weight-bolder">قبول</button>
                        </form>
                    </div>
                    <div class="col-6">
                        <form action="{{ route('chachat.almodir.deny',['id' => $seance->id]) }}" method="post">
                            @csrf
                            <button class="btn btn-block mb-2 btn-light-danger btn-sm text-uppercase font-weight-bolder">رفض</button>
                        </form>
                    </div>
                </div>
            @elseif($seance->user_id)
            <button class="btn btn-block mb-2 btn-success btn-sm text-uppercase font-weight-bolder">
                {{ $seance->user->name }}
            </button>
            <form action="{{ route('chachat.almodir.end',['id' => $seance->id]) }}" method="post">
                @csrf
                <button class="btn btn-block mb-2 btn-secondary btn-sm text-uppercase font-weight-bolder">إلغاء الحجز</button>
            </form>
            @else
            <form action="{{ route('chachat.almodir.hajz',['id' => $seance->id]) }}" method="post">
                @csrf
                <select class="form-control mb-2" name="user_id">
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">
                            {{ $u->name }}
                        </option>
                    @endforeach
                </select>
                <button class="btn btn-block mb-2 btn-light-primary btn-sm text-uppercase font-weight-bolder">حجز</button>
            </form>
            <form action="{{ route('chachat.almodir.status',['id' => $seance->id]) }}" method="post">
                @csrf
                <button class="btn btn-block btn-light-danger btn-sm text-uppercase font-weight-bolder">غير متاح</button>
            </form>
        @endif
    @else
        <button class="btn btn-block mb-2 btn-light-warning btn-sm text-uppercase font-weight-bolder" disabled>غير متاح</button>
        <form action="{{ route('chachat.almodir.status',['id' => $seance->id]) }}" method="post">
            @csrf
            <button class="btn btn-block btn-light-success btn-sm text-uppercase font-weight-bolder">متاح</button>
        </form>
    @endif
</td>
