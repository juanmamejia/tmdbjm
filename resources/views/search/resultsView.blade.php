@extends('app', ['searchedString' => $term], ['title' => 'TMDB - Search results for "'.$term.'"'])

@section('content')


@if (count($search['results'])>0)
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center;">You searched for "{{$term}}" - {{$search['total_results']}} results</div>

                <div class="panel-body">
                        <div id="loader"></div>
                        <div id="scroll-container" class="row" >
                        <table class="table table-condensed" >
                            <tbody>
                                @for ($i=0;$i<count($search['results']);$i++)
                                    <tr>
                                        @if ($search['results'][$i]['media_type']=='movie')
                                            @if (!empty($search['results'][$i]['poster_path']))
                                                <td style="width:190px;"><a href="{{ url("movie/".$search['results'][$i]['id']) }}"><img width="180" height="180" src="https://image.tmdb.org/t/p/w180_and_h180_bestv2{{$search['results'][$i]['poster_path']}}"  ></a></td>
                                            @else
                                                <td style="width:190;"><a href="{{ url("movie/".$search['results'][$i]['id']) }}"><img width="180" height="180" src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" ></a></td>
                                            @endif

                                                <td style="vertical-align:middle;"><a href="{{ url("movie/".$search['results'][$i]['id']) }}" style="font-size:24px;">{{$search['results'][$i]['title']}}</a><br><span style="font-size:18px;"> {{substr($search['results'][$i]['release_date'], 0, 4)}}</span><br>(Movie)</td>


                                        @elseif ($search['results'][$i]['media_type']=='tv')
                                            @if (!empty($search['results'][$i]['poster_path']))
                                                <td style="width:190;"><a href="{{ url("tv/".$search['results'][$i]['id']) }}"><img width="180" height="180" src="https://image.tmdb.org/t/p/w180_and_h180_bestv2{{$search['results'][$i]['poster_path']}}" ></a></td>
                                            @else
                                                <td style="width:190;"><a href="{{ url("tv/".$search['results'][$i]['id']) }}"><img width="180" height="180" src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" ></a></td>
                                            @endif

                                                <td style="vertical-align:middle;"><a href="{{ url("tv/".$search['results'][$i]['id']) }}" style="font-size:24px;">{{$search['results'][$i]['name']}}</a><br><span style="font-size:18px;"> {{substr($search['results'][$i]['first_air_date'], 0, 4)}}</span><br>(TV Show)</td>


                                        @else 
                                            @if (!empty($search['results'][$i]['profile_path']))
                                                <td style="width:190;"><a href="{{ url("person/".$search['results'][$i]['id']) }}"><img width="180" height="180" src="https://image.tmdb.org/t/p/w180_and_h180_bestv2{{$search['results'][$i]['profile_path']}}" ></a></td>
                                            @else
                                                <td style="width:190;"><a href="{{ url("person/".$search['results'][$i]['id']) }}"><img width="180" height="180" src="https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png" ></a></td>
                                            @endif

                                                <td style="vertical-align:middle;"><a href="{{ url("person/".$search['results'][$i]['id']) }}" style="font-size:24px;">{{$search['results'][$i]['name']}}</a>
                                                <br>(Person)<br>
                                                @if (count($search['results'][$i]['known_for'])>0)
                                                    @for ($k=0;$k<count($search['results'][$i]['known_for']);$k++)
                                                        @if ($search['results'][$i]['known_for'][$k]['media_type']=='movie')
                                                            {{$search['results'][$i]['known_for'][$k]['title']}}
                                                        @else
                                                            {{$search['results'][$i]['known_for'][$k]['name']}}
                                                        @endif
                                                        @if($k<(count($search['results'][$i]['known_for'])-1))
                                                            ,&nbsp;
                                                        @endif
                                                    @endfor
                                                @endif
                                                </td>
                                               
                                        @endif
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                        </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@else
    <!-- Show not found -->
@endif


<div><p>&nbsp;</p></div>

<div id="pages">
    @if ($search['total_pages']>1)
        @for ($i=1;$i<($search['total_pages']+1);$i++)
                 <a href="{{ url("search-ajax/".$term."&#47;".$i) }}"></a>
        @endfor
    @endif
</div>

{!! HTML::style ('css/infinite.css') !!}

<script src="{{ URL::asset('js/infinite_script.js') }}"></script>

<script>
$(document).ready(function(){
    $("#buttonMore").click(function(){
        $("#actingFull").toggle();

        if ($(this).val() == "See More") 
        {
            $(this).val("See Less");
        }
        else 
        {
            $(this).val("See More");
        }
    });
});
</script>

@endsection
