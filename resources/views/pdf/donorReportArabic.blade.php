<!doctype html>
<html lang="ar">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <title>التقرير الأسبوعي</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        .bottom {
            position: absolute;
            bottom: 0;
            left: 30%;
        }

        .topright {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 18px;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        /* Add custom CSS for the Arabic layout */
        body {
            direction: rtl; /* Set text direction to right-to-left for Arabic */
        }

        /* Add custom CSS to place the logo in the top left corner */
        .topleft {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 18px;
        }

    </style>

</head>
<body>
<!--/><img class='topleft' alt="شعار" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/media/wathikLogo.png')))}}" width="100" height="100"/>
</!-->
<h1>{{ $project->name }}</h1>
<h5>{{ $organization->name }}</h5>
<h5>من {{$start_date}} إلى {{$end_date}}</h5>

<p>هذا الأسبوع، قام المشروع <strong>{{ $project->name }}</strong> بإجراء مجموعة من الفعاليات الإجتماعية بإجمالي <strong>{{ count($events) }} فعاليات</strong>. خلال هذا الأسبوع، تم التواصل مع المستفيدين <strong>{{ $beneficiaries_sum }} مرة</strong>. بدأ المشروع في <strong>{{ $project->date }}</strong> ويخدم إجمالي <strong>{{ $project->beneficiaries }} مستفيد</strong>.</p>

<table>
    <tr>
        <th>الاسم</th>
        <th>التاريخ</th>
        <th>الوقت</th>
        <th>عدد المستفيدين</th>
    </tr>

    @foreach ($events as $event)
        <tr>
            <th>{{ $event->name }}</th>
            <th>{{ $event->date }}</th>
            <th>{{ $event->time }}</th>
            <th>{{ $event->beneficiaries }}</th>
        </tr>
    @endforeach

</table>

<br>
<br>


@foreach ($pictures as $image)
    <img alt="Image" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('storage/' . $image)))}}" height='200'/>
    <br>
@endforeach

<br>
<p class='bottom'>-------------------------------------مدعوم بواسطة واثق ©٢٠٢٣ - منتج أنا أتعلم------------------------------------ </p>
</body>
</html>
