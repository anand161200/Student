<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Pagination</title>
</head>
<body>
    <div class="container mt-5 p-2" style="margin-top: 100px;">
        <h4 class="text-center mt-3">Employee</h4>
        <table class="table text-center table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">City</th>
                </tr>
            </thead>
            <tbody id="employee_table">
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
         let emp_list=document.getElementById('employee_table');

         axios.get('/emp_data')
        .then(function (response) {
            let  emp_data = response.data.users;
             
                emp_data.forEach(employee => {
                    emp_list.innerHTML += 
                    `<tr>
                        <td>${employee.name}</td>
                        <td>${employee.designation}</td>
                        <td>${employee.city}</td>
                     </tr>`   
                });
            })
    </script>
</body>
</html>