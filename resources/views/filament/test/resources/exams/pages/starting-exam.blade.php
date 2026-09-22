<x-filament-panels::page>
    <ol>
    @foreach ( $collections  as $pelajaran)
            <li type="A" style='font-weight"700'>{{ $pelajaran ['name'] }}
            </li>
            <ol>
    @foreach ( $pelajaran['soals']  as $pertanyaan)
            <li type="1">{!! $pertanyaan ['payload'] !!}
                <br>
                <ol>
                @foreach ( $pertanyaan['answers']  as $jawaban)
                        <li>
                            <label>
                                <x-filament::input,radio name="jawaban_{{ $pertanyaan['id'] }}" />
                                <span>
                                    {{$jawaban('text')}}
                                </span>
                        </li>
                @endforeach
                </ol>
            </ol>
            </li>
    @endforeach
    </ol>
    @endforeach
    </ol>
</x-filament-panels::page>
