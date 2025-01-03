<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="program-tab" data-bs-toggle="tab" data-bs-target="#program-tab-pane" type="button" role="tab" aria-controls="program-tab-pane" aria-selected="true">Program</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link " id="timetable-tab" data-bs-toggle="tab" data-bs-target="#timetable-tab-pane" type="button" role="tab" aria-controls="timetable-tab-pane" aria-selected="false">Terminy</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="information-tab" data-bs-toggle="tab" data-bs-target="#information-tab-pane" type="button" role="tab" aria-controls="information-tab-pane" aria-selected="false">Informacje</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="registration-tab" data-bs-toggle="tab" data-bs-target="#registration-tab-pane" type="button" role="tab" aria-controls="registration-tab-pane" aria-selected="false">Zgłoszenie</button>
    </li>
</ul>

@if(!empty($flags))
    <div class="d-flex align-items-center">
        <div class="text-start mt-4 mb-3 ms-5 me-auto">
            @foreach ($flags as $flag)
                <img src="{{ asset('img/flags/' . $flag) }}" alt="Flag of {{ ucfirst(basename($flag, '-xs.gif')) }}" class="me-2">
            @endforeach
        </div>
        <h2 class="mb-0 me-5">{{ $title }}</h2>
    </div>
@endif