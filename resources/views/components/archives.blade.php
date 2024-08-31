<div class="p-4">
    <h4 class="fst-italic">Archives</h4>
    <ol class="list-unstyled mb-0">
        @foreach($datesArray as $year => $yearValue)
            @foreach($yearValue as $month => $value)
                <li><a href="#">{{ $month . ' ' . $year }}</a></li>
            @endforeach
        @endforeach
    </ol>
</div>
