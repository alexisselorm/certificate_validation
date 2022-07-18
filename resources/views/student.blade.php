<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <style>
        .parent {

            width: 400px;
            position: relative;
            font-size: 25px;
            margin-left: 70px;

        }

        .max-lines {
            display: inline-block;
            /* or inline-block */
            word-wrap: break-word;
            max-height: 3.6em;
            line-height: 1.8em;
        }
    </style>
    <div class="parent">
        <pre>
<strong style="font-family:serif; letter-spacing:6px">UNIVERSITY OF CAPE COAST</strong>
<strong style="font-family:'Montserrat', sans-serif;letter-spacing:0.5px"><em>DIRECTORATE OF ACADEMIC AFFAIRS</em></strong>
        </pre>
    </div>
    <table style="font-family: 'Times New Roman'; font-size:12px">
        <tr>
            <td>

                <pre>
Fax: 233-3321-32484
Email: academic.affairs@ucc.edu.gh
       verification.daa@ucc.edu.gh
       admission@ucc.edu.gh
       www.ucc.edu.gh
            </pre>
            </td>
            <td>
                <img src="{{ public_path('images/ucclogo.png') }}" width="120px" height="170px" alt="">

            </td>
            <td>
                <pre>
Telephone:
Direct:         233-3321-35987
Main Exchange:  233-3321-32480-3
Telex:          2552.UCC.GH
Telegram & Cables  University, Cape Coast

<strong>UNIVERSITY POST OFFICE
          CAPE COAST, GHANA
</strong>
                </pre>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?php
            $datetime = Carbon\Carbon::now()->toDateTimeString();
            $cur_date2 = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->format('d F Y');
            echo "$cur_date2<br />";

            ?></td>
        </tr>
        <tr>
            <td>
                <pre>
{{ $address['name'] }}
{{ $address['box'] }}
{{ $address['location'] }}

</pre>
            </td>
            <td></td>
            <td></td>

        </tr>
        <tr>
            <td colspan="2">
                <pre>
                    <p style="font-family:serif; letter-spacing:3px">
    <strong>
RE: AUTHENTICATION OF CERTIFICATE
{{-- {{ $student->fname }} {{ $student->mname }} {{ $student->lname }} --}}
{{ strtoupper($student->fname . ' ' . $student->mname . ' ' . $student->lname) }}
    </strong>
</p>
                </pre>

            </td>
        </tr>
        <tr>
            {{-- Abandon all hope, ye who read these lines
            The clean code ends here --}}
            <td colspan="3">
                <pre>
<p style="font-family: sans-serif;letter-spacing:0.5px">
We refer to your letter on the above subject matter and write to confirm that {{ $student->fname }} {{ $student->mname }} {{ $student->lname }}
({{ $student->regno }}) is a past student of the University of Cape Coast. He was admitted in {{ substr($student->doa, -4) }}
to pursue a {{ $student->program->program_type->comment }} in {{ $student->program->long_name }}.

<span><strong>{{ strtoupper($student->lname) }}</strong> wrote and passed the final examinations in {{ substr($student->doc, -4) }} and was accordingly admitted to the
degree of {{ $student->program->program_type->comment }} {{ $student->program->long_name }} @if ($student->program->program_type->comment === 'BACHELOR')
<span>with @if ($student->cgpa >= 3.6)
<span>First Class Honours</span>
@elseif ($student->cgpa >= 3.0)
<span>Second Class, Upper Divison</span>
@elseif ($student->cgpa >= 2.5)
<span>Second Class, Lower Division</span>
@elseif ($student->cgpa >= 2.0)
<span>Third Class</span>@else<span> a Pass</span>
@endif
</span>
@else<span>----INSERT date of completion here ----</span>
@endif
</span>

We therefore confirm the certificate presented by (him/her) to be authentic.

Thank you.

Gideon Enoch Abbeyquaye, Esq.
<strong style="font-family:'Montserrat', sans-serif;letter-spacing:0.5px"><em>AG. DIRECTOR,ACADEMIC AFFAIRS</em></strong>

</p>
            </pre>
            </td>
        </tr>
    </table>

</body>

</html>
