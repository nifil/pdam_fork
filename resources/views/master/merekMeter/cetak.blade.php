<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('assets/plugins/font/dot-matrix.css') }}" rel="stylesheet">
    <style type="text/css">
        p  {
            font-family: 'Dot Matrix', sans-serif;
        }

        table{
            font-family: 'Dot Matrix', sans-serif;
        }

        table thead tr {
            border-bottom: 3px dotted rgb(102, 102, 102);
            border-top: 3px dotted rgb(102, 102, 102);
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merk Meter</title>
</head>
<body>
    <div class="card-body priview">
        <p> Pemerintah Kota <br>
            Surabaya <br>
            PERUSAHAAN DAERAH AIR <br>
        </p>
        <div class="mx-auto mb-3" style="width: 250px;">
            <p>Table Master Merk Meter</p> <br>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th width="30%">Kode</th>
                    <th width="30%">Merk Meter</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($filter as $merekMeter)
                <tr>
                    <td>{{ $merekMeter->kd_merk }}</td>
                    <td>{{ $merekMeter->merk }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

@push('js')
    <script src="{{ asset('assets/jquery.printPage.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".print").printPage();
        });
    </script>
@endpush