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
        <div>
            <select class="form-select-sm form-select-sm mt-3" id="data_select" aria-label=".form-select-sm example">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select> 
        </div>
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
        <div class="d-flex bd-highlight mb-3 mt-3">
            <div class="me-auto p-2 bd-highlight"><span id="display_entry"> </span></div>
            <div class="p-2 bd-highlight">
                <ul class="pagination">
                    <li class="page-item"><button class="btn page-link" id="Previous" onClick="previewPage('Previous')">Previous</button></li>
                    <ul class="pagination" id="button"></ul>
                    <li class="page-item"><button class="btn page-link" id="next" onClick="nextPage('next')">next
                    </button></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>

        let emp_list=document.getElementById('employee_table');
        let button= document.getElementById("button");
        let data_select=document.getElementById('data_select');
        let display_entry=document.getElementById('display_entry');
        let all_data='';
        let page_button='';
        let page=1;
        let page_size=1;
        let datalist;
        let $start_point=1
        let $end_point=1

        window.onload=function(){
            displayEntry();
            recall();
        }

        function recall()
        {
            axios.post('/emp_data',{
                'page_number' : page,
                'page_select' : page_size,            
            })
            .then(function (response) {  
                let emp_data = response.data.users;
                page_button = response.data.page_count;
                datalist =response.data.emp_list;
                $start_point =response.data.start;
                $end_point=response.data.end;
                all_data =emp_data;
                reload();   
            })
        }

        function reload()
        {
            emp_list.innerHTML="";
            all_data.forEach(employee => {
                emp_list.innerHTML += 
                `<tr>
                    <td>${employee.name}</td>
                    <td>${employee.designation}</td>
                    <td>${employee.city}</td>
                </tr>`   
            }); 
            paginationButton();  
        } 

        document.getElementById("data_select").addEventListener('change', (event) => {
            page_size =event.target.value;
            page=1;
            recall();  
        });

        function paginationButton() {
            button.innerHTML="";
            for(let i=1; i<page_button +1 ; i++)
            {
            button.innerHTML +=`<li class="page-item ${(i == page)? 'active' : ''}"><button class="btn page-link" 
                onClick="changePage(${i})">${i}</button></li>`
            }         
        }

        function changePage(page_number) {
            page=page_number; 
            recall(); 
        }

        function displayEntry() {
            console.log('saygya')
            display_entry.innerHTML=`Showing ${$start_point} to ${$end_point} of ${datalist.length}`
        }  
        
        function previewPage() {
            emp_list.innerHTML="";
            page--;
            reload();      
        }

        function nextPage()
        {
            emp_list.innerHTML="";
            page++;
            reload();
        } 
    </script>
</body>
</html>