<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>To do list</title>
</head>
<body>
    <div class="container mt-5 p-2" style="margin-top: 100px;">
        <h4 class="text-center mt-3">Student Record</h4>
        <div class="mt-3">
            <ul class="list-group" id="user_data">
            </ul>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
       
       let user_list=document.getElementById('user_data');
       let alldata='';

        axios.get('/student')
        .then(function (response) {
        let  user_data = response.data.users;
             alldata=user_data;
             reload();
        })

        function reload()
        {
            user_list.innerHTML='';
            alldata.forEach(function(user) {   
                user_list.innerHTML += 
                `<li class="list-group-item d-flex justify-content-between align-items-center"  style="background-color : ${(user.is_complate == true ) ? 'lightgrey' : 'white'}">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="check_${user.id}"  
                                onclick="updateStatus(${user.id})"
                                ${(user.is_complate == true) ? 'checked' : ''}>
                                <span class="${(user.is_complate == true ) ? 'text-decoration-line-through' : ''} ">
                                ${user.name} </span>
                            </label>
                        </div>
                        <button class="btn btn-danger btn-sm" onclick="remove(${user.id})">x</button>
                 </li>`
            });  
        }

        function updateStatus(id) {

            let checkBox= document.getElementById(`check_${id}`);

            if (checkBox.checked == true) {
                axios.get(`/updateStatus/${id}/1`) 
                .then(function (response) {
                user_data = response.data.users;
                alldata=user_data;
                reload();
             });
            } 
            else{
                axios.get(`/updateStatus/${id}/0`)
                .then(function (response) {
                user_data = response.data.users;
                alldata=user_data;
                reload();
             });
            }
        }
        
        function remove(id)
        {
            axios.get(`/deleteStatus/${id}`)
            .then(function (response) {
                user_data = response.data.users;
                alldata=user_data;
                reload();
            });
        }

    </script>
</body>
</html>