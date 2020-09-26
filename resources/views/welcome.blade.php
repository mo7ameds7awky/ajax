<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
<ul id="errors"></ul>
<form>
    <label for="title">Title</label>
    <input type="text" name="title" id="title">

    <br>
    <br>

    <label for="body">Body</label>
    <textarea name="body" id="body" cols="30" rows="10"></textarea>

    <br>
    <br>

    <button type="submit" id="save">Save</button>
</form>
<button id="retrieve">Save</button>
<br>
<br>
<table>
    <thead>
    <tr>title</tr>
    </thead>
    <tbody id="tableBody">
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

    $('#save').on('click', function (event) {
        event.preventDefault();
        let data = {
            title: $('#title').val(),
            body: $('#body').val(),
            _token: '{{ csrf_token() }}'
        }
        $.ajax({
            method: 'post',
            url: '{{ route('post.store') }}',
            data: data,
            success(response){
                console.log(response.msg);
            },
            error(response){
                let errors = response.responseJSON.errors;
                for (const [key, value] of Object.entries(errors)) {
                    let errorLi = `<li>${value[0]}</li>`;
                    $('#errors').append(errorLi);
                }
            }
        })
    })

    $('#retrieve').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            method: 'get',
            url: '{{ route('post.get') }}',
            data: {},
            success(response){
                let body = $('#tableBody');
                response.forEach(function (post) {
                    let obj = `<tr><td>${post.title}</td></tr>`;
                    body.append(obj);
                    console.log(post.title);
                })
            },
            error(response){
                let errors = response.responseJSON.errors;
                for (const [key, value] of Object.entries(errors)) {
                    let errorLi = `<li>${value[0]}</li>`;
                    $('#errors').append(errorLi);
                }
            }
        })
    })
</script>
</body>
</html>
