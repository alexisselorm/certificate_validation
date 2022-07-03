@component('mail::message')
    # Introduction

    
    Insert student details here

    @component('mail::button', ['url' => ''])
        DOWNLOAD PDF
    @endcomponent
    e
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
