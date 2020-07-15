@extends('layouts.app')

@section('content')
            <section>
                <div class="row">
                @foreach($series as $s)
                    <div class="col-md-4">
                        <b-card-group deck>
                        <b-card title="{{ $s->title }}" img-src="{{ asset('storage/' . $s->$image) }}" img-alt="Image" img-top>
                            <b-card-text>
                            {{ \Str::words($s->description, 10) }}
                            </b-card-text>
                            <template v-slot:footer>
                                <b-button href="{{ route('series.show', $s->id) }}" variant="primary">Play</b-button>
                            </template>
                            </b-card>
                        </b-card-group>
                    </div>
                    @endforeach
                </div>
            </section>
@endsection