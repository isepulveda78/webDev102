@extends('layouts.app')

@section('content')
            <section>
                <div class="row">
                @foreach($series as $s)
                    <div class="col-md-4">
                        <b-card-group deck>
                        <b-card img-src="{{$s->image? asset('storage/'.$s->image) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSPOs4jT_cgp2si_Jeaz7glQ-l5zJ9PpjQSj4WjG3vMW-1jtCe3'}}" img-alt="Image" img-top>
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