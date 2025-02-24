<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    {{-- <link rel="stylesheet" href="{{ asset('css/pdf-table.css') }}"> --}}

    <style>
        .styled-table {
            margin-top: 2rem;
            border-collapse: collapse;
            width: 100%;
        }

        .styled-table th,
        .styled-table td {
             border: 1px solid black; 
            padding: 8px;
            /* text-align: left; */
        }

        .styled-table th {
            /* background-color: #f2f2f2; */
            background-color: yellow
        }
        .parent-div {
            width: 100%;
        }
        .parent-div.pdf-title {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 4rem; 
        }

        .title-box {
            width: auto;
            text-align: center;
            font-size: .7rem;
            border: 1px solid #727171;
            margin: 1rem 0;
        }
        .total,.mean {
            width: 4.5rem;
        }
        .parent-div .questions {
            width: auto;
            padding: 10px;
            text-align: center;
            border: 1px solid #727171;
        }
        .styled-table .text-color {
            background-color: red;
        }

    </style>
</head>
<body>
    <div align="center" style="margin-top: -20px !important;">
        <img src="{{ public_path('style/img/resultheader.png') }}" width="100%" height="90px">
    </div>

    <div class="parent-div">
        <div class="pdf-title">
            <div class="title-box">
                <h1>Title: {{$pdfreportformtitleID->title}}</h1>
            </div>
        </div>
        @php
            $userCount = isset($reportformtitle) ? $reportformtitle->count() : 0;

            if (isset($pdfreportformtitlequestion)) {
                $firstRates = json_decode($pdfreportformtitlequestion->question, true);
                $answer = json_decode($pdfreportformtitlequestion->question_rate, true);
                $flattenedArray = is_array($answer) ? $answer : []; // Just use it as an array
            } else {
                $firstRates = null;
                $flattenedArray = [];
            }
        @endphp

        <div class="questions">
            @foreach($getQuestion as $quesCount => $questions)
                <b>({{ $quesCount + 1 }})</b>
                {{ $questions->question }}
            @endforeach
        </div>

        <table class="styled-table">
            <thead>
                <tr>
                    @if(isset($pdfreportformtitlequestion))
                        @php
                            $firstRates = json_decode($pdfreportformtitlequestion->question_rate, true);
                        @endphp
                        @if(is_array($firstRates))
                            <td></td>
                            @foreach(array_keys($firstRates) as $index) {{-- Get question IDs from keys --}}
                                <th style="text-align: center;">{{ $index }}</th>
                            @endforeach
                            <th class="total text-color">TOTAL</th>
                            <th class="mean text-color">MEAN</th>
                        @endif
                    @endif
                </tr>
            </thead>
            <tbody>
                @php $row = 1; @endphp
                @foreach ($getRate as $rate)
                    <tr>
                        <td style="text-align: center;">{{ $row }}</td>
                        @php
                            $answer = json_decode($rate->question_rate, true);
                            if (!is_array($answer)) $answer = []; // Ensure it's an array

                            $total = array_sum($answer); 
                            $mean = count($answer) ? $total / count($answer) : 0; 
                        @endphp
                        @foreach ($answer as $value)
                            <td style="text-align: center;">{!! htmlspecialchars($value, ENT_QUOTES, 'UTF-8') !!}</td>
                        @endforeach
                        <td class="total" style="text-align: center;">{{ $total }}</td>
                        <td class="mean" style="text-align: center;">{{ number_format($mean, 1) }}</td> 
                    </tr>
                    @php $row++; @endphp
                @endforeach
            </tbody>
        </table>           
    </div>
</body>
</html>