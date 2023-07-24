<!doctype html>
<html lang="ar">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="http://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    
    <title>التقرير الأسبوعي</title>
    <style>

    /*@font-face {
        font-family: Amiri;
        src: url('{{ public_path('fonts/Amiri/Amiri-Regular.tff') }}');
    }*/
      
      table {
        border-collapse: collapse;
        width: 100%;
      }

      .bottom {
        position:absolute;
        bottom:0;
        left:30%;
      }

      .topright {
        position: absolute;
        top: 0px;
        right: 0px;
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


      * { font-family: 'Noto Sans', sans-serif; }

    </style>

  </head>
  <body>
    <h1>{{ $project->name }}</h1>
    <h5>{{ $organization->name }}</h5>
    <h5>7/11/23-7/17/23</h5>

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

    <img class='topright' alt="شعار" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/media/wathikLogo.png')))}}" width="100" height="100"/>

    <br>
    
    @foreach ($events as $event)
      <img alt="صورة" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('storage/' . $event->photo)))}}" height='300'/>
    @endforeach

    <br>
    <p class='bottom'>مدعوم بواسطة واثق ©٢٠٢٣ - منتج ILearn</p>
  </body>
</html>
