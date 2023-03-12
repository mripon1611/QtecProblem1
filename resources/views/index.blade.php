<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Engine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" class="form-label">All Keywords:</label>
                    <select class="form-control" name="key_words" id="idKeyWords">
                        <option value="">--Please Select--</option>
                        @foreach ($searchValues as $value)
                        <option value="{{ $value->key_words }}">{{ $value->key_words }} ({{ $value->total_count }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" class="form-label">All Users:</label>
                    <select class="form-control" name="user_id" id="idUsers">
                        <option value="">--Please Select--</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" class="form-label">Time Range:</label>
                    <select class="form-control" name="search_date" id="idTimeRange">
                        <option value="">--Please Select--</option>
                        <option value="1">From Yesterday</option>
                        <option value="6">From Last Week</option>
                        <option value="29">From Last Month</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label for="" class="form-label">Start Date:</label>
                    <input type="date" class="form-control" id="dateFrom">
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label for="" class="form-label">End Date:</label>
                    <input type="date" class="form-control" id="dateTo">
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <button class="btn btn-success btn-bordered" style="width: 100%; margin-top:28px !important" onclick="mySearch()">Search</button>
                </div>
            </div>
        </div>

        <div class="row mt-5" id="hideSection">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-hover text-center" id="datatable">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Key Words</th>
                            <th>User Name</th>
                            <th>Search Date</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        function mySearch(){
            let keyWords = document.getElementById("idKeyWords");
            let users = document.getElementById("idUsers");
            let timeRange = document.getElementById("idTimeRange");
            let dateFrom = document.getElementById("dateFrom");
            let dateTo = document.getElementById("dateTo");
            let tableBody = document.getElementById("tableBody");

            while (tableBody.hasChildNodes()) {
                tableBody.removeChild(tableBody.firstChild);
            }

            $.ajax({
                url: "{{ route('search-history.store') }}",
                method: "POST",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'key_words': keyWords.value,
                    'user_id': users.value,
                    'from_date': dateFrom.value,
                    'to_date': dateTo.value,
                    'time_range': timeRange.value,
                },
                success: function(data) {
                    if(data['status'] == 200){
                        data['data'].forEach((item, index)=>{
                            let append = `<tr> <td>${index + 1}</td>`;
                            append += `<td>${item.key_words}</td>`;
                            append += `<td>${item.user_name}</td>`;
                            append += `<td>${item.created_at}</td></tr>`;

                            $("#tableBody").append(append);

                        })
                    }else{
                        let append = `<tr><td colspan="4">No Data Found!</td></tr>`;
                        $("#tableBody").append(append);

                    }
                } //,
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>