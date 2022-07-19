<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Pagination</title>
</head>
<body>
    <div class="container mt-5 p-2" style="margin-top: 100px;">
        <h4 class="text-center mt-3">Employee</h4>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Employee</h5>
                        <button type="button" class="btn-close" onClick="closemodel()" ></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control">
                            <span class="text-danger" id="nameError"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <input type="text" id="designation" name="designation" class="form-control">
                                <span class="text-danger" id="designationError"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">City</label>
                                <input type="text" id="city" name="city" class="form-control">
                                <span class="text-danger" id="cityError"></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer btn-center">
                        <button type="submit" onClick="FromSubmit()" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Update Model --}}
        <div class="modal fade" id="update_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="update_exampleModalLabel">Update</h5>
                        <button type="button" class="btn-close" onClick="closeUpdateModel()" ></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" id="update_name" name="name" value='' class="form-control">
                            <span class="text-danger" id="update_nameError"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <input type="text" id="update_designation" name="designation" class="form-control">
                                <span class="text-danger" id="update_designationError"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">City</label>
                                <input type="text" id="update_city" name="city" class="form-control">
                                <span class="text-danger" id="update_cityError"></span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer btn-center">
                        <button type="submit" onClick="UpdateFrom()" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
          {{-- ___________________________ --}}
        <div class="d-flex bd-highlight mb-2 mt-3">
            <div class="me-auto bd-highlight">
                <div>
                    <select class="form-select-sm form-select-sm" id="data_select" aria-label=".form-select-sm example">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select> 
                </div> 
            </div>
            <div class="bd-highlight">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" onClick="openmodel()"><i class="fa fa-plus"></i></button>
            </div>
        </div>
            <table class="table text-center table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">City</th>
                        <th scope="col">Action</th>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>

        let emp_list=document.getElementById('employee_table');
        let button= document.getElementById("button");
        let data_select=document.getElementById('data_select');
        let display_entry=document.getElementById('display_entry');
        let myModal = new bootstrap.Modal(document.getElementById("myModal"), {});
        // model from input
        let name=document.getElementById('name');
        let designation=document.getElementById('designation');
        let city=document.getElementById('city');
        // ERROR
        let nameError=document.getElementById('nameError');
        let designationError=document.getElementById('designationError');
        let cityError=document.getElementById('cityError');
        // Upadte Model 
        let update_model= new bootstrap.Modal(document.getElementById("update_model"), {});
        let upadte_name=document.getElementById('update_name');
        let update_designation=document.getElementById('update_designation');
        let update_city=document.getElementById('update_city');

        let update_nameError=document.getElementById('update_nameError');
        let update_designationError=document.getElementById('update_designationError');
        let update_cityError=document.getElementById('update_cityError');
        
        // pagination variable
        let all_data='';
        let page_button='';
        let page=1;
        let page_size=5;
        let datalist;
        let start_point=1
        let end_point=1
        let employee_id='';

        window.onload=function(){
            recall();
        }

        function openmodel(){
            myModal.show();
            //inputfiled
            inputfiledReset();
            // Error
            ErrorReset();
        }

        function closemodel(){
            myModal.hide();
        }

      //  Update from
        function opanUpadteModel(id)
        {
            axios.get(`/employee-details/${id}`)
            .then(function (response) {
            let data=response.data.details;
              employee_id=data.id;
              upadte_name.value=data.name;
              update_designation.value=data.designation;
              update_city.value=data.city;  
            })
            update_model.show(); 
        }
        function closeUpdateModel()
        {
            update_model.hide(); 
        }

        function ErrorReset()
        {
           nameError.innerHTML='';
           designationError.innerHTML='';
           cityError.innerHTML='';
        }

        function inputfiledReset()
        {
            name.value='';
            designation.value='';
            city.value='';
        }

        function FromSubmit()
        { 
           ErrorReset();
           axios.post('/addEmployee',{
                'emp_name' : name.value,
                'emp_designation' : designation.value,            
                'emp_city' : city.value,            
            })
            .then(function (response) {
                closemodel();
                recall();
            })
            .catch(function (error) {
              //console.log(error.response.data.errors);
                
                if(name.value == '')
                {
                    nameError.innerHTML =error.response.data.errors.emp_name[0];
                }
                if(designation.value == '')
                {
                    designationError.innerHTML =error.response.data.errors.emp_designation[0];
                }
                if(city.value == '')
                {
                    cityError.innerHTML =error.response.data.errors.emp_city[0];
                }  
            })     
        }

        function updateErrorReset()
        {
           update_nameError.innerHTML='';
           update_designationError.innerHTML='';
           update_cityError.innerHTML='';
        }

        function UpdateFrom()
        {
            updateErrorReset();
            axios.post('/updateEmployee',{
                'emp_id' : employee_id,
                'emp_name' : upadte_name.value,
                'emp_designation':update_designation.value,
                'emp_city' :update_city.value      
            })
            .then(function (response) {
                closeUpdateModel();
                recall();
            })
            .catch(function (error) {
              //console.log(error.response.data.errors);
                if(upadte_name.value == '')
                {
                    update_nameError.innerHTML =error.response.data.errors.emp_name[0];
                }
                if(update_designation.value == '')
                {
                    update_designationError.innerHTML =error.response.data.errors.emp_designation[0];
                }
                if(update_city.value == '')
                {
                    update_cityError.innerHTML =error.response.data.errors.emp_city[0];
                }  
            })       
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
                start_point =response.data.start;
                end_point=response.data.end;
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
                    <td><button class="btn btn-success btn-sm" onclick="opanUpadteModel(${employee.id})" >
                        <i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="remove(${employee.id})"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>`   
            });
            paginationButton(); 
            displayEntry(); 
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

            if(page == 1)
            {
               document.getElementById("Previous").disabled = true;
            }
            else{
                document.getElementById("Previous").disabled = false;  
            }

            if(page >= page_button )
            {
               document.getElementById("next").disabled = true;
            }
            else{
                document.getElementById("next").disabled = false;  
            }
        }

        function changePage(page_number) {
            page=page_number; 
            recall(); 
        }

        function displayEntry() {
            
            if (end_point > datalist.length) 
            {
               end_point = start_point 
            }
            display_entry.innerHTML=`Showing ${start_point} to ${end_point} of ${datalist.length}`
        } 
        
        function remove(id)
        {
            axios.post('/delete_Employee',{ 
                'emp_id' : id          
            })
            .then(function (response) {
                if(page > all_data.length)
                {
                    page=1
                }
                recall();
            })  
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