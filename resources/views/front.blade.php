@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="col-md-12">
               <section>
                <b-jumbotron header="BootstrapVue" lead="Bootstrap v4 Components for Vue.js 2">
                    <p>For more information visit website</p>
                    <b-button variant="primary" href="{{ route('series.index') }}">Browse Courses</b-button>
                </b-jumbotron>
                </section>
            </div>

            <section>
            <div class="col-md-12">
                <b-card-group deck>
                @foreach($featured as $series)
                    <b-card title="{{ $series->title }}" img-src="https://picsum.photos/300/300/?image=41" img-alt="Image" img-top>
                    <b-card-text>
                       {{ \Str::words($series->description, 10) }}
                    </b-card-text>
                    <template v-slot:footer>
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </template>
                    </b-card>
                @endforeach
                </b-card-group>
            </div>
            </section>
      
        <section>
        <pricing></pricing>
        </section>
    </div>
</div>
@endsection
